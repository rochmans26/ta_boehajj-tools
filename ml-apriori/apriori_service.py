from apyori import apriori
import pandas as pd
from flask import Flask, request, jsonify

app = Flask(__name__)

# Fungsi Preprocessing (menggabungkan Product Name dan Variation)
def preprocess_transactions_with_variation(df):
    # df['Product_Full'] = df['Product Name'] + ' - ' + df['Variation']
    df['Product_Full'] = df['Product Name']
    df_relevant = df[['Order ID', 'Product_Full']]
    transactions = df_relevant.groupby('Order ID')['Product_Full'].apply(list).tolist()
    return transactions

# Endpoint untuk menerima file CSV dan menjalankan Apriori
@app.route('/apriori', methods=['POST'])
def apriori_analysis():
    # Ambil file CSV dari request
    file = request.files['file']
    
    # Load CSV ke pandas DataFrame
    df = pd.read_csv(file)
    
    # Lakukan preprocessing pada data
    transactions = preprocess_transactions_with_variation(df)
    
    # Ambil parameter min_support dan min_confidence dari request (dengan nilai default jika tidak ada)
    min_support = float(request.form.get('min_support', 0.5))
    min_confidence = float(request.form.get('min_confidence', 0.7))
    
    # Jalankan algoritma Apriori dengan apyori
    results = apriori(transactions, min_support=min_support, min_confidence=min_confidence)
    
    # Format hasil ke dalam bentuk JSON
    formatted_results = []
    for result in results:
        for stat in result.ordered_statistics:
            itemset_size = len(stat.items_base) + len(stat.items_add)
            formatted_results.append({
                "antecedent": list(stat.items_base),
                "consequent": list(stat.items_add),
                "support": result.support,
                "confidence": stat.confidence,
                "lift": stat.lift,
                "itemset_size": itemset_size  # Menyimpan ukuran itemset
            })
    
    # Kembalikan hasil sebagai response JSON
    return jsonify({
        "status": "success",
        "results": formatted_results
    })

if __name__ == '__main__':
    app.run(debug=True)

# from flask import Flask, request, jsonify
# import pandas as pd
# import numpy as np
# from marca.extract import Apriori  # Import yang benar dari MARCA 0.1.0

# app = Flask(__name__)

# # Fungsi Preprocessing (menggabungkan Product Name dan Variation)
# def preprocess_transactions_with_variation(df):
#     df['Product_Full'] = df['Product Name'] + ' - ' + df['Variation']
#     df_relevant = df[['Order ID', 'Product_Full']]
    
#     # Mengonversi transaksi menjadi format numerik untuk algoritma Apriori
#     transactions = df_relevant.groupby('Order ID')['Product_Full'].apply(list).tolist()
#     unique_items = sorted(set(item for sublist in transactions for item in sublist))
#     transaction_matrix = np.zeros((len(transactions), len(unique_items)))
    
#     for i, transaction in enumerate(transactions):
#         for item in transaction:
#             if item in unique_items:
#                 transaction_matrix[i, unique_items.index(item)] = 1
                
#     return transaction_matrix, unique_items

# # Endpoint untuk menerima file CSV dan menjalankan Apriori
# @app.route('/apriori', methods=['POST'])
# def apriori_analysis():
#     # Ambil file CSV dari request
#     file = request.files['file']
    
#     # Load CSV ke pandas DataFrame
#     df = pd.read_csv(file)
    
#     # Lakukan preprocessing pada data
#     transaction_matrix, unique_items = preprocess_transactions_with_variation(df)
    
#     # Ambil parameter min_support dan min_confidence dari request (dengan nilai default jika tidak ada)
#     min_support = float(request.form.get('min_support', 0.1))
#     min_confidence = float(request.form.get('min_confidence', 0.5))
    
#     # Inisialisasi dan jalankan algoritma Apriori dengan MARCA 0.1.0
#     extractor = Apriori(support=min_support, confidence=min_confidence, max_len=5)
#     rules = extractor.fit(transaction_matrix[:, :-1], transaction_matrix[:, -1])
    
#     # Format hasil ke dalam bentuk JSON
#     formatted_rules = rules.to_dict('records')  # Konversi hasil menjadi bentuk dictionary
    
#     # Kembalikan hasil sebagai response JSON
#     return jsonify({
#         "status": "success",
#         "results": formatted_rules
#     })

# if __name__ == '__main__':
#     app.run(debug=True)
