using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Paraleli
    {
        public string Name { get; set; }

        public static List<Paraleli> GetParalel()
        {
            string sql = "SELECT  distinct Paraleli  FROM  [dbo].[orari] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Paraleli> paralel = new List<Paraleli>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Paraleli p = new Paraleli();
                    p.Name = reader.GetString(0);
                    paralel.Add(p);
                }


            }
            _connection.Close();
            return paralel;
        }
    }
}