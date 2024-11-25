<!DOCTYPE html>
<html lang="en">

<head>
    <script src="<?= base_url() ?>assets/bs5/js/color-modes.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="<?= base_url() ?>assets/bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        html,
        body {
            height: 100%;
        }

        main {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check2" viewBox="0 0 16 16">
                <path
                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
            </symbol>
            <symbol id="circle-half" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
            </symbol>
            <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                <path
                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                <path
                    d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
            </symbol>
            <symbol id="sun-fill" viewBox="0 0 16 16">
                <path
                    d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
            </symbol>
        </svg>

        <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
            <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
                type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                        aria-pressed="false" id="light-mode">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#sun-fill"></use>
                        </svg>
                        Light
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                        aria-pressed="false" id="dark-mode">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#moon-stars-fill"></use>
                        </svg>
                        Dark
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active"
                        data-bs-theme-value="auto" aria-pressed="true">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#circle-half"></use>
                        </svg>
                        Auto
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>

        <div class="container main">
            <div class="back-button mb-5 mt-3">
                <a href="<?= site_url('home') ?>" class="float-end d-flex align-items-center text-white"
                    id="back-button">
                    <i class="lni lni-chevron-left-circle fs-3 me-2"></i> Back
                </a>
            </div>
            <div class="card shadow-md mx-auto mt-3 mb-3">
                <!-- Main content -->
                <div class="row justify-content-center mx-auto my-3">

                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h1 class="text-center mb-4">Grafik
                                    Penjualan</h1>
                            </div>
                            <div class="col-md-12">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center mb-4">Hasil
                                    Apriori</h1>

                                <!-- Frequent Itemsets Section -->
                                <?php foreach ($itemset_by_size as $key => $value): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-primary text-white">
                                            Itemsets <?= $key ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Itemset</th>
                                                            <th>Nilai Support</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($value as $key): ?>
                                                            <tr>
                                                                <td>
                                                                    <?= implode(", ", $key['itemset']) ?>
                                                                </td>
                                                                <td>
                                                                    <?= $key['support'] ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <!-- Association Rules Section -->
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        Association Rules
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Antecedent</th>
                                                        <th>Concequent</th>
                                                        <th>Confidence</th>
                                                        <th>Lift</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($association_rules as $rule): ?>
                                                        <tr>
                                                            <td>
                                                                <?= implode(", ", $rule['antecedent']) ?>
                                                            </td>
                                                            <td>
                                                                <?= implode(", ", $rule['consequent']) ?>
                                                            </td>
                                                            <td><?= $rule['confidence'] ?></td>
                                                            <td><?= $rule['lift'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-sm mb-3">
                                    <div class="card-body">
                                        <h1 class="card-title text-center mb-4">Kesimpulan Berdasarkan Aturan Asosiasi
                                        </h1>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered rounded">
                                                <tbody>
                                                    <?php foreach ($association_rules as $rule) { ?>
                                                        <tr class="text text-center">
                                                            <td>
                                                                Jika customer membeli
                                                                <b><?= implode(", ", $rule['antecedent']) ?></b>,
                                                                maka customer cenderung membeli
                                                                <b><?= implode(", ", $rule['consequent']) ?></b> juga.
                                                                Dengan
                                                                tingkat
                                                                <b>confidence sebesar</b> <?= $rule['confidence'] ?>, serta
                                                                nilai <b>lift</b> sebesar <?= $rule['lift'] ?>
                                                                <hr>
                                                                <div class="p-3 bg-success rounded">
                                                                    <b>Product Bundling Promo: <br>
                                                                        <?= implode(", ", $rule['antecedent']) ?> =>
                                                                        <?= implode(", ", $rule['consequent']) ?>
                                                                    </b>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-sm mb-3">
                                    <div class="card-body">
                                        <h1 class="card-title text-center mb-4">Rekomendasi Tata Letak Etalase
                                            Berdasarkan Produk Unggulan</h1>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered rounded">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Item</th>
                                                        <th>Jumlah Kemunculan Data</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Urutkan array berdasarkan nilai dari besar ke kecil
                                                    arsort($item_occurrences);
                                                    $no = 1;

                                                    // Loop untuk menampilkan data
                                                    foreach ($item_occurrences as $item => $count) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?= htmlspecialchars($count, ENT_QUOTES, 'UTF-8'); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>assets/bs5/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const buttonId = document.getElementById('back-button');
            document.getElementById('light-mode').addEventListener('click', function (e) {
                e.preventDefault();
                buttonId.classList.remove('text-white');
                buttonId.classList.add('text-dark');
            });
            document.getElementById('dark-mode').addEventListener('click', function (e) {
                e.preventDefault();
                buttonId.classList.remove('text-dark');
                buttonId.classList.add('text-white');
            });
            const darkMode = document.getElementById('dark-mode');

        </script>
        <script>
            const ctx = document.getElementById('myChart');
            // Data PHP diubah menjadi format JSON
            const itemOccurrences = <?php echo json_encode($item_occurrences); ?>;

            // Proses data untuk Chart.js
            const labels = Object.keys(itemOccurrences); // Ambil nama item (dengan teks (none))
            const data = Object.values(itemOccurrences); // Ambil jumlah kemunculan item 

            new Chart(ctx, {
                type: 'bar', // Tipe chart (bar, pie, line, dll.)
                data: {
                    labels: labels, // Nama item (termasuk teks (none))
                    datasets: [{
                        label: 'Jumlah Kemunculan',
                        data: data,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'], // Warna batang
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true // Mulai dari nol
                        }
                    }
                }
            });
        </script>
</body>

</html>