using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Dega
    {
        public int Id { get; set; }
        public string Name { get; set; }

        public static List<Dega> GetDeget()
        {
            string sql = "SELECT * FROM  [dbo].[deget] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Dega> deget = new List<Dega>();
            using (var reader = x.ExecuteReader())
            {                              
                    while (reader.Read())
                    {
                        Dega deg = new Dega();
                        deg.Id = reader.GetInt32(0);
                        deg.Name = reader.GetString(1);
                        deget.Add(deg);
                    }
                
         
            }
            _connection.Close();
            return deget;
        }

    }
}