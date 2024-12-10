<main class="main">
    <?php echo $navbar; ?>
    <!-- Main content -->
    <div class="row justify-content-center mx-auto my-3">
        <div class="container mb-3">
            <div class="p-5 text-white rounded text-center shadow-md" style="background-image: url('<?= base_url('assets/img/card-bg.jpg') ?>'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                <h1 class="animate__animated animate__bounce"
                    style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); font-size: 2.5rem; font-weight: bold;">
                    Selamat Datang di Boehajj Tools!
                </h1>
            </div>
        </div>


        <!-- <div class="back-button mb-3">
            <a
              href="#"
              style="color: darkslategrey"
              class="float-end d-flex align-items-center"
            >
              <i class="lni lni-chevron-left-circle fs-3 me-2"></i> Back
            </a>
          </div> -->
        <div class="col-sm-6 mb-3 mb-sm-0">
            <?php if ($this->session->flashdata('msg')): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('err_msg')): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $this->session->flashdata('err_msg'); ?>
                </div>
            <?php endif; ?>
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Daftar User</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered rounded">
                            <thead>
                                <tr class="text text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $value) { ?>
                                    <tr class="text text-center">
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->username; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->notelp; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->alamat; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex mx-auto justify-content-center">
                                                <a href="<?= site_url('users/blockUser/' . $value->id_user); ?>"
                                                    class="btn btn-sm btn-danger">Block</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>