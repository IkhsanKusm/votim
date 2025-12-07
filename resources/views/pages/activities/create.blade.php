<x-app-layout title="New Activity">
    
    <div class="max-w-4xl mx-auto" x-data="{ 
        selectedType: 'single_choice', 
        votingOptions: ['', ''] 
    }">
        
        <h2 class="text-2xl font-bold text-white mb-6">Create New Activity</h2>
        
        <!-- Form Start -->
        <form action="{{ route('activities.store', $folder->id) }}" method="POST">
            @csrf
            
            <!-- 1. General Info -->
            <div class="glass-panel p-6 rounded-2xl mb-6">
                <label class="block text-sm font-medium text-gray-400 mb-2">Question / Title</label>
                <input type="text" name="title" required placeholder="e.g., Apa menu makan siang favorit kalian?" 
                    class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500 transition">
            </div>

            <!-- 2. Template Gallery (Selection) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                
                <!-- Card: Single Choice (Voting) -->
                <div @click="selectedType = 'single_choice'" 
                     :class="selectedType === 'single_choice' ? 'border-purple-500 bg-purple-500/10' : 'border-white/10 hover:border-white/30'"
                     class="cursor-pointer glass-panel p-5 rounded-2xl border transition-all relative group">
                    <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3 class="text-white font-semibold">Polling</h3>
                    <p class="text-xs text-gray-500 mt-1">Pilihan Ganda standar. Hasil statistik langsung.</p>
                    <input type="radio" name="type" value="single_choice" x-model="selectedType" class="hidden">
                </div>

                <!-- Card: Rating -->
                <div @click="selectedType = 'rating'" 
                     :class="selectedType === 'rating' ? 'border-purple-500 bg-purple-500/10' : 'border-white/10 hover:border-white/30'"
                     class="cursor-pointer glass-panel p-5 rounded-2xl border transition-all relative">
                    <div class="w-10 h-10 rounded-full bg-yellow-500/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    </div>
                    <h3 class="text-white font-semibold">Rating</h3>
                    <p class="text-xs text-gray-500 mt-1">Skala 1-5 Bintang atau Emoji.</p>
                    <input type="radio" name="type" value="rating" x-model="selectedType" class="hidden">
                </div>

                <!-- Card: Open Opinion (AI Powered) -->
                <div @click="selectedType = 'open_opinion'" 
                     :class="selectedType === 'open_opinion' ? 'border-purple-500 bg-purple-500/10' : 'border-white/10 hover:border-white/30'"
                     class="cursor-pointer glass-panel p-5 rounded-2xl border transition-all relative">
                    <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-white font-semibold">AI Opinion</h3>
                    <p class="text-xs text-gray-500 mt-1">Teks bebas yang akan dianalisis sentimennya oleh Gemini AI.</p>
                    <input type="radio" name="type" value="open_opinion" x-model="selectedType" class="hidden">
                </div>
            </div>

            <!-- 3. Dynamic Configuration Area -->
            
            <!-- CONFIG: Single Choice -->
            <div x-show="selectedType === 'single_choice'" class="glass-panel p-6 rounded-2xl mb-6 border border-white/5">
                <h3 class="text-white font-medium mb-4">Voting Options</h3>
                
                <template x-for="(option, index) in votingOptions" :key="index">
                    <div class="flex gap-2 mb-3">
                        <input type="text" :name="'options[' + index + ']'" required x-model="votingOptions[index]" placeholder="Option..." 
                            class="flex-1 bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-sm text-white focus:border-purple-500 outline-none">
                        
                        <!-- Delete Button (Only if > 2 options) -->
                        <button type="button" @click="votingOptions.splice(index, 1)" x-show="votingOptions.length > 2"
                            class="text-red-400 hover:text-red-300 px-2">
                            &times;
                        </button>
                    </div>
                </template>

                <button type="button" @click="votingOptions.push('')" class="mt-2 text-sm text-purple-400 hover:text-purple-300 font-medium flex items-center gap-1">
                    <span>+ Add Another Option</span>
                </button>

                <div class="mt-6 pt-4 border-t border-white/5">
                     <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="allow_multiple" class="w-4 h-4 rounded bg-white/10 border-white/20 text-purple-500">
                        <span class="text-sm text-gray-400">Allow selecting multiple answers</span>
                     </label>
                </div>
            </div>

            <!-- CONFIG: Open Opinion -->
            <div x-show="selectedType === 'open_opinion'" class="glass-panel p-6 rounded-2xl mb-6 border border-white/5">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-purple-400 text-xs font-bold">AI</span>
                    </div>
                    <div>
                        <h3 class="text-white font-medium">AI Analysis Enabled</h3>
                        <p class="text-sm text-gray-500 mt-1">Jawaban user akan diproses otomatis oleh Gemini untuk mendapatkan Sentimen & Keyword.</p>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02]">
                    Publish Activity
                </button>
            </div>

        </form>
    </div>
</x-app-layout>