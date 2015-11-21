package com.sheikbro.onlinechat;



import android.R.color;
import android.app.Activity;
import android.app.Fragment;
import android.app.FragmentTransaction;
import android.graphics.Color;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.view.View.OnTouchListener;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class Homepage extends Activity {
LinearLayout contactss,chatss,myaccc;
Fragment Contactspage= new Contactspage();
Fragment Chatpage= new Chatpage();
Fragment Myaccpage= new Myaccpage();
TextView conc,chattt,myacccc;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_homepage);
		contactss=(LinearLayout)findViewById(R.id.contacts);
		chatss=(LinearLayout)findViewById(R.id.chat);
		myaccc=(LinearLayout)findViewById(R.id.myacc);
		conc=(TextView)findViewById(R.id.contacctt);
		chattt=(TextView)findViewById(R.id.chattxt);
		myacccc=(TextView)findViewById(R.id.myacctxt);

		
		contactss.setOnTouchListener(new OnTouchListener() {

			public boolean onTouch(View v, MotionEvent event) {
				// TODO Auto-generated method stub
				// TODO Auto-generated method stub
				conc.setTextColor(Color.parseColor("#ffffff"));
				chattt.setTextColor(Color.parseColor("#000000"));
				myacccc.setTextColor(Color.parseColor("#000000"));

				contactss.setBackgroundResource(com.sheikbro.onlinechat.R.color.violet);
				chatss.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);
				myaccc.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);
				
				RelativeLayout customfrag=(RelativeLayout)findViewById(R.id.customfrag);
				RelativeLayout.LayoutParams p = new RelativeLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT,
						ViewGroup.LayoutParams.WRAP_CONTENT);

				p.addRule(RelativeLayout.BELOW, R.id.custom);
				p.addRule(RelativeLayout.ABOVE, R.id.footer);

				customfrag.setLayoutParams(p);
				FragmentTransaction transaction = getFragmentManager().beginTransaction();

				// Replace whatever is in the fragment_container view with this fragment,
				// and add the transaction to the back stack if needed
				transaction.replace(R.id.fragment_container,Contactspage);
				transaction.addToBackStack(null);

				// Commit the transaction
				transaction.commit();
				return false;
			}
		});
		chatss.setOnTouchListener(new OnTouchListener() {

			public boolean onTouch(View v, MotionEvent event) {
				
				conc.setTextColor(Color.parseColor("#000000"));
				chattt.setTextColor(Color.parseColor("#ffffff"));
				myacccc.setTextColor(Color.parseColor("#000000"));
				// TODO Auto-generated method stub
				// TODO Auto-generated method stub
				chatss.setBackgroundResource(com.sheikbro.onlinechat.R.color.violet);
				myaccc.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);
				contactss.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);



				RelativeLayout customfrag=(RelativeLayout)findViewById(R.id.customfrag);
				RelativeLayout.LayoutParams p = new RelativeLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT,
						ViewGroup.LayoutParams.WRAP_CONTENT);

				p.addRule(RelativeLayout.BELOW, R.id.custom);
				p.addRule(RelativeLayout.ABOVE, R.id.footer);

				customfrag.setLayoutParams(p);
				FragmentTransaction transaction = getFragmentManager().beginTransaction();

				// Replace whatever is in the fragment_container view with this fragment,
				// and add the transaction to the back stack if needed
				transaction.replace(R.id.fragment_container,Chatpage);
				transaction.addToBackStack(null);

				// Commit the transaction
				transaction.commit();
				return false;
			}
		});
		myaccc.setOnTouchListener(new OnTouchListener() {

			public boolean onTouch(View v, MotionEvent event) {
				// TODO Auto-generated method stub
				// TODO Auto-generated method stub
				
				conc.setTextColor(Color.parseColor("#000000"));
				chattt.setTextColor(Color.parseColor("#000000"));
				myacccc.setTextColor(Color.parseColor("#ffffff"));
				myaccc.setBackgroundResource(com.sheikbro.onlinechat.R.color.violet);
				chatss.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);
				contactss.setBackgroundResource(com.sheikbro.onlinechat.R.color.white);

				RelativeLayout customfrag=(RelativeLayout)findViewById(R.id.customfrag);
				RelativeLayout.LayoutParams p = new RelativeLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT,
						ViewGroup.LayoutParams.WRAP_CONTENT);

				p.addRule(RelativeLayout.BELOW, R.id.custom);
				p.addRule(RelativeLayout.ABOVE, R.id.footer);

				customfrag.setLayoutParams(p);
				FragmentTransaction transaction = getFragmentManager().beginTransaction();

				// Replace whatever is in the fragment_container view with this fragment,
				// and add the transaction to the back stack if needed
				transaction.replace(R.id.fragment_container,Myaccpage);
				transaction.addToBackStack(null);

				// Commit the transaction
				transaction.commit();
				return false;
			}
		});
		

	}
}
