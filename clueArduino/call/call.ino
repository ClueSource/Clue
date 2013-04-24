char string[10],ch;
void setup()
{
  Serial1.begin(9600);
  Serial.begin(9600);
}

void loop()
{
 
 Serial1.println("A\r");
 delay(200);
 Serial1.println("AT\r");
 delay(200);
 while(!Serial1.readBytes(string,Serial1.available()));
 Serial.println(string);
 memset(string,'\0',10);
  Serial.println("Going to call...");
  Serial1.println("ATD + +9446391493;");
  while(!Serial1.readBytes(string,Serial1.available()));
  delay(5000);
  Serial1.println();
  Serial.println(string);
  Serial.println("Finished");
 // delay(2000);
  memset(string,'\0',10);
 // Serial.flush();
  //Serial.println("Hello, World!");
  //delay(2000);
  do{
  if (Serial.available() > 0)
      ch=Serial.read();
  }while(ch!='y');
}
