8.2. SKEMA DATABASE (ERD) & STRUKTUR JSON

Versi ini menggunakan konsep "Folder" dan "Activity" serta mencakup strategi Indexing untuk Auto-Purge.

8.2.1. Grup Pengguna (Auth & Plan)
Table: users
id (PK, BigInt)
display_name (String) - Display Name
email (String, Unique)
password (String)
google_id (String, Nullable)
plan_type (Enum: 'free', 'pro')
subscription_ends_at (Timestamp, Nullable)
created_at, updated_at
8.2.2. Grup Koleksi Data (Folder & Subbab)
Table: folders (Wadah Utama / BAB)
id (PK, BigInt), user_id (FK → users.id)
module (Enum: 'voting', 'opinion', 'forum') - Penanda BAB
name (String) - Nama Folder (misal: "Evaluasi Q3")
created_at - Acuan utama Auto-Purge Folder Kosong
Table: activities (Item Fitur / SUBBAB)
id (PK, BigInt), folder_id (FK → folders.id)
type (Enum: 'single_choice', 'rating', 'quick_feedback', 'complaint', 'town_hall', etc)
title (String), slug (String, Unique, Indexed) - Link Publik
status (Enum: 'active', 'closed'), closed_at (Timestamp) - Acuan Auto-Close
settings (JSONB) - Menyimpan konfigurasi fleksibel
Contoh JSON Settings (Voting):
{ "options": ["Opsi A", "Opsi B"], "manual_close": false, "allow_anonymous": true }
Contoh JSON Settings (Opini/Komplain):
{ "char_limit": 500, "regex_filter": "^[a-zA-Z0-9 ]+$", "complaint_categories": ["Pelayanan", "Fasilitas"] }
8.2.3. Grup Data Mentah (Transactional)
Table: responses (Hasil Input User)
id (PK, BigInt), activity_id (FK → activities.id)
value_data (JSONB) - Menyimpan jawaban user
Isi JSON (Rating): {"rating": 5}
Isi JSON (Komplain): {"category": "Fasilitas", "text": "AC Panas"}
Isi JSON (Quick Feedback): {"feedback": "thumbs_up"}
is_processed_by_ai (Boolean, Default: False)
created_at (Indexed) - Acuan Auto-Purge Data (7 Hari)
Table: forum_messages (Chat Transcript)
id (PK, BigInt), activity_id (FK → activities.id)
sender_name (String), content (Text)
is_pinned (Boolean, Default: False), created_at (Indexed)
8.2.4. Grup Analisis AI & Laporan (Insight Engine)
Table: ai_aggregates (Cache Hasil AI)
id (PK, BigInt), activity_id (FK → activities.id)
batch_date (Date)
summary_data (JSONB) - Menyimpan hasil olahan AI (Sentiment count, Keywords list, Summary text) agar siap visualisasi
Table: report_snapshots (Cache Laporan PDF)
id (PK, UUID), user_id (FK)
file_path (String)
created_at, expires_at (Timestamp) - Acuan Cron Job penghapusan file temp (24 jam)