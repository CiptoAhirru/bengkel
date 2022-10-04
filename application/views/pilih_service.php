<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> List groups</h4>
<div class="card mb-4">
                <h5 class="card-header">Pilih Kategori</h5>
                <div class="card-body">
                  <div class="row">
                    <!-- Custom content with heading -->
                    <div class="col-lg-6 mb-4 mb-xl-0">
                      <small class="text-light fw-semibold">Service Mobil</small>
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
                              <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
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
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
                  </div>
                </div>
              </div>
</div>