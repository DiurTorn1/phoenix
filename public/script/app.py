from flask import Flask, request, jsonify
import subprocess

app = Flask(__name__)

@app.route('/', methods=['POST'])
def exchange_data():
    data = request.form.get('data')
    if data:
        # Execute the independent Python script with the data
        result = subprocess.run(['python', 'data.py', data], capture_output=True, text=True)
        return jsonify({'status': 'success', 'output': result.stdout})
    else:
        return jsonify({'status': 'error', 'message': 'No data provided'})

if __name__ == '__main__':
    app.run(debug=True)