package com.example.marieteam;

import java.util.ArrayList;
import android.app.Activity;
import android.view.View.OnTouchListener;
import android.view.View.OnClickListener;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import java.util.ArrayList;
import java.util.List;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;
import com.example.marieteam.JSONParser;

import android.app.Activity;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class AjoutBateau extends Activity implements View.OnTouchListener, View.OnClickListener{
	
	// Progress Dialog
    private ProgressDialog pDialog;
 
    // JSON parser class
    JSONParser jsonParser = new JSONParser();
    
    //php login script
    
    //localhost :  
    //testing on your device
    //put your local ip instead,  on windows, run CMD > ipconfig
    //or in mac's terminal type ifconfig and look for the ip under en0 or en1
   // private static final String LOGIN_URL = "http://xxx.xxx.x.x:1234/webservice/register.php";
    
    //testing on Emulator:
    private static final String LOGIN_URL = "http://lgb6-slam2-2016.net23.net/webservice/InsertionBateauV.php";
    
  //testing from a real server:
    //private static final String LOGIN_URL = "http://www.yourdomain.com/webservice/register.php";
    
    //ids
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";
	
	private Button valider = null;
	EditText EditNomBat = null;
	EditText EditIdBat = null;
	EditText EditLongBat = null;
	EditText EditLargBat = null;
	EditText EditVitBat = null;
	
	CheckBox checkBoxEquip1 = null;
	CheckBox checkBoxEquip2 = null;
	CheckBox checkBoxEquip3 = null;
	CheckBox checkBoxEquip4 = null;
	CheckBox checkBoxEquip5 = null;
	CheckBox checkBoxEquip6 = null;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_ajout_bateau);
		
		valider = (Button) findViewById(R.id.buttonValider);
	    valider.setOnClickListener(this);
	    
	    checkBoxEquip1 = (CheckBox) findViewById(R.id.checkBoxEquip1);
	    checkBoxEquip2 = (CheckBox) findViewById(R.id.checkBoxEquip2);
	    checkBoxEquip3 = (CheckBox) findViewById(R.id.checkBoxEquip3);
	    checkBoxEquip4 = (CheckBox) findViewById(R.id.checkBoxEquip4);
	    checkBoxEquip5 = (CheckBox) findViewById(R.id.checkBoxEquip5);
	    checkBoxEquip6 = (CheckBox) findViewById(R.id.checkBoxEquip6);
	    
	    EditIdBat = (EditText) findViewById(R.id.EditIdBat);
	    EditNomBat = (EditText) findViewById(R.id.EditNomBat);
	    EditLongBat = (EditText) findViewById(R.id.EditLongBat);
	    EditLargBat = (EditText) findViewById(R.id.EditLargBat);
	    EditVitBat = (EditText) findViewById(R.id.EditVitBat);
	
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.ajout_bateau, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	@Override
	public void onClick(View v) throws NullPointerException {
		// TODO Auto-generated method stub
		if (v.getId() == R.id.buttonValider){
			
			new CreateBoat().execute();
			
			/*ArrayList<Equipement> mesEquip= new ArrayList<Equipement>();
			
			Equipement E1 = new Equipement("1", "Accés Handicap");
			Equipement E2 = new Equipement("2", "Bar");
			Equipement E3 = new Equipement("3", "Pont Promenade");
			Equipement E4 = new Equipement("4", "Salon Vid");
			Equipement E5 = new Equipement("5", "Piscine");
			Equipement E6 = new Equipement("6", "Salle de spectacle");
			
			if (checkBoxEquip1.isSelected()) mesEquip.add(E1);
			if (checkBoxEquip2.isSelected()) mesEquip.add(E2);
			if (checkBoxEquip3.isSelected()) mesEquip.add(E3);
			if (checkBoxEquip4.isSelected()) mesEquip.add(E4);
			if (checkBoxEquip5.isSelected()) mesEquip.add(E5);
			if (checkBoxEquip6.isSelected()) mesEquip.add(E6);
			
			BateauVoyageur B = new BateauVoyageur(EditIdBat.getText().toString(), EditNomBat.getText().toString(), Double.parseDouble(EditLongBat.getText().toString()), Double.parseDouble(EditLargBat.getText().toString()), Double.parseDouble(EditVitBat.getText().toString()), EditIdBat.getText().toString(),  mesEquip);
			*/
		}
		
	}

	@Override
	public boolean onTouch(View v, MotionEvent event) {
		// TODO Auto-generated method stub
		return false;
	}
	
	class CreateBoat extends AsyncTask<String, String, String> {


		 /**
        * Before starting background thread Show Progress Dialog
        * */
		boolean failure = false;
		
       @Override
       protected void onPreExecute() {
           super.onPreExecute();
           pDialog = new ProgressDialog(AjoutBateau.this);
           pDialog.setMessage("Creation du Bateau...");
           pDialog.setIndeterminate(false);
           pDialog.setCancelable(true);
           pDialog.show();
       }
		
		@Override
		protected String doInBackground(String... args) {
			// TODO Auto-generated method stub
			 // Check for success tag
           int success;
           String idBat = EditIdBat.getText().toString();
           String nomBat = EditNomBat.getText().toString();
           String largBat = EditLargBat.getText().toString();
           String longBat = EditLongBat.getText().toString();
           String vitBat = EditVitBat.getText().toString();
           try {
               // Building Parameters
               List<NameValuePair> params = new ArrayList<NameValuePair>();
               params.add(new BasicNameValuePair("idBat", idBat));
               params.add(new BasicNameValuePair("nomBat", nomBat));
               params.add(new BasicNameValuePair("largBat", largBat));
               params.add(new BasicNameValuePair("longBat", longBat));
               params.add(new BasicNameValuePair("vitBat", vitBat));

               Log.d("request!", "starting");
               
               //Posting user data to script 
               JSONObject json = jsonParser.makeHttpRequest(
                      LOGIN_URL, "POST", params);

               // full json response
               Log.d("Login attempt", json.toString());

               // json success element
               success = json.getInt(TAG_SUCCESS);
               if (success == 1) {
               	Log.d("Boat Created!", json.toString());              	
               	finish();
               	return json.getString(TAG_MESSAGE);
               }else{
               	Log.d("Failure!", json.getString(TAG_MESSAGE));
               	return json.getString(TAG_MESSAGE);
               	
               }
           } catch (JSONException e) {
               e.printStackTrace();
           }

           return null;
			
		}
		/**
        * After completing background task Dismiss the progress dialog
        * **/
       protected void onPostExecute(String file_url) {
           // dismiss the dialog once product deleted
           pDialog.dismiss();
           if (file_url != null){
           	Toast.makeText(AjoutBateau.this, file_url, Toast.LENGTH_LONG).show();
           }
		}
       
       }
	
}
