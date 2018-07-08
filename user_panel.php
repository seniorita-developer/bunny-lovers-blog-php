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

    <title>Blog</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS --> 
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php include 'header.php';
      ?>
    <div class="jumbotron">
      
    </div>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">My topics</h1>

          <?php

require_once 'config.php';
    $user = $_SESSION['username'];
    $query = "SELECT * FROM topics WHERE username = '".$user."'";
    $result = mysqli_query($link, $query) or die("Oh no...: " . mysqli_error($link));
    

    while ($row = mysqli_fetch_array($result)) {
		echo "<div class='card mb-4'><div class='card-body'><h2 class='card-title'>". $row['topic']."</h2>
          <p class='card-text blog-details'>".$row['details']."</p>
          <a href='view_topic.php?id=" . $row['id'] . "' class='btn btn-primary'>Read More &rarr;</a>
          <a href='edit_topic.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit post</a>
          <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_topic.php?id=" . $row['id'] . "' class='btn btn-primary'>Delete post</a>
          </div>
          <div class='card-footer text-muted'>Posted on "
          .$row['datetime']." by <a href='#'>".$row['username']."</a></div></div>";
				}
?>
       

       </div>
        <?php include 'side_nav.php';
        ?>
        
            </div>
          </div>

          
      <!-- /.row -->

    </div>
    </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'footer.php';?>

  </body>
</html>