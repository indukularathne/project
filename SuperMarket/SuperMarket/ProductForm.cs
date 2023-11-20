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
    public partial class ProductForm : Form
    {
        public ProductForm()
        {
            InitializeComponent();
        }

        private void populate()
        {
            try
            {

                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);
                con.Open();
                string query = "select * from ProductTbl";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                ProdDGV.DataSource = ds.Tables[0];
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
                CatCb.ValueMember = "CatName";
                CatCb.DataSource = dt;
                SearchCb.ValueMember = "CatName";
                SearchCb.DataSource = dt;
                   

                con.Close();

            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void ProductForm_Load(object sender, EventArgs e)
        {
            fillcombo();
            populate();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();

                string query = "insert into ProductTbl values(" + Prodid.Text + ",'" + ProdName.Text + "','" + ProdQty.Text + "','" + ProdPrice.Text + "','" + CatCb.SelectedValue.ToString() + "')";
                MySqlCommand cmd = new MySqlCommand(query, con);
                cmd.ExecuteNonQuery();
                MessageBox.Show("Product Added Successfully");
                con.Close();
                populate();
                Prodid.Text = "";
                ProdName.Text = "";
                ProdQty.Text = "";
                ProdPrice.Text = "";


            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            CategoryForm cat = new CategoryForm();
            cat.Show();
            this.Hide();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                if (Prodid.Text == "")
                {
                    MessageBox.Show("Select The Product to Delete");
                }
                else
                {
                    con.Open();
                    string query = "delete from ProductTbl where Prodid =" + Prodid.Text + "";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Product Deleted Successfully");
                    con.Close();
                    populate();
                    Prodid.Text = "";
                    ProdName.Text = "";
                    ProdQty.Text = "";
                    ProdPrice.Text = "";
                }
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                if (Prodid.Text == "" || ProdName.Text == "" || ProdQty.Text == "" || ProdPrice.Text == "" || CatCb.SelectedValue.ToString() == "")
                {
                    MessageBox.Show("Missing Information");
                }
                else
                {

                    con.Open();
                    string query = "update ProductTbl set  ProdName='" + ProdName.Text + "',ProdQty='" + ProdQty.Text + "',ProdPrice='" + ProdPrice.Text + "',ProdCat='" + CatCb.SelectedValue.ToString() + "' where Prodid=" + Prodid.Text + ";";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Product Successfully Updated");
                    con.Close();
                    populate();
                    Prodid.Text = "";
                    ProdName.Text = "";
                    ProdQty.Text = "";
                    ProdPrice.Text = "";
                }
            }
            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void ProdDGV_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            Prodid.Text = ProdDGV.SelectedRows[0].Cells[0].Value.ToString();
            ProdName.Text = ProdDGV.SelectedRows[0].Cells[1].Value.ToString();
            ProdQty.Text = ProdDGV.SelectedRows[0].Cells[2].Value.ToString();
            ProdPrice.Text = ProdDGV.SelectedRows[0].Cells[3].Value.ToString();
            CatCb.SelectedValue = ProdDGV.SelectedRows[0].Cells[4].Value.ToString();
        }

        private void button7_Click(object sender, EventArgs e)
        {
            populate();
        }

        private void SearchCb_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void SearchCb_SelectionChangeCommitted(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();
                string query = "select * from ProductTbl where ProdCat='"+SearchCb.SelectedValue.ToString()+"'";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                ProdDGV.DataSource = ds.Tables[0];
                fillcombo();
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
            this.Hide();
            SellerForm seller = new SellerForm();
            seller.Show();
        }
    }
}
