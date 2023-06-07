<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM departments WHERE id = $id";
$con = db_connect();
$result = $con->query($sql);
if($result){
    echo "<script>alert('Data Deleted Sucessfully')</script>";
    echo "<script>document.location='Table.php';</script>";
}else{
    echo "Cannot Delete Data";
}
?>