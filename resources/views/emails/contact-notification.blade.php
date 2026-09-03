<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #E1B137; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #2b4b58; font-size: 22px; }
        .header h1 em { color: #E1B137; font-style: normal; }
        .content { background: #f8f7f4; padding: 30px; border-radius: 8px; }
        .field { margin-bottom: 15px; }
        .field-label { font-weight: bold; color: #2b4b58; }
        .footer { margin-top: 30px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Lekki <em>Ashram</em></h1>
        <p style="color: #999; font-size: 14px;">New Contact Message</p>
    </div>
    <div class="content">
        <p><strong>You have received a new message from the contact form.</strong></p>

        <div class="field">
            <div class="field-label">Name:</div>
            <div>{{ $name }}</div>
        </div>
        <div class="field">
            <div class="field-label">Email:</div>
            <div><a href="mailto:{{ $email }}">{{ $email }}</a></div>
        </div>
        @if($phone)
        <div class="field">
            <div class="field-label">Phone:</div>
            <div>{{ $phone }}</div>
        </div>
        @endif
        @if($subject)
        <div class="field">
            <div class="field-label">Subject:</div>
            <div>{{ $subject }}</div>
        </div>
        @endif
        <div class="field">
            <div class="field-label">Message:</div>
            <div style="background: white; padding: 15px; border-radius: 4px; margin-top: 5px; border: 1px solid #ddd;">{{ $body }}</div>
        </div>

        <p style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #ddd;">
            <a href="{{ url('/admin/contact') }}" style="background: #E1B137; color: #2b4b58; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">View in Admin</a>
        </p>
    </div>
    <div class="footer">
        <p>This email was sent from your website contact form.</p>
    </div>
</body>
</html>