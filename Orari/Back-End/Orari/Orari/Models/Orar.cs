using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class Orar
    {
        public int Id { get; set; }
        public string Dega { get; set; }
        public int Viti { get; set; }
        public string Paraleli { get; set; }
        public string Lenda { get; set; }
        public string Tipi { get; set; }
        public string Pedagog { get; set; }
        public int Dita { get; set; }
        public string Klasa { get; set; }
        public int Zgjedhje { get; set; }
        public int Ora { get; set; }
        public bool Final { get; set; }
        public int KlasaId { get; set; }

        public static List<Orar> GetByCriteria(string pedagog,string paralel,string Dega,bool SearchFromPedagog, int viti=0)
        {
            string afterquery = "";
            string sql = "SELECT O.[Id],O.[Dega],O.[Viti],O.[Paraleli],O.[Lenda],O.[Tipi] ,[Pedagog],[Dita],K.[Klasa],O.[Ora],O.[Zgjedhje],O.[Final],O.[Klasa] as KlasaId FROM  [dbo].[orari] o inner join [dbo].[klasat] k on o.klasa=k.id";
            if(SearchFromPedagog)
            {
                afterquery = " WHERE Pedagog=@pdg";
            }
            else
            {
                afterquery = " WHERE Paraleli=@pr and Dega=@dg and Viti=@v";
            }
            sql = sql + afterquery;
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            if (!string.IsNullOrWhiteSpace(pedagog))
            { x.Parameters.AddWithValue("@pdg", pedagog); }
            if (!string.IsNullOrWhiteSpace(paralel) && !string.IsNullOrWhiteSpace(Dega) && viti != 0)
            {
                x.Parameters.AddWithValue("@pr", paralel);
                x.Parameters.AddWithValue("@dg", Dega);
                x.Parameters.AddWithValue("@v", viti);

            }
            List<Orar> orari = new List<Orar>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    Orar o = new Orar();
                    o.Id = reader.GetInt32(0);
                    o.Dega = reader.GetString(1);
                    o.Viti = reader.GetInt32(2);
                    o.Paraleli = reader.GetString(3);
                    o.Lenda = reader.GetString(4);
                    o.Tipi = reader.GetString(5);
                    o.Pedagog = reader.GetString(6);
                    o.Dita = reader.GetInt32(7);
                    o.Klasa = reader.GetString(8);
                    o.Ora = reader.GetInt32(9);
                    o.Zgjedhje = reader.GetInt32(10);
                    o.Final = Convert.IsDBNull(reader["Final"]) ? false : true;
                    o.KlasaId = reader.GetInt32(12);
                    orari.Add(o);
                }
            }
            _connection.Close();

            return orari;
        }
    }
}