from flask import Flask, request, jsonify
import marca

app = Flask(__name__)

# Fungsi untuk menjalankan algoritma Apriori dan menghitung association rules
def run_apriori(transactions, min_support, min_confidence):
    # Membuat model Apriori dengan MARCA
    apriori_model = marca.Apriori(min_support=min_support)
    apriori_model.fit(transactions)

    # Menghasilkan association rules
    rules = apriori_model.get_association_rules(min_confidence=min_confidence)

    # Format hasil ke dalam list yang mengandung support, confidence, dan lift
    results = []
    for rule in rules:
        antecedent = rule.antecedent
        consequent = rule.consequent
        support = rule.support
        confidence = rule.confidence
        lift = rule.lift

        # Tambahkan aturan ke dalam hasil
        results.append({
            "antecedent": list(antecedent),
            "consequent": list(consequent),
            "support": support,
            "confidence": confidence,
            "lift": lift
        })

    return results

# Route untuk menjalankan Apriori via POST request
@app.route('/apriori', methods=['POST'])
def apriori():
    try:
        # Mendapatkan data transaksi, minimum support, dan minimum confidence dari request
        data = request.get_json()
        transactions = data.get('transactions', [])
        min_support = data.get('min_support', 0.5)
        min_confidence = data.get('min_confidence', 0.5)

        # Jalankan Apriori
        results = run_apriori(transactions, min_support, min_confidence)

        # Kembalikan hasil dalam format JSON
        return jsonify({'status': 'success', 'results': results}), 200

    except Exception as e:
        return jsonify({'status': 'error', 'message': str(e)}), 400

if __name__ == '__main__':
    app.run(debug=True)
