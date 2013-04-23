char cmd[5000],ch[3]="26",c=26;
char to_post[]="POST /pages/toPost.php HTTP/1.1\nHost: www.njavallil.com\nContent-Type: application/x-www-form-urlencoded\nContent-Length: 11\n\nvalue=hello\n\n";
char to_get[]="GET /Clue/pages/toDatabase.php?value=clue HTTP/1.0\n\n";
void setup()
{
  Serial1.begin(9600);
  Serial.begin(9600);
  Serial1.println("A");
  delay(2000);
  Serial1.println("AT");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  /*Serial1.println("AT+CPIN?");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CSQ");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CREG?");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CGATT?");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  */
  Serial1.println("AT+CGDCONT=1,\"IP\",\"bsnlnet\",\"8.8.8.8\",0,0");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CSTT=\"bsnlnet\"");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIICR");
  delay(5000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIFSR");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  
  Serial1.println("AT+CIPSHUT");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIPSTART=\"TCP\",\"www.njavallil.com\",\"80\"");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  delay(5000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial.println(to_post);
  Serial.println("Going to send");
  Serial1.println("AT+CIPSEND");
  delay(3000);
  //Serial1.println(to_get);
  //Serial1.write((const uint8_t*)to_post,strlen(to_post));
  Serial1.println("GET /Clue/pages/toDatabase.php?value=clue HTTP/1.0\n");
  Serial1.println("Host: www.njavallil.com");
  //erial1.println();
  Serial1.println(c);
  delay(5000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
}

void loop()
{
 
}
