<?php
setcookie("username", "Admin");
setcookie("favouratecolor", "Black");

header("set-Cookie: username= Admin; path= login.php; secure");
?>