<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Booking</h4>
<div class="col-xxl">
<button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                          Tambah
                        </button>
<br /><br />
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Booking Service</h5>
                      <small class="text-muted float-end">Booking</small>
                    </div>
                    <div class="card-body">
                        
                        <form method="post" action="<?php echo site_url('service/insert/'); ?>">
                        <div class="row mb-3">
                        <?php foreach ($booking as $jenis) :?>
                          <?php if ($jenis['is_paid'] == 0) : ?>
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Service</label>
                          <div class="col-sm-10">
                          <input
                                type="text"
                                id="basic-default-email"
                                name="service"
                                class="form-control"
                                value="<?= $jenis['serviceid']; ?>"
                                readonly
                              /><?= $jenis['nama_service']; ?>
                          </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Nama</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              id="nama"
                              name="nama"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941"
                              aria-describedby="basic-default-phone"
                              value="<?= $user['username']; ?>"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Alamat</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              id="alamat"
                              name="alamat"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941"
                              aria-describedby="basic-default-phone"
                              value="<?= $user['alamat']; ?>"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              id="no_wa"
                              name="no_wa"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941"
                              aria-describedby="basic-default-phone"
                              value="<?= $user['no_wa']; ?>"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Tanggal</label>
                          <div class="col-sm-10">
                            <input
                              type="date"
                              id="no_wa"
                              name="tgl"
                              placeholder="<?= date('d/m/y'); ?>"
                              value="<?= date('dd/mm/yyyy'); ?>"
                            />Default tanggal sekarang = <?= date('d/m/y'); ?>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>

<!-- modal insert -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                <div class="mt-3">
                        <div class="row">
                          <div class="col-md-4 col-12 mb-3 mb-md-0">
                            <div class="list-group">
                              <a
                                class="list-group-item list-group-item-action active"
                                id="list-home-list"
                                data-bs-toggle="list"
                                href="#list-home"
                                >Service Berat</a
                              >
                              <a
                                class="list-group-item list-group-item-action"
                                id="list-profile-list"
                                data-bs-toggle="list"
                                href="#list-profile"
                                >Service Ringan</a
                              >
                              <a
                                class="list-group-item list-group-item-action"
                                id="list-messages-list"
                                data-bs-toggle="list"
                                href="#list-messages"
                                >Spare Part</a
                              >
                            </div>
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="tab-content p-0">
                              <div class="tab-pane fade show active" id="list-home">
                              <?php foreach ($service as $s): ?>
                                <?php if ($s['kategori_id'] == 1): ?>
                              <form method="POST" action="<?php echo site_url('service/insert_submit/'); ?>">
                              <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $s['id']; ?>" name="check_list[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $s['name']; ?>
                                    </label>
                                </div>
                                <?php endif?>
                              <?php endforeach?>
                              </div>
                              <div class="tab-pane fade" id="list-profile">
                              <?php foreach ($service as $s): ?>
                                <?php if ($s['kategori_id'] == 2): ?>
                              <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $s['id']; ?>" name="check_list[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $s['name']; ?>
                                    </label>
                                </div>
                                <?php endif?>
                              <?php endforeach?>
                              </div>
                              <div class="tab-pane fade" id="list-messages">
                              <?php foreach ($service as $s): ?>
                                <?php if ($s['kategori_id'] == 3): ?>
                              <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $s['id']; ?>" name="check_list[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $s['name']; ?>
                                    </label>
                                </div>
                                <?php endif?>
                              <?php endforeach?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>