
char ch=26;
void setup()
{
  Serial1.begin(9600);
  Serial.begin(9600);
  Serial1.println("AT");
  delay(2000);
  Serial1.println("AT+CMGF=1");
  delay(2000);
  Serial1.println("AT+CMGS=\"9446391493\"");
  delay(2000);
  Serial1.println("Hello world!!!");
  Serial1.println(ch);
 //Serial1.write(26);
  delay(2000);
}

void loop()
{
}
