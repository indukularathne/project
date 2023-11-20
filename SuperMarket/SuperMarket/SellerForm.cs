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
    public partial class SellerForm : Form
    {
        public SellerForm()
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
                string query = "select * from SellerTbl";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                SellerDGV.DataSource = ds.Tables[0];
                con.Close();
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }

        }

        private void SellerForm_Load(object sender, EventArgs e)
        {
            populate();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();

                string query = "insert into SellerTbl values(" + Sellerid.Text + ",'" + SellerName.Text + "','" + SellerAge.Text + "','" + SellerPhone.Text + "','" + SellerPass.Text + "')";
                MySqlCommand cmd = new MySqlCommand(query, con);
                cmd.ExecuteNonQuery();
                MessageBox.Show("Seller Added Successfully");
                con.Close();
                populate();
                Sellerid.Text = "";
                SellerName.Text = "";
                SellerAge.Text = "";
                SellerPhone.Text = "";
                SellerPass.Text = "";
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void SellerDGV_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            Sellerid.Text = SellerDGV.SelectedRows[0].Cells[0].Value.ToString();
            SellerName.Text = SellerDGV.SelectedRows[0].Cells[1].Value.ToString();
            SellerAge.Text = SellerDGV.SelectedRows[0].Cells[2].Value.ToString();
            SellerPhone.Text = SellerDGV.SelectedRows[0].Cells[3].Value.ToString();
            SellerPass.Text = SellerDGV.SelectedRows[0].Cells[4].Value.ToString();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                if (Sellerid.Text == "" || SellerName.Text == "" || SellerAge.Text == "" || SellerPhone.Text == "" || SellerPass.Text == "")
                {
                    MessageBox.Show("Missing Information");
                }
                else
                {

                    con.Open();
                    string query = "update SellerTbl set SellerName='" + SellerName.Text + "',SellerAge='" + SellerAge.Text + "',SellerPhone='" + SellerPhone.Text + "',SellerPass='" + SellerPass.Text + "' where Sellerid=" + Sellerid.Text + ";";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Seller Successfully Updated");
                    con.Close();
                    populate();
                    Sellerid.Text = "";
                    SellerName.Text = "";
                    SellerAge.Text = "";
                    SellerPhone.Text = "";
                    SellerPass.Text = "";
                }
            }
            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void button6_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                if (Sellerid.Text == "")
                {
                    MessageBox.Show("Select The Seller to Delete");
                }
                else
                {
                    con.Open();
                    string query = "delete from SellerTbl where Sellerid=" + Sellerid.Text + "";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Seller Deleted Successfully");
                    con.Close();
                    populate();
                    Sellerid.Text = "";
                    SellerName.Text = "";
                    SellerAge.Text = "";
                    SellerPhone.Text = "";
                    SellerPass.Text = "";
                }
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            ProductForm product = new ProductForm();
            product.Show();
            this.Hide();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            CategoryForm cat = new CategoryForm();
            cat.Show();
            this.Hide();
        }

        private void label7_Click(object sender, EventArgs e)
        {
            Form1 log = new Form1();
            log.Show();
            this.Hide();
        }
    }
}
