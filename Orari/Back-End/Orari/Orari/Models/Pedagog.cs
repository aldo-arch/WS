using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Pedagog
    {
        public string Name { get; set; }

        public static List<Pedagog> GetPedagog()
        {
            string sql = "SELECT  distinct Pedagog  FROM  [dbo].[orari] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Pedagog> pedagog = new List<Pedagog>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Pedagog p = new Pedagog();
                    p.Name = reader.GetString(0);
                    pedagog.Add(p);
                }


            }
            _connection.Close();
            return pedagog;
        }
    }
}