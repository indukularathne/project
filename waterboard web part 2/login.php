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

                                            if (isset($_POST['username'])) {

                                                $username = $_POST['username'];
                                                $password = $_POST['password'];

                                                $query = "SELECT * FROM user_registration WHERE username='" . $username . "' AND password='" . $password . "' limit 1 ";
                                                $result = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($result) == 1) {
                                                    
                                                } else {
                                                    echo "<script> window.location='invaliedlogin.php';</script>";
                                                }

                                                if ($result) {
                                                    $resultcheck = mysqli_num_rows($result);//cheking how many records return
                                                   // echo "SUCCESS daruwooo";
                            
                                                  if($resultcheck>0){
                                                    while ($row = mysqli_fetch_assoc($result)) { 
                                                       // echo "Success adooo"."<br>";



                                                        
                                                        
                                                        $firstname= $row['firstname']; 
                                                        $lastname=$row['lastname'];
                                                        $mobile=$row['mobile'];
                                                        $email=$row['email'];      
                                                        $username=$row['username'];
                                                        $password=$row['password'];
                            
                                                        $sql = mysqli_query($conn, "INSERT into login_details(firstname, lastname, mobile, email, username, password) values('$firstname','$lastname','$mobile','$email','$username','$password') ");
                            
                                                        if ($sql) {
                                                           // echo "Success adoooooo";
                                                            echo "<script> window.location='adminhome.php'</script>";   
                                                        } else {
                                                          //  echo "Faild daruwooo";
                                                        }
                                                        
                                                        
                                                               
                                                       
                            
                            
                                                         }

                                                  }
                            
                                                   
                                                
                                                   
                            
                                               } else {
                                                     echo "Faild daruwoo";
                                                  }



                                            } ?>

                                        </div>
                                        <center>
                                            <hr>
                                            <form method="post" action="login.php" enctype="multipart/form-data">
                                                <center>
                                                    <h5>Login</h5>
                                                </center>
                                                <hr>
                                                <table class="table1">

                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">User Name</label></td>
                                                        <td width="30"></td>
                                                        <td><input type="text" rows="5" cols="80" name="username" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Password</label></td>
                                                        <td width="30"></td>
                                                        <td><input type="password" rows="5" cols="80" name="password" required></td>
                                                    </tr>
                                                    <br>



                                                </table>

                                                <center>
                                                    <hr>


                                                    <button type="submit" id="login" name="login" class="btn btn-primary"> Login</button>

                                                    <hr>
                                                </center>

                                            </form>

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