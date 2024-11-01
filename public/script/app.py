from flask import Flask, request, jsonify
import subprocess

from OpenSSL import SSL
context = SSL.Context(SSL.PROTOCOL_TLSv1_2)
context.use_privatekey_file('/etc/apache2/ssl/cert.key')
context.use_certificate_file('/etc/apache2/ssl/cert.crt')  

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
    #context = ('/etc/apache2/ssl/cert.crt', '/etc/apache2/ssl/cert.key')#certificate and key files
    app.run(host='127.0.0.1', debug=True, ssl_context=context)