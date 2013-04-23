package kj.com.example.clue;

import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ToggleButton;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

public class ToServer extends Activity {
	LocationManager lm;
	LocationListener gps= new MyGPSLocation();
	TextView gpsLat,gpsLon;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.to_server);
		gpsLat=(TextView)findViewById(R.id.textView2);
		gpsLon=(TextView)findViewById(R.id.textView3);
	}
	
	public void startTransmission(View view) {
	    boolean on = ((ToggleButton) view).isChecked();
	    
	    if (on) {
	    	try{
	    	lm=(LocationManager)getSystemService(LOCATION_SERVICE);
			lm.requestLocationUpdates(LocationManager.GPS_PROVIDER, 10000, 0, gps);
	        Toast.makeText(getBaseContext(), "GPS data is send to Server", Toast.LENGTH_LONG).show();
	    	}
	    	catch(Exception e){
	    		Toast.makeText(getBaseContext(), e.toString(), Toast.LENGTH_LONG).show();
	    	}
	    } else {
	    	lm.removeUpdates(gps);
	    	Toast.makeText(getBaseContext(), "Data transmission stopped", Toast.LENGTH_LONG).show();
	    }
	}
	class MyGPSLocation implements LocationListener
	{

		public void onLocationChanged(Location location) {
			if(location!=null){
				double latitude,longitude;
				String lati,longi,alti,spd,tim;
				
				latitude=location.getLatitude();
				longitude= location.getLongitude();
				
				lati=String.valueOf(latitude);
				longi=String.valueOf(longitude);
				alti=String.valueOf(location.getAltitude());
				spd=String.valueOf(location.getSpeed());
				tim=String.valueOf(location.getTime());
				
				
				gpsLat.setText("Latitude: "+latitude);
				gpsLon.setText("Longitude: "+longitude);
				
				HttpClient httpclient = new DefaultHttpClient();
		        HttpPost httppost = new HttpPost("http://www.webclient.0fees.net/pages/phoneToDb.php");

		        try {
		            List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(7);
		            nameValuePairs.add(new BasicNameValuePair("devid", "HTC Explorer"));
		            nameValuePairs.add(new BasicNameValuePair("lat", lati));
		            nameValuePairs.add(new BasicNameValuePair("lon", longi));
		            nameValuePairs.add(new BasicNameValuePair("alt", alti));
		            nameValuePairs.add(new BasicNameValuePair("spd", spd));
		            nameValuePairs.add(new BasicNameValuePair("time", tim));
		            httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

		            HttpResponse response = httpclient.execute(httppost);
		            
					Toast.makeText(getBaseContext(), response.toString(), Toast.LENGTH_LONG).show();

		        } catch (Exception e) {
		        	Toast.makeText(getBaseContext(), e.toString(), Toast.LENGTH_LONG).show();
		        }
			}
		}

		public void onProviderDisabled(String provider) {
			// TODO Auto-generated method stub
			
		}

		public void onProviderEnabled(String provider) {
			// TODO Auto-generated method stub
			
		}

		public void onStatusChanged(String provider, int status, Bundle extras) {
			// TODO Auto-generated method stub
			
		}
		
	}/*
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}*/

}
