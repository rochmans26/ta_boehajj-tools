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
                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light d-flex align-items-center">
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