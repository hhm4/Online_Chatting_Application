package com.sheikbro.onlinechat;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by Hari on 10/23/2015.
 */
public class DatabaseHelper extends SQLiteOpenHelper {
	
    public static final String DATABASE_NAME="ONLINECHAT";
    public static final int DATABASE_VERSION=1;

    private static final String CREATE_TABLE_USERS="CREATE TABLE USERS ("+
    		"UserId int(10) NOT NULL,"+
    		"UserName varchar(100) NOT NULL,"+
    		"EmailId  varchar(250) NOT NULL,"+
    		"User_Password varchar(100) NOT NULL,"+
    		"CreatedAt TimeStamp NOT NULL DEFAULT CURRENT_TIMESTAMP,"+
    		"UserStatus int(1)  NOT NULL  DEFAULT '1',"+
    		"UserPictureLink varchar(100) DEFAULT NULL,"+
    		"StatusUpdate varchar(250) DEFAULT NULL"+
    		");";

    private static final String CREATE_TABLE_CHATROOM_USERS="	CREATE TABLE IF NOT EXISTS CHATROOM_USERS ("+
    		"ChatRoomId int(10) NOT NULL ,"+
    		"UserIds varchar(500) NOT NULL,"+
    		"IsGroupChat int(1) NOT NULL DEFAULT 0,"+
    		"GroupName varchar(100) DEFAULT NULL,"+
    		"GroupImage varchar(100) DEFAULT NULL,"+
    		"PRIMARY KEY (ChatRoomId)"+
    		");";
    
    private static final String CREATE_TABLE_CONTACTS="CREATE TABLE IF NOT EXISTS CONTACTS ("+
    		"ContactId int(10) NOT NULL,"+
    		"Contacts_UserId int(100) NOT NULL ,"+
    		"Contacts_Status int(1) NOT NULL DEFAULT 1,"+
    		"Contacts_DateAdded TimeStamp NOT NULL DEFAULT CURRENT_TIMESTAMP,"+
    		"PRIMARY KEY (ContactId)"+
    		");";
    		
    private static final String CREATE_TABLE_CHATMESSAGES="CREATE TABLE  CHATMESSAGES ("+
    		"MessageId int(10) NOT NULL ,"+
    		"ChatRoomId int(100) NOT NULL,"+
    		"FromUserId int(100) NOT NULL,"+
    		"Message varchar(1000) DEFAULT NULL,"+
    		"MessageLink varchar(250) DEFAULT NULL,"+
    		"CreatedAt TimeStamp NOT NULL DEFAULT CURRENT_TIMESTAMP,"+
    		"PRIMARY KEY (MessageId)"+
    		");";

    public DatabaseHelper(Context context) {

        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        // creating required tables
        db.execSQL(CREATE_TABLE_USERS);
        db.execSQL(CREATE_TABLE_CONTACTS);
        db.execSQL(CREATE_TABLE_CHATROOM_USERS);
        db.execSQL(CREATE_TABLE_CHATMESSAGES);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // on upgrade drop older tables
        db.execSQL("DROP TABLE IF EXISTS " + "USERS");
        // create new tables
        onCreate(db);
    }

}

//private static final String CREATE_TABLE_USERS="CREATE TABLE IF NOT EXISTS USERS ( " +
//      " " +
//      " UserId INTEGER PRIMARY KEY AUTOINCREMENT, " +
//      " UserName varchar(100) NOT NULL, " +
//      " EmailId  varchar(250) NOT NULL, " +
//      " User_Password varchar(100) NOT NULL, " +
//      " CreatedAt TimeStamp NOT NULL DEFAULT CURRENT_TIMESTAMP, " +
//      " UserStatus int(1)  NOT NULL  DEFAULT 1, " +
//      " UserPictureLink varchar(100) DEFAULT NULL, " +
//      " StatusUpdate varchar(250) DEFAULT NULL, " +
//      " UNIQUE (EmailId) " +
//      " ); ";


/* private static final String CREATE_TABLE_CONTACTS="CREATE TABLE IF NOT EXISTS CONTACTS ( " +
         " " +
         " UserId INTEGER PRIMARY KEY AUTOINCREMENT, " +
         " Name varchar(100) NOT NULL, " +
         " CreatedAt TimeStamp NOT NULL DEFAULT CURRENT_TIMESTAMP, " +
         " UserStatus int(1)  NOT NULL  DEFAULT 1, " +
         " UserPictureLink varchar(100) DEFAULT NULL, " +
         " StatusUpdate varchar(250) DEFAULT NULL, " +
         " ); ";
         
         *
         *
    private static final String[] query={"Insert into Users (UserName) values (\"Taslim\")",
            "Insert into Users (UserName) values (\"Taslim\")",
            "Insert into Users (UserName) values (\"Leke\")",
            "Insert into Users (UserName) values (\"madhu\")", "Insert into Users (UserName) values (\"ayyappan\")",
            "Insert into Users (UserName) values (\"Soorya\")","Insert into Users (UserName) values (\"Vishnu\")",
            "Insert into Users (UserName) values (\"Sheik Fazil\")","Insert into Users (UserName) values (\"Kumaran\")",
            "Insert into Users (UserName) values (\"Ajith\")","Insert into Users (UserName) values (\"kamal\")",
            "Insert into Users (UserName) values (\"vijay\")","Insert into Users (UserName) values (\"Rajini\")"};
            
            //        for (String a : query){
//            db.execSQL(a);
//        }
*/