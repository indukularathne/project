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


                                        
                                        <center>
                                            <div class="container-xl">
                                                <div class="container-xl">

                                                    <form class="form-horizontal" method="post" action=" <?php echo '?id=' . $ID; ?>" enctype="multipart/form-data" style="float: right;">
                                                        <hr>
                                                        <h5>INVALIED DETAILS</h5>
                                                        <hr>
                                                        <center>
                                                            
                                                            <div class="modal-body">
                                                                <div id="delete<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                                    <h3 id="myModalLabel">Delete</h3>
                                                                </div>
                                                                <center>
                                                                    <p>
                                                                    <div style="font-size:larger;" class="alert alert-danger"><b style="color:red;">Invalied User Name Or Password! </b> 
                                                                    </div>
                                                                    </p>
                                                                    
                                                                    
                                                                        <div class="modal-footer">
                                                                        <center>
                                                                            
                                                                            <a href="exit()" class="btn btn-danger">Ok</a>
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