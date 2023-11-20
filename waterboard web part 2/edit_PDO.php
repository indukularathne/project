<?php






include 'db.php';

$get_id=$_REQUEST['id'];

$schme= $_POST['schme'];
$date= $_POST['date'];
$description= $_POST['description'];
$project_cost= $_POST['project_cost'];
$annual_savings= $_POST['annual_savings'];





$sql= mysqli_query($conn,"UPDATE energy_programme SET schme ='$schme',date ='$date', description ='$description', project_cost ='$project_cost', 
annual_savings ='$annual_savings' WHERE id = '$get_id' " );
if ($sql) {
    //echo "update Success dauwooo";
} else {
    //echo "Faild daruwooo";
}

echo "<script>alert('Successfully Edit The Account!'); window.location='energyprogrammeAdmin.php'</script>";
?>

