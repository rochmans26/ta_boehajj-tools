import pandas as pd

def preprocess_transactions_with_variation(file_path):
    """
    Preprocessing CSV data to generate transactions for Apriori,
    combining Product Name and Variation to distinguish items correctly.
    
    Parameters:
        file_path (str): Path to the CSV file containing transaction data.
    
    Returns:
        list of list: Processed transactions ready for Apriori.
    """
    # Load the CSV file
    df = pd.read_csv(file_path)
    
    # Create a new column that combines Product Name and Variation
    df['Product_Full'] = df['Product Name'] + ' - ' + df['Variation']
    
    # Select relevant columns: Order ID and the new combined product column
    df_relevant = df[['Order ID', 'Product_Full']]
    
    # Group by Order ID and aggregate products into a list
    transactions = df_relevant.groupby('Order ID')['Product_Full'].apply(list).tolist()
    
    # Remove duplicate products within each transaction (if necessary)
    transactions = [list(set(transaction)) for transaction in transactions]
    
    return transactions

# Example usage:
file_path = '/mnt/data/Selesai pesanan-2024-10-07-11_27.csv'
transactions = preprocess_transactions_with_variation(file_path)

# Display a few sample transactions after preprocessing
for i, transaction in enumerate(transactions[:5], 1):
    print(f"Transaction {i}: {transaction}")
