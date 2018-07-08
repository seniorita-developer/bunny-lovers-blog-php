<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username']!='admin'){
   header("Location:login.php");
}
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

$id = $_GET['id'];

$result = mysqli_query($link,"DELETE FROM users WHERE id=$id") or die(mysqli_error($link));

header("Location: admin.php");

}
else
{
header("Location: admin.php");
}

?>