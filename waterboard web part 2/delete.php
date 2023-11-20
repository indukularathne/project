
<?php
require_once('db.php');

$get_id=$_GET['id'];

$sql= mysqli_query($conn, "Delete from energy_programme where id = '$get_id'");
if ($sql) {
   // echo "update Success dauwooo";
} else {
   // echo "Faild daruwooo";
}
header('location:energyprogrammeAdmin.php');
?>
      