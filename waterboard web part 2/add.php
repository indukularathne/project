<?php
require_once('db.php');


$schme= $_POST['schme'];
$date= $_POST['date'];
$description= $_POST['description'];
$project_cost= $_POST['project_cost'];
$annual_savings= $_POST['annual_savings'];




$sql= mysqli_query($conn, "INSERT into energy_programme(schme,date, description, project_cost, annual_savings) values('$schme','$date','$description','$project_cost','$annual_savings') ");
if ($sql) {
   // echo "Success dauwooo";
} else {
   // echo "Faild daruwooo";
}


echo "<script>alert('Account successfully added!'); window.location='energyprogrammeAdmin.php'</script>";
?>