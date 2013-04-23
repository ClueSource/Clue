char cmd[10],ch;
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
  Serial1.println("ATD9446391493;");
  delay(1000);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
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
