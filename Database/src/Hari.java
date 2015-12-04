
import java.sql.*;

public class Hari {

public static void main(String[] args) {
try {
    Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");//This s wat actually i did for connection
    System.out.println("Driver Loaded Succesfully");
}
catch (Exception e){
    System.out.println("Unable to Load Driver!!!");
}

try {
	Class.forName("com.mysql.jdbc.Driver"); // initialise the driver
	String url ="jdbc:mysql://sql2.njit.edu:3306/hhm4";
	System.out.println("mysql connector");
    Connection con = DriverManager.getConnection(url, "hhm4", "wKx8jxKXx");
    System.out.println("connection Established");
    }
    catch(Exception e) {
    	e.printStackTrace();
                System.out.println("Couldnt get connection");
    }
    }
}