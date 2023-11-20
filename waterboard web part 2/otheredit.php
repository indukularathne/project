<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<?php
include('header.php');
$ID = $_GET['id'];

?>

<html>

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

                                            <?php
                                            include('db.php');







                                            $query = "SELECT * FROM other_project where id='$ID'";
                                            $result = mysqli_query($conn, $query);
                                            if ($result) {
                                                $count = mysqli_num_rows($result);   //cheking how many records return
                                                // echo "SUCCESS daruwooo";

                                                //mysqli_fetch_assoc($result);   //return resultset

                                            } else {
                                                // echo "Faild daruwoo";
                                            }

                                            $row = mysqli_fetch_array($result);


                                            ?>
                                            <hr>
                                            <form class="form-horizontal" method="post" action="otheredit_PDO.php<?php echo '?id=' . $ID; ?>" enctype="multipart/form-data" style="float: right;">
                                                <legend>
                                                    <h5>UPDATE OTHER PROJECTS DETAILS</h5>
                                                </legend>


                                                <div class="control-group">
                                                    <label class="control-label" for="schme">Scheme:</label>
                                                    <div class="controls">
                                                        <textarea rows="5" cols="50" name="schme" required value=<?php echo $row['schme'];
                                                                                                                    $row['id'] ?>><?php echo $row['schme']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="date">Date:</label>
                                                    <div class="controls">
                                                        <input type="date" rows="5" cols="50" name="date" required value=<?php echo $row['date']; ?>>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="description">Description:</label>
                                                    <div class="controls">
                                                        <textarea rows="5" cols="50" name="description" required value=<?php echo $row['description']; ?>><?php echo $row['description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="projectcost">Project Cost:</label>
                                                    <div class="controls">
                                                        <textarea rows="1" cols="50" name="project_cost" required value=<?php echo $row['project_cost']; ?>><?php echo $row['project_cost']; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                    </div>


                                    <div class="control-group">
                                        <div class="controls">
                                            <hr>
                                            <center>
                                                <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Save</button>
                                                <a href="otherprojectAdmin.php" class="btn">Back</a>
                                            </center>
                                        </div>
                                    </div>

                                    </form>

                                    <hr>


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