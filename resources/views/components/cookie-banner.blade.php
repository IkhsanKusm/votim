<div x-data="cookieBanner()" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-4"
     class="fixed bottom-0 left-0 right-0 z-50 p-4 sm:p-6 md:p-8"
     x-cloak>
    <div class="w-full align-center justify-center max-w-6xl mx-auto backdrop-blur-xl bg-white/10 border border-white/20 rounded-xl shadow-2xl shadow-black/20">
        <div class="flex sm:flex-row items-center gap-4 sm:gap-6 p-4 grid lg:grid-cols-2">
            <!-- Icon & Text -->
            <div class="flex items-center gap-4 flex-grow order-2 lg:order-1 relative group">
                <div class="text-white/80 flex items-center justify-center rounded-lg bg-white/10 shrink-0 size-12">
                    <span class="material-symbols-outlined text-3xl">cookie</span>
                </div>
                <p class="text-white/90 text-sm sm:text-base font-normal leading-normal flex-1">
                    Kami menggunakan cookie untuk meningkatkan pengalaman Anda. Dengan melanjutkan, Anda menyetujui penggunaan cookie kami.
                </p>
            </div>
            
            <!-- Buttons -->
            <div class="flex gap-3 sm:gap-4 shrink-0 w-full sm:w-auto order-1 lg:order-2 items-end justify-end">
                <button @click="decline()"
                        class="flex-1 sm:flex-none text-sm font-medium leading-normal text-white/70 hover:text-white transition-colors duration-200 px-4 py-2 rounded-lg hover:bg-white/10">
                    Kelola Pengaturan
                </button>
                <button @click="accept()" 
                        class="flex-1 sm:flex-none min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-6 bg-gradient-to-r from-[#4A90E2] to-[#6325f4] text-white text-sm font-bold leading-normal tracking-[0.015em] transition-all duration-300 hover:shadow-lg hover:shadow-[#4A90E2]/40 hover:scale-105">
                    <span class="truncate">Setuju</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function cookieBanner() {
    return {
        show: false,
        
        init() {
            // Check if user has already made a choice
            const cookieConsent = localStorage.getItem('cookieConsent');
            if (!cookieConsent) {
                // Show banner after 1 second delay
                setTimeout(() => {
                    this.show = true;
                }, 1000);
            }
        },
        
        accept() {
            localStorage.setItem('cookieConsent', 'accepted');
            this.show = false;
            // You can trigger analytics or other cookie-dependent features here
            console.log('Cookies accepted');
        },
        
        decline() {
            localStorage.setItem('cookieConsent', 'declined');
            this.show = false;
            console.log('Cookies declined - manage settings');
            // Here you could show a settings modal
        }
    }
}
</script>

<style>
    [x-cloak] { display: none !important; }
</style>
