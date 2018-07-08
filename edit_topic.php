<?php

session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}

require_once 'config.php';
function renderForm($id, $topic, $details, $error) {

if ($error != '') {
    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
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
    <p>Edit your post</p>

<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div class="form-group">
Topic:<input type="text" class="form-control" name="topic" value="<?php echo $topic; ?>"/><br/>
</div>
<div class="form-group">
Details:  <textarea type="text" name="details"  class="form-control">
<?php echo $details; ?>
</textarea>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="submit" value="Submit"></div>
</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit'])){
    if (is_numeric($_POST['id'])){
    $id = $_POST['id'];
    $topic = mysqli_real_escape_string($link, htmlspecialchars($_POST['topic']));

    $details = mysqli_real_escape_string($link,htmlspecialchars($_POST['details']));

    if ($topic == '') {
    $error = 'ERROR: Please fill in all required fields!';
    renderForm($id, $topic, $details, $error);
    } else {

    // save the data to the database and redirect to user panel

    mysqli_query($link, "UPDATE topics SET topic='$topic', details='$details' WHERE id='$id'") 
    or die(mysqli_error($link));

    header("Location: user_panel.php");
    }
} else { 
    echo 'Error!';
    }
} else

{

// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM topics WHERE id=$id") or die(mysqli_error($link));

$row = mysqli_fetch_array($result);

if($row)

{

$topic = $row['topic'];
$details = $row['details'];

renderForm($id, $topic, $details, '');

} else{

echo "No results!";
}
} else{
echo 'Error!';
}
}

?>
</div>
</div>
<!-- Footer -->
    <?php include 'footer.php';?>
</body>
</html>