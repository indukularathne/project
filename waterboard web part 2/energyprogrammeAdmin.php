<!DOCTYPE html>

<html lang="en">

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>M & E SERVICES DIVISION</title>

<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link rel="Stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">




</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>M & E SERVICES DIVISION <br>
              <font size=3> Regional Support Center(NWP) </font>
            </span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="adminhome.php">Admin Home</a></li>
          <li><a href="admindetails.php">Admin Details</a></li>
          <li><a href="Logindetails.php">Login Details</a></li>
          <li class="active"><a href="#Energy_ProgrammeAdmin">Energy Programme</a></li>
          <li><a href="otherprojectAdmin.php">Other Projects</a></li>
          <li><a href="registation.php">User Registration</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <main id="main">


    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>
            Energy Programme
          </h2>
          <ol>
            <li><a href="adminhome.php">Admin Home</a></li>
            <li>Energy Programme</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->













    <section class="inner-page">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h6>
              <center> Energy Saving Budget</center>
              <h6>
                <!--?php include('modal_add.php'); ?-->



                <!--Search & Item per page begin -->

                <!--Search & Item per page finish -->

                <div class="span12">


                  <a href="modal_add.php" type="btn" class="btn btn-primary"> Click Here To Add </a>
                </div>

                <br><br>

                <table id="datatableid" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">




                  <thead>
                    <tr>
                      <th style="text-align:center;">Date</th>
                      <th style="text-align:center;">Scheme</th>
                      <th style="text-align:center;">Description</th>
                      <th style="text-align:center;">Project Cost</th>
                      <th style="text-align:center;">Annual Savings</th>
                      <th style="text-align:center;">Edit OR Delete</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once('db.php');
                    //$result = $conn->prepare("SELECT * FROM energy_programme ORDER BY id ASC");
                    //$result->execute();

                    $query = "SELECT * FROM energy_programme ";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                      $count = mysqli_num_rows($result);   //cheking how many records return
                      // echo "SUCCESS daruwooo";

                      mysqli_fetch_assoc($result);   //return resultset
                    } else {
                      // echo "Faild daruwoo";
                    }

                    //for($i=0; $row = $result->fetch(); $i++){
                    //$id=$row['id'];
                    //$scheme=$row['schme'];
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <div id="createModal" class="modal" tabindex="-1" role="dialog">
                        <tr>

                          <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['date'];
                                                                                              $id = $row['id'] ?></td>
                          <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['schme']; ?></td>
                          <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['description']; ?></td>
                          <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['project_cost']; ?></td>
                          <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['annual_savings']; ?>

                          <td style="text-align:center; width:350px;">

                            <a href="edit.php<?php echo '?id=' . $id; ?>" class="btn btn-info">Edit</a>
                            <a href="dlt.php<?php echo '?id=' . $id; ?>" class="btn btn-danger"> Delete</a>
                          </td>

                          </td>

                          <!-- Modal -->

                        </tr>
                      </div>
                    <?php } ?>
                  </tbody>
                </table>


          </div>




        </div>

      </div>
      </div>

    </section>

  </main>

  <div id="createModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <form id="createForm">


          </form>
        </div>

      </div>
    </div>
  </div>






  <br><br>
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong> National Water Supply and Drainage Board</strong>. All Rights Reserved
          </div>
          <div class="credits">

            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="adminhome.php" class="scrollto">Admin Home</a>

          </nav>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>\

  <script>
    $(document).ready(function() {
      $('#datatableid').DataTable();
    });
  </script>

</body>

</html>