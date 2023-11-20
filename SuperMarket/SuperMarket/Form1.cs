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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        public static string Sellername = "";

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            UnameTb.Text = "";
            PassTb.Text = "";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (UnameTb.Text == "" || PassTb.Text == "")
            {
                MessageBox.Show("Enter The UserName And Password");
            }
            else
            {
                if (RoleCb.SelectedIndex > -1)
                {
                    if (RoleCb.SelectedItem.ToString() == "ADMIN")
                    {
                        if (UnameTb.Text == "Admin" && PassTb.Text == "Admin")
                        {
                            ProductForm prod = new ProductForm();
                            prod.Show();
                            this.Hide();
                        }
                        else
                        {
                            MessageBox.Show("If you are the Admin, Enter the correct id and password");
                        }
                    }
                    else
                    {
                        try
                        {

                            string constring = "datasource=localhost;username=root;password=;database=smarketdb;port=3306;";

                            MySqlConnection con = new MySqlConnection(constring);
                            //MessageBox.Show("Youe in the seller selection");
                            con.Open();
                            MySqlDataAdapter sda = new MySqlDataAdapter("select count(8) from SellerTbl where SellerName='" + UnameTb.Text + "' and SellerPass='" + PassTb.Text + "'", con);
                            DataTable dt = new DataTable();
                            sda.Fill(dt);
                            if (dt.Rows[0][0].ToString() == "1")
                            {
                                Sellername = UnameTb.Text;
                                SellingForm sell = new SellingForm();
                                sell.Show();
                                this.Hide();
                                con.Close();
                            }
                            else
                            {
                                MessageBox.Show("Wrong Username or Password");
                            }
                            con.Close();
                        }
                      

                        catch (Exception ee)
                        {
                            MessageBox.Show("Error: " + ee.Message);
                        }

                    }

                }

                else
                {
                    MessageBox.Show("Select A Role");
                }
                } 
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
