char cmd[30];
int i;
void setup()
{
  Serial.begin(9600);

}

void loop()
{
    Serial1.println("AT\r");
  delay(200);
  Serial1.println("ATE1\r");
  delay(200);
  i=0;
  memset(cmd,'\0',30);
  while(!Serial.readBytes(cmd,25));
  Serial1.println(cmd);
  memset(cmd,'\0',30);
  while(!Serial1.readBytes(cmd,25));
  Serial.println(cmd);
  do{
    if(!(Serial.read()=='y'))
      i=1;
  }while(!i);
}
