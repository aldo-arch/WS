using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Diagnostics;

namespace WebApplication
{
    public partial class _Default : System.Web.UI.Page
    {
        Stopwatch stopWatch = new Stopwatch();

        protected void btnService_Click(object sender, EventArgs e)
        {
            service.Service1 srv = new service.Service1();

            stopWatch.Start();
            this.lblResult.Text += srv.HelloWorld() + " sinkrone ";

            for (int i = 0; i < 10000; i++)
            {
                this.lblResult1.Text += i + " ";
            }

            for (int i = 0; i < 10000; i++)
            {
                this.lblResult2.Text += i + " ";
            }

            stopWatch.Stop();
            this.lblResult.Text += " -> " + String.Format("Kohezgjatja: {0} ms", stopWatch.Elapsed.Milliseconds);
        }

        protected void btnServiceAsync_Click(object sender, EventArgs e)
        {
            service.Service1 srv = new service.Service1();
            srv.HelloWorldCompleted += new WebApplication.service.HelloWorldCompletedEventHandler(srv_HelloWorldCompleted);

            stopWatch.Start();
            srv.HelloWorldAsync();

            for (int i = 0; i < 10000; i++)
            {
                this.lblResult1.Text += i + " ";
            }
            for (int i = 0; i < 10000; i++)
            {
                this.lblResult2.Text += i + " ";
            }

            srv.CancelAsync
        }

        void srv_HelloWorldCompleted(object sender, WebApplication.service.HelloWorldCompletedEventArgs e)
        {
            this.lblResult0.Text += e.Result + " JO sinkrone "; 
            stopWatch.Stop();
            this.lblResult0.Text += " -> " + String.Format("Kohezgjatja: {0} ms", stopWatch.Elapsed.Milliseconds);
        }
        
        protected void Button1_Click(object sender, EventArgs e)
        {
            this.lblResult1.Text = "";
            this.lblResult2.Text = "";
        }
    }
}
