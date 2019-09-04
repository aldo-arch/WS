using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace Orari.Models
{
    public class ImportLendet
    {

        public int Id { get; set; }
        public string Dega { get; set; }
        public int Viti { get; set; }
        public string Lenda { get; set; }
        public string Paraleli { get; set; }
        public string Tipi { get; set; }
        public string Pedagog { get; set; }
        public int Kapur { get; set; }
        public int IdTipi { get; set; }
        public int Zgjedhje { get; set; }

        public static List<ImportLendet> GetALL()
        {
            string sql = "SELECT * FROM  [dbo].[ImportLendet] ";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            List<ImportLendet> IL = new List<ImportLendet>();
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    ImportLendet l = new ImportLendet();
                    l.Id = reader.GetInt32(0);
                    l.Dega = reader.GetString(1);
                    l.Viti = reader.GetInt32(2);
                    l.Lenda = reader.GetString(3);
                    l.Paraleli = reader.GetString(4);
                    l.Tipi = reader.GetString(5);
                    l.Pedagog = reader.GetString(6);
                    l.Kapur = reader.GetInt32(7);
                    l.IdTipi = reader.GetInt32(8);
                    l.Zgjedhje = reader.GetInt32(9);
                    IL.Add(l);
                }


            }
            _connection.Close();
            return IL;
        }

        public static ImportLendet GetByID(int id)
        {
            string sql = "SELECT * FROM  [dbo].[ImportLendet] where Id=@id";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            ImportLendet l = new ImportLendet();
            x.Parameters.AddWithValue("@id", id);
            using (var reader = x.ExecuteReader())
            {
                while (reader.Read())
                {
                    l.Id = reader.GetInt32(0);
                    l.Dega = reader.GetString(1);
                    l.Viti = reader.GetInt32(2);
                    l.Lenda = reader.GetString(3);
                    l.Paraleli = reader.GetString(4);
                    l.Tipi = reader.GetString(5);
                    l.Pedagog = reader.GetString(6);
                    l.Kapur = reader.GetInt32(7);
                    l.IdTipi = reader.GetInt32(8);
                    l.Zgjedhje = reader.GetInt32(9);
             
                }


            }
            _connection.Close();
            return l;
        }

        public void Update()
        {
            
            string sql = "Update [dbo].[ImportLendet] SET Dega=ISNULL(@d,Dega),Viti=ISNULL(@v,Viti),Lenda=ISNULL(@l,Lenda),Paraleli=ISNULL(@P,Paraleli),Tipi=ISNULL(@T,Tipi),Pedagog=ISNULL(@pdg,Pedagog),Kapur=ISNULL(@K,Kapur),IdTipi=ISNULL(@IT,IdTipi),Zgjedhje=ISNULL(@Z,Zgjedhje) WHERE Id=@ID";
            SqlConnection _connection = new SqlConnection(ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString);
            _connection.Open();
            SqlCommand x = new SqlCommand(sql, _connection);
            x.Parameters.AddWithValue("@ID", Id);
            x.Parameters.AddWithValue("@d", Dega);
            x.Parameters.AddWithValue("@v", Viti);
            x.Parameters.AddWithValue("@l", Lenda);
            x.Parameters.AddWithValue("@P",Paraleli);
            x.Parameters.AddWithValue("@T", Tipi);
            x.Parameters.AddWithValue("@pdg", Pedagog);
            x.Parameters.AddWithValue("@K", Kapur);
            x.Parameters.AddWithValue("@IT", IdTipi);
            x.Parameters.AddWithValue("@Z", Zgjedhje);
            x.ExecuteNonQuery();

        }
    }
}