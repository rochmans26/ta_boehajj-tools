<div class="main">
    <nav class="navbar" style="background-color: #0e2238">
        <div class="container-fluid">
            <div class="mx-auto d-block">
                <a class="navbar-brand text-white" href="#">Boehajj Tools</a>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="row justify-content-center mx-auto my-3">
        <div class="back-button mb-3 me-3">
            <a href="<?= site_url('home') ?>" style="color: darkslategrey" class="float-end d-flex align-items-center">
                <i class="lni lni-chevron-left-circle fs-3 me-2"></i> Back
            </a>
        </div>
        <div class="container my-3">
            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body text-white rounded" style=" 
              background-image: url('<?= base_url() ?>assets/img/card-bg.jpg'); 
              background-size: cover; 
              background-position: center; 
              background-repeat: no-repeat;">
                    <h5 class="card-title fw-bold my-3">Algoritma Apriori</h5>
                    <p class="card-text">
                        Algoritma Apriori adalah salah satu algoritma yang paling populer dalam data mining, khususnya
                        dalam analisis market basket untuk menemukan asosiasi antar item dalam suatu dataset besar.
                        Algoritma ini bekerja dengan mengidentifikasi pola atau hubungan item dalam suatu transaksi
                        berdasarkan prinsip frekuensi. Tujuan utama dari algoritma apriori adalah menemukan frequent
                        itemsets atau kumpulan item yang sering muncul bersama dalam dataset, dan dari frequent itemsets
                        tersebut, aturan asosiasi dapat dihasilkan untuk membantu memahami pola pembelian atau perilaku
                        pengguna. Algoritma ini digunakan secara luas dalam aplikasi seperti analisis penjualan,
                        rekomendasi produk, dan optimasi tata letak toko.
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#getstarted">Get Started</button>
                    <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Get
                        Started</a> -->
                </div>
                <!-- <div class="card-footer text-body-secondary">
                    2 days ago
                </div> -->
            </div>
        </div>
        <div class="col-12 mb-3 mb-sm-0">
            <div class="title my-3 mb-4">
                <p class="text text-center fw-bold fs-1">
                    Riwayat Analisis
                </p>
            </div>
            <div class="table-responsive rounded">
                <table class="table table-warning table-hover table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>ID Analisis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td class="text-center">
                                <a href="" class="btn btn-success">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                            <td class="text-center">
                                <a href="" class="btn btn-success">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                            <td class="text-center">
                                <a href="" class="btn btn-success">View</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="getstarted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apriori Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('NewAprioriController/processApriori'); ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Pilih File CSV:</label>
                        <input type="file" class="form-control" name="transaction_file" id="csv_file" required>
                    </div>

                    <div class="mb-3">
                        <label for="min_support" class="form-label">Min Support (default 0.5):</label>
                        <input type="text" class="form-control" name="min_support" id="min_support" placeholder="0.5">
                    </div>

                    <div class="mb-3">
                        <label for="min_confidence" class="form-label">Min Confidence (default 0.7):</label>
                        <input type="text" class="form-control" name="min_confidence" id="min_confidence"
                            placeholder="0.7">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>