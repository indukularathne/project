using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace SuperMarket
{
    public partial class SellingForm : Form
    {
        public SellingForm()
        {
            InitializeComponent();
        }

        private void ProdDGV1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            ProdName.Text = ProdDGV1.SelectedRows[0].Cells[0].Value.ToString();
            ProdPrice.Text = ProdDGV1.SelectedRows[0].Cells[1].Value.ToString();
        }
        private void populate()
        {
            try
            {

                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);
                con.Open();
                string query = "select ProdName,ProdPrice from ProductTbl";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                ProdDGV1.DataSource = ds.Tables[0];
                con.Close();
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }

        }

        private void populatebills()
        {
            try
            {

                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);
                con.Open();
                string query = "select * from BillTbl";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                BillsDGV.DataSource = ds.Tables[0];
                con.Close();
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }

        }
        private void SellingForm_Load(object sender, EventArgs e)
        {
            populate();
            populatebills();
            fillcombo();
            SellerNamelbl.Text = Form1.Sellername;
        }
        
        private void panel1_Paint(object sender, PaintEventArgs e)
        {
            Datelbl.Text = DateTime.Today.Day.ToString() + "/" + DateTime.Today.Month.ToString() + "/" + DateTime.Today.Year.ToString();
        }
        int Grdtotal = 0, n = 0;

        private void button4_Click(object sender, EventArgs e)
        {
            if (Billid.Text == "")
            {
                MessageBox.Show("Missing Bill ID");
            }
            else
            {
                try
                {
                    string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                    MySqlConnection con = new MySqlConnection(constring);

                    con.Open();

                    string query = "insert into BillTbl values(" + Billid.Text + ",'" + SellerNamelbl.Text + "','" + Datelbl.Text + "','" + Amtlbl.Text + "')";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Order Added Successfully");
                    con.Close();
                    populatebills();
                }

                catch (Exception ee)
                {
                    MessageBox.Show("Error: " + ee.Message);
                }
            }
        }

        private void BillsDGV_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            
        }

        private void printDocument1_PrintPage(object sender, System.Drawing.Printing.PrintPageEventArgs e)
        {
            e.Graphics.DrawString("SUPERMARKET", new Font("Century Gothic", 25, FontStyle.Bold), Brushes.Red, new Point(230));
            e.Graphics.DrawString("Bills ID: " + BillsDGV.SelectedRows[0].Cells[0].Value.ToString(), new Font("Century Gothic", 20, FontStyle.Bold), Brushes.Blue, new Point(100,70));
            e.Graphics.DrawString("Seller Name: " + BillsDGV.SelectedRows[0].Cells[1].Value.ToString(), new Font("Century Gothic", 20, FontStyle.Bold), Brushes.Blue, new Point(100, 100));
            e.Graphics.DrawString("Date: " + BillsDGV.SelectedRows[0].Cells[2].Value.ToString(), new Font("Century Gothic", 20, FontStyle.Bold), Brushes.Blue, new Point(100, 130));
            e.Graphics.DrawString("Total Amount: " + BillsDGV.SelectedRows[0].Cells[3].Value.ToString(), new Font("Century Gothic", 20, FontStyle.Bold), Brushes.Blue, new Point(100, 160));
            e.Graphics.DrawString("CodeSpace", new Font("Century Gothic", 20, FontStyle.Italic), Brushes.Red, new Point(270, 230));
        }

        private void button5_Click(object sender, EventArgs e)
        {
            if(printPreviewDialog1.ShowDialog() == DialogResult.OK)
            {
                printDocument1.Print();
            }
        }

        private void button7_Click(object sender, EventArgs e)
        {
            populate();
            populatebills();
            
        }

        private void SearchCb_SelectionChangeCommitted(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();
                string query = "select ProdName,ProdPrice from ProductTbl where ProdCat='" + SearchCb.SelectedValue.ToString() + "'";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                ProdDGV1.DataSource = ds.Tables[0];
                
                con.Close();

            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void fillcombo()
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();
                MySqlCommand cmd = new MySqlCommand("select CatName from CategoryTbl", con);
                MySqlDataReader rdr;
                rdr = cmd.ExecuteReader();
                DataTable dt = new DataTable();
                dt.Columns.Add("CatName", typeof(string));
                dt.Load(rdr);
                //CatCb.ValueMember = "CatName";
                //CatCb.DataSource = dt;
                SearchCb.ValueMember = "CatName";
                SearchCb.DataSource = dt;


                con.Close();

            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void label5_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form1 login = new Form1();
            login.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {

                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);
                if (ProdName.Text == "" || ProdQt.Text == "")
                {
                    MessageBox.Show("Missing Data");
                }
                else
                { 

                int total = Convert.ToInt32(ProdPrice.Text) * Convert.ToInt32(ProdQt.Text);
                DataGridViewRow NewRow = new DataGridViewRow();
                NewRow.CreateCells(OrderDGV);
                NewRow.Cells[0].Value = n + 1;
                NewRow.Cells[1].Value = ProdName.Text;
                NewRow.Cells[2].Value = ProdPrice.Text;
                NewRow.Cells[3].Value = ProdQt.Text;
                NewRow.Cells[4].Value = Convert.ToInt32(ProdPrice.Text) * Convert.ToInt32(ProdQt.Text);
                OrderDGV.Rows.Add(NewRow);
                    n++;
                Grdtotal = Grdtotal + total;
                Amtlbl.Text = ""+Grdtotal;

            }
            }
            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }



        }
    }
}
