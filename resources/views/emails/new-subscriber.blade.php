<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Subscriber</title>
    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Fallback for email clients that block external CSS */
        .fa {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }
        .fa-brands {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400;
        }
        /* Inline SVG fallback styling */
        .social-icon-svg {
            display: none;
        }
        /* Show SVG when Font Awesome fails */
        .no-fa .social-icon-fa {
            display: none;
        }
        .no-fa .social-icon-svg {
            display: inline-block;
        }
    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; background-color: #f5f3ee;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f5f3ee; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 20px; padding: 0 30px 30px; border: 1px solid #e8e1d6; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">

                    <!-- ===== HEADER ===== -->
                    <tr>
                        <td style="padding: 30px 0 20px; border-bottom: 3px solid #E1B137; text-align: center;">

                            <!-- Logo Image -->
                            <img src="{{ asset('img/logo.png') }}" alt="The Lekki Ashram" style="max-height: 55px; width: auto; display: inline-block; margin-bottom: 8px;" />

                            <!-- Fallback Text (shows if image fails) -->
                            <div style="font-size: 26px; font-weight: bold; color: #2b4b58; margin-top: 6px;">
                                The Lekki <span style="color: #E1B137;">Ashram</span>
                            </div>

                            <div style="background: #f5f2ec; color: #5d6d74; font-size: 13px; font-weight: 600; padding: 6px 20px; border-radius: 40px; display: inline-block; margin-top: 6px; border: 1px solid #e8e1d6;">
                                <i class="fas fa-star" style="color: #E1B137; margin-right: 6px;"></i> New Subscriber Alert
                            </div>
                        </td>
                    </tr>

                    <!-- ===== CONTENT ===== -->
                    <tr>
                        <td style="padding: 28px 20px; background: #faf8f5; border-radius: 16px;">

                            <p style="font-size: 18px; font-weight: 600; color: #1d3b44; margin: 0 0 12px 0;">
                                <i class="fas fa-user-plus" style="color: #E1B137; margin-right: 10px;"></i> New subscriber joined!
                            </p>

                            <p style="font-size: 15px; color: #1f2e36; margin: 0 0 8px 0;">
                                <strong style="color: #3e5a64;">Email:</strong>
                                <span style="background: #ffffff; padding: 6px 16px; border-radius: 40px; border: 1px solid #e0d7cc; display: inline-block; font-weight: bold; color: #1d3b44;">
                                    <i class="fas fa-envelope" style="color: #E1B137; margin-right: 8px;"></i> {{ $email }}
                                </span>
                            </p>

                            <hr style="border: none; height: 2px; background: linear-gradient(to right, transparent, #e0d7cc, transparent); margin: 20px 0 18px;" />

                            <!-- Button -->
                            <div style="text-align: center; margin: 10px 0 16px;">
                                <a href="{{ url('/admin/subscribers') }}" style="background: #E1B137; color: #1f3a42; padding: 14px 36px; text-decoration: none; border-radius: 60px; font-weight: bold; font-size: 15px; display: inline-block; border: 1px solid #cba22a;">
                                    <i class="fas fa-users-cog" style="margin-right: 8px;"></i> Manage Subscribers
                                </a>
                            </div>

                            <!-- ===== SOCIAL ICONS (FONT AWESOME + SVG FALLBACK) ===== -->
                            <div style="margin: 18px 0 4px; padding-top: 10px;">

                                <div style="font-size: 12px; font-weight: 600; color: #8b7f6e; text-transform: uppercase; letter-spacing: 1px; text-align: center; margin-bottom: 14px;">
                                    <i class="fas fa-share-alt" style="margin-right: 6px;"></i> Follow Us
                                </div>

                                <div style="text-align: center;">

                                    <!-- X (Twitter) - Font Awesome -->
                                    <a href="https://x.com/AshramLekki" class="social-icon-fa" style="display: inline-block; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                    <!-- X - SVG Fallback -->
                                    <a href="https://x.com/AshramLekki" class="social-icon-svg" style="display: none; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#2b4b58" style="vertical-align: middle;">
                                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                        </svg>
                                    </a>

                                    <!-- Facebook - Font Awesome -->
                                    <a href="https://www.facebook.com/share/1CkSnfWiCn/" class="social-icon-fa" style="display: inline-block; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <!-- Facebook - SVG Fallback -->
                                    <a href="https://www.facebook.com/share/1CkSnfWiCn/" class="social-icon-svg" style="display: none; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#2b4b58" style="vertical-align: middle;">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>

                                    <!-- Instagram - Font Awesome -->
                                    <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" class="social-icon-fa" style="display: inline-block; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <!-- Instagram - SVG Fallback -->
                                    <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" class="social-icon-svg" style="display: none; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#2b4b58" style="vertical-align: middle;">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                                        </svg>
                                    </a>

                                    <!-- TikTok - Font Awesome -->
                                    <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" class="social-icon-fa" style="display: inline-block; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                    <!-- TikTok - SVG Fallback -->
                                    <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" class="social-icon-svg" style="display: none; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background: #f5f2ec; color: #2b4b58; text-decoration: none; border: 1px solid #e0d7cc; margin: 0 6px; font-size: 20px; transition: 0.25s;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#2b4b58" style="vertical-align: middle;">
                                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                                        </svg>
                                    </a>

                                </div>

                                <!-- Plain text social links (for email clients that strip styling) -->
                                <div style="text-align: center; margin-top: 12px; font-size: 12px; color: #999;">
                                    <a href="https://x.com/AshramLekki" style="color: #2b4b58; text-decoration: none; margin: 0 8px;"><i class="fa-brands fa-x-twitter"></i> X</a> |
                                    <a href="https://www.facebook.com/share/1CkSnfWiCn/" style="color: #2b4b58; text-decoration: none; margin: 0 8px;"><i class="fa-brands fa-facebook"></i> Facebook</a> |
                                    <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" style="color: #2b4b58; text-decoration: none; margin: 0 8px;"><i class="fa-brands fa-instagram"></i> Instagram</a> |
                                    <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" style="color: #2b4b58; text-decoration: none; margin: 0 8px;"><i class="fa-brands fa-tiktok"></i> TikTok</a>
                                </div>
                            </div>

                        </td>
                    </tr>

                    <!-- ===== FOOTER ===== -->
                    <tr>
                        <td style="text-align: center; color: #b0a392; font-size: 12px; border-top: 1px solid #ece6dd; padding-top: 22px; margin-top: 10px;">
                            <p style="margin: 0 0 4px 0;">
                                <i class="fas fa-envelope" style="margin-right: 4px;"></i> This email was sent automatically from your website.
                            </p>
                            <p style="color: #c9b69a; font-size: 11px; margin: 0;">
                                <i class="fas fa-spa" style="margin-right: 4px;"></i> The Lekki Ashram · peace &amp; wisdom
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <!-- JavaScript to detect if Font Awesome loaded, fallback to SVGs -->
    <script>
        // Check if Font Awesome loaded correctly
        document.addEventListener('DOMContentLoaded', function() {
            // Test if Font Awesome icons are rendered
            var testIcon = document.querySelector('.fa-star');
            if (testIcon) {
                var computedStyle = window.getComputedStyle(testIcon);
                // If font-family doesn't contain 'Font Awesome', Font Awesome failed to load
                if (computedStyle.fontFamily.indexOf('Font Awesome') === -1) {
                    // Hide FA icons, show SVG fallbacks
                    document.querySelectorAll('.social-icon-fa').forEach(function(el) {
                        el.style.display = 'none';
                    });
                    document.querySelectorAll('.social-icon-svg').forEach(function(el) {
                        el.style.display = 'inline-block';
                    });
                }
            }
        });
    </script>

</body>
</html>