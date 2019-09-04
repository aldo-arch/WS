using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Viti
    {
        public int Year { get; set; }

        public static List<Viti> GetYear()
        {
            string sql = "SELECT  distinct Viti  FROM  [dbo].[orari] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<Viti> vite = new List<Viti>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Viti v = new Viti();
                    v.Year = reader.GetInt32(0);
                    vite.Add(v);
                }


            }
            _connection.Close();
            return vite;
        }
    }
}