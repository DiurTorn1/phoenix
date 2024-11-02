    #!/usr/bin/python3
    import smtplib
    
    sender = 'tehnodir.d@mail.ru'
    receivers = [ 'diur_tornbeornson@mail.ru']
    
    message = """From: From Person <tehnodir.d@mail.ru>
    To: To Person <diur_tornbeornson@mail.ru>
    Subject: SMTP e-mail test
    
    This is a test e-mail message.
    """
    
    try:
       smtpObj = smtplib.SMTP('localhost')
       smtpObj.sendmail(sender, receivers, message)
       print("Successfully sent email")
    except SMTPException:
       print("Error: unable to send email")