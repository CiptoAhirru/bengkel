<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->library('form_validation');
        
    }

    public function index(){


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run()==FALSE){  
            $data['title'] = 'Login';
            $this->load->view('template/auth_header');
            $this->load->view('auth/auth');
            $this->load->view('template/auth_footer');
        } else {
            $this->login();
        }

    }

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $actor = $this->db->get_where('actor', ['email' => $email])->row_array();

        if ($actor){
             //actor aktif
             if($actor['is_active']==1){
                 if(password_verify($password, $actor['password'])){
                     $data = [
                         'email' => $actor['email'],
                         'role_id' => $actor['role_id']
                     ];
                     $this->session->set_userdata($data);
                     if ($actor['role_id']==2){
                         redirect('Service');
                     }
                     else if ($actor['role_id']==1){
                         redirect('Dashboard');
                     }
                 }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>' );
                    redirect('auth');
                 }

                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belom Diaktivasi</div>' );
                    redirect('auth');
             }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belom Terdaftar</div>' );
            redirect('auth');
        }
    }

    public function registration(){
        
        if($this->session->userdata('role_id')){
            redirect('actor');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[actor.email]', [
            'is_unique' => 'Email sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont macth!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if($this->form_validation->run()== FALSE){
            $data['title'] = 'Registrasi Akun';
            $this->load->view('template/auth_header');
            $this->load->view('auth/register');
            $this->load->view('template/auth_footer');
        }else{
            $email = $this->input->post('email', true);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];


            $this->db->insert('actor', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been craeted. Please Activate your Account</div>');
            redirect('auth');
        }

    }

    private function _sendEmail($token, $type){

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ciptoahirru14108@gmail.com',
            'smtp_pass' => 'upbayctikxtoeaho',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('ciptoahirru14108@gmail.com', 'Bengkel 53');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify'){

            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href= "'.base_url().'auth/verify?email='. $this->input->post('email') . '&token=' . urlencode($token) . '">Activate Email Anda</a>');
        } else if ($type== 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href= "'.base_url().'auth/resetpassword?email='. $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if($this->email->send()) {
            return true;
        }else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verify(){

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $actor = $this->db->get_where('actor', ['email' => $email])->row_array();

        if ($actor) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token){
                if (time() - $user_token['date_created'] < (60*60*24)){
                    
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('actor');

                    $this->db->delete( 'user_token', ['email' => $email] );
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email.' has been activated! please Login!</div>');
                    redirect('auth');
                }else{

                    $this->db->delete('actor', ['email'=> $email]);
                    $this->db->delete('user_token', ['email'=> $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Account activation Failed ! Token Expired</div>');
                    redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Account activation Failed ! Wrong Token</div>');
                redirect('auth');
            }
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Account activation Failed ! Wrong Email</div>');
            redirect('auth');
        }

    }

    public function logout(){

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been Logout</div>');
        redirect('auth');

    }
    
}