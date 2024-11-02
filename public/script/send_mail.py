from flask import Flask, request, render_template, redirect, url_for
from flask_sqlalchemy import SQLAlchemy
from flask_mail import Mail, Message
import secrets

app = Flask(__name__)

# Flask-SQLAlchemy configuration
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///emails.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

# Flask-Mail configuration
app.config['MAIL_SERVER'] = 'smtp.mail.ru'
app.config['MAIL_PORT'] = 465
app.config['MAIL_USE_SSL'] = True
app.config['MAIL_USERNAME'] = 'tehnodir.d@mail.ru'
app.config['MAIL_PASSWORD'] = '2jU9mvTg5EajYrizvbwV'
mail = Mail(app)

# Email configuration
#sender_email = "tehnodir.d@mail.ru"
#receiver_email = "diur_tornbeornson@mail.ru"
#subject = "Styled HTML Email from Python"

# HTML content with inline CSS
html_message = """
<!DOCTYPE html>
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
        <p>Thank you for signing up! Please confirm your email address by clicking the button below:</p>
        <a href="{{ url_for('confirm_email', token=token, _external=True) }}" class="button">Confirm Email</a>
        <p>If you did not sign up for this service, you can safely ignore this email.</p>
    </div>
</body>
</html>
"""

# Create the email
#msg = MIMEMultipart()
#msg['From'] = sender_email
#msg['To'] = receiver_email
#msg['Subject'] = subject

# Attach the HTML message to the email
#msg.attach(MIMEText(html_message, 'html'))

# Send the email
#try:
    # Use SMTP_SSL for secure connection
    #with smtplib.SMTP_SSL('smtp.mail.ru', 465) as server:
        #server.login(sender_email, "2jU9mvTg5EajYrizvbwV")
        #server.sendmail(sender_email, receiver_email, msg.as_string())
    #print("Email sent successfully!")
#except Exception as e:
    #print(f"Error sending email: {e}")

# Database model
class Email(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    email = db.Column(db.String(120), unique=True, nullable=False)
    token = db.Column(db.String(32), unique=True, nullable=False)
    confirmed = db.Column(db.Boolean, default=False)

# Create the database tables
db.create_all()

# Routes
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/send_confirmation', methods=['POST'])
def send_confirmation():
    email = request.form['email']
    token = secrets.token_hex(16)

    # Store the email and token in the database
    new_email = Email(email=email, token=token)
    db.session.add(new_email)
    db.session.commit()

    # Send the confirmation email
    msg = Message('Email Confirmation', sender='tehnodir.d@mail.ru', recipients=[email])
    msg.html = render_template(html_message, token=token)
    mail.send(msg)

    return "Confirmation email sent. Please check your inbox."

@app.route('/confirm_email/<token>')
def confirm_email(token):
    email = Email.query.filter_by(token=token).first()
    if email:
        email.confirmed = True
        db.session.commit()
        return "Email confirmed successfully!"
    else:
        return "Invalid confirmation token."

if __name__ == '__main__':
    app.run(debug=True)