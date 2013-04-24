char cmd[100],ch[3]="26",c=26;
String test,postdata="value=hello";
int f=1;
void setup()
{
  Serial1.begin(9600);
  Serial.begin(9600);
  Serial1.println("AT");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CPIN?");
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
  Serial1.println("AT+CSTT=\"bsnlnet\"");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIICR");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIFSR");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIPSTART=\"TCP\",\"www.webclient.0fees.net\",80");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
}

void loop()
{
  
  delay(2000);
  
  Serial1.println("AT+CIPSEND");
  delay(3000);
  Serial1.write("POST /pages/toPost.php HTTP/1.0\r\n");
  delay(2000);
  Serial1.write("Host: www.webclient.0fees.net\r\n");
  delay(2000);
  Serial1.println("User-Agent: Arduino/1.0");
  delay(2000);
  Serial1.write("Content-Type: application/x-www-form-urlencoded\r\n");
  delay(2000);
  Serial1.print("Content-Length: ");
  Serial1.println(postdata.length());
  delay(2000);
//  Serial1.write("Connection: Keep-Alive\r\n");
//  delay(2000);
//  Serial1.write("Accept: */*\r\n");
//  delay(2000);
  Serial1.println();
  delay(2000);
  Serial1.write(postdata);
  delay(2000);
  //Serial1.println("hello");
  //delay(1000);
  Serial1.write(26);
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  /*
  //Serial1.println();
  Serial1.println("GET /pages/toDatabase.php?value=\"hello\" HTTP/1.1");
  delay(2000);
  Serial1.println("Host: www.webclient.0fees.net");
  delay(2000);
  Serial1.println("Connection: Keep-Alive");
  delay(2000);
  Serial1.println(c);
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
 */
  //f=0;
  //}
 //Serial1.flush();
  //Serial1.readBytes(cmd,Serial1.available());
  //Serial.println(cmd);
   
 /* do{
  if (Serial.available() > 0)
      ch=Serial.read();
  }while(ch!='y');
  */
}
