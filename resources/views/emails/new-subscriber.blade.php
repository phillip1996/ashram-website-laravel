<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Subscriber</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f3ee; font-family:Georgia,'Times New Roman',serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f5f3ee;">
<tr>
<td align="center" style="padding:30px 16px;">

<table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background-color:#ffffff; border:1px solid #e8e1d6; border-radius:16px;">

<!-- HEADER -->
<tr>
<td align="center" style="padding:30px 30px 20px 30px; border-bottom:3px solid #E1B137;">
<img src="{{ asset('img/logo.png') }}" alt="The Lekki Ashram" style="max-height:50px; width:auto; display:block; margin:0 auto 8px auto;">
<div style="font-size:24px; font-weight:bold; color:#2b4b58;">The Lekki <span style="color:#E1B137;">Ashram</span></div>
<div style="margin-top:8px;">
<span style="display:inline-block; background-color:#f5f2ec; color:#5d6d74; font-size:12px; font-weight:bold; padding:5px 16px; border-radius:30px; border:1px solid #e8e1d6;">New Subscriber Alert</span>
</div>
</td>
</tr>

<!-- CONTENT -->
<tr>
<td style="padding:0 30px 30px 30px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#faf8f5; border:1px solid #ede8df; border-radius:14px; margin-top:24px;">
<tr>
<td style="padding:26px 24px;">

<p style="margin:0 0 14px 0; font-size:16px; font-weight:bold; color:#1d3b44;">New subscriber joined!</p>

<p style="margin:0 0 20px 0; font-size:14px; color:#1f2e36;">
<strong style="color:#3e5a64;">Email:</strong><br>
<span style="display:inline-block; background-color:#ffffff; padding:6px 16px; border-radius:30px; border:1px solid #e0d7cc; font-weight:bold; color:#1d3b44; margin-top:6px;">{{ $email }}</span>
</p>

<hr style="border:none; height:2px; background-color:#e0d7cc; margin:0 0 18px 0;">

<!-- BUTTON (bulletproof) -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 22px auto;">
<tr>
<td style="background-color:#E1B137; border:1px solid #cba22a; border-radius:30px;">
<a href="{{ url('/admin/subscribers') }}" style="display:inline-block; padding:12px 32px; color:#1f3a42; font-weight:bold; font-size:14px; text-decoration:none;">Manage Subscribers</a>
</td>
</tr>
</table>

<!-- SOCIAL -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0">
<tr><td style="font-size:11px; font-weight:bold; color:#8b7f6e; text-transform:uppercase; letter-spacing:1.5px; padding-bottom:10px;">Follow Us</td></tr>
<tr>
<td>
<a href="https://x.com/AshramLekki" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">X</a>
<a href="https://www.facebook.com/share/1CkSnfWiCn/" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">Facebook</a>
<a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" style="display:inline-block; padding:8px 14px; margin-right:6px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">Instagram</a>
<a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" style="display:inline-block; padding:8px 14px; background-color:#f5f2ec; border:1px solid #e0d7cc; border-radius:20px; color:#2b4b58; font-size:12px; font-weight:bold; text-decoration:none;">TikTok</a>
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>

<!-- FOOTER -->
<tr>
<td align="center" style="padding:20px 30px 28px 30px; border-top:1px solid #ece6dd; color:#b0a392; font-size:12px;">
This email was sent automatically from your website.<br>
<span style="color:#c9b69a; font-size:11px;">The Lekki Ashram &middot; peace &amp; wisdom</span>
</td>
</tr>

</table>
</td>
</tr>
</table>
</body>
</html>