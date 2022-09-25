<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Title-->
    <title>Naijacrats | Change Password</title>

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

      <?php include "inc/edit-timeline-links.php";?>

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">
              
            <?php include "inc/edit-profile-menu.php" ;?>
            <div class="col-md-9">

              <!-- Change Password
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Change Password</h4>
                  <div class="line"></div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form name="update-pass" id="education" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password">Old password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Old password"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>New password</label>
                        <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="New password"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Confirm password</label>
                        <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Confirm password"/>
                      </div>
                    </div>
                    
                    <button class="btn btn-primary">Update Password</button>
                  </form>
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