package com.example.notificationandserivce;

import android.app.Activity;
import android.app.NotificationManager; 
import android.os.Bundle;
public class NotificationView extends Activity
{

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.notification);
		
		NotificationManager nm = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
		
		nm.cancel(getIntent().getExtras().getInt("notificationID"));
	}
}