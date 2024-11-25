<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apriori Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Apriori Algorithm Results</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Itemset</th>
                    <th>Antecedent</th>
                    <th>Consequent</th>
                    <th>Support</th>
                    <th>Confidence</th>
                    <th>Lift</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results['results'] as $result): ?>
                    <tr>
                        <td>Itemset <?php echo $result['itemset_size']; ?></td>
                        <td><?php echo implode(', ', $result['antecedent']); ?></td>
                        <td><?php echo implode(', ', $result['consequent']); ?></td>
                        <td><?php echo $result['support']; ?></td>
                        <td><?php echo $result['confidence']; ?></td>
                        <td><?php echo $result['lift']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>