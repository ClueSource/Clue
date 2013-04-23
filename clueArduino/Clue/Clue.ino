char line[100],sentence[10],ch,time[10],lat[15],stat[5],lon[15],sp[10],alt[50];
String str;
int flag,n;
int led = 13;
void setup()
{
  Serial.begin(9600);
  Serial1.begin(9600);
  pinMode(led,OUTPUT);
  digitalWrite(led,HIGH);
  Serial1.println("AT");
  delay(2000);
  Serial1.println("AT+CMGF=1");
  delay(2000);
}

void loop()
{
  delay(10000);
  do{
    flag=1;
    
    /*  Reading Data from GPS Module  */
    
    do{
      while(Serial.read()!='$');
      Serial.readBytes(sentence,6);
      str=String(sentence);
      if(str=="GPRMC,")
        flag=0;
    }while(flag);
    Serial.readBytes(time,6);

    while(Serial.read()!=',');
    n=Serial.readBytesUntil(',',stat,5);
    stat[n]='\0';
    str=String(stat);

    if(str=="A")
    {
      digitalWrite(led,LOW);

      n=Serial.readBytesUntil(',',lat,15);
      lat[n]='\0';

      while(Serial.read()!=',');
      n=Serial.readBytesUntil(',',lon,15);
      lon[n]='\0';

      while(Serial.read()!=',');
      n=Serial.readBytesUntil(',',sp,10);
      sp[n]='\0';
      
      flag=1;
      do{
        while(Serial.read()!='$');
        Serial.readBytes(sentence,6);
        str=String(sentence);
        if(str=="GPGGA,")
          flag=0;
      }while(flag);
      for(n=0;n<8;++n)
         while(Serial.read()!=',');
      n=Serial.readBytesUntil(',',alt,50);
      alt[n]='\0';
      
      /* Sending GPS data to WebClient via sms using GSM Module */
      
      Serial1.println("AT+CMGS=\"9266592665\"");
      delay(2000);
      Serial1.print("@clue arduino during presentation ");
      Serial1.print(lat);
      Serial1.print(" ");
      Serial1.print(lon);
      Serial1.write(26);
      delay(2000);
    }
  }while(str=="V");
    delay(1000);
    while(1);
}
