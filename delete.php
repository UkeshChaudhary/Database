<?php
include 'connection.php';
$id = $_GET['id'];
$con = db_connect();
$sql = "DELETE FROM departments WHERE id = $id";
$result = $con->query($sql);
if($result){
    echo "<script>alert('Data Deleted Sucessfully')</script>";
    echo "<script>document.location='Table.php';</script>";
}else{
    echo "Cannot Delete Data";
}
?>