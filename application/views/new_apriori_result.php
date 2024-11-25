<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil Apriori</title>
</head>

<body>
    <h1>Hasil Apriori</h1>

    <h2>Frequent Itemsets</h2>
    <ul>
        <?php foreach ($frequent_itemsets as $itemset): ?>
            <li>
                Itemset: <?= implode(", ", $itemset['itemset']) ?> - Support: <?= $itemset['support'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Association Rules</h2>
    <ul>
        <?php foreach ($association_rules as $rule): ?>
            <li>
                Antecedent: <?= implode(", ", $rule['antecedent']) ?> => Consequent:
                <?= implode(", ", $rule['consequent']) ?>
                <br>Confidence: <?= $rule['confidence'] ?> - Lift: <?= $rule['lift'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>