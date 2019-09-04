package org.tempuri;

public class HotelSoapProxy implements org.tempuri.HotelSoap {
  private String _endpoint = null;
  private org.tempuri.HotelSoap hotelSoap = null;
  
  public HotelSoapProxy() {
    _initHotelSoapProxy();
  }
  
  public HotelSoapProxy(String endpoint) {
    _endpoint = endpoint;
    _initHotelSoapProxy();
  }
  
  private void _initHotelSoapProxy() {
    try {
      hotelSoap = (new org.tempuri.HotelLocator()).getHotelSoap();
      if (hotelSoap != null) {
        if (_endpoint != null)
          ((javax.xml.rpc.Stub)hotelSoap)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
        else
          _endpoint = (String)((javax.xml.rpc.Stub)hotelSoap)._getProperty("javax.xml.rpc.service.endpoint.address");
      }
      
    }
    catch (javax.xml.rpc.ServiceException serviceException) {}
  }
  
  public String getEndpoint() {
    return _endpoint;
  }
  
  public void setEndpoint(String endpoint) {
    _endpoint = endpoint;
    if (hotelSoap != null)
      ((javax.xml.rpc.Stub)hotelSoap)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
    
  }
  
  public org.tempuri.HotelSoap getHotelSoap() {
    if (hotelSoap == null)
      _initHotelSoapProxy();
    return hotelSoap;
  }
  
  public java.lang.String getPrice(int guest_nr, java.lang.String city_name) throws java.rmi.RemoteException{
    if (hotelSoap == null)
      _initHotelSoapProxy();
    return hotelSoap.getPrice(guest_nr, city_name);
  }
  
  public java.lang.String bookRoom(java.lang.String email, int guest_nr, java.lang.String city_name) throws java.rmi.RemoteException{
    if (hotelSoap == null)
      _initHotelSoapProxy();
    return hotelSoap.bookRoom(email, guest_nr, city_name);
  }
  
  
}