from flask import Flask, request, jsonify
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Email configuration
sender_email = "tehnodir.d@mail.ru"
receiver_email = "diur_tornbeornson@mail.ru"
subject = "Подтверждение почты в сервисе Феникс"

app = Flask(__name__)

def send_email(mail, subject, html_message):
    msg = MIMEMultipart()
    msg['From'] = sender_email
    msg['To'] = mail
    msg['Subject'] = subject
    msg.attach(MIMEText(html_message, 'html'))

    try:
        with smtplib.SMTP_SSL('smtp.mail.ru', 465) as server:
            server.login(sender_email, "2jU9mvTg5EajYrizvbwV")
            server.sendmail(sender_email, mail, msg.as_string())
            return "Email sent successfully!"
    except Exception as e:
        return f"Error sending email: {e}"

@app.route('/process_data', methods=['POST'])
def process_data():
    mail = request.json.get('mail')
    code = request.json.get('code')
    product = request.json.get('product')  # Новый параметр для продукта
    presell = request.json.get('presell')
    load = request.json.get('load')

    style = """
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
    a {
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
    """

    if mail:
        if code:
            # Отправка письма с кодом подтверждения
            html_message = f"""
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Подтверждение</title>
                    <style>{style}</style>
                </head>
                <body>
                    <div class="container">
                        <h1>Добро пожаловать в сервис спортивных трансляций Феникс</h1>
                        <p>Код для входа:</p>
                        <h1>{code}</h1>
                        <p>Благодарим вас за регистрацию! Нажмите на кнопку для подтверждения почты:</p>
                        <a href="https://phoenix.tehnodir.ru/login?email_reg={mail}" class="button">Подтвердить почту</a>
                        <p>Если вы не регистрировались на данном сервисе, то проигнорируйте сообщение.</p>
                    </div>
                </body>
            </html>
            """
            subject = "Подтверждение почты в сервисе Феникс"
        elif product:
            # Отправка письма о покупке подписки
            html_message = f"""
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Покупка подписки</title>
                    <style>{style}</style>
                </head>
                <body>
                    <div class="container">
                        <h1>Спасибо за покупку подписки в сервисе Феникс!</h1>
                        <p>Вы успешно приобрели подписку на продукт: <strong>{product}</strong>.</p>
                        <p>Теперь вы можете наслаждаться всеми преимуществами нашего сервиса.</p>
                        <p>Если у вас возникнут вопросы, свяжитесь с нашей поддержкой.</p>
                    </div>
                </body>
            </html>
            """
            subject = "Покупка подписки в сервисе Феникс"
        elif presell:
            # Отправка письма о покупке подписки
            html_message = f"""
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Подписка скоро закончится</title>
                    <style>{style}</style>
                </head>
                <body>
                    <div class="container">
                        <h1>Сообщаем о скором завершении подписки в сервисе Феникс!</h1>
                        <p>Скоро закончится подписка на продукт: <a href='{presell}'>Оплатить</a>.</p>
                        <p>Если не продлите подписку вы не сможете наслаждаться всеми преимуществами нашего сервиса.</p>
                        <p>Скоро вам придёт ссылка на повторную оплату. Позаботьтесь, пожалуйста, о наличее средств заранее.</p>
                        <p>Если у вас возникнут вопросы, свяжитесь с нашей поддержкой.</p>
                    </div>
                </body>
            </html>
            """
            subject = "Предупреждение о продление подписки."
        elif load:
            # Отправка письма о покупке подписки
            html_message = f"""
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Ссылка на оплату</title>
                    <style>{style}</style>
                </head>
                <body>
                    <div class="container">
                        <h1Ссылка на оплату услуг сервиса Феникс!</h1>
                        <p>Если не продлите подписку вы не сможете наслаждаться всеми преимуществами нашего сервиса.</p>
                        <p>Пройдите по ссылке и совершите оплату услуги для пользования услуг: <strong>{load}</strong>.</p>
                        <p>Если у вас возникнут вопросы, свяжитесь с нашей поддержкой.</p>
                    </div>
                </body>
            </html>
            """
            subject = "Предупреждение о продление подписки."
        else:
            return jsonify({'status': 'error', 'message': 'No code or product provided'})

        result = send_email(mail, subject, html_message)
        return jsonify({'status': 'success', 'output': result})
    else:
        return jsonify({'status': 'error', 'message': 'No mail provided'})

if __name__ == '__main__':
    app.run(debug=True)