<?php
require_once 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

$id = $_GET['id'];

$result = mysqli_query($link,"DELETE FROM topics WHERE id=$id") or die(mysqli_error($link));

header("Location: admin.php");

}
else
{
//header("Location: admin.php");
echo "Error! Cannot delete user";
}

?>