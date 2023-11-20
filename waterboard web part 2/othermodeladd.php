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
                                        <center>
                                            <hr>
                                            <form method="post" action="otheradd.php" enctype="multipart/form-data">
                                                <center>
                                                    <h5>ADD OTHER PROJECTS</h5>
                                                </center>
                                                <hr>
                                                <table class="table1">

                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Scheme</label></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <h1><textarea rows="5" cols="50" name="schme" required></textarea></h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Date</label></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <h1><input type="date" r rows="5" cols="50" name="date" required></h1>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Description</label></td>
                                                        <td width="30"></td>
                                                        <td><textarea rows="5" cols="50" name="description" required></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label style="color:#3a87ad; font-size:18px;">Project Cost</label></td>
                                                        <td width="30"></td>
                                                        <td><textarea rows="1" cols="50" name="project_cost" required></textarea></td>
                                                    </tr>
                                                   
                                                    <br>



                                                </table>

                                                <center>
                                                    <hr>

                                                    <button class="btn"> <a href="otherprojectAdmin.php">Close</a></button>
                                                    <button type="submit" name="Submit" class="btn btn-primary">Add</button>

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