<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Platform - Vot.id</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }@keyframes grow-bar {
            0% { height: 10%; }
            50% { height: 90%; }
            100% { height: 40%; }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 10px rgba(74, 144, 226, 0.2); }
            50% { box-shadow: 0 0 25px rgba(74, 144, 226, 0.4); }
        }
        @keyframes float-slow {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        @keyframes sentiment-meter {
            0% { width: 30%; background-color: #ef4444; }
            50% { width: 80%; background-color: #22c55e; }
            100% { width: 60%; background-color: #eab308; }
        }
        .animate-bar-1 { animation: grow-bar 3s infinite ease-in-out; }
        .animate-bar-2 { animation: grow-bar 4s infinite ease-in-out 0.5s; }
        .animate-bar-3 { animation: grow-bar 3.5s infinite ease-in-out 1s; }
        .animate-bar-4 { animation: grow-bar 4.5s infinite ease-in-out 0.2s; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .glasscard-glow {
            animation: pulse-glow 4s infinite ease-in-out;
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
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4A90E2",
                        "secondary": "#00F5D4",
                        "accent": "#F72585",
                        "background-light": "#f6f5f8",
                        "background-dark": "#0B0F19",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "2xl": "2rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-background-dark font-display text-[#A0AEC0] dark antialiased selection:bg-primary selection:text-white">
<div class="relative w-full min-h-screen overflow-x-hidden">
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[60%] h-[60%] bg-[#4A90E2]/15 rounded-full filter blur-[120px] opacity-40 animate-[spin_30s_linear_infinite]"></div>
        <div class="absolute top-[40%] -right-[10%] w-[50%] h-[50%] bg-[#00F5D4]/10 rounded-full filter blur-[100px] opacity-30 animate-[spin_40s_linear_infinite_reverse]"></div>
        <div class="absolute bottom-[0%] left-[20%] w-[40%] h-[40%] bg-[#F72585]/10 rounded-full filter blur-[120px] opacity-20"></div>
    </div>
    
    <div class="relative z-10">
        <x-guest-navbar />

        <main class="container mx-auto px-6 pt-32 pb-24">
            <section class="text-center mb-24 relative">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/20 filter blur-[100px] rounded-full -z-10 opacity-20"></div>
                <div class="flex flex-col items-center gap-6 max-w-4xl mx-auto">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-secondary/30 bg-secondary/10 text-secondary text-xs font-bold uppercase tracking-wider mb-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                        </span>
                        AI-Powered Intelligence
                    </div>
                    <h1 class="text-white text-5xl md:text-7xl font-bold leading-tight tracking-[-0.033em] bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/60">
                        Data that speaks.<br/>Decisions that stick.
                    </h1>
                    <p class="text-[#A0AEC0] text-lg md:text-xl font-normal leading-relaxed max-w-2xl mx-auto">
                        Transform scattered feedback into a unified strategic narrative. Our "Zero-to-Insight" engine automates the heavy lifting so you can focus on the big picture.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <button class="h-12 px-8 rounded-xl bg-white text-background-dark font-bold text-base hover:bg-gray-100 transition-colors flex items-center gap-2">
                            Request Demo
                            <i class="ph-bold ph-arrow-right"></i>
                        </button>
                        <button class="h-12 px-8 rounded-xl glass-panel text-white font-medium text-base hover:bg-white/10 transition-colors">
                            View Product Tour
                        </button>
                    </div>
                </div>
            </section>
            
            <section class="mb-32 space-y-24">
                <!-- Feature 1: Sentiment Pulse -->
                <div class="grid lg:grid-cols-2 gap-2 items-center">
                    <div class="order-2 lg:order-1 relative group max-w-2xl">
                        <div class="glass-panel rounded-2xl p-8 aspect-[4/3] flex flex-col items-center justify-center relative overflow-hidden border-t border-white/20">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent"></div>
                            <div class="absolute top-4 left-4 flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/50"></div>
                            </div>
                            <div class="relative z-10 w-full max-w-sm mx-auto space-y-6">
                                <div class="flex justify-between items-end text-sm text-gray-400 mb-1">
                                    <span>Negative</span>
                                    <span class="text-white font-bold">Positive Sentiment</span>
                                    <span>Positive</span>
                                </div>
                                <div class="h-4 bg-white/10 rounded-full overflow-hidden backdrop-blur-sm border border-white/5">
                                    <div class="h-full rounded-full animate-[sentiment-meter_5s_infinite_ease-in-out]" style="width: 75%; background: linear-gradient(90deg, #ef4444 0%, #eab308 50%, #22c55e 100%); box-shadow: 0 0 15px rgba(34, 197, 94, 0.5);"></div>
                                </div>
                                <div class="flex flex-wrap gap-2 justify-center mt-8">
                                    <div class="px-3 py-1.5 rounded-lg bg-green-500/20 border border-green-500/30 text-green-400 text-xs flex items-center gap-1 animate-[float-slow_4s_infinite_ease-in-out]">
                                        <i class="ph-fill ph-smiley"></i> "Great UI!"
                                    </div>
                                    <div class="px-3 py-1.5 rounded-lg bg-red-500/20 border border-red-500/30 text-red-400 text-xs flex items-center gap-1 animate-[float-slow_5s_infinite_ease-in-out_1s]">
                                        <i class="ph-fill ph-smiley-sad"></i> "Slow loading"
                                    </div>
                                    <div class="px-3 py-1.5 rounded-lg bg-yellow-500/20 border border-yellow-500/30 text-yellow-400 text-xs flex items-center gap-1 animate-[float-slow_6s_infinite_ease-in-out_0.5s]">
                                        <i class="ph-fill ph-smiley-meh"></i> "Okay price"
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-primary/30 to-secondary/30 rounded-[2rem] blur-2xl -z-10 opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                    <div class="order-1 lg:order-2 relative group max-w-2xl">
                        <div class="flex items-center justify-center p-3 rounded-xl bg-primary/10 text-primary border border-primary/20 mb-2 w-fit">
                            <i class="ph-duotone ph-heartbeat text-2xl"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Instant Sentiment Pulse</h2>
                        <p class="text-lg text-[#A0AEC0] leading-relaxed">
                            Don't wait for quarterly reports. Watch customer sentiment shift in real-time as feedback pours in. Our AI categorizes emotions instantly, turning raw text into a live emotional heatmap of your user base.
                        </p>
                        <ul class="space-y-3 mt-4">
                            <li class="flex items-center gap-3 text-sm text-gray-300">
                                <i class="ph-fill ph-check-circle text-secondary"></i>
                                Automatic tone detection (Angry, Happy, Neutral)
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-300">
                                <i class="ph-fill ph-check-circle text-secondary"></i>
                                Keyword clustering for rapid issue spotting
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-300">
                                <i class="ph-fill ph-check-circle text-secondary"></i>
                                Drill-down to specific user cohorts
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Feature 2: Trend Forecasting -->
                <div class="grid lg:grid-cols-2 gap-2 items-center">
                    <div class="order-2 lg:order-1 relative group max-w-2xl">
                        <div class="inline-flex items-center justify-center p-3 rounded-xl bg-secondary/10 text-secondary border border-secondary/20 mb-2 w-fit">
                            <i class="ph-duotone ph-trend-up text-2xl"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Trend Forecasting</h2>
                        <p class="text-lg text-[#A0AEC0] leading-relaxed">
                            See where the market is going before it gets there. Vot.id visualizes emerging topics and feature requests over time, helping you prioritize your roadmap with data-backed confidence.
                        </p>
                        <div class="glasscard-glow rounded-xl p-6 bg-white/5 border border-white/10 mt-6 max-w-md">
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <span class="ph-fill ph-user text-white text-xl"></span>
                                </div>
                                <div>
                                    <p class="text-white text-sm italic mb-2">"We spotted a rising demand for dark mode two weeks before our competitors. Vot.id gave us the lead time to ship first."</p>
                                    <p class="text-primary text-xs font-bold uppercase tracking-wide">Sarah Jenkins, Product Director</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2 relative group max-w-2xl">
                        <div class="glass-panel rounded-2xl p-8 aspect-[4/3] flex flex-col items-center justify-center relative overflow-hidden border-t border-white/20">
                            <div class="absolute inset-0 bg-gradient-to-bl from-secondary/5 to-transparent"></div>
                            <div class="flex items-end gap-3 h-48 w-full max-w-xs mx-auto">
                                <div class="w-full bg-gradient-to-t from-primary/20 to-primary/80 rounded-t-lg animate-bar-1 relative group/bar">
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-white/10 backdrop-blur px-2 py-1 rounded text-xs text-white opacity-0 group-hover/bar:opacity-100 transition-opacity">Q1</div>
                                </div>
                                <div class="w-full bg-gradient-to-t from-secondary/20 to-secondary/80 rounded-t-lg animate-bar-2 relative group/bar">
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-white/10 backdrop-blur px-2 py-1 rounded text-xs text-white opacity-0 group-hover/bar:opacity-100 transition-opacity">Q2</div>
                                </div>
                                <div class="w-full bg-gradient-to-t from-accent/20 to-accent/80 rounded-t-lg animate-bar-3 relative group/bar">
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-white/10 backdrop-blur px-2 py-1 rounded text-xs text-white opacity-0 group-hover/bar:opacity-100 transition-opacity">Q3</div>
                                </div>
                                <div class="w-full bg-gradient-to-t from-blue-400/20 to-blue-400/80 rounded-t-lg animate-bar-4 relative group/bar">
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-white/10 backdrop-blur px-2 py-1 rounded text-xs text-white opacity-0 group-hover/bar:opacity-100 transition-opacity">Q4</div>
                                </div>
                            </div>
                            <div class="h-px w-full max-w-xs bg-white/20 mt-1"></div>
                            <div class="flex justify-between w-full max-w-xs text-xs text-gray-500 mt-2">
                                <span>Jan</span>
                                <span>Dec</span>
                            </div>
                        </div>
                        <div class="absolute -inset-4 bg-gradient-to-l from-secondary/30 to-primary/30 rounded-[2rem] blur-2xl -z-10 opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                </div>

                <!-- Feature 3: One-Click PDF -->
                <div class="grid lg:grid-cols-2 gap-2 items-center">
                    <div class="order-2 lg:order-1 relative group max-w-2xl">
                        <div class="glass-panel rounded-2xl p-8 aspect-[4/3] flex flex-col items-center justify-center relative overflow-hidden border-t border-white/20">
                            <div class="absolute inset-0 bg-gradient-to-tr from-accent/5 to-transparent"></div>
                            <div class="relative w-48 h-60 bg-white/5 border border-white/10 rounded-lg backdrop-blur-md flex flex-col p-4 shadow-2xl transform rotate-[-5deg] transition-transform group-hover:rotate-0 duration-500">
                                <div class="h-3 w-1/2 bg-white/20 rounded mb-4 animate-pulse"></div>
                                <div class="space-y-2 mb-6">
                                    <div class="h-2 w-full bg-white/10 rounded"></div>
                                    <div class="h-2 w-5/6 bg-white/10 rounded"></div>
                                    <div class="h-2 w-4/6 bg-white/10 rounded"></div>
                                </div>
                                <div class="flex-1 bg-white/5 rounded border border-white/5 flex items-end justify-around p-2 gap-1 mb-4">
                                    <div class="w-2 h-1/3 bg-primary/50 rounded-t"></div>
                                    <div class="w-2 h-2/3 bg-primary/50 rounded-t"></div>
                                    <div class="w-2 h-1/2 bg-primary/50 rounded-t"></div>
                                </div>
                                <div class="h-6 w-full bg-accent/20 rounded border border-accent/30 flex items-center justify-center">
                                    <div class="text-[8px] text-accent uppercase font-bold tracking-widest">Generating PDF</div>
                                </div>
                                <div class="absolute -right-4 -top-4 p-2 bg-white/10 backdrop-blur rounded-lg border border-white/20 animate-bounce">
                                    <i class="ph-duotone ph-file-pdf text-red-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-accent/30 to-purple-500/30 rounded-[2rem] blur-2xl -z-10 opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                    <div class="order-1 lg:order-2 relative group max-w-2xl">
                        <div class="inline-flex items-center justify-center p-3 rounded-xl bg-accent/10 text-accent border border-accent/20 mb-2 w-fit">
                            <i class="ph-duotone ph-file-text text-2xl"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white">One-Click PDF Reports</h2>
                        <p class="text-lg text-[#A0AEC0] leading-relaxed">
                            Stop spending hours in spreadsheets and slide decks. Generate board-ready PDF summaries of your data with a single click. Custom branded, AI-summarized, and ready to share.
                        </p>
                        <div class="glasscard-glow rounded-xl p-6 bg-white/5 border border-white/10 mt-6 max-w-md">
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <span class="ph-fill ph-user text-white text-xl"></span>
                                </div>
                                <div>
                                    <p class="text-white text-sm italic mb-2">"The automated executive summary feature saves me about 4 hours every Monday morning. It's concise and accurate."</p>
                                    <p class="text-accent text-xs font-bold uppercase tracking-wide">David Chen, VP of Operations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="mb-12">
                <div class="relative rounded-3xl overflow-hidden border border-white/20">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-background-dark to-secondary/20 opacity-80 backdrop-blur-3xl"></div>
                    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-white/5 to-transparent"></div>
                    <div class="relative z-10 p-12 md:p-20 text-center">
                        <h2 class="text-white text-4xl md:text-5xl font-bold mb-6">Ready for clarity?</h2>
                        <p class="text-[#A0AEC0] text-lg max-w-2xl mx-auto mb-10">
                            Join over 2,000 managers using Vot.id to turn noisy opinions into clear, actionable business strategies.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <button class="h-14 px-8 rounded-xl bg-gradient-to-r from-primary to-primary/80 text-white font-bold text-lg shadow-[0_0_20px_rgba(74,144,226,0.4)] hover:shadow-[0_0_40px_rgba(74,144,226,0.6)] hover:-translate-y-1 transition-all duration-300">
                                Get Started Free
                            </button>
                            <button class="h-14 px-8 rounded-xl bg-white/5 border border-white/10 text-white font-bold text-lg hover:bg-white/10 transition-colors backdrop-blur-md">
                                Talk to Sales
                            </button>
                        </div>
                        <p class="text-sm text-gray-500 mt-6">No credit card required · 14-day free trial · Cancel anytime</p>
                    </div>
                </div>
            </section>
        </main>
        
        <x-guest-footer />
        
        <!-- Cookie Consent Banner -->
        <x-cookie-banner />
    </div>
</div>
</body>
</html>
