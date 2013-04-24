package kj.com.example.clue;

import java.util.List;

import android.os.Bundle;

import android.app.Activity;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Canvas;
import android.graphics.Point;
import android.view.Menu;

import com.google.android.maps.GeoPoint;
import com.google.android.maps.MapActivity;
import com.google.android.maps.MapController;
import com.google.android.maps.MapView;
import com.google.android.maps.Overlay;

public class DisplayMap extends MapActivity {

	MapView mapView;
	MapController mc;
	GeoPoint p;
	class MapOverlay extends com.google.android.maps.Overlay
	{

		@Override
		public boolean draw(Canvas canvas, MapView mapView, boolean shadow,
				long when) {
			// TODO Auto-generated method stub
			super.draw(canvas, mapView, shadow, when);
 			Point screenPts= new Point();
 			mapView.getProjection().toPixels(p, screenPts);
 			Bitmap bmp=BitmapFactory.decodeResource(getResources(), R.drawable.pin);
 			canvas.drawBitmap(bmp, screenPts.x-15, screenPts.y-50, null);
			return true;
		}
		
	}
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.map);
		
		mapView= (MapView)findViewById(R.id.mapView);
		//mapView.setSatellite(true);
		mc=mapView.getController();
		String coordinates[]={"9.70539584","76.6693649"};
		double lat=Double.parseDouble(coordinates[0]);
		double lon=Double.parseDouble(coordinates[1]);
		p=new GeoPoint((int)(lat*1E6), (int)(lon*1E6));
		mc.animateTo(p);
		mc.setZoom(18);
		MapOverlay mapOverlay= new MapOverlay();
		List<Overlay> listOfOverlays=mapView.getOverlays();
		listOfOverlays.clear();
		listOfOverlays.add(mapOverlay);
		mapView.invalidate();
		
	}


	@Override
	protected boolean isRouteDisplayed() {
		// TODO Auto-generated method stub
		return false;
	}

}
