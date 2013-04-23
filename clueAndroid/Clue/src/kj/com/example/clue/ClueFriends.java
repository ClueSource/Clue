package kj.com.example.clue;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.concurrent.Delayed;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.apache.http.HttpConnection;
import org.w3c.dom.Document;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

import android.os.Bundle;
import android.app.Activity;
import android.app.ListActivity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class ClueFriends extends ListActivity {
	//String[] listElements={"item 1","item 2","item 3","item 4","item 5","item 6","item 7","item 8","item 9","item 10"};
	String[] listElements={"","","","","","","","","",""};
	//String[] listElements= {""};
	//String[] listElements= new String[100];
	int listCount=0;


	private InputStream OpenHttpConnection(String urlString) throws IOException {
		// TODO Auto-generated method stub
		InputStream in=null;
		int response=-1;
		URL url = new URL(urlString);
		URLConnection conn= url.openConnection();
		if(!(conn instanceof HttpURLConnection))
			throw new IOException("Not an HTTP connection");
		try
		{
			HttpURLConnection httpConn =(HttpURLConnection) conn;
			httpConn.setAllowUserInteraction(false);
			httpConn.setInstanceFollowRedirects(true);
			httpConn.setRequestMethod("GET");
			httpConn.connect();
			response=httpConn.getResponseCode();
			if(response==HttpURLConnection.HTTP_OK){
				in=httpConn.getInputStream();
			}
		}
		catch(Exception e)
		{
			throw new IOException("Error Connecting");
		}
		return in;
	}

	void populateList()
	{
		
		InputStream in=null;
		try{
			in=OpenHttpConnection("http://webclient.0fees.net/pages/users.xml");
			Document doc=null;
			DocumentBuilderFactory dbf= DocumentBuilderFactory.newInstance();
			DocumentBuilder db;
			try{
				db=dbf.newDocumentBuilder();
				doc=db.parse(in);
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}
			doc.getDocumentElement().normalize();
			NodeList itemNodes=doc.getElementsByTagName("name");
			Node nameNode;
			for(int i=0;i<itemNodes.getLength();i++)
			{
				nameNode=itemNodes.item(i);
				listElements[listCount++]=nameNode.getTextContent();
				//Toast.makeText(this, nameNode.getTextContent(), Toast.LENGTH_LONG).show();
			}
			
		}catch(Exception e)
		{
			e.printStackTrace();
		}
	}
	
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		//setContentView(R.layout.activity_main);
		populateList();
		setListAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1,listElements));
	}
	@Override
	protected void onListItemClick(ListView l, View v, int position, long id) {
		// TODO Auto-generated method stub
		super.onListItemClick(l, v, position, id);
		if(position==0)
			startActivity(new Intent("android.intent.action.DISPLAYMAP"));
}
	
	

}

