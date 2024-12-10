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
                    <h1 class="card-title text-center mb-4">Algoritma Apriori</h1>
                    <form action="<?php echo base_url('NewAprioriController/processApriori'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">Pilih File CSV:</label>
                            <input type="file" class="form-control" name="transaction_file" id="csv_file" required>
                        </div>

                        <div class="mb-3">
                            <label for="min_support" class="form-label">Min Support (default 0.5):</label>
                            <input type="text" class="form-control" name="min_support" id="min_support"
                                placeholder="0.5">
                        </div>

                        <div class="mb-3">
                            <label for="min_confidence" class="form-label">Min Confidence (default 0.7):</label>
                            <input type="text" class="form-control" name="min_confidence" id="min_confidence"
                                placeholder="0.7">
                        </div>
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>