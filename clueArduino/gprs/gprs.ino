char cmd[100],ch[3]="26",c=26;
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
    //delay(2000);
  Serial1.println("AT");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CGATT=1");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CGDCONT=1,\"IP\",\"bsnlnet\"");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CDNSCFG=\"208.67.222.222\",\"208.67.222.222\"");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CSTT=\"bsnlnet\",\"9400356115\",\"9400356115\"");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIICR");
  delay(5000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIFSR");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("AT+CIPSTATUS");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  /*
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial1.println("");
  delay(1000);
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
