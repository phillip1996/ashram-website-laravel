<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Visit Request {{ ucfirst($status) }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f3ee; font-family:Georgia,'Times New Roman',serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f5f3ee;">
<tr>
<td align="center" style="padding:30px 16px;">

<table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background-color:#ffffff; border:1px solid #e8e1d6; border-radius:16px;">

<!-- HEADER -->
<tr>
<td align="center" style="padding:30px 30px 20px 30px; border-bottom:3px solid #E1B137;">
<div style="font-size:26px; font-weight:bold; color:#2b4b58;">The Lekki <span style="color:#E1B137;">Ashram</span></div>
<div style="color:#8b7f6e; font-size:14px; font-style:italic; margin-top:6px;">Visit Request Update</div>
</td>
</tr>

<!-- CONTENT -->
<tr>
<td style="padding:0 30px 30px 30px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#faf8f5; border:1px solid #ede8df; border-radius:14px; margin-top:24px;">
<tr>
<td style="padding:26px 24px;">

<h2 style="margin:0 0 14px 0; font-size:20px; color:#2b4b58;">Dear {{ $visitRequest->name }},</h2>

@if($status === 'confirmed')
<div style="display:inline-block; padding:8px 22px; border-radius:30px; font-weight:bold; font-size:16px; background-color:#d1fae5; color:#065f46; margin-bottom:12px;">Request Confirmed</div>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">We are delighted to inform you that your visit request to <strong>The Lekki Ashram</strong> has been <strong>confirmed</strong>.</p>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">We look forward to welcoming you to our sanctuary.</p>
@elseif($status === 'cancelled')
<div style="display:inline-block; padding:8px 22px; border-radius:30px; font-weight:bold; font-size:16px; background-color:#fee2e2; color:#991b1b; margin-bottom:12px;">Request Cancelled</div>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">We're sorry to let you know that your visit request to <strong>The Lekki Ashram</strong> has been <strong>cancelled</strong>.</p>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">If you have any questions or would like to reschedule, please contact us using the details below.</p>
@else
<div style="display:inline-block; padding:8px 22px; border-radius:30px; font-weight:bold; font-size:16px; background-color:#fef3c7; color:#92400e; margin-bottom:12px;">Pending Review</div>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">Your visit request is currently <strong>pending review</strong>.</p>
<p style="margin:0 0 12px 0; font-size:15px; color:#1f2e36;">We will confirm your visit within 24 hours.</p>
@endif

<!-- VISIT DETAILS -->
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff; border:1px solid #e2e8f0; border-radius:10px; margin:16px 0 20px 0;">
<tr><td style="padding:10px 20px; border-bottom:1px solid #f0ede8; font-size:14px; color:#1f2e36;"><strong style="color:#2b4b58; display:inline-block; min-width:80px;">Visit Type:</strong> {{ ucfirst($visitRequest->visit_type) }}</td></tr>
<tr><td style="padding:10px 20px; border-bottom:1px solid #f0ede8; font-size:14px; color:#1f2e36;"><strong style="color:#2b4b58; display:inline-block; min-width:80px;">Date:</strong> {{ \Carbon\Carbon::parse($visitRequest->preferred_date)->format('F j, Y') }}</td></tr>
<tr><td style="padding:10px 20px; border-bottom:1px solid #f0ede8; font-size:14px; color:#1f2e36;"><strong style="color:#2b4b58; display:inline-block; min-width:80px;">Time:</strong> {{ $visitRequest->preferred_time }}</td></tr>
<tr><td style="padding:10px 20px; font-size:14px; color:#1f2e36;"><strong style="color:#2b4b58; display:inline-block; min-width:80px;">Guests:</strong> {{ $visitRequest->guests }}</td></tr>
</table>

<!-- CONTACT -->
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-top:2px solid #ede8df; padding-top:16px; margin-top:20px;">
<tr><td style="padding-top:16px; font-size:14px; color:#1f2e36;">
<strong>Need help?</strong> Call us at <a href="tel:+2349069258377" style="color:#E1B137; text-decoration:none;">+234 906 925 8377</a><br>
Email us at <a href="mailto:info@lekkiashram.com" style="color:#E1B137; text-decoration:none;">info@lekkiashram.com</a>
</td></tr>
</table>

<!-- SOCIAL -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-top:18px;">
<tr>
<td style="font-size:11px; font-weight:bold; color:#8b7f6e; text-transform:uppercase; letter-spacing:1.5px; padding-bottom:10px;">Connect With Us</td>
</tr>
<tr>
<td>
<a href="https://x.com/AshramLekki" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">X</a>
<a href="https://www.facebook.com/share/1CkSnfWiCn/" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">Facebook</a>
<a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">Instagram</a>
<a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" style="display:inline-block; padding:8px 14px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">TikTok</a>
</td>
</tr>
</table>

<hr style="border:none; height:2px; background-color:#e0d7cc; margin:22px 0 16px 0;">

<p style="margin:0; font-size:14px; color:#2b4b58;">With gratitude,<br><strong>The Lekki Ashram Team</strong></p>

</td>
</tr>
</table>
</td>
</tr>

<!-- FOOTER -->
<tr>
<td align="center" style="padding:20px 30px 28px 30px; border-top:1px solid #ece6dd; color:#b0a392; font-size:12px;">
&copy; {{ date('Y') }} The Lekki Ashram. All rights reserved.<br>
<span style="color:#c9b69a; font-size:11px;">peace &amp; wisdom</span>
</td>
</tr>

</table>
</td>
</tr>
</table>
</body>
</html>