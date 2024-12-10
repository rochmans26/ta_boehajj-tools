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

            <?php if ($login == True) { ?>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Algoritma Apriori</h1>
                        <p class="card-text">
                            Algoritma Apriori adalah salah satu metode dalam data mining yang digunakan untuk menemukan pola
                            frekuensi tinggi (frequent itemsets) dalam dataset transaksi.
                            Algoritma ini membantu mengidentifikasi hubungan atau asosiasi antar item dalam dataset, seperti
                            pola pembelian dalam sistem ritel.
                            Pola ini sering digunakan untuk analisis keranjang belanja (market basket analysis) dan
                            pengambilan keputusan bisnis.
                        </p>
                        <hr>
                        <h5 class="card-subtitle mb-3">Cara Kerja Algoritma Apriori:</h5>
                        <ul>
                            <li><b>1. Generasi Frequent Itemsets:</b> Mencari itemset yang memenuhi ambang batas minimum
                                support.</li>
                            <li><b>2. Pruning:</b> Menghapus itemset yang tidak memenuhi kriteria minimum support
                                menggunakan properti downward-closure.</li>
                            <li><b>3. Generasi Rules:</b> Membentuk aturan asosiasi berdasarkan minimum confidence.</li>
                        </ul>
                        <hr>
                        <h5 class="card-subtitle mb-3">Rumus Minimum Support dan Confidence:</h5>
                        <p><b>1. Support:</b></p>
                        <p class="text-center">
                            <code>Support(X) = (Jumlah transaksi yang mengandung X) / (Total transaksi)</code>
                        </p>
                        <p><b>2. Confidence:</b></p>
                        <p class="text-center">
                            <code>Confidence(X → Y) = Support(X ∪ Y) / Support(X)</code>
                        </p>
                        <p>
                            <b>Support</b> mengukur seberapa sering itemset muncul dalam dataset, sedangkan
                            <b>Confidence</b> mengukur seberapa sering item Y muncul ketika item X ada dalam satu transaksi.
                        </p>
                        <div class="d-flex mx-auto justify-content-center">
                            <a href="<?= site_url('newaprioricontroller/') ?>" class="btn btn-primary mt-3 mb-3">Get
                                Started</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Algoritma Apriori</h1>
                        <p class="card-text">
                            Algoritma Apriori adalah salah satu metode dalam data mining yang digunakan untuk menemukan pola
                            frekuensi tinggi (frequent itemsets) dalam dataset transaksi.
                            Algoritma ini membantu mengidentifikasi hubungan atau asosiasi antar item dalam dataset, seperti
                            pola pembelian dalam sistem ritel.
                            Pola ini sering digunakan untuk analisis keranjang belanja (market basket analysis) dan
                            pengambilan keputusan bisnis.
                        </p>
                        <hr>
                        <h5 class="card-subtitle mb-3">Cara Kerja Algoritma Apriori:</h5>
                        <ul>
                            <li><b>1. Generasi Frequent Itemsets:</b> Mencari itemset yang memenuhi ambang batas minimum
                                support.</li>
                            <li><b>2. Pruning:</b> Menghapus itemset yang tidak memenuhi kriteria minimum support
                                menggunakan properti downward-closure.</li>
                            <li><b>3. Generasi Rules:</b> Membentuk aturan asosiasi berdasarkan minimum confidence.</li>
                        </ul>
                        <hr>
                        <h5 class="card-subtitle mb-3">Rumus Minimum Support dan Confidence:</h5>
                        <p><b>1. Support:</b></p>
                        <p class="text-center">
                            <code>Support(X) = (Jumlah transaksi yang mengandung X) / (Total transaksi)</code>
                        </p>
                        <p><b>2. Confidence:</b></p>
                        <p class="text-center">
                            <code>Confidence(X → Y) = Support(X ∪ Y) / Support(X)</code>
                        </p>
                        <p>
                            <b>Support</b> mengukur seberapa sering itemset muncul dalam dataset, sedangkan
                            <b>Confidence</b> mengukur seberapa sering item Y muncul ketika item X ada dalam satu transaksi.
                        </p>
                        <div class="d-flex mx-auto justify-content-center">
                            <a href="<?= site_url('auth') ?>" class="btn btn-primary mt-3 mb-3">Get Started</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>