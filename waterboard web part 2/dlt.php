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

    <?php include('header.php') ?>
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


                                        <?php
                                        include('db.php');







                                        $query = "SELECT * FROM energy_programme where id='$ID'";
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
                                        <center>
                                            <div class="container-xl">
                                                <div class="container-xl">

                                                    <form class="form-horizontal" method="post" action=" <?php echo '?id=' . $ID; ?>" enctype="multipart/form-data" style="float: right;">
                                                        <hr>
                                                        <h5>DELETE ENTRY PROGRAMME</h5>
                                                        <hr>
                                                        <center>
                                                            <?php $id = $row['id'];

                                                            ?>
                                                            <div class="modal-body">
                                                                <div id="delete<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                                    <h3 id="myModalLabel">Delete</h3>
                                                                </div>
                                                                <center>
                                                                    <p>
                                                                    <div style="font-size:larger;" class="alert alert-danger">Are you Sure you want Delete <b style="color:red;"><?php echo $row['schme'] . " " .$row['date']. " " . $row['description'] . " " . $row['project_cost'] . " " . $row['annual_savings']; ?></b> Data?
                                                                    </div>
                                                                    </p>
                                                                    
                                                                    
                                                                        <div class="modal-footer">
                                                                        <center>
                                                                            <a href="energyprogrammeAdmin.php" class="btn btn-inverse"> No</a>
                                                                            <a href="delete.php<?php echo '?id=' . $id; ?>" class="btn btn-danger">Yes</a>
                                                                       </center>
                                                                        </div>
                                                                   
                                                                </center>
                                                                <hr>



                                                            </div>
                                    </center>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>



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