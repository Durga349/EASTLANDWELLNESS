<?php

session_start();
unset($_SESSION['UserID']);
unset($_SESSION['cartID']);
unset($_SESSION['user_type']);
header("Location:index");

?>