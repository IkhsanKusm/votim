<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Legal - Votim</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4A90E2",
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
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    
    <style>
        body { overflow-x: hidden; }
        
        .glassmorphic {
            background-color: rgba(255, 255, 255, 0.05);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-card {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: border-color 0.3s ease;
        }
        
        .glass-card:hover {
            border-color: rgba(74, 144, 226, 0.3);
        }
        
        html { scroll-behavior: smooth; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0B0F19; }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.2); }
        
        @keyframes drift {
            0% { transform: translate(0, 0); }
            50% { transform: translate(80px, 40px) scale(1.1); }
            100% { transform: translate(-40px, -80px); }
        }
        
        .ambient-light {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 9999px;
            filter: blur(120px);
            opacity: 0.12;
            animation: drift 20s infinite alternate ease-in-out;
            z-index: 0;
        }
        
        .ambient-light-1 { top: -10%; left: 10%; background-color: #4A90E2; animation-duration: 25s; }
        .ambient-light-2 { top: 40%; right: -10%; background-color: #6325f4; animation-duration: 30s; animation-delay: -10s; }
        .ambient-light-3 { bottom: -10%; left: 20%; background-color: #14B8A6; animation-duration: 22s; animation-delay: -5s; }
    </style>
</head>
<body class="font-display bg-background-dark text-white min-h-screen flex flex-col selection:bg-primary/30">
    <!-- Ambient Background -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="ambient-light ambient-light-1"></div>
        <div class="ambient-light ambient-light-2"></div>
        <div class="ambient-light ambient-light-3"></div>
    </div>
    
    <div class="relative z-10 flex flex-col min-h-screen">
        <x-guest-navbar />
        
        <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"
              x-data="{
                  activeSection: 'pengantar',
                  sections: ['pengantar', 'ketentuan-akun', 'data-kumpul', 'privacy-policy', 'terms-of-service', 'hubungi-kami'],
                  calculateActive() {
                      const scrollY = window.scrollY;
                      const viewportHeight = window.innerHeight;
                      
                      // Find the section currently in view
                      for (const section of this.sections) {
                          const el = document.getElementById(section);
                          if (!el) continue;
                          
                          const rect = el.getBoundingClientRect();
                          // Section is active if it's somewhat in the middle of the screen
                          if (rect.top <= viewportHeight / 3 && rect.bottom >= viewportHeight / 5) {
                              this.activeSection = section;
                              break;
                          }
                      }
                  },
                  scrollTo(id) {
                      const el = document.getElementById(id);
                      if (el) {
                          const y = el.getBoundingClientRect().top + window.scrollY - 100; // Offset for sticky header
                          window.scrollTo({top: y, behavior: 'smooth'});
                      }
                  }
              }"
              @scroll.window="calculateActive()"
              x-init="calculateActive()">
            
            <div class="flex flex-grid-col lg:flex-row gap-8 lg:gap-12 items-start">
                
                <!-- Main Content -->
                <div class="flex-1 w-full min-w-0 flex flex-col gap-8 order-2 lg:order-1 lg:w-2/3">
                    <!-- Header -->
                    <div class="mb-4">
                        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-3">Kebijakan & Ketentuan</h1>
                        <p class="text-lg text-white/60">Transparansi penuh untuk keamanan data Anda. Terakhir diperbarui: {{ date('d F Y') }}</p>
                    </div>
                    
                    <!-- Pengantar -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-primary/30" id="pengantar">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-primary/20 text-primary transition-colors">
                                <span class="material-symbols-outlined text-2xl">info</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Pengantar</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                            <p>
                                Selamat datang di platform Votim. Kami berkomitmen untuk melindungi privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, mengungkapkan, dan menjaga informasi Anda saat Anda mengunjungi dan menggunakan platform kami.
                            </p>
                        </div>
                    </section>
                    
                    <!-- Ketentuan Akun -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-blue-400/30" id="ketentuan-akun">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-blue-500/20 text-blue-400 transition-colors">
                                <span class="material-symbols-outlined text-2xl">badge</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Ketentuan Akun</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                            <p>
                                Untuk menggunakan fitur lengkap Votim, Anda diwajibkan membuat akun. Anda bertanggung jawab penuh untuk menjaga kerahasiaan kata sandi dan akun Anda.
                            </p>
                            <ul class="list-disc list-inside mt-4 space-y-2">
                                <li>Anda harus memberikan informasi yang akurat dan lengkap saat pendaftaran.</li>
                                <li>Kami berhak menangguhkan akun jika ditemukan pelanggaran.</li>
                            </ul>
                        </div>
                    </section>
                    
                    <!-- Data yg Dikumpulkan -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-purple-400/30" id="data-kumpul">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-purple-500/20 text-purple-400 transition-colors">
                                <span class="material-symbols-outlined text-2xl">database</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Data yang Dikumpulkan</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                            <p>Informasi yang kami kumpulkan meliputi:</p>
                            <div class="grid md:grid-cols-2 gap-4 mt-6">
                                <div class="bg-white/5 p-4 rounded-lg border border-white/5">
                                    <h3 class="font-bold text-white mb-2">Data Pribadi</h3>
                                    <p class="text-sm">Nama, email, nomor telepon saat registrasi.</p>
                                </div>
                                <div class="bg-white/5 p-4 rounded-lg border border-white/5">
                                    <h3 class="font-bold text-white mb-2">Data Input AI</h3>
                                    <p class="text-sm">Dokumen dan teks yang diunggah.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <!-- privacy-policy -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-green-400/30" id="privacy-policy">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-green-500/20 text-green-400 transition-colors">
                                <span class="material-symbols-outlined text-2xl">policy</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Kebijakan Privasi</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                            <p>Data Anda digunakan untuk operasional layanan dan peningkatan AI secara anonim.</p>
                        </div>
                    </section>
                    
                    <!-- terms-of-service -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-orange-400/30" id="terms-of-service">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-orange-500/20 text-orange-400 transition-colors">
                                <span class="material-symbols-outlined text-2xl">gavel</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Ketentuan Layanan</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                            <p>Dengan mengakses Votim, Anda menyetujui semua syarat dan ketentuan yang berlaku.</p>
                        </div>
                    </section>
                    
                    <!-- hubungi-kami -->
                    <section class="glass-card rounded-2xl p-8 scroll-mt-32 transition-all duration-300 hover:border-pink-400/30" id="hubungi-kami">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 rounded-xl bg-pink-500/20 text-pink-400 transition-colors">
                                <span class="material-symbols-outlined text-2xl">alternate_email</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Hubungi Kami</h2>
                        </div>
                        <div class="prose prose-invert max-w-none text-white/80 leading-relaxed">
                             <div class="mt-6 flex flex-col sm:flex-row gap-4">
                                <a class="flex items-center justify-center gap-3 px-6 py-3 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all text-white font-medium" 
                                   href="{{ route('contact') }}">
                                    <span class="material-symbols-outlined">support_agent</span> Hubungi Dukungan
                                </a>
                            </div>
                        </div>
                    </section>
                    
                </div>
                
                <!-- Sticky Sidebar -->
                <aside class="w-full shrink-0 lg:sticky lg:top-24 lg:w-1/3 order-1 lg:order-2">
                    <div class="glass-card rounded-2xl p-5 flex flex-col gap-2">
                        <div class="px-3 pb-3 border-b border-white/10 mb-2">
                            <span class="text-xs font-bold text-white/50 uppercase tracking-wider">Daftar Isi</span>
                        </div>
                        
                        <!-- Nav Items with Conditional Classes -->
                        <a href="#pengantar" @click.prevent="scrollTo('pengantar')" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'pengantar' ? 'bg-primary/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'pengantar' ? 'text-primary' : 'text-white/50'">info</span>
                            <span class="text-sm font-medium">Pengantar</span>
                        </a>
                        
                        <a href="#ketentuan-akun" @click.prevent="scrollTo('ketentuan-akun')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'ketentuan-akun' ? 'bg-blue-500/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'ketentuan-akun' ? 'text-blue-400' : 'text-white/50'">badge</span>
                            <span class="text-sm font-medium">Ketentuan Akun</span>
                        </a>
                        
                         <a href="#data-kumpul" @click.prevent="scrollTo('data-kumpul')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'data-kumpul' ? 'bg-purple-500/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'data-kumpul' ? 'text-purple-400' : 'text-white/50'">database</span>
                            <span class="text-sm font-medium">Data Dikumpulkan</span>
                        </a>

                        <a href="#privacy-policy" @click.prevent="scrollTo('privacy-policy')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'privacy-policy' ? 'bg-green-500/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'privacy-policy' ? 'text-green-400' : 'text-white/50'">policy</span>
                            <span class="text-sm font-medium">Kebijakan Privasi</span>
                        </a>
                        
                        <a href="#terms-of-service" @click.prevent="scrollTo('terms-of-service')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'terms-of-service' ? 'bg-orange-500/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'terms-of-service' ? 'text-orange-400' : 'text-white/50'">gavel</span>
                            <span class="text-sm font-medium">Ketentuan Layanan</span>
                        </a>
                        
                        <a href="#hubungi-kami" @click.prevent="scrollTo('hubungi-kami')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group relative overflow-hidden"
                           :class="activeSection === 'hubungi-kami' ? 'bg-pink-500/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'">
                            <span class="material-symbols-outlined text-[20px]" :class="activeSection === 'hubungi-kami' ? 'text-pink-400' : 'text-white/50'">alternate_email</span>
                            <span class="text-sm font-medium">Hubungi Kami</span>
                        </a>

                    </div>
                </aside>
                
            </div>
        </main>
        
        <x-guest-footer />
        <x-cookie-banner />
    </div>
</body>
</html>
