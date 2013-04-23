char cmd[100],ch[3]="26",c=26;
String test,postdata="value=hello";
int f=1;
void setup()
{
  Serial1.begin(9600);
  Serial.begin(9600);
}

void loop()
{
  /*Serial.write("AT");
  Serial1.write("ATE");
  Serial1.write("AT+CPOWD=1");
  Serial.write("AT+CPOWD=1");
  Serial1.readBytes(cmd,Serial1.available());
  Serial.write(cmd);*/
  if(f){

  Serial1.println("AT+CIPSTART=\"TCP\",\"www.webclient.0fees.net\",\"80\"");
  delay(2000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  delay(5000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIPSEND=");
  delay(5000);
  Serial1.println("POST /pages/toDatabase.php HTTP/1.1");
  delay(2000);
  Serial1.println("Host: www.webclient.0fees.net\"");
  delay(2000);
  Serial1.println("User-Agent: Arduino/1.0");
  delay(2000);
  Serial1.println("Connection: close");
  delay(2000);
  Serial1.print("Content-Length: ");
  delay(2000);
  Serial1.println(postdata.length());
  delay(2000);
  Serial1.println();
  delay(2000);
  Serial1.println(postdata);
  delay(2000);
  Serial1.println(c);
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
  f=0;
  }
 //Serial1.flush();
  //Serial1.readBytes(cmd,Serial1.available());
  //Serial.println(cmd);
   
 /* do{
  if (Serial.available() > 0)
      ch=Serial.read();
  }while(ch!='y');
  */
}
