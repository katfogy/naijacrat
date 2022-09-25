<?php
session_start();
if(!empty($_SESSION['user_id'])){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Title-->
    <title>Naijacrats | Sarah Cruiz</title>
    <!--Metatags-->
    <?php include 'inc/metatags.php'; ?>
    <!--Stylesheets-->
    <?php include 'inc/stylesheets.php'; ?>
    <!--Favicon-->
    <?php include 'inc/favicon.php'; ?>
    <!--Google Font-->
    <?php include 'inc/google_fonts.php'; ?>
  </head>
  <body>
    <!-- Header-->
		<?php require 'inc/header.php' ;?>
    <!--Header End-->
    <div class="container">
      <?php include "inc/timeline-links.php";?>
        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
              <!-- Post Content
              ================================================= -->
              <div class="post-content">
                <img src="images/1.jpg" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="images/userpic.jpg" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.php" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Published a photo about 15 mins ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-comment">
                      <img src="images/userpic.jpg" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.php" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="images/userpic.jpg" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.php" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="row">
                    <p class="custom-label"><strong>Post Comment</strong></p>
                    
                    <div class="form-group col-sm-10">
                      <input id="add-interest" class="form-control input-group-lg" type="text" name="interest" title="Choose Interest" placeholder="Post Comment"/>
                    </div>
                    <div class="form-group col-sm-2">
                      <button class="btn btn-primary">Post</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Footer-->
    <?php require 'inc/footer.php';?>
    <!--preloader-->
   <?php include 'inc/preloader.php'; ?>
   <!--scripts-->
   <?php include 'inc/scripts.php'; ?>
 </body>
</html>
<?php

}else{
  header('location:index.php');
}?>
