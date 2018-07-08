<?php

session_start();
if(!isset($_SESSION['username']) || $_SESSION['username']!='admin'){
   header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin panel</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS --> 
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>
<script>


</script>
    <!-- Navigation -->
    <?php include 'header.php';
      ?>
    <div class="jumbotron">
      
    </div>
    <!-- Page Content -->
    
    <div class="container">
      <div class="row">

        <div class="col-md-4">

          <h1 class="my-4">Newest topics</h1>

          <?php
          require_once 'config.php';
          $query = "SELECT * FROM topics";
          $result = mysqli_query($link, $query) or die("Oh crap...: " . mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
					echo "<div class='card mb-4'><div class='card-body'><h2 class='card-title'>". $row['topic']."</h2>
          <p class='card-text blog-details'>".$row['details']."</p>
          <a href='#' class='btn btn-primary'>Read More &rarr;</a>
          <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='admin_delete_topic.php?id=" . $row['id'] . "' class='btn btn-primary'>Delete post</a>
          </div>
          <div class='card-footer text-muted'>Posted on "
          .$row['datetime']." by <a href='#'>".$row['username']."</a></div></div>";
				}
?>
</div>
        <!-- Sidebar Widgets Column -->

        <div class="col-md-4">
        <h1 class="my-4">Users</h1>
<?php

require_once 'config.php';
 
    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query) or die("Oh crap...: " . mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
					echo "<div class='card mb-4><ul class='list-group'><li class='list-group-item'>". $row['username']."
                    <a onClick=\"javascript: return confirm('Please confirm deletion');\" 
                    href='delete_user.php?id=". $row['id'] ."' '>Delete user</a></li></ul>
          
          </div>";
				}
?>
        </div>
        <?php include 'side_nav.php';
        ?>
          
        </div>
      </div>
      <!--row -->
    </div>
    <!--container -->

    <!-- Footer -->
    
      <?php include 'footer.php';
      ?>
  </body>

</html>
