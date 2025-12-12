<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Votim - AI-Powered Insight Platform</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4A90E2",
                        "background-light": "#F0F2F5",
                        "background-dark": "#0B0F19",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            position: relative;
            overflow-x: hidden;
        }
        .glassmorphic {
            background-color: rgba(255, 255, 255, 0.05);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .glow-button {
            box-shadow: 0 0 15px rgba(74, 144, 226, 0.4), 0 0 5px rgba(74, 144, 226, 0.2);
        }
        .ambient-light-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 0;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.2;
        }
        .blob-1 {
            width: 400px;
            height: 400px;
            background-color: #4C1D95;
            top: 10%;
            left: 15%;
        }
        .blob-2 {
            width: 350px;
            height: 350px;
            background-color: #14B8A6;
            top: 50%;
            right: 10%;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-background-dark font-display text-white">
<div class="ambient-light-container">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
</div>
<div class="relative z-10">
    <x-guest-navbar />
    
    <main class="container mx-auto px-4 sm:px-8 md:px-16 lg:px-24">
        <section class="py-24 text-center">
            <div class="max-w-3xl mx-auto flex flex-col items-center gap-6">
                <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-black leading-tight tracking-[-0.033em]">
                    Transform Raw Opinions into Strategic Reports with AI
                </h1>
                <h2 class="text-[#A0AEC0] text-lg sm:text-xl font-normal leading-normal max-w-2xl">
                    Vot.id is a Zero-to-Insight platform that turns complex feedback into clear, actionable intelligence.
                </h2>
                <a href="{{ route('login') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-6 bg-primary hover:bg-blue-500 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors glow-button mt-4">
                    <span class="truncate">Get Started for Free</span>
                </a>
                <div class="mt-12 w-full max-w-xl h-64 glassmorphic rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-9xl">auto_awesome</span>
                    <p class="sr-only">A 3D illustration representing AI-driven insights.</p>
                </div>
            </div>
        </section>
        
        <!-- FEATURES SECTION -->
        <section class="py-24" id="features">
            <div class="flex flex-col gap-6 text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-white text-3xl sm:text-4xl font-bold leading-tight tracking-[-0.033em]">
                    Unlock the Power of Your Data
                </h2>
                <p class="text-[#A0AEC0] text-lg font-normal leading-normal">
                    Our platform offers a suite of powerful features designed to provide you with deep, actionable insights effortlessly.
                </p>
            </div>
            <!-- Div Grid Block -->
            <div class="container mx-auto flex flex-grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col gap-4 glassmorphic rounded-xl p-12 hover:border-primary transition-all text-center md:text-left">
                    <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 48">sentiment_satisfied</span>
                    <h3 class="text-white text-xl font-bold leading-tight">AI-Powered Sentiment Analysis</h3>
                    <p class="text-[#A0AEC0] text-sm font-normal leading-normal">Go beyond simple metrics and understand the true sentiment behind user feedback.</p>
                </div>
                <div class="flex flex-col gap-4 glassmorphic rounded-xl p-12 hover:border-primary transition-all text-center md:text-left">
                    <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 48">summarize</span>
                    <h3 class="text-white text-xl font-bold leading-tight">Automated Reporting</h3>
                    <p class="text-[#A0AEC0] text-sm font-normal leading-normal">Generate comprehensive, presentation-ready reports in minutes, not hours.</p>
                </div>
                <div class="flex flex-col gap-4 glassmorphic rounded-xl p-12 hover:border-primary transition-all text-center md:text-left">
                    <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 48">monitoring</span>
                    <h3 class="text-white text-xl font-bold leading-tight">Interactive Data Visualization</h3>
                    <p class="text-[#A0AEC0] text-sm font-normal leading-normal">Explore your data through dynamic charts and graphs to uncover hidden trends.</p>
                </div>
            </div>
        </section>

        <!-- HOW IT WORKS SECTION -->
        <section class="py-24" id="how-it-works">
            <div class="flex flex-col gap-4 text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-white text-3xl sm:text-4xl font-bold leading-tight tracking-[-0.033em]">How It Works</h2>
                <p class="text-[#A0AEC0] text-lg font-normal leading-normal">A simplified 3-step process to transform your raw data into final reports.</p>
            </div>
            <!-- Changed to Grid Block Layout as requested (removing complex connectors for block style) -->
            <div class="container mx-[15px] flex flex-grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Step 1 -->
                <div class="glassmorphic rounded-xl p-6 text-center flex flex-col items-center justify-center gap-4 hover:border-primary transition-all h-full">
                    <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-primary text-4xl">upload_file</span>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-2">1. Upload Data</h3>
                        <p class="text-[#A0AEC0] text-sm">Start by uploading your raw feedback, surveys, or opinion data.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="glassmorphic rounded-xl p-6 text-center flex flex-col items-center justify-center gap-4 hover:border-primary transition-all h-full">
                    <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-primary text-4xl">model_training</span>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-2">2. AI Analyzes</h3>
                        <p class="text-[#A0AEC0] text-sm">Our intelligent engine processes and analyzes the data for you.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="glassmorphic rounded-xl p-6 text-center flex flex-col items-center justify-center gap-4 hover:border-primary transition-all h-full">
                    <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-primary text-4xl">lab_profile</span>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-2">3. Get Report</h3>
                        <p class="text-[#A0AEC0] text-sm">Receive your comprehensive, strategic report with actionable insights.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-guest-footer />
    
    <!-- Cookie Consent Banner -->
    <x-cookie-banner />
</div>
</body>
</html>