<?php
require_once('db.php');


$schme= $_POST['schme'];
$date= $_POST['date'];
$description= $_POST['description'];
$project_cost= $_POST['project_cost'];





$sql= mysqli_query($conn, "INSERT into other_project(schme,date, description, project_cost) values('$schme','$date','$description','$project_cost') ");
if ($sql) {
   // echo "Success dauwooo";
} else {
   // echo "Faild daruwooo";
}


echo "<script>alert('Account successfully added!'); window.location='otherprojectAdmin.php'</script>";
?>