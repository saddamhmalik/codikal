<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>We Received Your Inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827; line-height: 1.6;">
    <h2 style="margin-bottom: 12px;">Thanks for contacting Codikal</h2>
    <p style="margin: 0 0 12px;">
        Hi {{ $payload['name'] }}, we have received your inquiry and our team will get back to you shortly.
    </p>
    <p style="margin: 0 0 12px;">
        <strong>What you submitted:</strong><br>
        Service: {{ $payload['service'] }}<br>
        Email: {{ $payload['email'] }}
    </p>
    <p style="margin: 0 0 12px;">
        This message is sent from a no-reply address. For additional details, email us at
        <a href="mailto:contact-us@codikal.com">contact-us@codikal.com</a>.
    </p>
    <p style="margin: 0;">
        Regards,<br>
        Codikal
    </p>
</body>
</html>
