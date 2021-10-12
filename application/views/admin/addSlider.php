<!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
              <div class="col-12">
                <div
                  class="
                    page-title-box
                    d-flex
                    align-items-center
                    justify-content-between
                  "
                >
                  <h4 class="mb-0">Add Slider</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Ecommerce</a>
                      </li>
                      <li class="breadcrumb-item active">Add Slider</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- end page title -->

            <div class="row">
              <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                  <div class="card">
                    <div
                      id="addproduct-billinginfo-collapse"
                      class="collapse show"
                      data-bs-parent="#addproduct-accordion"
                    >
                      <div class="p-4 border-top">
                        <form action="<?php echo base_url('admin/Slider/insert') ?>" method="post" enctype="multipart/form-data">
                          <div class="mb-3">
                           
                              <div class="mt-3">
                                <label class="form-label" for="title"
                                  >Slider Title</label
                                >
                                <input
                                  id="title"
                                  name="title"
                                  type="text"
                                  class="form-control"
                                  required
                                />
                              </div>
                              
                              <!-- <div class="mt-3">
                              <label class="form-label" for="popular_post"
                                  >Popular post </label
                                >
                              <input type="checkbox" name="popular_post" id="popular_post" value="1"  >
                              </div> -->
                          </div>
                           <!-- <div class="mb-3">
                            <label class="form-label" for="created_at"
                              >created_at</label
                            >
                            <input
                              id="created_at"
                              name="created_at"
                              type="text"
                              class="form-control"
                            />
                          </div>  -->
                          <div class="mb-3">
                            <label class="form-label" for="image"
                              >Slider Image</label
                            >
                            <input type="file" name="image" id="" class="form-control" >
                          </div>
                          <!-- <div class="mb-3">
                            <label class="form-label" for="image"
                              >Image</label
                            >
                            <input type="file" name="image1[]" multiple id="" class="form-control" >
                          </div> -->
                          
                         

                          <button class="btn" type="submit">
                          <a class="btn btn-success">
                            <i class="uil uil-file-alt me-1"></i> Save
                          </a>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->

            
            <!-- end row-->
          </div>
          <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <script>
                  document.write(new Date().getFullYear());
                </script>
                © Minible.
              </div>
              <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                  Crafted with <i class="mdi mdi-heart text-danger"></i> by
                  <a
                    href="https://themesbrand.com/"
                    target="_blank"
                    class="text-reset"
                    >Themesbrand</a
                  >
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->