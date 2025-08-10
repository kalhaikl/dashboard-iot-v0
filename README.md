📊 IoT Dashboard Monitoring
Project ini adalah Dashboard Monitoring IoT berbasis ESP32 + Web Server untuk memantau suhu, kelembapan, dan ketinggian air secara real-time melalui tampilan web yang responsif.

🚀 Fitur
Monitoring Real-Time: Suhu 🌡️, kelembapan 💨, dan level air 💧.

Status WiFi: Menampilkan apakah perangkat terhubung ke jaringan atau tidak.

UI Responsif: Tampilan dashboard dapat diakses dari HP, tablet, dan PC.

Integrasi IoT: Data dikirim dari ESP32 ke server melalui HTTP Request.

Simulasi Sensor: Menggunakan random() sebagai data dummy untuk pengujian.

🛠️ Teknologi yang Digunakan
Hardware:

ESP32

Sensor DHT / Ultrasonik (opsional, bisa diganti sesuai kebutuhan)

Software:

Arduino IDE

HTML, CSS, JavaScript (Frontend)

PHP + MySQL (Backend)

Library Arduino:

WiFi.h

HTTPClient.h

