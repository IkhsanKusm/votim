<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Contact Us - Votim</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web@2.0.3"></script>
    <style>
        .glass-panel {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .form-input.glass-input {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-input.glass-input:focus {
            border-color: rgba(58, 125, 255, 0.7);
            box-shadow: 0 0 15px rgba(58, 125, 255, 0.3);
            outline: none;
            --tw-ring-shadow: 0 0 #0000;
        }
        .btn-gradient {
            background-image: linear-gradient(to right, #3A7DFF, #00D1FF);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            box-shadow: 0 4px 20px rgba(58, 125, 255, 0.4);
            transform: translateY(-2px);
        }
        .btn-glass {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .btn-glass:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }
        .social-badge {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .social-badge:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        .ambient-light {
            position: absolute;
            pointer-events: none;
            border-radius: 9999px;
            filter: blur(150px);
            opacity: 0.3;
        }
        .ambient-light.one {
            width: 400px;
            height: 400px;
            top: 10%;
            left: 20%;
            background-color: #3A7DFF;
        }
        .ambient-light.two {
            width: 350px;
            height: 350px;
            bottom: 5%;
            right: 15%;
            background-color: #6325f4;
        }
        .sparkle {
            position: absolute;
            opacity: 0;
            animation: sparkle-anim 1s ease-out forwards;
        }
        .sparkle.one { top: 10%; left: 15%; animation-delay: 0.2s; }
        .sparkle.two { top: 20%; right: 10%; animation-delay: 0.4s; }
        .sparkle.three { bottom: 25%; left: 20%; animation-delay: 0.6s; }
        @keyframes sparkle-anim {
            0% { transform: scale(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-display bg-[#0B0F19]" x-data="{ showSuccessModal: false }">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <div class="ambient-light one"></div>
        <div class="ambient-light two"></div>
        
        <div class="relative z-10">
            <x-guest-navbar />
            
            <main class="flex flex-col items-center justify-center flex-1 py-12 px-4">
                <div class="w-full max-w-5xl mx-auto">
                    <div class="flex flex-wrap justify-center gap-3 p-4 text-center mb-8">
                        <div class="flex w-full flex-col gap-3">
                            <p class="text-[#E0E6F1] text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">Get in Touch</p>
                            <p class="text-[rgba(224,230,241,0.6)] text-lg font-normal leading-normal max-w-2xl mx-auto">We'd love to hear from you. Let us know how we can help transform your insights.</p>
                        </div>
                    </div>
                    
                    <div class="glass-panel rounded-xl shadow-2xl shadow-black/20 p-6 sm:p-8 md:p-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <!-- Form Section -->
                            <div class="flex flex-col gap-6">
                                <h3 class="text-2xl font-bold text-[#E0E6F1]">Send us a Message</h3>
                                <form class="flex flex-col gap-6" @submit.prevent="showSuccessModal = true">
                                    <label class="flex flex-col w-full">
                                        <p class="text-[#E0E6F1] text-base font-medium leading-normal pb-2">Full Name</p>
                                        <input required class="form-input glass-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#E0E6F1] focus:outline-0 focus:ring-0 h-14 placeholder:text-[rgba(224,230,241,0.6)] p-[15px] text-base font-normal leading-normal" placeholder="Enter your full name"/>
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <p class="text-[#E0E6F1] text-base font-medium leading-normal pb-2">Work Email</p>
                                        <input required type="email" class="form-input glass-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#E0E6F1] focus:outline-0 focus:ring-0 h-14 placeholder:text-[rgba(224,230,241,0.6)] p-[15px] text-base font-normal leading-normal" placeholder="Enter your work email"/>
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <p class="text-[#E0E6F1] text-base font-medium leading-normal pb-2">Your Message</p>
                                        <textarea required class="form-input glass-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#E0E6F1] focus:outline-0 focus:ring-0 min-h-36 placeholder:text-[rgba(224,230,241,0.6)] p-[15px] text-base font-normal leading-normal" placeholder="How can we help?"></textarea>
                                    </label>
                                    <div class="flex flex-col w-full">
                                        <p class="text-[#E0E6F1] text-base font-medium leading-normal pb-2">Human Verification</p>
                                        <div class="flex flex-col sm:flex-row items-center gap-4">
                                            <div class="glass-input flex items-center justify-center flex-shrink-0 w-full sm:w-auto h-14 rounded-lg px-6">
                                                <p class="text-[#E0E6F1] text-xl font-mono font-bold tracking-widest select-none">12 + 5 = ?</p>
                                            </div>
                                            <input required class="form-input glass-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#E0E6F1] focus:outline-0 focus:ring-0 h-14 placeholder:text-[rgba(224,230,241,0.6)] p-[15px] text-base font-normal leading-normal" placeholder="Your answer" type="number"/>
                                        </div>
                                    </div>
                                    <button class="btn-gradient flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-4 text-white text-base font-bold leading-normal tracking-[0.015em]" type="submit">
                                        <span class="truncate">Send Message</span>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Contact Info Section -->
                            <div class="flex flex-col gap-8 pt-0 md:pt-10">
                                <a class="flex items-start gap-4 p-5 rounded-lg glass-panel hover:bg-white/10 transition-colors cursor-pointer" href="mailto:support@votim.id">
                                    <span class="material-symbols-outlined text-[#E0E6F1] text-2xl mt-1">mail</span>
                                    <div>
                                        <h4 class="text-lg font-bold text-[#E0E6F1]">Email Us Directly</h4>
                                        <p class="text-[rgba(224,230,241,0.6)]">support@votim.id</p>
                                    </div>
                                </a>
                                <a class="flex items-start gap-4 p-5 rounded-lg glass-panel hover:bg-white/10 transition-colors cursor-pointer" href="tel:+6281234567890">
                                    <span class="material-symbols-outlined text-[#E0E6F1] text-2xl mt-1">call</span>
                                    <div>
                                        <h4 class="text-lg font-bold text-[#E0E6F1]">Call Us</h4>
                                        <p class="text-[rgba(224,230,241,0.6)]">+62 812-3456-7890</p>
                                    </div>
                                </a>
                                <div class="flex flex-col gap-4 p-5 rounded-lg glass-panel">
                                    <div class="flex items-start gap-4">
                                        <span class="material-symbols-outlined text-[#E0E6F1] text-2xl mt-1">location_on</span>
                                        <div>
                                            <h4 class="text-lg font-bold text-[#E0E6F1]">Our Headquarters</h4>
                                            <p class="text-[rgba(224,230,241,0.6)]">Jakarta Selatan, Indonesia</p>
                                        </div>
                                    </div>
                                    <div class="aspect-video w-full rounded-md overflow-hidden mt-2 bg-white/5">
                                        <div class="w-full h-full flex items-center justify-center text-[rgba(224,230,241,0.3)]">
                                            <span class="material-symbols-outlined text-4xl">map</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center gap-4 mt-4">
                                    <a class="social-badge flex items-center justify-center size-12 rounded-full" href="#" target="_blank">
                                        <i class="ph-fill ph-linkedin-logo text-xl text-[#E0E6F1] opacity-80"></i>
                                    </a>
                                    <a class="social-badge flex items-center justify-center size-12 rounded-full" href="#" target="_blank">
                                        <i class="ph-fill ph-twitter-logo text-xl text-[#E0E6F1] opacity-80"></i>
                                    </a>
                                    <a class="social-badge flex items-center justify-center size-12 rounded-full" href="#" target="_blank">
                                        <i class="ph-fill ph-facebook-logo text-xl text-[#E0E6F1] opacity-80"></i>
                                    </a>
                                    <a class="social-badge flex items-center justify-center size-12 rounded-full" href="#" target="_blank">
                                        <i class="ph-fill ph-instagram-logo text-xl text-[#E0E6F1] opacity-80"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            
            <x-guest-footer />
        </div>
    </div>
    
    <!-- Success Modal -->
    <div x-show="showSuccessModal" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4"
         style="display: none;">
        
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="showSuccessModal = false"></div>
        
        <!-- Modal Content -->
        <div x-show="showSuccessModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             class="relative z-10 w-full max-w-md">
            <div class="glass-panel w-full rounded-2xl shadow-2xl shadow-black/30 p-8 text-center">
                <div class="relative flex items-center justify-center mb-6">
                    <div class="relative flex items-center justify-center size-24 bg-gradient-to-br from-blue-500/20 to-cyan-400/20 rounded-full">
                        <div class="absolute inset-0 rounded-full border border-white/10"></div>
                        <i class="ph-duotone ph-check-circle text-6xl text-[#00D1FF]"></i>
                        <svg class="sparkle one size-4 text-cyan-300" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.25L13.125 7.875L18.75 9L13.125 10.125L12 15.75L10.875 10.125L5.25 9L10.875 7.875L12 2.25Z"></path></svg>
                        <svg class="sparkle two size-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.25L13.125 7.875L18.75 9L13.125 10.125L12 15.75L10.875 10.125L5.25 9L10.875 7.875L12 2.25Z"></path></svg>
                        <svg class="sparkle three size-3 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.25L13.125 7.875L18.75 9L13.125 10.125L12 15.75L10.875 10.125L5.25 9L10.875 7.875L12 2.25Z"></path></svg>
                    </div>
                </div>
                <h1 class="text-[#E0E6F1] text-3xl font-black leading-tight tracking-[-0.033em] mb-3">Pesan Terkirim!</h1>
                <p class="text-[rgba(224,230,241,0.7)] text-base font-normal leading-normal max-w-xs mx-auto mb-8">Pesan Anda telah berhasil terkirim! Kami akan menghubungi Anda segera.</p>
                <div class="flex flex-col gap-3">
                    <a href="{{ route('home') }}" class="btn-gradient flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 text-white text-base font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Kembali ke Beranda</span>
                    </a>
                    <button @click="showSuccessModal = false" class="btn-glass flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 text-[#E0E6F1] text-base font-medium leading-normal" type="button">
                        <span class="truncate">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</body>
</html>
