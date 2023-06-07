<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<?php
session_start();
include 'connection.php';

$id = $_GET['id'];
$con = db_connect();
$sql = "select * from departments where id=$id";
$result = $con->query($sql);
$data = $result->fetch_array();
?>

<div class="container col-md-6">
        <h2 class="text-center">Department Regestration</h2>
        <form method="POST">
        <div class="mb-3">
                <label for="department_name" class="form-label">Department Id:</label>
                <input type="text" name="id" id="id" class="form-control" value="<?=$data['id']?>" required>
            </div>
            <div class="mb-3">
                <label for="department_name" class="form-label">Department Name:</label>
                <input type="text" name="department_name" id="department_name" class="form-control" value="<?=$data['department_name']?>" required>
            </div>
            <div class="mb-3">
                <label for="dep_code" class="form-label">Department Code:</label>
                <input type="text" name="dep_code" id="dep_code" class="form-control" value="<?=$data['dep_code']?>" required>
            </div>
            <!-- <div class="mb-3">
                <label for="created_date" class="form-label">Created Date:</label>
                <input type="date" name="created_date" id="created_date" class="form-control" value="<?=$data['created_date']?>">
            </div> -->
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="text" name="status" value="<?=$data['status']?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary align-item-center">Submit</button>
        </form>
    </div>

<?php
if(isset($_POST['status'])){
    $name = $_POST['department_name'];
    $code = $_POST['dep_code'];
    // $date = $_POST['created_date'];
    $status = $_POST['status'];
    $updatequery="update departments set department_name='".$name."', dep_code='".$code."', status= $status where id=$id";
    $updated = $con->query($updatequery);
    if($updated){
        // echo "<script>alert('Update Sucessfully')</script>";
        // echo "<script>document.location='Table.php';</script>";
        $_SESSION['message']="Update Success";
        header("Location:Table.php");
    }else{
        echo "Unable to Update";
    }
}
$con->close();
?>

