<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Visit Request Received</title>
    <style>
        body { font-family: 'Georgia', serif; line-height: 1.6; color: #2b4b58; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #E1B137; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #2b4b58; font-size: 24px; }
        .header h1 em { color: #E1B137; font-style: normal; }
        .content { background: #f8f7f4; padding: 30px; border-radius: 8px; }
        .details { background: white; padding: 20px; border-radius: 4px; margin: 15px 0; border: 1px solid #e2e8f0; }
        .footer { margin-top: 30px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Lekki <em>Ashram</em></h1>
        <p style="color: #999; font-size: 14px;">Visit Request Received</p>
    </div>
    <div class="content">
        <h2 style="margin-top:0; color: #2b4b58;">Hello {{ $name }},</h2>
        <p>Thank you for your visit request. We've received your details and will confirm within 24 hours.</p>

        <div class="details">
            <p><strong>Visit Type:</strong> {{ ucfirst($visitType) }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Time:</strong> {{ $time }}</p>
            <p><strong>Guests:</strong> {{ $guests }}</p>
        </div>

        <p>We look forward to welcoming you to our sanctuary.</p>
        <p>With gratitude,<br><strong>The Lekki Ashram Team</strong></p>

        <p style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 13px;">
            <strong>Need to change your request?</strong><br>
            Call us at <a href="tel:+2349069258377" style="color: #E1B137; text-decoration: none;">+234 906 925 8377</a> or reply to this email.
        </p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} The Lekki Ashram. All rights reserved.</p>
    </div>
</body>
</html>