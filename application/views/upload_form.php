<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV untuk Analisis Apriori</title>
</head>
<body>
    <h2>Upload CSV untuk Analisis Apriori</h2>
    <form action="<?php echo base_url('AprioriController/process_apriori'); ?>" method="POST" enctype="multipart/form-data">
        <label for="csv_file">Pilih File CSV:</label>
        <input type="file" name="csv_file" required><br><br>

        <label for="min_support">Min Support (default 0.5):</label>
        <input type="text" name="min_support" placeholder="0.5"><br><br>

        <label for="min_confidence">Min Confidence (default 0.7):</label>
        <input type="text" name="min_confidence" placeholder="0.7"><br><br>

        <button type="submit">Proses Apriori</button>
    </form>
</body>
</html>
