using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Oret
    {

        public int Id { get; set; }
        public string Hour { get; set; }

        public static List<Oret> GetOret()
        {
            string sql = "SELECT * FROM  [dbo].[Oret] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Oret> ora = new List<Oret>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Oret o = new Oret();
                    o.Id = reader.GetInt32(0);
                    o.Hour = reader.GetString(1);
                    ora.Add(o);
                }


            }
            _connection.Close();
            return ora;
        }
    }
}