//libary
#include <SoftwareSerial.h>
#include <stdlib.h>
#define DEBUG true
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <SD.h>
#include <DS3231.h>
//RTC
DS3231  rtc(SDA, SCL);
Time waktu;
//buzzer
int buzzer = A1;
//debitair
byte sensorInterrupt = 0;  // 0 = digital pin 2
byte sensorPin       = 2;
float calibrationFactor = 4.5;
volatile byte pulseCount;
float flowRate;
unsigned int flowMilliLitres;
int totalMilliLitres;
unsigned long oldTime;
unsigned long uploadWaktu;
//ph air
#define SensorPin 0          //pH meter Analog output to Arduino Analog Input 0
unsigned long int avgValue;  //Store the average value of the sensor feedback
float b;
int buf[10],temp;
//lcd
LiquidCrystal_I2C lcd(0x3F ,2,1,0,4,5,6,7,3, POSITIVE);
//SD
File dataFile;
String line2;
unsigned long waktuHapus;
//wifi
SoftwareSerial ser(9, 10); // RX, TX

void setup()
{
  delay(5000);   
  Serial.begin(115200);
  ser.begin(115200);
   //SDcard
   if (!SD.begin(4)) {
    Serial.println("initialization failed!");
    return;
  }
 
  dataFile = SD.open ("dbair.txt", FILE_READ);
  if (dataFile) 
  {
    while (dataFile.available())
    {
      String  line_str = dataFile.readStringUntil(',');  // string lavue reading from the stream - from , to , (coma to comma) 
      int line = line_str.toInt(); 
          if (line != 0)                                // checking for the last NON-Zero value
              {
                 line2 = line;                          // this really does the trick
              }   
    }   
      dataFile.close();
   }
  //debit air
  pinMode(sensorPin, INPUT);
  digitalWrite(sensorPin, HIGH);
  pulseCount        = 0;
  flowRate          = 0.0;
  flowMilliLitres   = 0;
  totalMilliLitres  = atoi(line2.c_str());
  oldTime           = 0;
  attachInterrupt(sensorInterrupt, pulseCounter, FALLING);
  
  //buzzer
 pinMode (buzzer, OUTPUT);
   
  //ph air
  pinMode(13,OUTPUT);  
  //lcd
  lcd.begin (16,2); 
  //RTC
  rtc.begin();  
  waktu = rtc.getTime();
  uploadWaktu = waktu.min;
  //wifi
 //connectWifi();
 //Serial.print("TCP/UDP Connection...\n");
 //sendCommand("AT+CIPMUX=0\r\n",2000,DEBUG); // reset module
// delay(5000);
}


void loop()
{
  delay(500);
  waktu = rtc.getTime();
//   debit air
  if ((millis() - oldTime) > 1000)   // Only process counters once per second
  {
    detachInterrupt(sensorInterrupt);
   flowRate = ((1000.0 / (millis() - oldTime)) * pulseCount) / calibrationFactor;
    oldTime = millis();
    flowMilliLitres = (flowRate / 60) * 1000;
    totalMilliLitres += flowMilliLitres;
    pulseCount = 0;
    attachInterrupt(sensorInterrupt, pulseCounter, FALLING);
  }
//  ph
  for(int i=0;i<10;i++)       //Get 10 sample value from the sensor for smooth the value
  { 
    buf[i]=analogRead(SensorPin);
    delay(10);
  }
  for(int i=0;i<9;i++)        //sort the analog from small to large
  {
    for(int j=i+1;j<10;j++)
    {
      if(buf[i]>buf[j])
      {
        temp=buf[i];
        buf[i]=buf[j];
        buf[j]=temp;
      }
    }
  }
  avgValue=0;
  for(int i=2;i<8;i++)                      //take the average value of 6 center sample
    avgValue+=buf[i];
  float phValue=(float)avgValue*5.0/1024/6; //convert the analog into millivolt
  phValue=3.5*phValue;                      //convert the millivolt into pH value
  String lcdph = "PH    : ";
  lcdph += phValue;
  lcdph += "";
  String debitair = "Debit : ";
  debitair += totalMilliLitres;
  debitair += " mL";
  lcd.setCursor(0, 0); //baris pertama   
  lcd.print(lcdph);   
  lcd.setCursor(0, 1); //baris dua 
  lcd.print(debitair); 
  if((phValue > 8)||(phValue < 6.5)){
    unsigned char i ;// define variables
    for (i = 0; i <80; i++) // Wen a frequency sound
    {
      digitalWrite (buzzer, 250) ;// send voice
      delay (1) ;// Delay 1ms
      digitalWrite (buzzer, 0) ;// do not send voice
      delay (1) ;// delay ms
    }
    for (i = 0; i <100; i++) // Wen Qie out another frequency sound
    {
      digitalWrite (buzzer, 250) ;// send voice
      delay (2) ;// delay 2ms
      digitalWrite (buzzer, 0) ;// do not send voice
      delay (2) ;// delay 2ms
    }
  }
 
  //SD
   if ((millis() - waktuHapus) >10000)   // Only process counters once per second
  {
    waktuHapus = millis();
    SD.remove("dbair.txt");
    dataFile = SD.open ("dbair.txt", FILE_WRITE);
    if (dataFile) {
      dataFile.println(totalMilliLitres);
      // close the file:
     dataFile.close();
    } 
  }
  
  //Kirim data
  if((waktu.min > uploadWaktu)  && ((waktu.sec >= 0)&&(waktu.sec <=20)))
  {
    delay(5000);
    sendDataID(phValue,totalMilliLitres);
    delay(5000);
  }
 //if((waktu.min == 7 )  && ((waktu.sec >= 0)&&(waktu.sec <=20)))
 // {
  // delay(5000);
  // sendDataID(phValue,totalMilliLitres);
  // delay(5000);
 // }
  
}

void sendDataID(float dataPh,int dataDebit) {
  String cmd = "AT+CIPSTART=\"TCP\",\"";
  
  cmd += "tirtadahaga.com";
  cmd += "\",80\r\n";
  sendCommand(cmd,1000,DEBUG);
  delay(5000);
  
  String cmd2 = "GET /reciver.php?ph="; // Link ke web
  cmd2 += dataPh  ;
  cmd2 += "&debit=";
  cmd2 += dataDebit;
  cmd2 += " HTTP/1.1\r\n";
  cmd2 += "Host: iot.tirtadahaga.com\r\n\r\n\r\n"; // Host
  String pjg="AT+CIPSEND=";
  pjg += cmd2.length();
  pjg += "\r\n";
    
  sendCommand(pjg,1000,DEBUG);
  delay(500);
  sendCommand(cmd2,1000,DEBUG);
  delay(5000);
}

String sendCommand(String command, const int timeout, boolean debug) {
  String response = ""; 
  ser.print(command); // send the read character to the esp8266  
  long int time = millis();
  while( (time+timeout) > millis()) {
    while(ser.available()) {
      // The esp has data so display its output to the serial window 
      char c = ser.read(); // read the next character.
      response+=c;
    }  
  }
      
  if(debug) {
    Serial.print(response);
  }   
  return response;
}




void connectWifi() {
  //Set-wifi
  Serial.print("Restart Module...\n");
  sendCommand("AT+RST\r\n",2000,DEBUG); // reset module
  delay(5000);
  Serial.print("Set wifi mode : STA...\n");
  sendCommand("AT+CWMODE=1\r\n",1000,DEBUG); // configure as access point
  delay(5000);
  Serial.print("Connect to access point...\n");
  sendCommand("AT+CWJAP=\"killingbond\",\"bandung123\"\r\n",3000,DEBUG);
  delay(5000);
  Serial.print("Check IP Address...\n");
  sendCommand("AT+CIFSR\r\n",1000,DEBUG); // get ip address
  delay(5000);
}

void pulseCounter()
{
  // Increment the pulse counter
  pulseCount++;
}

