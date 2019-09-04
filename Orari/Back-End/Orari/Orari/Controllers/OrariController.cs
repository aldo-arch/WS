using Orari.Models;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web;
using System.Web.Http;
using System.Web.Http.Cors;

namespace Orari.Controllers
{
    public class OrariController : ApiController
    {


        [Route("orari/api/getpedagog")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetPedagog()
        {
            try {

                List<Pedagog> data = Pedagog.GetPedagog();
                var res=Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch(Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: "+ex.Message);
                return res;
            }
          
        }
        [Route("orari/api/getdeget")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetDeget()
        {
            try
            {

                List<Dega> data = Dega.GetDeget();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }

        [Route("orari/api/getparalel")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetParalel()
        {
            try
            {

                List<Paraleli> data = Paraleli.GetParalel();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }

        [Route("orari/api/getviti")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetViti()
        {
            try
            {

                List<Viti> data = Viti.GetYear();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }



        [Route("orari/api/getorari")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetOrari(string pedagog, string paralel, string Dega, bool SearchFromPedagog, int viti = 0)
        {
            try
            {

                List<Orar> data = Orar.GetByCriteria(pedagog, paralel, Dega, SearchFromPedagog, viti);
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }


        [Route("orari/api/getOret")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetOret()
        {
            try
            {

                List<Oret> data = Oret.GetOret();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }


        [Route("orari/api/getDitet")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        public HttpResponseMessage GetDitet()
        {
            try
            {

                List<Dita> data = Dita.GetDitet();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }


        [Route("orari/api/getlendet")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetLendet()
        {
            try
            {

                List<ImportLendet> data = ImportLendet.GetALL();
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }

        [Route("orari/api/getlendetbyid")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [HttpGet]
        public HttpResponseMessage GetLendById(int id)
        {
            try
            {

                ImportLendet data = ImportLendet.GetByID(id);
                var res = Request.CreateResponse(HttpStatusCode.OK, data);
                return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }

        [Route("orari/api/update")]
        [EnableCors(origins: "*", headers: "*", methods: "*")]
        [AcceptVerbs("POST", "PUT")]
        public HttpResponseMessage Update(ImportLendet ILtoUpdate)
        {
            try
            {

                 ILtoUpdate.Update();
                 var res = Request.CreateResponse(HttpStatusCode.OK, "Modifikimi u krye me sukses!");
                 return res;
            }
            catch (Exception ex)
            {
                var res = Request.CreateResponse(HttpStatusCode.BadRequest, "Gabimi: " + ex.Message);
                return res;
            }
        }
    }
}
