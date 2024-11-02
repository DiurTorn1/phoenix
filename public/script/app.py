from flask import Flask, request, jsonify

import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Email configuration
sender_email = "tehnodir.d@mail.ru"
receiver_email = "diur_tornbeornson@mail.ru"
subject = "Styled HTML Email from Python"

# HTML content with inline CSS
html_message = """
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Service</h1>
        <p>Thank you for registering! Please confirm your email address by clicking the button below:</p>
        <a href="{{ url_for('confirm_email', token=token, _external=True) }}" class="button">Подтвердить почту</a>
        <p>If you did not register for this service, you can safely ignore this email.</p>
    </div>
</body>
</html>
"""

# Create the email
msg = MIMEMultipart()
msg['From'] = sender_email
msg['To'] = receiver_email
msg['Subject'] = subject

# Attach the HTML message to the email
msg.attach(MIMEText(html_message, 'html'))

app = Flask(__name__)

@app.route('/process_data', methods=['POST'])
def process_data():
    mail = request.json.get('mail')
    if mail:
        processed_data = "Processed: " + mail
        print(processed_data)
        put = "Maksimalochka"
        try:
            # Use SMTP_SSL for secure connection
            with smtplib.SMTP_SSL('smtp.mail.ru', 465) as server:
                server.login(sender_email, "2jU9mvTg5EajYrizvbwV")
                server.sendmail(sender_email, mail, msg.as_string())
                put = "Email sent successfully!"
        except Exception as e:
            put = f"Error sending email: {e}"
        return jsonify({'status': 'success', 'output': put})
    else:
        return jsonify({'status': 'error', 'message': 'No data provided'})

if __name__ == '__main__':
    app.run(debug=True)