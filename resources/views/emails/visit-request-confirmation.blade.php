<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Request Received</title>
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
            color: #8b7f6e;
            font-size: 15px;
            font-style: italic;
            margin-top: 4px;
            letter-spacing: 0.3px;
        }

        /* ----- CONTENT ----- */
        .content {
            background: #faf8f5;
            padding: 32px 28px;
            border-radius: 16px;
            border: 1px solid #ede8df;
        }

        .content h2 {
            color: #2b4b58;
            font-size: 22px;
            margin-top: 0;
            margin-bottom: 16px;
            font-weight: 700;
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

        .details p {
            margin-bottom: 8px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .details p:last-child {
            margin-bottom: 0;
        }

        .details i {
            color: #E1B137;
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .details strong {
            color: #2b4b58;
            min-width: 80px;
            display: inline-block;
        }

        /* ----- SIGNATURE ----- */
        .signature {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 2px solid #ede8df;
            font-style: italic;
            color: #2b4b58;
        }

        .signature strong {
            font-style: normal;
        }

        /* ----- CONTACT NOTE ----- */
        .contact-note {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e0d7cc;
            font-size: 14px;
            background: rgba(225, 177, 55, 0.05);
            padding: 18px 20px;
            border-radius: 10px;
            border-left: 4px solid #E1B137;
        }

        .contact-note i {
            color: #E1B137;
            margin-right: 6px;
        }

        .contact-note a {
            color: #E1B137;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .contact-note a:hover {
            color: #cba22a;
            text-decoration: underline;
        }

        /* ----- DIVIDER ----- */
        .divider {
            border: none;
            height: 2px;
            background: linear-gradient(to right, transparent, #e0d7cc, transparent);
            margin: 24px 0 20px;
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
            .details p {
                flex-wrap: wrap;
                gap: 4px;
            }
            .details strong {
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
            .content h2 {
                font-size: 19px;
            }
            .contact-note {
                font-size: 13px;
                padding: 14px 16px;
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
            <i class="fas fa-calendar-check" style="color: #E1B137; margin-right: 6px;"></i>
            Visit Request Received
        </div>
    </div>

    <!-- ===== CONTENT ===== -->
    <div class="content">

        <h2>
            <i class="fas fa-hands-praying" style="color: #E1B137; margin-right: 10px;"></i>
            Hello {{ $name }},
        </h2>

        <p>
            <i class="fas fa-check-circle" style="color: #E1B137; margin-right: 8px;"></i>
            Thank you for your visit request. We've received your details and will confirm within 24 hours.
        </p>

        <!-- ===== VISIT DETAILS ===== -->
        <div class="details">
            <p>
                <i class="fas fa-calendar-alt"></i>
                <strong>Visit Type:</strong> {{ ucfirst($visitType) }}
            </p>
            <p>
                <i class="fas fa-calendar-day"></i>
                <strong>Date:</strong> {{ $date }}
            </p>
            <p>
                <i class="fas fa-clock"></i>
                <strong>Time:</strong> {{ $time }}
            </p>
            <p>
                <i class="fas fa-users"></i>
                <strong>Guests:</strong> {{ $guests }}
            </p>
        </div>

        <p>We look forward to welcoming you to our sanctuary.</p>

        <div class="signature">
            <p style="margin-bottom: 4px;">
                <i class="fas fa-leaf" style="color: #E1B137; margin-right: 6px;"></i>
                With gratitude,
            </p>
            <p style="margin-bottom: 0; font-style: normal;">
                <strong>The Lekki Ashram Team</strong>
            </p>
        </div>

        <!-- ===== CONTACT NOTE ===== -->
        <div class="contact-note">
            <p style="margin-bottom: 0; font-size: 14px;">
                <i class="fas fa-phone-alt"></i>
                <strong>Need to change your request?</strong><br>
                Call us at <a href="tel:+2349069258377"><i class="fas fa-phone"></i> +234 906 925 8377</a>
                or reply to this email.
            </p>
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