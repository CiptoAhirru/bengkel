<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <h5 class="card-header">List antrian</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
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
                        <?php echo $jenis['total']; ?> Perbaikan
                        </td>
                        <td><?php echo $jenis['is_paid']; ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endif?>
                      <?php endforeach?>
                    </tbody>
                  </table>
                </div>
              </div>
</div>

