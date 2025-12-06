11. SPESIFIKASI DESAIN UI/UX: votim (SPATIAL SAAS)
Konsep Visual: Deep Glassmorphism + Lightweight 3D Elements. Mood: Profesional, Futuristik, "Living Interface" (Tidak Statis).
1. DESIGN SYSTEM (PONDASI VISUAL)
Sebelum masuk ke layar, kita tentukan aturan main visualnya agar konsisten.
1.1. Background & Atmosfer (The 3D Element)
Base: #0B0F19 (Deep Space Blue - Hampir Hitam).
Ambient 3D: Jangan gunakan gambar diam. Gunakan CSS animated gradient blobs atau Spline 3D Objects yang sangat sederhana (bola kaca buram, kubus tumpul) yang melayang/berputar sangat lambat di pojok layar.
Tujuan: Memberikan kesan "hidup" tanpa membebani browser.
Lighting: Sumber cahaya imajiner dari pojok kiri atas, memberikan highlight putih tipis pada ujung-ujung kartu kaca.
1.2. Material Kaca (Glass Cards)
Surface: background: rgba(255, 255, 255, 0.03); + backdrop-filter: blur(20px);.
Border: 1px solid rgba(255, 255, 255, 0.08); (Sangat tipis).
Shadow: box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); (Bayangan lembut berwarna).
Active State: Saat diklik/hover, border menyala menjadi warna aksen (#8B5CF6).
1.3. Typography & Iconography
Font: Plus Jakarta Sans (Geometris, modern, cocok untuk angka).
Icons: Phosphor Icons (Style: Duotone). Memberikan kedalaman lebih daripada ikon solid biasa.

2. STRUKTUR NAVIGASI (GLOBAL SHELL)
Layout aplikasi ini menggunakan L-Shape Layout (Sidebar Kiri + Top Bar + Konten Utama).
2.1. Sidebar Dinamis (Kiri)
Lebar: 260px (Fixed).
Material: Kaca buram penuh setinggi layar.
Menu Items (5 Fitur Utama):
Setiap item memiliki ikon di kiri + teks.
State Active: Background pill transparan dengan glow ungu neon di kiri.
Urutan:
Insight Studio (Ikon: ChartPolaris - Bersinar).
Voting / Polling (Ikon: Gavel).
Public Opinion (Ikon: ChatTeardropText).
Room Forum (Ikon: UsersThree).
Settings (Ikon: Gear - di bagian bawah).
Micro-Interaction: Saat hover, ikon sedikit membesar (scale 1.1).

3. DETAIL LAYAR PER FITUR (THE FLOW)
LAYAR 1: INSIGHT STUDIO (The Command Center)
Ini adalah halaman default. Harus terasa seperti kokpit pesawat.
A. Header Area (Top Bar)
Kiri: Judul "Insight Studio".
Kanan (AI Quota): Sebuah capsule widget kecil.
Visual: Barometer lingkaran kecil + Teks "AI Credits: 850/1000".
Warna: Hijau (Aman) -> Kuning (Menipis) -> Merah (Habis).
Tidak mengganggu, tapi terlihat.
B. Main Stage: "The Report Composer" (Area Utama)
Visual: Sebuah area drop-zone besar di tengah dengan garis putus-putus menyala (dashed glow border).
Action: Tombol besar di tengah "Compose New Report".
Interaksi (Saat tombol diklik):
Muncul Panel "Source Selector" (Melayang di kanan).
UI Breadcrumbs Checkbox: Tampilan pohon (Tree View) folder & subbab.
[ ] Voting (Bab)
[v] Folder: Evaluasi Q3 (User mencentang ini)
[v] Rating Kantin (Subbab)
[v] Voting Ketua (Subbab)
User bisa memilih folder utuh atau memecah isinya.
C. Widget Area (Bawah Composer)
Latest Activity: List horizontal (carousel) kartu kecil berisi koleksi data terakhir yang aktif.
Quick Stats: 3 Kartu kecil berisi total responden hari ini.

LAYAR 2: FITUR MODUL (Voting / Opinion / Forum)
Contoh kasus: User mengklik menu "Voting / Polling".
A. Header & Limit Indicator
Judul: "Voting & Polling".
Free Plan Limit Bar: Di sebelah judul, ada progress bar tipis.
Teks: "Active Collections: 2/3 (Free Plan)".
Warna: Jika 3/3, bar berubah merah dan muncul tombol kecil "Upgrade".
B. Folder Management (Bagian Atas)
Tampilan Grid ikon Folder (Seperti MacOS Finder).
Folder memiliki label nama (misal: "Event Desember").
Tombol "Create Folder": Ikon Folder dengan tanda Plus.
C. Activity List (Bagian Bawah - Di dalam Folder)
Jika user mengklik Folder, tampilan masuk ke dalam (Breadcrumb: Voting > Event Desember).
Tombol Utama (CTA): "New Activity" (Besar, Gradient Purple).
List Data: Tabel daftar voting yang sudah dibuat (Judul | Tipe | Status | Responden | Tanggal).

LAYAR 3: TEMPLATE GALLERY (The Creation Modal)
Muncul saat user klik "New Activity". Ini harus visual, jangan cuma teks.
A. Modal Window
Overlay gelap (Blur background).
Jendela kaca besar di tengah.
B. Content: The Gallery
Judul: "Pilih Tipe Voting".
Grid Card (Pilihan Subbab):
Setiap kartu mewakili 1 Subbab (Single Choice, Rating, Ranking, Quick Feedback).
Isi Kartu:
Ikon 3D Besar/Ilustrasi: Misal untuk "Rating", gambar 3 bintang melayang 3D.
Judul: "Rating Scale".
Deskripsi: "Cocok untuk survei kepuasan."
Hover Effect: Kartu terangkat (levitate) dan border bersinar saat mouse lewat.

LAYAR 4: CONFIGURATION & PREVIEW (Split Screen)
User sudah memilih template (misal: Rating Scale). Sekarang mengeditnya.
Layout: Terbagi Dua (Kiri: Editor, Kanan: Live Preview)
A. Panel Kiri: Konfigurasi (Formulir)
Input Judul Pertanyaan.
Tab Settings (Accordion):
General: Ikon Bintang/Hati, Skala 1-5 atau 1-10.
Restrictions: Toggle "Allow Anonymous", "Limit Character" (untuk opini).
Advanced (Regex): Input field dengan ikon tanda tanya (?) untuk tooltip bantuan.
Lifecycle: Toggle "Manual Close" & "Auto-Close Timer".
B. Panel Kanan: Live Preview (Tampilan HP)
Mockup bingkai HP (Phone Frame).
Di dalamnya menampilkan bagaimana form akan terlihat oleh audiens secara real-time.
Saat admin mengetik judul di kiri, teks di mockup kanan berubah.

LAYAR 5: PUBLIC VIEW (Tampilan Audiens)
Tampilan di HP responden.
A. Clean Interface
Background: Polos/Gradient sangat halus (agar fokus).
Card Tengah:
Logo votim kecil di atas (atau Logo Pro).
Pertanyaan Besar.
Input Element: (Misal: 5 Bintang yang bisa diklik).
Tombol "Submit" besar.
Feedback: Setelah submit, animasi "Confetti" halus + Pesan "Terima kasih".

LAYAR 6: REPORT RESULT (Insight Studio Output)
Setelah Admin klik "Generate" di Insight Studio.
A. Layout Dokumen (PDF Preview)
Tampilan seperti kertas A4 digital di tengah layar.
Header: Judul Laporan & Tanggal.
AI Summary Box: Area dengan background berbeda (misal: ungu sangat muda transparan) berisi teks narasi. Ada ikon "Sparkles" menandakan ini AI.
Charts:
Chart Utama: Grafik Batang/Pie Chart (menggunakan library Chart.js tapi di-styling CSS agar terlihat modern).
Word Cloud: Awan kata dengan warna-warni sesuai tema.
Action Bar (Floating di bawah): Tombol "Download PDF", "Share Link".

4. ALUR INTERAKSI (MICRO-INTERACTIONS)
Agar tidak membosankan (static), tambahkan ini:
Loading State (AI Processing):
Jangan gunakan spinner putar biasa.
Gunakan animasi "Breathing Gradient" pada kartu Insight Studio saat AI sedang berpikir. Tulisan: "AI is connecting the dots..."
Folder Opening:
Saat folder diklik, ia tidak sekadar pindah halaman. Folder tersebut "zoom in" (membesar) dan memudar, lalu isinya muncul (fade in). Transisi mulus (0.3s).
Hover Cards:
Semua elemen yang bisa diklik memiliki efek glass reflection (seperti cahaya lewat di atas kaca) saat di-hover.

Rangkuman untuk Desainer/Developer: Dokumen ini menggabungkan struktur data "Folder" yang telah kita sepakati dengan estetika "Spatial Glass". Tampilannya bersih (SaaS standar) namun memiliki delight visual melalui elemen 3D minimalis dan efek kaca, sesuai dengan permintaan Anda untuk menghindari kesan membosankan. Batasan Free Plan ditempatkan strategis di titik pembuatan (Bab Fitur) untuk mendorong upgrade, sementara Insight Studio dibiarkan bersih sebagai pusat nilai (value center).