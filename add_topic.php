<?php

session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Learn it</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS --> 
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
    <?php include 'header.php';
      ?>
    <div class="jumbotron">
      
    </div>
    <div class="container">
    <div class="wrapper">
    <p>Please fill this form to create a new topic.</p>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" 
    id="form1" name="form1" enctype="multipart/form-data">
      <div class="form-group">
      Topic: <input type="text" name="topic" class="form-control"><br /></div>
      <div class="form-group">
        Details: <textarea type="text" name="details" class="form-control" row="5" <br /></textarea></div>
        
      Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"> <div class="form-group">
          <input type="submit" name="submit" value="Add new post" class="btn btn-primary">
      </div>
    </form>


<?php

require_once 'config.php';

if(isset($_POST['submit'])){

$topic=$_POST['topic'];
$details=$_POST['details'];
$datetime=date("y/m/d h:i:s");
$username=$_SESSION['username'];

$raw_image = $_FILES["fileToUpload"]["tmp_name"];
if($raw_image) 
{
  $image = file_get_contents($raw_image);
} else 
{
  $image = '';
}

if ($topic == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';

}

else

{
$sql = "INSERT INTO topics (topic, details, datetime, username, image) VALUES ('$topic', '$details', 
'$datetime', '$username', '" .mysqli_escape_string($link, $image). "')";

if (mysqli_query($link, $sql)) {
    echo "New post added successfully<br />";
    echo "<a href='user_panel.php'>Got to my posts</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}
}
mysqli_close($link);

?>


</div>
</div>
<!-- Footer -->
    <?php include 'footer.php';?>
</body>
</html>

