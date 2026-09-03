<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to The Lekki Ashram</title>
    <style>
        body { font-family: 'Georgia', serif; line-height: 1.6; color: #2b4b58; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #E1B137; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #2b4b58; font-size: 24px; }
        .header h1 em { color: #E1B137; font-style: normal; }
        .content { background: #f8f7f4; padding: 30px; border-radius: 8px; }
        .footer { margin-top: 30px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Lekki <em>Ashram</em></h1>
        <p style="color: #999; font-size: 14px;">Contemplations – weekly insights</p>
    </div>
    <div class="content">
        <h2 style="margin-top:0; color: #2b4b58;">Thank You for Subscribing</h2>
        <p>Dear Seeker,</p>
        <p>You have successfully subscribed to <strong>Contemplations</strong> – our weekly newsletter exploring the intersection of consciousness, ecology, and the path within.</p>
        <p>Each week, we'll share reflections, teachings, and updates from The Lekki Ashram to support your journey.</p>
        <p>We are honoured to have you with us.</p>
        <p>With gratitude,<br><strong>The Lekki Ashram Team</strong></p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} The Lekki Ashram. All rights reserved.</p>
        <p>You can unsubscribe anytime by clicking <a href="{{ url('/unsubscribe?email='.$email) }}" style="color: #E1B137;">here</a>.</p>
    </div>
</body>
</html>