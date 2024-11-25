from flask import Flask, request, jsonify
from itertools import combinations

app = Flask(__name__)

# Fungsi untuk menghitung support itemset
def calculate_support(transactions, itemset):
    count = 0
    for transaction in transactions:
        if itemset.issubset(transaction):
            count += 1
    return count / len(transactions)

# Fungsi Apriori untuk menemukan itemset yang sering muncul
def apriori(transactions, min_support):
    items = set(item for transaction in transactions for item in transaction)
    itemsets = [{item} for item in items]
    frequent_itemsets = []
    support_data = {}

    k = 1
    itemset_by_size = {}  # Dictionary untuk menyimpan frequent itemsets berdasarkan ukurannya

    while itemsets:
        itemsets_with_support = []
        for itemset in itemsets:
            support = calculate_support(transactions, itemset)
            if support >= min_support:
                itemsets_with_support.append((itemset, support))
                frequent_itemsets.append((itemset, support))
                support_data[frozenset(itemset)] = support

                # Tambahkan itemset ke dalam dictionary sesuai ukuran (k)
                if k not in itemset_by_size:
                    itemset_by_size[k] = []
                itemset_by_size[k].append({"itemset": list(itemset), "support": support})

        # Pruning: Hanya pertahankan itemset yang memenuhi min_support untuk iterasi berikutnya
        itemsets = [itemset1 | itemset2 for i, (itemset1, _) in enumerate(itemsets_with_support) 
                    for j, (itemset2, _) in enumerate(itemsets_with_support) if i < j and len(itemset1 | itemset2) == k + 1]
        
        # Pruning lanjutan: Filter kandidat agar hanya yang memiliki sub-itemset yang sering
        itemsets = [itemset for itemset in itemsets if all(frozenset(subset) in support_data for subset in combinations(itemset, k))]
        
        k += 1

    return frequent_itemsets, itemset_by_size

# Fungsi untuk menghitung lift dari suatu aturan
def calculate_lift(transactions, antecedent, consequent):
    support_antecedent = calculate_support(transactions, antecedent)
    support_consequent = calculate_support(transactions, consequent)
    support_antecedent_consequent = calculate_support(transactions, antecedent | consequent)
    
    if support_antecedent * support_consequent == 0:
        return 0
    return support_antecedent_consequent / (support_antecedent * support_consequent)

# Fungsi untuk menghasilkan aturan asosiasi dengan perhitungan confidence dan lift
def generate_rules(frequent_itemsets, transactions, min_confidence):
    rules = []
    for itemset, support in frequent_itemsets:
        if len(itemset) > 1:
            for antecedent in map(set, combinations(itemset, len(itemset) - 1)):
                consequent = itemset - antecedent
                antecedent_support = calculate_support(transactions, antecedent)
                if antecedent_support > 0:
                    confidence = support / antecedent_support
                    if confidence >= min_confidence:
                        lift = calculate_lift(transactions, antecedent, consequent)
                        rules.append({
                            "antecedent": list(antecedent),
                            "consequent": list(consequent),
                            "confidence": confidence,
                            "lift": lift
                        })
    return rules

# Fungsi untuk menghitung jumlah kemunculan setiap item
def calculate_item_occurrences(transactions):
    item_counts = {}
    for transaction in transactions:
        for item in transaction:
            if item in item_counts:
                item_counts[item] += 1
            else:
                item_counts[item] = 1
    return item_counts

# Endpoint untuk Apriori
@app.route('/apriori', methods=['POST'])
def apriori_api():
    data = request.get_json()
    transactions = [set(transaction) for transaction in data.get("transactions", [])]
    min_support = data.get("min_support", 0.5)
    min_confidence = data.get("min_confidence", 0.5)

    # Menjalankan algoritma apriori
    frequent_itemsets, itemset_by_size = apriori(transactions, min_support)
    rules = generate_rules(frequent_itemsets, transactions, min_confidence)
    item_count = calculate_item_occurrences(transactions)

    # Mengembalikan hasil dalam format JSON
    return jsonify({
        "frequent_itemsets": [{"itemset": list(itemset), "support": support} for itemset, support in frequent_itemsets],
        "association_rules": rules,
        "itemset_by_size": itemset_by_size,
        "item_occurrences": item_count
    })

if __name__ == '__main__':
    app.run(debug=True)
