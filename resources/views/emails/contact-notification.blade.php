<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ----- RESET & BASE ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            line-height: 1.7;
            color: #2b4b58;
            background: #f5f3ee;
            max-width: 640px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* ----- MAIN CARD ----- */
        .email-wrapper {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            padding: 0 36px 36px;
            border: 1px solid rgba(225, 177, 55, 0.15);
        }

        /* ----- HEADER with LOGO ----- */
        .header {
            text-align: center;
            border-bottom: 3px solid #E1B137;
            padding: 30px 0 20px;
            margin-bottom: 28px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 6px;
        }

        .logo-img {
            max-height: 58px;
            width: auto;
            display: block;
            border-radius: 10px;
            background: #fcf9f4;
            padding: 4px 10px;
            border: 1px solid #eee8df;
            object-fit: contain;
        }

        .brand-name {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #2b4b58;
        }

        .brand-name em {
            color: #E1B137;
            font-style: normal;
            background: rgba(225, 177, 55, 0.1);
            padding: 0 8px;
            border-radius: 30px;
        }

        .header-subtitle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #8b7f6e;
            font-size: 15px;
            font-style: italic;
            margin-top: 4px;
            letter-spacing: 0.3px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fbbf24;
            color: #92400e;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 700;
            font-style: normal;
        }

        /* ----- CONTENT ----- */
        .content {
            background: #faf8f5;
            padding: 32px 28px;
            border-radius: 16px;
            border: 1px solid #ede8df;
        }

        .content p {
            color: #1f2e36;
            margin-bottom: 14px;
            font-size: 16px;
        }

        .content strong {
            color: #1d3b44;
        }

        /* ----- DETAILS CARD ----- */
        .details {
            background: #ffffff;
            padding: 22px 24px;
            border-radius: 12px;
            margin: 16px 0 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .details .field {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 8px 0;
            border-bottom: 1px solid #f0ede8;
            font-size: 15px;
        }

        .details .field:last-child {
            border-bottom: none;
        }

        .details .field-icon {
            color: #E1B137;
            width: 20px;
            text-align: center;
            font-size: 15px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .details .field-label {
            font-weight: 700;
            color: #2b4b58;
            min-width: 80px;
            flex-shrink: 0;
        }

        .details .field-value {
            color: #1f2e36;
            word-break: break-word;
        }

        .details .field-value a {
            color: #2b4b58;
            text-decoration: none;
            border-bottom: 1px dotted #E1B137;
            transition: 0.2s;
        }

        .details .field-value a:hover {
            color: #E1B137;
            border-bottom-color: #2b4b58;
        }

        /* Message box */
        .message-box {
            background: #f8f7f4;
            padding: 16px 20px;
            border-radius: 10px;
            border-left: 4px solid #E1B137;
            margin-top: 6px;
            font-style: italic;
            color: #3d535e;
            line-height: 1.8;
        }

        /* ----- DIVIDER ----- */
        .divider {
            border: none;
            height: 2px;
            background: linear-gradient(to right, transparent, #e0d7cc, transparent);
            margin: 20px 0 18px;
        }

        /* ----- BUTTON ----- */
        .btn-wrap {
            text-align: center;
            margin: 10px 0 6px;
        }

        .btn-manage {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #E1B137;
            color: #1f3a42;
            padding: 14px 36px;
            text-decoration: none;
            border-radius: 60px;
            font-weight: 700;
            font-size: 15px;
            border: 1px solid #cba22a;
            box-shadow: 0 4px 12px rgba(225, 177, 55, 0.25);
            transition: 0.25s ease;
        }

        .btn-manage:hover {
            background: #d4a52e;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(225, 177, 55, 0.35);
        }

        /* ----- SOCIAL SECTION ----- */
        .social-section {
            margin: 10px 0 4px;
            padding-top: 8px;
        }

        .social-label {
            font-size: 13px;
            font-weight: 600;
            color: #8b7f6e;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-align: center;
            display: block;
            margin-bottom: 14px;
        }

        .social-label i {
            color: #E1B137;
            margin-right: 6px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-social {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f5f2ec;
            color: #2b4b58;
            font-size: 22px;
            text-decoration: none;
            border: 1px solid #e0d7cc;
            transition: 0.25s ease;
        }

        .footer-social:hover {
            background: #E1B137;
            color: #1a2e35;
            border-color: #b8922a;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(225, 177, 55, 0.3);
        }

        .social-text-links {
            text-align: center;
            margin-top: 14px;
            font-size: 13px;
            color: #b0a392;
        }

        .social-text-links a {
            color: #2b4b58;
            text-decoration: none;
            margin: 0 6px;
            transition: 0.2s;
        }

        .social-text-links a:hover {
            color: #E1B137;
        }

        .social-text-links .sep {
            color: #d5cdc0;
        }

        /* ----- FOOTER ----- */
        .footer {
            text-align: center;
            color: #b0a392;
            font-size: 13px;
            border-top: 1px solid #ece6dd;
            padding-top: 22px;
            margin-top: 28px;
        }

        .footer p {
            margin-bottom: 4px;
        }

        .footer .spa-icon {
            color: #d3c1ab;
            margin-right: 4px;
        }

        /* ----- RESPONSIVE ----- */
        @media (max-width: 480px) {
            .email-wrapper {
                padding: 0 16px 24px;
            }
            .logo-container {
                flex-direction: column;
                gap: 8px;
            }
            .brand-name {
                font-size: 22px;
            }
            .logo-img {
                max-height: 48px;
            }
            .content {
                padding: 20px 16px;
            }
            .details {
                padding: 16px 18px;
            }
            .details .field {
                flex-wrap: wrap;
                gap: 4px;
                padding: 6px 0;
            }
            .details .field-label {
                min-width: 70px;
            }
            .social-icons {
                gap: 10px;
            }
            .footer-social {
                width: 42px;
                height: 42px;
                font-size: 18px;
            }
            .btn-manage {
                padding: 12px 24px;
                font-size: 14px;
            }
            .header-subtitle {
                font-size: 13px;
                flex-wrap: wrap;
            }
            .message-box {
                padding: 12px 14px;
                font-size: 14px;
            }
        }

        /* ----- PRINT STYLES ----- */
        @media print {
            .footer-social:hover {
                background: #f5f2ec;
                transform: none;
            }
        }
    </style>
</head>
<body>

<div class="email-wrapper">

    <!-- ===== HEADER ===== -->
    <div class="header">
        <div class="logo-container">
            <!-- Logo Image -->
            <img
                src="{{ asset('img/logo.png') }}"
                alt="The Lekki Ashram Logo"
                class="logo-img"
                onerror="this.style.display='none'; this.parentElement.innerHTML += '<span style=\'font-size:24px;font-weight:700;color:#2b4b58;\'>The Lekki <em style=\'color:#E1B137;font-style:normal;\'>Ashram</em></span>';"
            />
            <span class="brand-name">The&nbsp;Lekki <em>Ashram</em></span>
        </div>
        <div class="header-subtitle">
            <span class="badge">
                <i class="fas fa-bell"></i> NEW
            </span>
            <span>Contact Message</span>
        </div>
    </div>

    <!-- ===== CONTENT ===== -->
    <div class="content">

        <p style="font-size: 17px; font-weight: 600; color: #1d3b44;">
            <i class="fas fa-envelope" style="color: #E1B137; margin-right: 10px;"></i>
            You have received a new message from the contact form.
        </p>

        <!-- ===== MESSAGE DETAILS ===== -->
        <div class="details">

            <div class="field">
                <span class="field-icon"><i class="fas fa-user"></i></span>
                <span class="field-label">Name:</span>
                <span class="field-value">{{ $name }}</span>
            </div>

            <div class="field">
                <span class="field-icon"><i class="fas fa-envelope"></i></span>
                <span class="field-label">Email:</span>
                <span class="field-value">
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </span>
            </div>

            @if($phone)
            <div class="field">
                <span class="field-icon"><i class="fas fa-phone"></i></span>
                <span class="field-label">Phone:</span>
                <span class="field-value">
                    <a href="tel:{{ $phone }}">{{ $phone }}</a>
                </span>
            </div>
            @endif

            @if($subject)
            <div class="field">
                <span class="field-icon"><i class="fas fa-tag"></i></span>
                <span class="field-label">Subject:</span>
                <span class="field-value">{{ $subject }}</span>
            </div>
            @endif

            <div class="field" style="flex-direction: column; align-items: stretch; gap: 6px; border-bottom: none;">
                <div style="display: flex; align-items: flex-start; gap: 12px;">
                    <span class="field-icon"><i class="fas fa-pen"></i></span>
                    <span class="field-label">Message:</span>
                </div>
                <div class="message-box">
                    {{ $body }}
                </div>
            </div>

        </div>

        <!-- ===== DIVIDER ===== -->
        <hr class="divider" />

        <!-- ===== BUTTON ===== -->
        <div class="btn-wrap">
            <a href="{{ url('/admin/contact') }}" class="btn-manage">
                <i class="fas fa-eye"></i>
                View in Admin
            </a>
        </div>

        <!-- ===== DIVIDER ===== -->
        <hr class="divider" />

        <!-- ===== SOCIAL ICONS ===== -->
        <div class="social-section">
            <span class="social-label">
                <i class="fas fa-share-nodes"></i> Connect With Us
            </span>

            <div class="social-icons">
                <!-- X (Twitter) -->
                <a href="https://x.com/AshramLekki" class="footer-social" aria-label="X (Twitter)">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/share/1CkSnfWiCn/" class="footer-social" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" class="footer-social" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <!-- TikTok -->
                <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" class="footer-social" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Plain text fallback (for email clients that block icons) -->
            <div class="social-text-links">
                <a href="https://x.com/AshramLekki"><i class="fa-brands fa-x-twitter"></i> X</a>
                <span class="sep">|</span>
                <a href="https://www.facebook.com/share/1CkSnfWiCn/"><i class="fa-brands fa-facebook"></i> Facebook</a>
                <span class="sep">|</span>
                <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX"><i class="fa-brands fa-instagram"></i> Instagram</a>
                <span class="sep">|</span>
                <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN"><i class="fa-brands fa-tiktok"></i> TikTok</a>
            </div>
        </div>

    </div>

    <!-- ===== FOOTER ===== -->
    <div class="footer">
        <p>
            <i class="fas fa-copyright"></i>
            {{ date('Y') }} The Lekki Ashram. All rights reserved.
        </p>
        <p style="color: #c9b69a; font-size: 12px; margin-top: 4px;">
            <i class="fas fa-spa spa-icon"></i>
            peace &amp; wisdom
        </p>
    </div>

</div>

</body>
</html>