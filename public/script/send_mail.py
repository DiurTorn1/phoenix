import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Email configuration
sender_email = "tehnodir.d@mail.ru"
receiver_email = "diur_tornbeornson@mail.ru"
subject = "Styled HTML Email from Python"

# HTML content with inline CSS
html_message = """
<html>
  <head>
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
      <h1>Welcome to Our Newsletter</h1>
      <p>This is a styled HTML email sent from Python.</p>
      <p>Click the button below to learn more:</p>
      <a href="https://www.example.com" class="button">Learn More</a>
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

# Send the email
try:
    # Use SMTP_SSL for secure connection
    with smtplib.SMTP_SSL('smtp.mail.ru', 465) as server:
        server.login(sender_email, "89340426Gerd!")
        server.sendmail(sender_email, receiver_email, msg.as_string())
    print("Email sent successfully!")
except Exception as e:
    print(f"Error sending email: {e}")