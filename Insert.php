<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

    <div class="container col-md-6">
        <h2 class="text-center">Department Regestration</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="department_name" class="form-label">Department Name:</label>
                <input type="text" name="department_name" id="department_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dep_code" class="form-label">Department Code:</label>
                <input type="text" name="dep_code" id="dep_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="created_date" class="form-label">Created Date:</label>
                <input type="date" name="created_date" id="created_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="inactive">0</option>
                    <option value="active">1</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary align-item-center">Submit</button>
            <input type="button" value="Cancel" onclick="window.location.href='insert.html'">
        </form>
    </div>


<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['department_name'];
    $code = $_POST['dep_code'];
    $date = $_POST['created_date'];
    $status = $_POST['status'];
    // ... retrieve other form fields

    // Insert data into the database
    $sql = "INSERT INTO departments (department_name,dep_code,created_date,status)
     VALUES ('$name', '$code', '$date', '$status')";
    // Execute the query
    $con = db_connect();
    $result = $con->query($sql);
    if($result){
        echo "<script>alert('Data Inserted Sucessfully')</script>";
    echo "<script>document.location='Table.php';</script>";
    }else{
        echo "Cannot Regester Data";
    }

    // Close the database connection
    mysqli_close($con);
}
?>