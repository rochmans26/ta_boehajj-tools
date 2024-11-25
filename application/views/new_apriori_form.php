<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Input Apriori</title>
</head>

<body>
    <h1>Input Data Transaksi</h1>
    <form action="<?= site_url('NewAprioriController/processApriori') ?>" method="POST" enctype="multipart/form-data">
        <label>Upload Transactions File (CSV or XLSX):</label><br>
        <input type="file" name="transaction_file" accept=".csv, .xlsx"><br><br>
        <label>Minimum Support:</label>
        <input type="text" name="min_support" value="0.5"><br><br>
        <label>Minimum Confidence:</label>
        <input type="text" name="min_confidence" value="0.7"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>