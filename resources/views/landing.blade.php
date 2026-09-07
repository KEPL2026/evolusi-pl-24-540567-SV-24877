<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Evolusi PL - Sistem Manajemen Project dan Evolusi Perangkat Lunak">

    <title>{{ config('app.name', 'Evolusi PL') }} - Sistem Manajemen Project</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>
        /* ===== CSS Variables ===== */
        :root {
            /* Colors */
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #8b5cf6;
            --accent-color: #ec4899;
            --bg-light: #ffffff;
            --bg-light-secondary: #f8fafc;
            --text-dark: #1e293b;
            --text-gray: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.15);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 1rem;
            --duration-fast: 150ms;
            --duration-normal: 300ms;
            --duration-slow: 500ms;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-light: #0f172a;
                --bg-light-secondary: #1e293b;
                --text-dark: #f1f5f9;
                --text-gray: #cbd5e1;
                --border-color: #334155;
            }
        }

        /* ===== Global Styles ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
            z-index: 1;
        }

        /* ===== Animations ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* ===== Header ===== */
        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.25rem 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            margin-bottom: 3rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp var(--duration-slow) ease-out;
        }

        @media (prefers-color-scheme: dark) {
            header {
                background: rgba(15, 23, 42, 0.95);
                border-color: rgba(148, 163, 184, 0.1);
            }
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .logo {
            font-size: 1.875rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            flex-shrink: 0;
            transition: transform var(--duration-fast) ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a:not(.btn-auth) {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            transition: color var(--duration-normal) ease;
        }

        .nav-links a:not(.btn-auth)::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transition: width var(--duration-normal) ease;
        }

        .nav-links a:not(.btn-auth):hover::after {
            width: 100%;
        }

        /* ===== Buttons ===== */
        .btn-auth {
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all var(--duration-normal) ease;
            border: 2px solid transparent;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
        }

        .btn-auth:focus-visible {
            outline: 2px solid #6366f1;
            outline-offset: 2px;
        }

        .btn-login {
            color: #6366f1;
            background: transparent;
            border-color: #6366f1;
        }

        .btn-login:hover {
            background: #6366f1;
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-register {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-primary {
            padding: 0.875rem 2rem;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all var(--duration-normal) ease;
            border: none;
            cursor: pointer;
            background: white;
            color: #6366f1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-primary:focus-visible {
            outline: 2px solid #6366f1;
            outline-offset: 2px;
        }

        .btn-secondary {
            padding: 0.875rem 2rem;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all var(--duration-normal) ease;
            border: 2px solid white;
            background: transparent;
            color: white;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            background: white;
            color: #6366f1;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary:active {
            transform: translateY(0);
        }

        .btn-secondary:focus-visible {
            outline: 2px solid white;
            outline-offset: 2px;
        }

        /* ===== Main Content ===== */
        main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 4rem;
        }

        .hero-content {
            color: white;
            animation: slideInLeft var(--duration-slow) ease-out 0.1s backwards;
        }

        .hero-content h1 {
            font-size: clamp(2rem, 5vw, 3.75rem);
            margin-bottom: 1.5rem;
            line-height: 1.15;
            letter-spacing: -0.02em;
            font-weight: 700;
        }

        .hero-content p {
            font-size: clamp(1rem, 2vw, 1.125rem);
            margin-bottom: 2rem;
            opacity: 0.95;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            gap: 1.25rem;
            flex-wrap: wrap;
            animation: fadeInUp var(--duration-slow) ease-out 0.3s backwards;
        }

        .hero-image {
            background: rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            animation: slideInRight var(--duration-slow) ease-out 0.2s backwards;
            transition: all var(--duration-normal) ease;
        }

        .hero-image:hover {
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        .hero-image svg {
            width: 100%;
            max-width: 350px;
            height: auto;
            animation: float 4s ease-in-out infinite;
        }

        /* ===== Features Section ===== */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.75rem;
            margin-top: 4rem;
            color: white;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.08);
            padding: 2rem;
            border-radius: var(--radius-lg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all var(--duration-normal) ease;
            animation: fadeInUp var(--duration-slow) ease-out;
            animation-fill-mode: both;
            position: relative;
            overflow: hidden;
        }

        .feature-card:nth-child(1) {
            animation-delay: 0.4s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.5s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            opacity: 0;
            transition: opacity var(--duration-normal) ease;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-8px);
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-card h3 {
            font-size: 1.375rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            letter-spacing: -0.01em;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            font-size: 0.95rem;
            opacity: 0.9;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        /* ===== Responsive Design ===== */
        @media (max-width: 1024px) {
            main {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .hero-image {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            body {
                justify-content: flex-start;
                padding: 1rem 0;
            }

            .container {
                width: 95%;
            }

            header {
                margin-bottom: 2rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .nav-links {
                width: 100%;
                gap: 0.75rem;
            }

            .nav-links .btn-auth {
                flex: 1;
                padding: 0.625rem 1rem;
            }

            .hero-content h1 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .hero-content p {
                font-size: 0.95rem;
            }

            .cta-buttons {
                gap: 0.75rem;
            }

            .btn-primary,
            .btn-secondary {
                flex: 1;
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
                min-width: 140px;
            }

            .features {
                gap: 1.25rem;
                margin-top: 2.5rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .feature-card h3 {
                font-size: 1.1rem;
            }

            .feature-card p {
                font-size: 0.9rem;
            }

            main {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 0 1rem;
            }

            header {
                border-radius: 0.5rem;
                padding: 1rem 1.25rem;
            }

            .logo {
                font-size: 1.25rem;
            }

            .nav-links {
                flex-direction: column;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature-card {
                padding: 1.25rem;
            }
        }
    </style>
    @endif
</head>

<body>
    <div class="container">
        <header>
            <div class="header-content">
                <div class="logo">Evolusi PL</div>
                <nav class="nav-links">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn-auth btn-login">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-auth btn-register">Register</a>
                    @endif
                    @endauth
                    @endif
                </nav>
            </div>
        </header>

        <main>
            <div class="hero-content">
                <h1>Sistem Manajemen Project & Evolusi Perangkat Lunak</h1>
                <p>Kelola proyek Anda dengan lebih efisien. Platform terintegrasi untuk tim pengembang yang ingin meningkatkan produktivitas dan kolaborasi.</p>

                <div class="cta-buttons">
                    <a class="btn-primary">Mulai Sekarang</a>
                    <a href="#features" class="btn-secondary">Pelajari Lebih Lanjut</a>
                </div>
            </div>

            <div class="hero-image">
                <svg width="300" height="300" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:rgba(255,255,255,0.2);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgba(255,255,255,0.05);stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <circle cx="150" cy="150" r="130" fill="url(#grad1)" stroke="rgba(255,255,255,0.3)" stroke-width="2" />
                    <path d="M 100 120 L 150 80 L 200 120 L 200 180 Q 150 220 100 180 Z" fill="rgba(255,255,255,0.2)" stroke="rgba(255,255,255,0.4)" stroke-width="2" />
                    <circle cx="110" cy="140" r="8" fill="rgba(255,255,255,0.4)" />
                    <circle cx="150" cy="130" r="8" fill="rgba(255,255,255,0.4)" />
                    <circle cx="190" cy="140" r="8" fill="rgba(255,255,255,0.4)" />
                    <line x1="110" y1="140" x2="150" y2="130" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" />
                    <line x1="150" y1="130" x2="190" y2="140" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" />
                </svg>
            </div>
        </main>

        <section id="features" class="features">
            <div class="feature-card">
                <h3>🚀 Cepat & Mudah</h3>
                <p>Interface yang intuitif dan responsif untuk pengalaman pengguna terbaik.</p>
            </div>
            <div class="feature-card">
                <h3>🤝 Kolaborasi Tim</h3>
                <p>Bekerja sama dengan tim Anda secara real-time dalam satu platform.</p>
            </div>
            <div class="feature-card">
                <h3>📊 Analytics & Reports</h3>
                <p>Pantau progress proyek dengan dashboard dan laporan yang komprehensif.</p>
            </div>
        </section>
    </div>
</body>

</html>