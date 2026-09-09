<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page['props']['title'] ?? 'The Lekki Ashram - Art of Living Center' }}</title>

        <!-- ===== Favicon ===== -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
        <link rel="manifest" href="{{ asset('site.webmanifest') }}" />
        <meta name="theme-color" content="#E1B137" />

        <!-- ===== Open Graph / Social Media Meta Tags ===== -->
        <meta property="og:title" content="{{ $page['props']['og_title'] ?? 'The Lekki Ashram - Art of Living Center' }}" />
        <meta property="og:description" content="{{ $page['props']['og_description'] ?? 'An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution.' }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ $page['props']['og_image'] ?? asset('img/og-image.jpg') }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:site_name" content="The Lekki Ashram" />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{{ $page['props']['og_title'] ?? 'The Lekki Ashram - Art of Living Center' }}" />
        <meta name="twitter:description" content="{{ $page['props']['og_description'] ?? 'An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution.' }}" />
        <meta name="twitter:image" content="{{ $page['props']['og_image'] ?? asset('img/og-image.jpg') }}" />

        <!-- SEO Description -->
        <meta name="description" content="{{ $page['props']['description'] ?? 'An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution.' }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>