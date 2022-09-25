<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Title-->
    <title>Naijacrats | Edit Interests </title>

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

              <!-- Edit Interests
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-heart-outline"></i>My Interests</h4>
                  <div class="line"></div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <ul class="list-inline interests">
                  	<li><a href=""><i class="icon ion-android-bicycle"></i> Bycicle</a></li>
                  	<li><a href=""><i class="icon ion-ios-camera"></i> Photgraphy</a></li>
                  	<li><a href=""><i class="icon ion-android-cart"></i> Shopping</a></li>
                  	<li><a href=""><i class="icon ion-android-plane"></i> Traveling</a></li>
                  	<li><a href=""><i class="icon ion-android-restaurant"></i> Eating</a></li>
                  </ul>
                  <div class="line"></div>
                  <div class="row">
                    <p class="custom-label"><strong>Add interests</strong></p>
                    <div class="form-group col-sm-8">
                      <input id="add-interest" class="form-control input-group-lg" type="text" name="interest" title="Choose Interest" placeholder="Interests. For example, photography"/>
                    </div>
                    <div class="form-group col-sm-4">
                      <button class="btn btn-primary">Add</button>
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