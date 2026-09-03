<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Subscriber</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #E1B137; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #2b4b58; font-size: 22px; }
        .header h1 em { color: #E1B137; font-style: normal; }
        .content { background: #f8f7f4; padding: 30px; border-radius: 8px; }
        .footer { margin-top: 30px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Lekki <em>Ashram</em></h1>
        <p style="color: #999; font-size: 14px;">New Subscriber Alert</p>
    </div>
    <div class="content">
        <p><strong>A new subscriber has joined your newsletter.</strong></p>
        <p>Email: <strong>{{ $email }}</strong></p>
        <p style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;">
            <a href="{{ url('/admin/subscribers') }}" style="background: #E1B137; color: #2b4b58; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">Manage Subscribers</a>
        </p>
    </div>
    <div class="footer">
        <p>This email was sent automatically from your website.</p>
    </div>
</body>
</html>