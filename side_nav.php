<div class="col-md-4">
        
        <!--Welcome panel -->
          <div class="card my-4">
            <h5 class="card-header">Welcome to our site!</h5>
             <div class="card-body" "welcome-panel">
              <h5> 
              Hi, <?php 
              if(isset($_SESSION['username'])){
                  echo $_SESSION['username']; 
              }else {
                  echo 'guest';
              } ?></h5>
                  <?php
                  if(isset($_SESSION['username'])){
                      echo '<a href="add_topic.php">Add new post</a></br>
                      <a  href="user_panel.php">Manage my posts</a>';
                  } else {
                      echo 'You should be logged in to add new topics.';
                  }
                  ?>
                  
                </div>
          </div>
            </div>
          </div>
          </div>