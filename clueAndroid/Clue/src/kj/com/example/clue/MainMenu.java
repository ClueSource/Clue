package kj.com.example.clue;

import android.os.Bundle;
import android.app.ListActivity;
import android.content.Intent;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class MainMenu extends ListActivity {
	//String[] listElements={"item 1","item 2","item 3","item 4","item 5","item 6","item 7","item 8","item 9","item 10"};
	String[] listElements={"Clue Friends","Nearby Clue Users","Use this Device as a Tracker"};
	//String[] listElements= {""};
	//String[] listElements= new String[100];
	int listCount=0;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		//setContentView(R.layout.activity_main);
		setListAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1,listElements));
	}
	@Override
	protected void onListItemClick(ListView l, View v, int position, long id) {
		// TODO Auto-generated method stub
		super.onListItemClick(l, v, position, id);
		if(position==0)
			startActivity(new Intent("android.intent.action.CLUEFRIENDS"));
		else if(position==1)
			startActivity(new Intent("android.intent.action.CLUEFRIENDS"));
		else if(position==2)
			startActivity(new Intent("android.intent.action.TOSERVER"));
		
		Toast.makeText(this,"You have selected "+listElements[position], Toast.LENGTH_SHORT).show();
	}
	
	

}