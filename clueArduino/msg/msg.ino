char ch=26;
void setup()
{
  Serial.begin(9600);
  Serial1.begin(9600);
}

void loop()
{
  Serial1.println("AT");
  delay(2000);
  Serial1.println("AT+CMGF=1");
  delay(2000);
  Serial1.println("AT+CMGS=\"9266592665\"");
  delay(2000);
  Serial1.println("@clue testedfromarduino");
  //Serial1.println(ch);
  Serial1.write(26);
  delay(2000);
  while(1);
}
