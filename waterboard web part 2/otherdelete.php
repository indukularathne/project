
<?php
require_once('db.php');

$get_id=$_GET['id'];

$sql= mysqli_query($conn, "Delete from other_project where id = '$get_id'");
if ($sql) {
   // echo "update Success dauwooo";
} else {
   // echo "Faild daruwooo";
}
header('location:otherprojectAdmin.php');
?>
      