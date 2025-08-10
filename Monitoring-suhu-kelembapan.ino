#include "WiFi.h"
#include "HTTPClient.h"


const char* ssid = "Indonesia";
const char* password = "sejahteramaju077";
const char* serverName = "http://192.168.1.9/IoTlearn/wifi_status.php";
const char* host = "192.168.1.9";
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  Serial.println("Connecting to WiFi...");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.println("Connected!✅");
  Serial.print("IP ESP32: ");
  Serial.println(WiFi.localIP());
}
void dataSensor(){
  float suhu = random(0, 5000)/ 100;
  int kelembapan = random(0, 10000) / 100;
  int ketinggian = random(0, 10000) / 100;
  Serial.println("🌡️Suhu: " + String(suhu));
  Serial.println("❄️Kelembapan: " + String(kelembapan));
  Serial.println("💧Ketinggian Air: " + String(ketinggian));

  WiFiClient client;
  if(!client.connect(host, 80)){
    Serial.println("Can't Connected❌");
    return;
  }

  String Link;
  HTTPClient http;
  Link = "http://"+ String(host)+"/IoTlearn/sendData.php?suhu=" + String(suhu) +  "&kelembapan=" + String(kelembapan) + "&ketinggian=" + String(ketinggian);
  http.begin(Link);
  http.GET();
  //Serial.println("URL: " + Link);
  String respon = http.getString();
  Serial.println(respon);
  http.end();
  delay(1000);
}

void sendWiFistatus(){
  if(WiFi.status() == WL_CONNECTED){
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String httpReqData = "status=connected";
    int httpResponse = http.POST(httpReqData);
    Serial.println("Status: Connected");
    http.end();
  } else{
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String httpReqData = "status=not_connected";
    int httpResponse = http.POST(httpReqData);
    Serial.println("Status: Not Connected");
    http.end();

  }
}

void loop() {
  sendWiFistatus();
  dataSensor();
}

