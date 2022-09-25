<?php
require_once "config.php";
$sql="SELECT * FROM states";
$statement=$connection->prepare($sql);
$statement->execute();
$all_fetch = $statement->fetchAll(PDO::FETCH_OBJ);

//select party
$sql3="SELECT * FROM parties";
$statement3=$connection->prepare($sql3);
$statement3->execute();
$all_fetch1 = $statement3->fetchAll(PDO::FETCH_OBJ);

?>

<header id="header">
  <nav class="navbar navbar-default navbar-fixed-top menu">
    <div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>


        <?php
        if (empty($_SESSION['user_id'])) {
        ?>
          <a class="navbar-brand" href="newsfeed.php"><img src="images/naijacratslight.png" alt="logo" width="150px" /></a>
        <?php
        } else {
        ?>
          <a class="navbar-brand" href="timeline.php"><img src="images/naijacratslight.png" alt="logo" width="150px" /></a>
        <?php
        }
        ?>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-menu">
          <?php
        if (empty($_SESSION['user_id'])) {
        ?>
          <li class="dropdown"><a href="newsfeed.php">HOME</a></li>
        <?php
        } else {
        ?>
          <li class="dropdown"><a href="timeline.php">HOME</a></li>
        <?php
        }
        ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PARTIES <span><img src="images/down-arrow.png" alt="" /></span></a>
            <ul class="dropdown-menu newsfeed-home">
            <?php foreach ($all_fetch1 as $fetch1) : ?>
              <li><a href="party.php?id=<?= $fetch1->id; ?>"><?=$fetch1->party_name?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">STATES <span><img src="images/down-arrow.png" alt="" /></span></a>
            <ul class="dropdown-menu login">
            <?php foreach ($all_fetch as $fetch) : ?>
              <li><a href="state.php?id=<?= $fetch->id; ?>"><?=$fetch->state_name?></a></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="dropdown"><a href="https://more.naijacrats.org.ng/donations/">DONATE </a> </li>
          <li class="dropdown"><a href="https://more.naijacrats.org.ng/get-verified">GET VERIFIED</a> </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-person"></i><span><img src="images/down-arrow.png" alt="" /></span></a>
            <ul class="dropdown-menu login">
              <li><a href="edit-profile-basic.php">Edit: Basic Info</a></li>
              <li><a href="edit-profile-work-edu.php">Edit: Work</a></li>
              <li><a href="edit-profile-interests.php">Edit: Interests</a></li>
              <li><a href="edit-profile-settings.php">Account Settings</a></li>
              <li><a href="edit-profile-password.php">Change Password</a></li>
              <li><a href="edit-profile-interests.php">Upgrade Account to varified</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right hidden-sm">
          <div class="form-group">
            <i class="icon ion-android-search"></i>
            <input type="text" class="form-control" placeholder="Search Individual Profile">
          </div>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>