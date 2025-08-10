# 📊Dashboard-IoT-V0

![ESP32](https://img.shields.io/badge/Board-ESP32-blue?logo=espressif)
![Arduino](https://img.shields.io/badge/Arduino-IDE-green?logo=arduino)
![Status](https://img.shields.io/badge/Status-Development-orange)

Proyek ini adalah **Dashboard IoT sederhana** untuk memonitor data sensor seperti suhu, kelembapan, dan ketinggian air.  
Data yang dikirim masih **dummy** (random) menggunakan `random()` di kode Arduino, sehingga cocok untuk simulasi dan pengembangan awal.

---

## 🚀 Fitur
- Mengirim data suhu 🌡️, kelembapan ❄️, dan ketinggian air 💧 dari **ESP32** ke server.
- Data dikirim setiap 1 detik.
- Status koneksi WiFi dikirim otomatis ke server.
- Cocok untuk pengujian tanpa sensor fisik.

---

## 🛠️ Kebutuhan
- **Hardware**:
  - ESP32 Development Board
  - Kabel USB untuk flashing
- **Software**:
  - Arduino IDE (dengan Board Manager untuk ESP32)
  - Server lokal/XAMPP atau hosting online dengan endpoint PHP
