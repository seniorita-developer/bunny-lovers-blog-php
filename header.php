<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Bunny lovers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <?php
                if(isset($_SESSION['username'])){
                    if($_SESSION['username']=='admin'){
                        echo '<a class="nav-link" href="admin.php">Home</a>';
                    }else {
                        echo '<a class="nav-link" href="home.php">Home</a>';
                    }
                    
                    } else {
                        echo '<a class="nav-link" href="index.php">Home</a>';
                    }

              ?>
              </a>
            </li>
            <li class="nav-item">
                 <?php
                if(!isset($_SESSION['username'])){
                        echo '<a class="nav-link" href="register.php">Register</a>';
                    }
              ?>
              
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="nav-link" href="logout.php">Log out</a>';
                    } else {
                        echo '<a class="nav-link" href="login.php">Log in</a>';
                    }

              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>