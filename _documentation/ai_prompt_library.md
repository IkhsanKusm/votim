8.3. AI PROMPT LIBRARY (JSON FORMAT)

Diperbarui dengan instruksi Deteksi Bahasa dan Output JSON Murni.

8.3.1. System Instruction Global

Ini adalah instruksi "kunci" yang dikirim di setiap request untuk memastikan format JSON dan bahasa yang tepat.
{
  "role": "system",
  "content": "Anda adalah mesin analisis data JSON-to-JSON untuk votim. TUGAS: 1) Terima input array data. 2) DETEKSI BAHASA dominan (Indo/Inggris). 3) Output HANYA JSON valid. JANGAN gunakan markdown. JANGAN sertakan data pribadi."
}
8.3.2. Prompt: Batch Analysis (Opini & Komplain)

Untuk Subbab: Open Opinion, Complaint System.
{
  "task": "analyze_opinion_batch",
  "parameters": {
    "temperature": 0.2,
    "max_output_tokens": 2000
  },
  "input_context": "List opini/komplain: BATCH_JSON_ARRAY",
  "instruction": "Analisis setiap item. 1) Tentukan sentimen. 2) Ekstrak 1 keyword utama (benda/topik). 3) Buat ringkasan global dari seluruh batch.",
  "expected_output_schema": {
    "items": [
      {
        "id": "Int",
        "sentiment": "String (positif|negatif|netral)",
        "keyword": "String"
      }
    ],
    "global_summary": "String (Ringkasan tren masalah)",
    "dominant_sentiment": "String"
  }
}
8.3.3. Prompt: Report Composer (Insight Studio)

Untuk menggabungkan beberapa Folder/Subbab menjadi satu narasi.
{
  "task": "generate_executive_report",
  "parameters": {
    "temperature": 0.7,
    "max_output_tokens": 1000
  },
  "input_context": "Statistik gabungan: AGGREGATED_DATA_JSON",
  "instruction": "Bertindak sebagai Analis Data. Tulis 'Executive Summary' yang menghubungkan titik-titik korelasi antar data yang diberikan. Berikan rekomendasi aksi.",
  "expected_output_schema": {
    "report_title": "String",
    "executive_summary": "String (Paragraf narasi)",
    "key_takeaway": "String (1 kalimat rekomendasi)"
  }
}
8.3.4. Prompt: AI Co-Moderator (Forum - Pro Only)

Untuk moderasi real-time.
{
  "task": "moderate_chat_message",
  "parameters": {
    "temperature": 0.0,
    "max_output_tokens": 100
  },
  "input_text": "MESSAGE_CONTENT",
  "instruction": "Analisis pesan ini. Apakah mengandung Hate Speech, SARA, atau Ancaman Fisik? Jawab JSON.",
  "expected_output_schema": {
    "is_flagged": "Boolean",
    "category": "String (hate_speech|safe|spam)",
    "confidence_score": "Float (0.0 - 1.0)"
  }
}
8.3.5. Prompt: Open Forum Topic Extraction (Baru)

Untuk menghasilkan Word Cloud dari riwayat chat forum.
{
  "task": "extract_forum_topics",
  "parameters": {
    "temperature": 0.3,
    "max_output_tokens": 500
  },
  "input_context": "Transkrip chat: CHAT_BATCH_TEXT",
  "instruction": "Abaikan kata sapaan/basa-basi. Ekstrak 10 topik atau kata benda yang paling sering dibahas secara substansial.",
  "expected_output_schema": {
    "topics": [
      {
        "text": "String",
        "frequency_score": "Int (1-100)"
      }
    ]
  }
}
