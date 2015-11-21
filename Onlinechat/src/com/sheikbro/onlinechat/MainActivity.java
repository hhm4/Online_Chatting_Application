package com.sheikbro.onlinechat;



import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

public class MainActivity extends Activity {
	private final int SPLASH_DISPLAY_LENGTH = 2500;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        initializeDatabase();
		  /* New Handler to start the Menu-Activity 
       * and close this Splash-Screen after some seconds.*/
      new Handler().postDelayed(new Runnable(){
          @Override
          public void run() {
              /* Create an Intent that will start the Menu-Activity. */
              Intent mainIntent = new Intent(MainActivity.this,Loginpage.class);
              MainActivity.this.startActivity(mainIntent);
              MainActivity.this.finish();
          }
      }, SPLASH_DISPLAY_LENGTH);

    }
    public void initializeDatabase(){

        SharedPreferences prefs = this.getSharedPreferences(
                "com.onlinechat.app.install", Context.MODE_PRIVATE);
        Boolean status= prefs.getBoolean("firstTime",false);
        Toast.makeText(getApplicationContext(), "this is my Toast message!!! =)"+status,
                Toast.LENGTH_LONG).show();
        DatabaseHelper db = new DatabaseHelper(getApplicationContext());
        if(!status){
            SharedPreferences sp = getSharedPreferences("com.onlinechat.app.install", Activity.MODE_PRIVATE);
            SharedPreferences.Editor editor = sp.edit();
            editor.putBoolean("firstTime", true);
            editor.commit();
        }
    }
}
