/**
 * HotelSoap.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package org.tempuri;

public interface HotelSoap extends java.rmi.Remote {
    public java.lang.String getPrice(int guest_nr, java.lang.String city_name) throws java.rmi.RemoteException;
    public java.lang.String bookRoom(java.lang.String email, int guest_nr, java.lang.String city_name) throws java.rmi.RemoteException;
}
