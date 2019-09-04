using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace FSharpWcfServiceApplicationTemplate
{
    /// <summary>
    /// Summary description for Hotel
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class Hotel : System.Web.Services.WebService
    {

        [WebMethod]
        public string getPrice(int guest_nr,string city_name)
        {
            string hotel_name = "";
            int price = 0;
            bool found = false;
            string msg = "";
            string sql = "SELECT top(1) *  FROM  [dbo].[hotels] WHERE guests_allowed >= @gnr and city=@city";
            SqlConnection _connection = new SqlConnection(ConfigurationManager. ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            x.Parameters.AddWithValue("@gnr", guest_nr);
            x.Parameters.AddWithValue("@city", city_name);
            using (var reader = x.ExecuteReader())
            {
                try
                {
                    while (reader.Read())
                    {
                        hotel_name = reader["hotel_name"].ToString();
                        price = Int32.Parse(reader["price"].ToString());
                        found = true;
                    }
                }
                catch (Exception err)
                {
                    return "Ndodhi nje gabim! "+err.Message;
                }
            }
            _connection.Close();
            
            if(found)
            {
                msg = "Hoteli " + hotel_name + " ne vendodhjen e kerkuar " + city_name + " eshte i disponueshem per numrin e kerkuar te personave " + guest_nr+" me cmimin "+price+" per person.";
            }
            else
            {
                msg = "Nuk u gjet asnje hotel ne " + city_name + " qe permbush kerkesen per " + guest_nr + " persona!";
            }
            return msg; 
        }

        [WebMethod]
        public string bookRoom(string email, int guest_nr, string city_name)
        {
            string hotel_name = "";
            int price = 0;
            bool found = false;
            string msg = "";
            string sql = "SELECT top(1) *  FROM  [dbo].[hotels] WHERE guests_allowed >= @gnr and city=@city";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            x.Parameters.AddWithValue("@gnr", guest_nr);
            x.Parameters.AddWithValue("@city", city_name);
            using (var reader = x.ExecuteReader())
            {
                try
                {
                    while (reader.Read())
                    {
                        hotel_name = reader["hotel_name"].ToString();
                        price = Int32.Parse(reader["price"].ToString());
                        found = true;
                    }
                }
                catch (Exception err)
                {
                    return "Ndodhi nje gabim ! " + err.Message;
                }
            }
            _connection.Close();
            if (found)
                msg = "Hoteli: " + hotel_name + " \r\n Rezervimi per: " + guest_nr + " persona \n Cmimi Total: " + price * guest_nr + " \n Konfirmimi i pageses do dergohet ne: " + email;
            else
                msg = "Nuk mund te kryeni rezervim pasi nuk ka asnje hotel te disponueshem per kerkesat tuaja";
            return msg;
        }


    }
}
