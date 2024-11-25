from marca.extract import Apriori
import numpy as np

# Transaction data
data = np.array([[1, 3, 6],
                 [1, 4, 6],
                 [1, 4, 5],
                 [2, 3, 5],
                 [1, 4, 5]])

# Use the last column as y (if applicable)
x = data[:, :-1]  # Transactions
y = data[:, -1]   # Outcome (or label), if necessary

# Instantiate and fit the Apriori extractor
extractor = Apriori(support=0.1, confidence=0.5, max_len=5)
rules = extractor.fit(x, y)

# Export rules to CSV
rules.to_csv('Rules.csv')
