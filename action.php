<?php
session_start();
$_SESSION['quantity'] = $_SESSION['quantity'] - 1;
require("mysqli.php");
$q = "UPDATE bookinventory SET Quantity = '".$_SESSION['quantity']."' WHERE Name = '".$_SESSION['bookname']."';" ;
echo $q;
$r = @mysqli_query($dbc, $q);
sleep(2);
header('Location: http://localhost/project1/store.php');
?>