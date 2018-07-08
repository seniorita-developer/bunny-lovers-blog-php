<?php
require_once 'config.php';
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

$id = $_GET['id'];

$result = mysqli_query($link,"DELETE FROM topics WHERE id=$id") or die(mysqli_error($link));

header("Location: user_panel.php");

}
else
{
header("Location: user_panel.php");
}

?>