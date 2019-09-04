package Consumator; 
import java.rmi.RemoteException;

 import org.tempuri.*;

public class Main {

	  public String GetPrice( int guests,String city) throws RemoteException{
		  try{
			HotelSoap a=new HotelSoapProxy();
			Object rez=a.getPrice(guests, city);
			String result=rez.toString();
	        return result;
	    }
		  catch(Exception ex)
		  {
			  return "Gabim ne lidhjen me WS: "+ex.getMessage();
		  }
	  }
	  public String Booking(String email,int guests,String city) throws RemoteException{
		  try{
			HotelSoap a=new HotelSoapProxy();
			Object rez=a.bookRoom(email,guests, city);
			String result=rez.toString();
	        return result;
		  }
	  	  catch(Exception ex)
		  {
			  return "Gabim ne lidhjen me WS: "+ex.getMessage();
		  }
	    }
	  
	  
	  


}
