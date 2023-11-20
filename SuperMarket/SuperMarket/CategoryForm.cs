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
    public partial class CategoryForm : Form
    {
        public CategoryForm()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                con.Open();

                string query = "insert into CategoryTbl values(" + CatidTb.Text + ",'" + CatNameTb.Text + "','" + CatDescTb.Text + "')";
                MySqlCommand cmd = new MySqlCommand(query, con);
                cmd.ExecuteNonQuery();
                MessageBox.Show("Category Added Successfully");
                con.Close();
                populate();
                CatidTb.Text = "";
                CatNameTb.Text = "";
                CatDescTb.Text = "";
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }


        private void populate()
        {
            try
            {



                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);
                con.Open();
                string query = "select * from CategoryTbl";
                MySqlDataAdapter sda = new MySqlDataAdapter(query, con);
                MySqlCommandBuilder builder = new MySqlCommandBuilder(sda);
                var ds = new DataSet();
                sda.Fill(ds);
                CatDGV.DataSource = ds.Tables[0];
                con.Close();
            }

            catch (Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }

        }
        private void CategoryForm_Load(object sender, EventArgs e)
        {
            populate();
        }

        

        private void CatDGV_CellContentClick_1(object sender, DataGridViewCellEventArgs e)
        {
            CatidTb.Text = CatDGV.SelectedRows[0].Cells[0].Value.ToString();
            CatNameTb.Text = CatDGV.SelectedRows[0].Cells[1].Value.ToString();
            CatDescTb.Text = CatDGV.SelectedRows[0].Cells[2].Value.ToString();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            try
            {
                string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                MySqlConnection con = new MySqlConnection(constring);

                if (CatidTb.Text == "")
                {
                    MessageBox.Show("Select The Category to Delete");
                }
                else
                {
                    con.Open();
                    string query = "delete from CategoryTbl where Catid=" + CatidTb.Text + "";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Category Deleted Successfully");
                    con.Close();
                    populate();
                    CatidTb.Text = "";
                    CatNameTb.Text = "";
                    CatDescTb.Text = "";
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

                if (CatidTb.Text == "" || CatNameTb.Text == "" || CatDescTb.Text == "")
                {
                    MessageBox.Show("Missing Information");
                }
                else
                {

                    con.Open();
                    string query = "update CategoryTbl set CatName='" + CatNameTb.Text + "',CatDesc='" + CatDescTb.Text + "' where Catid=" + CatidTb.Text + ";";
                    MySqlCommand cmd = new MySqlCommand(query, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Category Successfully Updated");
                    con.Close();
                    populate();
                    CatidTb.Text = "";
                    CatNameTb.Text = "";
                    CatDescTb.Text = "";
                }
            }
            catch(Exception ee)
            {
                MessageBox.Show("Error: " + ee.Message);
            }
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            ProductForm prod = new ProductForm();
            prod.Show();
            this.Hide();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            SellerForm seller = new SellerForm();
            seller.Show();
        }

        private void label5_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form1 login = new Form1();
            login.Show();
        }
    }
}
