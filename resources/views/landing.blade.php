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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .btn-auth {
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-login {
            color: #667eea;
            background: transparent;
            border: 2px solid #667eea;
        }

        .btn-login:hover {
            background: #667eea;
            color: white;
        }

        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .hero-content {
            color: white;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            background: white;
            color: #667eea;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid white;
            background: transparent;
            color: white;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: white;
            color: #667eea;
        }

        .hero-image {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            color: white;
        }

        .hero-image svg {
            width: 100%;
            height: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
            color: white;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            main {
                grid-template-columns: 1fr;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .nav-links {
                flex-direction: column;
                gap: 1rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
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