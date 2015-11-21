package com.sheikbro.onlinechat;

import java.io.IOException;
import java.io.InputStream;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

public class Loginpage extends Activity {
	EditText editName;
	EditText editEmail;
	EditText editPassword;
	String userName;
	String userEmailId;
	String userPassword;
	JSONObject jsonObject;
	String signInURL;
	HttpPost request;
	HttpClient httpClient;
	HttpResponse response;
	String jsonString;
	StringEntity jsonStringEntity ;
	HttpEntity entity;
	
	public void openSignUp(View v){
		Intent signUp=new Intent(Loginpage.this,Signup.class);
		startActivity(signUp);
	}
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_loginpage);
		if (android.os.Build.VERSION.SDK_INT > 9) {
		    StrictMode.ThreadPolicy policy = 
		        new StrictMode.ThreadPolicy.Builder().permitAll().build();
		    StrictMode.setThreadPolicy(policy);
		}
	}
@SuppressWarnings("deprecation")
public void submitSignIn(View v){
		
		editEmail   = (EditText)findViewById(R.id.editEmail);
		editPassword   = (EditText)findViewById(R.id.editPassword);
		userEmailId=new String(editEmail.getText().toString());
		userPassword=new String(editPassword.getText().toString());
		signInURL=new String("https://web.njit.edu/~hhm4/php_Java/SignIn.php");
		httpClient=new DefaultHttpClient();
		 request=new HttpPost(signInURL);
		List<NameValuePair> nameValuePairs=new ArrayList<NameValuePair>(3);
		nameValuePairs.add(new BasicNameValuePair("Password",userPassword));
		nameValuePairs.add(new BasicNameValuePair("EmailId",userEmailId));
		try {
			request.setEntity(new UrlEncodedFormEntity(nameValuePairs));
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		}

		try {
			HttpResponse response = httpClient.execute(request);
            entity=response.getEntity();
            String responseText=EntityUtils.toString(entity);
			jsonObject=new JSONObject(responseText);
          	int authentication=Integer.parseInt(jsonObject.getString("Result").toString());
          	if (authentication==1){
          		Intent login=new Intent(Loginpage.this,Homepage.class);
          		login.putExtra("emailid", userEmailId);
          		startActivity(login);
          	}
          	else{
          		Toast.makeText(getApplicationContext(), "Invalid Credentials, Try Again", Toast.LENGTH_SHORT).show();
          	}
     	
		} catch (ClientProtocolException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();

		}catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (org.apache.http.ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

}
//public void getLatLongFromAddress(String youraddress) {
//	String uri = "https://web.njit.edu/~hhm4/php_Java/Sign.php?name=karthic&email=asd&contact=1234";
//	HttpGet httpGet = new HttpGet(uri);
//	HttpClient client = new DefaultHttpClient();
//	HttpResponse response;
//	StringBuilder stringBuilder = new StringBuilder();
//
//	try {
//		response = client.execute(httpGet);
//		
//		System.out.println("ASDJKHASKDJ"+response);
//		HttpEntity entity = response.getEntity();
//		System.out.println("ASDJKHASKDJ"+entity);
//
//		InputStream stream = entity.getContent();
//		int b;
//		while ((b = stream.read()) != -1) {
//			stringBuilder.append((char) b);
//		}
//	} catch (ClientProtocolException e) {
//		e.printStackTrace();
//	} catch (IOException e) {
//		e.printStackTrace();
//	}
//
//	JSONObject jsonObject = new JSONObject();
//	try {
//		jsonObject = new JSONObject(stringBuilder.toString());
//		JSONArray adress=jsonObject.getJSONArray("results");
//		for(int i=0;i<adress.length();i++)
//		{
//
////			String address=adress.getJSONObject(i).getString("formatted_address");
////			ade.add(address);
////			Log.d("latitude", "" + ade.get(i).toString());
//
//		}
//
//
////		Log.d("latitude", "" + lat);
////		Log.d("longitude", "" + lng);
//	} catch (JSONException e) {
//		e.printStackTrace();
//	}
//}
