<main class="main">
    <nav class="navbar navbar-expand-lg" style="background-color: #0e2238;">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand text-white fw-bold" href="<?= site_url('home') ?>">Boehajj Tools</a>

            <!-- Toggler for Small Screens -->
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if ($login == True) { ?>
                        <!-- User Icon and Greeting -->
                        <li class="nav-item d-flex align-items-center me-3">
                            <i class="lni lni-user-4 text-white me-2 fs-5"></i>
                            <span class="text-white">Hi, <?= $this->session->userdata('username'); ?>!</span>
                        </li>

                        <!-- Logout -->
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout') ?>"
                                class="btn btn-outline-light d-flex align-items-center">
                                <i class="lni lni-exit me-2"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('auth') ?>" class="btn btn-bd-primary d-flex align-items-center">
                                <span>Sign In</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

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
                    <h1 class="card-title text-center mb-4">Riwayat Apriori</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered rounded">
                            <thead>
                                <tr class="text text-center">
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Min Support</th>
                                    <th scope="col">Min Confidence</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($r_apriori as $value) { ?>
                                    <tr class="text text-center">
                                        <td>
                                            <?php echo date('d-m-Y', strtotime($value->time_stamp)); ?>
                                        </td>
                                        <td>
                                            <?php echo $value->nama_file; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->min_support; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->min_confidence; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex mx-auto justify-content-center">
                                                <a href="<?= site_url('newaprioricontroller/view_apriori/' . $value->id_history); ?>"
                                                    class="btn btn-sm btn-success">Lihat</a> &nbsp;
                                                <a href="<?= site_url('newaprioricontroller/hapus/' . $value->id_history); ?>"
                                                    class="btn btn-sm btn-danger">Hapus</a>
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