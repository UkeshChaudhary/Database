<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

<?php
include 'connection.php';
session_start();
if(isset($_POST['username'])){
    $username =$_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from user where username='$username' and password= '$password'";
    $con = db_connect();
    $result = $con->query($sql);
    if($result->num_rows>0){
        $_SESSION['user']=$username;
        header("location:Table.php");
    }else{
        $_SESSION['loginmessage']="login Failed: Username or Password Incorrect";
    }
}

?>
<div class="mt-2 text-center">
<form action="" method="post">
    <label for="username">Useranme: </label>
    <input type="text" name="username" id="username">
    <br><br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password">
    <br><br>
    <input type="submit" value="Submit" class="">
</form>
</div>
<?php
if(isset($_SESSION['loginmessage'])){
    echo $_SESSION['loginmessage'];
}
?>
