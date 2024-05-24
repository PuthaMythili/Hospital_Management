<?php
session_start();
$_SESSION['name']="mythili";
$_SESSION['qualification']="btech";
$name=$_SESSION['name'];
echo $name;
?>
