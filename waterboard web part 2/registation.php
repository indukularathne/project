<!DOCTYPE html>
<?php include('header.php');   ?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>M & E SERVICES DIVISION</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">





</head>


<body>



    <div class="container">
        <div class="hero-unit-header">
            <div class="container-con">
                <!-- end banner & menunav -->

                <div class="container">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <div class="span3"></div>
                                <div class="span6">


                                    <div class="hero-unit-3">

                                        <div>
                                            <?php

                                            require_once('db.php');
                                            $now = new DateTime();
                                            echo Date(' d/m/Y');


                                            if (isset($_POST['create'])) {




                                                $firstname = $_POST['fname'];
                                                $lastname = $_POST['lname'];
                                                $mobile = $_POST['mobile'];
                                                $email = $_POST['email'];
                                                $username = $_POST['username'];
                                                $password = $_POST['password'];

                                                $sql = mysqli_query($conn, "INSERT into user_registration(firstname, lastname, mobile, email, username, password) values('$firstname','$lastname','$mobile','$email','$username','$password') ");
                                                echo "Success dauwooo";
                                                if ($sql) {
                                                    //echo "Success dauwooo";
                                                    echo "<script> window.location='successregistration.php';</script>";
                                                    // echo "Success dauwooo";
                                                } else {
                                                     echo "Faild daruwooo";
                                                }

                                               // echo 'New User Submited.';
                                            }
                                            ?>

                                        </div>
                                        <center>
                                            <hr>
                                            <form method="post"  enctype="multipart/form-data">

                                                <center>
                                                    <h5>USER REGISTRATION</h5>
                                                </center>
                                                <hr>
                                                <table class="table1">







                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">First Name</label></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <h1><input type="text" rows="5" cols="80" name="fname" required></h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Last Name</label></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <h1><input type="text" rows="5" cols="80" name="lname" required></h1>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Mobile Number</label></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <h1><input type="number" rows="5" cols="80" name="mobile" required></h1>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Email</label></td>
                                                        <td width="30"></td>
                                                        <td><input type="email" rows="5" cols="80" name="email" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">User Name</label></td>
                                                        <td width="30"></td>
                                                        <td><input type="text" rows="5" cols="80" name="username" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Password</label></td>
                                                        <td width="30"></td>
                                                        <td><input type="password" rows="5" cols="80" name="password" required></textarea></td>
                                                    </tr>
                                                    <br>

                                                    



                                                </table>
                                                <center>
                                                    <hr>
                                                    <button name="create" class="btn btn-primary">Submit</button>
                                                    
                                                    <button class="btn "><a href="adminhome.php">Cansel</a></button>
                                                    <hr>
                                                </center>

                                               

                                            </form >

                                        </center>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>