<?php
session_start();

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
    <div class="row">

        <!-- Column -->
        <div class="col-md-8">

    <?php
    require_once 'config.php';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
      $id = $_GET['id'];
      $result = mysqli_query($link, "SELECT * FROM topics WHERE id=$id") or die(mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if($row){
        $topic = $row['topic'];
        $details = $row['details'];
        $image = $row['image'];
        
        } else{
          echo "No results!";
          }
          } else{
            echo 'Error!';
            }
?>
          <h2><?php echo $topic; ?></h2>
          <?php 
          if($image) { 
              echo '<div>';
              echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" style="max-height: 400px"/>';
              echo '</div>';
          } 
          ?>
          <div>
          <p><?php echo $details; ?></p>
          </div>
    
        </div>

  

        <!-- Sidebar Widgets Column -->
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