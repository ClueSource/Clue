int flag=1;
char cmd[20];
void setup()
{
  Serial.begin(9600);
  Serial1.begin(9600);
  Serial.println("AT");
  delay(100);
  Serial1.println("AT+CMGF=1\r");
  Serial.println("AT+CMGF=1\r");
  delay(3000);
}

void loop()
{
  if(flag)
  {
  //Serial1.println("AT\r");
 
  /*
  Serial1.print("AT+CSCS=\"GSM\"\r");
  delay(100);
  Serial1.println("AT+CSCA=\"9440099997\", 145");
  delay(100);
  Serial1.print("AT+CSMP=17, 167, 0, 240\r");
  delay(100);
  */
  Serial1.println("AT + CMGS = \"9446391493\"");
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  delay(3000);
  Serial1.println("Hello world!");
  Serial.println("A test message : Hello world!");
  delay(3000);
  Serial1.println((char)26);
  Serial1.readBytes(cmd,Serial1.available());
  Serial.println(cmd);
  Serial.println("Finished!");
  delay(1000);
  Serial1.println();
  flag=0;
  }
}
