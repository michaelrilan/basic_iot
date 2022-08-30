/**
   BasicHTTPSClient.ino

    Created on: 20.08.2018

*/

#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <ESP8266HTTPClient.h>

#include <WiFiClientSecureBearSSL.h>
// Fingerprint for demo URL, expires on June 2, 2021, needs to be updated well before this date

ESP8266WiFiMulti WiFiMulti;

int LED_id = 1;                  //Just in case you control more than 1 LED
    
             //Text data to send to the server
unsigned int Actual_Millis, Previous_Millis;
int refresh_time = 200;               //Refresh rate of connection to website (recommended more than 1s)


int LED = D8;                          //Connect LED on this pin (add 150ohm resistor)


void setup() {

  Serial.begin(115200);
  // Serial.setDebugOutput(true);

  Serial.println();
  Serial.println();
  Serial.println();
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("RILAN_ZTE_2.4G", "Escanor_7th");
    delay(10);
  Serial.begin(115200);                   //Start monitor
  pinMode(LED, OUTPUT);                   //Set pin 2 as OUTPUT
  //digitalWrite(LED, HIGH);

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
}
  Actual_Millis = millis();               //Save time for refresh loop
  Previous_Millis = Actual_Millis; 
}

void loop() {
  // wait for WiFi connection
  Actual_Millis = millis();
  if(Actual_Millis - Previous_Millis > refresh_time){
    Previous_Millis = Actual_Millis;  
  if ((WiFiMulti.run() == WL_CONNECTED)) {
  
    std::unique_ptr<BearSSL::WiFiClientSecure>client(new BearSSL::WiFiClientSecure);

    
    // Or, if you happy to ignore the SSL certificate, then use the following line instead:
     client->setInsecure();

    HTTPClient https;
    String data_to_send = "id=1";
    Serial.print("[HTTPS] begin...\n");
    https.begin(*client, "https://iotledzxc.000webhostapp.com/esp8266_update.php");   // HTTPS
    https.addHeader("Content-Type", "application/x-www-form-urlencoded");
      Serial.print("[HTTPS] POST...\n");
      // start connection and send HTTP header
      Serial.println(data_to_send);
      int httpCode = https.POST(data_to_send);   

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTPS] POST... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String response_body = https.getString();                                //Save the data comming from the websi
          response_body.trim();
          Serial.print("Server reply: ");                                         //Print data to the monitor for debug
          Serial.println(response_body);
          if(response_body == "0"){
            digitalWrite(LED, LOW);
            }
         else if(response_body == "1"){
            digitalWrite(LED, HIGH);
          }
          else {
            Serial.println("andito ako tanga");
            
            }  
        }
      } else {
        Serial.printf("[HTTPS] POST... failed, error: %s\n", https.errorToString(httpCode).c_str());
      }

      https.end();

  }
}
}
