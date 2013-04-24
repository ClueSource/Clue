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
}

void loop()
{
  do{
    flag=1;
    do{
      while(Serial.read()!='$');
      Serial.readBytes(sentence,6);
      str=String(sentence);
      if(str=="GPRMC,")
        flag=0;
    }while(flag);
    Serial.readBytes(time,6);
    //Serial1.println(time);
    while(Serial.read()!=',');
    n=Serial.readBytesUntil(',',stat,5);
    stat[n]='\0';
    str=String(stat);
    //Serial1.println(stat);
    if(str=="A")
    {
      digitalWrite(led,LOW);
      //Serial1.println("OK");
      n=Serial.readBytesUntil(',',lat,15);
      lat[n]='\0';
      //Serial1.println(lat);
      while(Serial.read()!=',');
      n=Serial.readBytesUntil(',',lon,15);
      lon[n]='\0';
      //Serial1.println(lon);
      while(Serial.read()!=',');
      n=Serial.readBytesUntil(',',sp,10);
      sp[n]='\0';
      //Serial1.println(sp);
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
      //Serial1.println(alt);
    }
  }while(str=="V");
    delay(1000);
    while(1);
}
