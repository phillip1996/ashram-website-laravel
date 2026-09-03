<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Visit Request</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #E1B137; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #2b4b58; font-size: 22px; }
        .header h1 em { color: #E1B137; font-style: normal; }
        .content { background: #f8f7f4; padding: 30px; border-radius: 8px; }
        .field { margin-bottom: 12px; }
        .field-label { font-weight: bold; color: #2b4b58; display: inline-block; min-width: 100px; }
        .footer { margin-top: 30px; text-align: center; color: #999; font-size: 12px; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; background: #fbbf24; color: #92400e; }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Lekki <em>Ashram</em></h1>
        <p style="color: #999; font-size: 14px;">🔔 New Visit Request (ID: #{{ $id }})</p>
    </div>
    <div class="content">
        <p style="font-size: 16px; margin-top: 0;">
            <strong>{{ $name }}</strong> has submitted a visit request.
        </p>

        <div style="background: white; padding: 20px; border-radius: 4px; margin: 15px 0; border: 1px solid #e2e8f0;">
            <div class="field"><span class="field-label">Visit Type:</span> {{ ucfirst($visitType) }}</div>
            <div class="field"><span class="field-label">Date:</span> {{ $date }}</div>
            <div class="field"><span class="field-label">Time:</span> {{ $time }}</div>
            <div class="field"><span class="field-label">Guests:</span> {{ $guests }}</div>
            <div class="field"><span class="field-label">Name:</span> {{ $name }}</div>
            <div class="field"><span class="field-label">Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a></div>
            @if($phone)
            <div class="field"><span class="field-label">Phone:</span> {{ $phone }}</div>
            @endif
            @if($requests)
            <div class="field" style="margin-top: 12px; padding-top: 12px; border-top: 1px dashed #ddd;">
                <span class="field-label">Special Requests:</span>
                <p style="margin-top: 4px; background: #f8f7f4; padding: 10px; border-radius: 4px;">{{ $requests }}</p>
            </div>
            @endif
        </div>

        <p style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;">
            <a href="{{ url('/admin/visit-requests') }}" style="background: #E1B137; color: #2b4b58; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">View in Admin</a>
        </p>
    </div>
    <div class="footer">
        <p>This email was sent automatically from your website.</p>
    </div>
</body>
</html>