<?php
session_start();
session_unset();
session_destroy();
header('location:index.php?success=Logged Out Succesfuly');
?>