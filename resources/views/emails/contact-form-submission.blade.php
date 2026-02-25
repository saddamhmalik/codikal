<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
</head>
<body style="margin:0; padding:24px; background:#f1f5f9; font-family:Arial, sans-serif; color:#111827;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:720px; margin:0 auto; background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden;">
        <tr>
            <td style="padding:20px 24px; background:#0f172a; color:#f8fafc;">
                <p style="margin:0; font-size:12px; letter-spacing:1.6px; text-transform:uppercase; color:#67e8f9;">Codikal</p>
                <h2 style="margin:8px 0 0; font-size:22px; line-height:1.3; font-weight:700;">New Contact Form Submission</h2>
            </td>
        </tr>

        <tr>
            <td style="padding:20px 24px 8px;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td style="padding:10px 0; width:140px; font-size:14px; color:#475569; font-weight:600;">Name</td>
                        <td style="padding:10px 0; font-size:14px; color:#0f172a;">{{ $payload['name'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; width:140px; font-size:14px; color:#475569; font-weight:600;">Email</td>
                        <td style="padding:10px 0; font-size:14px; color:#0f172a;">{{ $payload['email'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; width:140px; font-size:14px; color:#475569; font-weight:600;">Phone</td>
                        <td style="padding:10px 0; font-size:14px; color:#0f172a;">{{ $payload['phone'] ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; width:140px; font-size:14px; color:#475569; font-weight:600;">Company</td>
                        <td style="padding:10px 0; font-size:14px; color:#0f172a;">{{ $payload['company'] ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; width:140px; font-size:14px; color:#475569; font-weight:600;">Service</td>
                        <td style="padding:10px 0; font-size:14px; color:#0f172a;">{{ $payload['service'] }}</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="padding:8px 24px 24px;">
                <p style="margin:0 0 8px; font-size:14px; color:#475569; font-weight:600;">Message</p>
                <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:14px; white-space:pre-wrap; font-size:14px; line-height:1.6; color:#0f172a;">{{ $payload['message'] }}</div>
            </td>
        </tr>
    </table>
</body>
</html>
