char cmd[100];
int n;
void setup() {
  Serial1.begin(9600); 
  Serial.begin(9600);
}
void loop() {
  memset(cmd,'\0',100);
  if(n=Serial.available()) {
  // the GPRS baud rate // the GPRS baud rate
    Serial.readBytes(cmd,n);
    Serial1.println(cmd); 
  }
  else if(n=Serial1.available()) 
  {
    Serial1.readBytes(cmd,n);
    Serial.println(cmd);
  }
}
