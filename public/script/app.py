from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/process_data', methods=['POST'])
def process_data():
    data = request.json.get('data')
    if data:
        processed_data = "Processed: " + data
        print(processed_data)
        return jsonify({'status': 'success', 'output': processed_data})
    else:
        return jsonify({'status': 'error', 'message': 'No data provided'})

if __name__ == '__main__':
    app.run(debug=True)