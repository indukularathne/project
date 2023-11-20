<?php






include 'db.php';

$get_id=$_REQUEST['id'];

$schme= $_POST['schme'];
$date= $_POST['date'];
$description= $_POST['description'];
$project_cost= $_POST['project_cost'];






$sql= mysqli_query($conn,"UPDATE other_project SET schme ='$schme',date ='$date', description ='$description', project_cost ='$project_cost'
 WHERE id = '$get_id' " );
if ($sql) {
    //echo "update Success dauwooo";
} else {
    //echo "Faild daruwooo";
}

echo "<script>alert('Successfully Edit The Account!'); window.location='otherprojectAdmin.php'</script>";
?>

