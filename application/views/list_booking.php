<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <h5 class="card-header">Striped rows</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Invoice</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Wa</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php foreach ($booking as $jenis) :?>
                      <?php if($jenis['is_paid']!=0):?>
                      <?php
                      if ($jenis['is_paid'] == 1) {
                        $jenis['is_paid'] = "<span class='badge bg-label-warning me-1'>Pending</span>";
                      }
                      else if ($jenis['is_paid'] == 2) {
                        $jenis['is_paid'] = "<span class='badge bg-label-success me-1'>Accept</span>";
                      }
                      if ($jenis['is_paid'] == 3) {
                        $jenis['is_paid'] = "<span class='badge bg-label-primary me-1'>Finish</span>";
                      }
                      ?>
                      <tr>
                      <td>
                          <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong><?php echo $jenis['invoice']; ?></strong>
                        </td>
                        <td><?php echo $jenis['nama']; ?></td>
                        <td >    
                          <?php echo $jenis['alamat']; ?>         
                        <td>
                        <?php echo $jenis['no_wa']; ?>
                        </td>
                        <td>
                        <?php echo $jenis['tgl']; ?>
                        </td>
                        <td>
                        <?php echo $jenis['total']; ?> Perbaikan
                        </td>
                        <td><a href="<?php echo site_url('admin/acc/'.$jenis['invoice']); ?>" onClick="return confirm('Anda ingin ACCEPT?')"><?php echo $jenis['is_paid']; ?></a></td>
                      </tr>
                      <?php endif?>
                      <?php endforeach?>
                    </tbody>
                  </table>
                </div>
              </div>
</div>