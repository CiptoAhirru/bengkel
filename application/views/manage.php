<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Hoverable Table rows -->
              <div class="card">
              <div class="m-4 mb-1">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalAddService"
                        >
                          Insert Data
                        </button>
                        </div>
                <h5 class="card-header">Data Service</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori Service</th>
                        <th>Jenis Service</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="tbody">
                    
                    </tbody>
                  </table>
                </div>
              </div>
</div>

<!-- Modal add service -->
<div class="modal fade" id="modalAddService" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Data Service</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form id="form" method="POST">
                                <div class="row">
                                <div class="mb-6">
                                    <label for="defaultSelect" class="form-label">Kategori</label>
                                    <select id="kategori_id" class="form-control" required>
                                    <option value="">Default Select</option>
                                    <?php foreach($kategori as $k):?>
                                    <option value="<?php echo $k['id'];?>">
                                        <?php echo $k['service'];?>	
                                    </option>
                                    <?php endforeach;?>
                                    </select>
                                    

                                    <!-- <input
                                      type="text"
                                      id="kategori_id"
                                      name="kategori_id"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    /> -->
                                  </div>
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input
                                      type="text"
                                      id="name"
                                      name="name"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    />
                                  </div>
                                </div>
                              </div>
                                </form>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-primary" id="add">Add</button>
                              </div>
                            </div>
                          </div>
                        </div>

<!-- Modal Update data  -->
<div class="modal fade" id="modalAddService" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Data Service</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form id="form" method="POST">
                                <div class="row">
                                <div class="mb-6">
                                    <label for="defaultSelect" class="form-label">Kategori</label>
                                    <select id="kategori_id" class="form-control" required>
                                    <option value="">Default Select</option>
                                    <?php foreach($kategori as $k):?>
                                    <option value="<?php echo $k['id'];?>">
                                        <?php echo $k['service'];?>	
                                    </option>
                                    <?php endforeach;?>
                                    </select>
                                    

                                    <!-- <input
                                      type="text"
                                      id="kategori_id"
                                      name="kategori_id"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    /> -->
                                  </div>
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input
                                      type="text"
                                      id="name"
                                      name="name"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    />
                                  </div>
                                </div>
                              </div>
                                </form>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-primary" id="add">Add</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        



