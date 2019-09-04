using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Dita
    {
        public int Id { get; set; }
        public string Day { get; set; }

        public static List<Dita> GetDitet()
        {
            string sql = "SELECT * FROM  [dbo].[Ditet] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Dita> ditet = new List<Dita>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Dita d = new Dita();
                    d.Id = reader.GetInt32(0);
                    d.Day = reader.GetString(1);
                    ditet.Add(d);
                }


            }
            _connection.Close();
            return ditet;
        }
    }
}