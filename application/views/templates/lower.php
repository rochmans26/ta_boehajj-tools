</div>

<script src="<?= base_url() ?>assets/bs5/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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