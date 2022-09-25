<?php
if(!empty($_SESSION['user_id'])){
  ?>
<!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="images/userpic.jpg" alt="" class="img-responsive profile-photo" />
                  
                  <h3><?=$_SESSION['username']?>&nbsp;<span class="verified"></span></h3>
                  <p class="text-muted">Senate President</p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="timeline.php" class="active">Timeline</a></li>
                  <li><a href="timeline-about.php">About</a></li>

                </ul>
                <ul class="follow-me list-inline">
                  <li>1,299 followers</li>
                  <li><button class="btn-primary">Follow</button></li>
                  <li><a href="messages.php" class="btn btn-success">Message</a></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="images/userpic.jpg" alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="timline.php" class="active">Timeline</a></li>
                <li><a href="timeline-about.php">About</a></li>

              </ul>
              <button class="btn-primary">Follow</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->
  <?php
}else{
  header('location:index.php');
}
?>