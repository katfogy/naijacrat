<?php
require_once "config.php";
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = preg_replace("/'/", "'", $data);
  return $data;
}
$sql3="SELECT * FROM parties";
$statement3=$connection->prepare($sql3);
$statement3->execute();
$all_fetch = $statement3->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['add-user'])) {

  if (empty($_POST['surname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['othernames']) || empty($_POST['password']) || empty($_POST['c_password']) || empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year']) || empty($_POST['party']) || empty($_POST['nation']) || empty($_POST['state'])) {
    $type = 'error';
    echo "<script>alert('All Field Required');</script>";
  } else {
    $surname = test_input($_POST['surname']);
    $othernames = test_input($_POST['othernames']);
    $username = test_input($_POST['username']);
    $email = $_POST['email'];
    $party = test_input($_POST['party']);
    $password = test_input($_POST['password']);
    $c_password = test_input($_POST['c_password']);
    $phone = test_input($_POST['phone']);
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dob = $year . "-" . $month . "-" . $day;
    $gender = $_POST['gender'];
    $nation = $_POST['nation'];
    $state = $_POST['state'];
    $user_id = str_shuffle("naijacrats2023katerfoga");
    $role = "Member";
    $status = "Not Verified";
    $user_activation_code = md5(rand());
    $sql = "select * from users where surname=? || email=? || phone=? || username=?";
    $statement = $connection->prepare($sql);
    $statement->execute([$surname, $email, $phone, $username]);
    $count = $statement->rowCount();
    if ($count > 0) {
      echo "<script>alert('Details Already Taken');</script>";
    } elseif ($password !== $c_password) {
      echo "<script>alert('Password with Confirm Password Not Match');</script>";
    } elseif (!preg_match('/^[a-zA-Z\s]{6,50}$/', $username)) {
      echo "<script>alert('Only letters and spaces allowed');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Please give a proper email address');</script>";
    } else {
      $hasdpwd = password_hash($password, PASSWORD_DEFAULT);
      $sql1 = "insert into users(user_id, surname, username,  phone, othernames, email, party, password, dob, gender, nation, state, role, status, user_activation_code)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $connection->prepare($sql1);
      $user = $stmt->execute([$user_id, $surname, $username,  $phone, $othernames, $email, $party, $hasdpwd, $dob, $gender, $nation, $state, $role, $status, $user_activation_code]);
      if ($user) {
          $base_url = "http://localhost/naijacrat/";
          $mail_body = "
          <p>Hi ".$_POST['username'].",</p>
          <p>Thanks for Registration. Your Username is ".$username." and password is ".$password.", This password will work only after your email verification.</p>
          <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
          <p>Best Regards,<br />Naijacrat</p>
          ";
          require 'class/class.phpmailer.php';
          $mail = new PHPMailer;
          $mail->IsSMTP();        //Sets Mailer to send message using SMTP
          $mail->Host = 'mail.naijacrats.org.ng';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
          $mail->Port = '465';        //Sets the default SMTP server port
          $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
          $mail->Username = 'admin@naijacrats.org.ng';     //Sets SMTP username
          $mail->Password = 'talk2me2022';     //Sets SMTP password
          $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
          $mail->From = 'admin@naijacrats.org.ng';   //Sets the From email address for the message
          $mail->FromName = 'Naijacrats Nigeria';     //Sets the From name of the message
          $mail->AddAddress($_POST['email'], $_POST['username']);  //Adds a "To" address   
          $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
          $mail->IsHTML(true);       //Sets message type to HTML    
          $mail->Subject = 'Account Verification';   //Sets the Subject of the message
          $mail->Body = $mail_body;       //An HTML or plain text message body
          if($mail->Send())        //Send an Email. Return true on success or false on error
          {
            echo "<script>alert('Please Check Your mail to activate account');</script>";
          }
         }
      }
    }
  }


if(isset($_POST["login-user"]))
{
  if(empty($_POST['email']) || empty($_POST['password'])){
    echo "<script>alert('Fields cannot be Empty');</script>";
  }else{
 $query = "
 SELECT * FROM users 
  WHERE email = :email
 ";
 $statement = $connection->prepare($query);
 $statement->execute(
  array(
    'email' => $_POST["email"]
  )
 );
 $count = $statement->rowCount();
 if($count > 0)
 {
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row)
  {
   if($row['status'] == 'verified')
   {
    if(password_verify($_POST["password"], $row["password"]))
    {
      session_start();
     $_SESSION['user_id'] = $row['user_id'];
     $_SESSION['email'] = $row['email'];
     $_SESSION['username'] = $row['username'];
     header("location:timeline.php");
    }
    else
    {
      echo "<script>alert('Wrong Password');</script>";
    }
   }
   else
   {
    echo "<script>alert('Please Verify your account');</script>";
   }
  }
 }
 else
 {
  echo "<script>alert('Account Does not Exist');</script>";
 }
}}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Title-->
  <title>Welcome to Naijacrats </title>

  <!--Metatags-->
  <?php

  use WPForms\SmartTags\SmartTag\Date;

  include 'inc/metatags.php'; ?>

  <!--Stylesheets-->
  <?php include 'inc/stylesheets.php'; ?>

  <!--Favicon-->
  <?php include 'inc/favicon.php'; ?>

  <!--Google Font-->
  <?php include 'inc/google_fonts.php'; ?>

</head>

<body>


  <!-- Landing Page Contents
    ================================================= -->
  <div id="lp-register">

    <div class="container wrapper">

      <div class="row">
        <div class="col-sm-5">
          <div class="intro-texts">
            <h1 class="text-white">Welcome to <img src="images/naijacratslight.png" alt="logo" width="200px" /></h1>

            <p>Naijacrats is a convene of persons active in party politics, holding or seeking elected offices in the Government of the Federal Republic of Nigeria.<br /> <br />What are you waiting for? Join Naijacrats Now!.</p>
            <br>
            <a href="#" class="btn btn-success">Learn More</a>
          </div>
        </div>
        <div class="col-sm-6 col-sm-offset-1">
          <div class="reg-form-container">

            <!-- Register/Login Tabs-->
            <div class="reg-options">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                <li><a href="#login" data-toggle="tab">Login</a></li>
              </ul>
              <!--Tabs End-->
            </div>

            <!--Registration Form Contents-->
            <div class="tab-content">
              <div class="tab-pane active" id="register">
                <h3>Register Now !!!</h3>
                <p class="text-muted">Be cool and join us today.</p>

                <!--Register Form-->
                <form autocomplete="off" method="POST" action="index.php" enctype="multipart/form-data">
                  <?php
                  if (isset($message) && isset($type)) {
                    if ($message != "" && $type != "") {
                      echo $message . "<br/>";
                    }
                  }
                  ?>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="surname" class="sr-only">Surname</label>
                      <input id="surname" class="form-control input-group-lg" type="text" name="surname" title="Enter Surname" placeholder="Surname" require />
                    </div>
                    <div class="form-group col-xs-6">
                      <label for="othernames" class="sr-only">Other Names</label>
                      <input id="othernames" class="form-control input-group-lg" type="text" name="othernames" title="Enter other name" placeholder="Enter Other Names" require />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="email" class="sr-only">Email</label>
                      <input id="email" class="form-control input-group-lg" type="email" name="email" title="Enter Email" placeholder="Enter Email" require />
                    </div>
                    <div class="form-group col-xs-6">
                      <select class="form-control" id="party" id="party" name="party">
                        <option value="month" disabled selected>Select Party</option>
                        <?php foreach ($all_fetch as $fetch) : ?>
                          <option class="form-control" value="<?=$fetch->party_id; ?>"><?=$fetch->party_name; ?> (<?=$fetch->party_id; ?>) </option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="password" class="sr-only">Password</label>
                      <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" require />
                    </div>
                    <div class="form-group col-xs-6">
                      <label for="password" class="sr-only">Confirm Password</label>
                      <input id="c_password" class="form-control input-group-lg" type="password" name="c_password" title="confirm_password" placeholder="Confirm Password" require />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="phone" class="sr-only">Phone Number</label>
                      <input id="phone" class="form-control input-group-lg" type="text" name="phone" title="Enter Phone Number" placeholder="Telephone Number" require />
                    </div>
                    <div class="form-group col-xs-6">
                      <label for="username" class="sr-only">Enter Username</label>
                      <input id="username" class="form-control input-group-lg" type="text" name="username" title="Enter Username" placeholder="Enter Username" require />
                    </div>
                  </div>
                  <div class="row">
                    <p class="birth"><strong>Date of Birth</strong></p>
                    <div class="form-group col-sm-4 col-xs-6">
                      <label for="month" class="sr-only"></label>
                      <select class="form-control" id="day" name="day">
                        <option value="Day" disabled selected>Day</option>
                        <?php
                        for ($i = 1; $i <= 30; $i++) {
                        ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php
                        }


                        ?>

                      </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-6">
                      <label for="month" class="sr-only"></label>
                      <select class="form-control" id="month" name="month">
                        <option value="month" disabled selected>Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                      <label for="year" class="sr-only"></label>
                      <select class="form-control" id="year" name="year">
                        <option value="year" disabled selected>Year</option>
                        <?php
                        $year = Date('Y');
                        for ($i = 1950; $i <= $year; $i++) {
                        ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php
                        }


                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-xs-12">
                      <label class="radio-inline">
                        <input type="radio" name="gender" checked value="Male">Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="Female">Female
                      </label>
                    </div>

                  </div>

                  <div class="form-group gender">

                  </div>
                  <div class="row">

                    <div class="form-group col-xs-6">
                      <label for="country" class="sr-only"></label>
                      <select class="form-control" id="country" name="nation"></select>
                    </div>

                    <div class="form-group col-xs-6">
                      <label for="country" class="sr-only"></label>
                      <select class="form-control" name="state" id="state"></select>
                    </div>

                  </div>
                  <p><a href="#login" data-toggle="tab">Already have an account?</a></p>
                  <input type="submit" class="btn btn-success" value="Create Account" name="add-user">
                </form>
                <!--Register Now Form Ends-->

              </div>
              <!--Registration Form Contents Ends-->

              <!--Login-->
              <div class="tab-pane" id="login">
                <h3>Login</h3>
                <p class="text-muted">Log into your account</p>

                <!--Login Form-->
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-xs-12">
                      <label for="my-email" class="sr-only">Email</label>
                      <input id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-12">
                      <label for="my-password" class="sr-only">Password</label>
                      <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" />
                    </div>
                  </div>
                  <p><a href="#register" data-toggle="tab">Don't have an account? Register</a></p>
                <p><a href="#reset_password" data-toggle="tab">Forgot Password?</a></p>
                <input type="submit" class="btn btn-success" value="Login" name="login-user">
                </form>
                <!--Login Form Ends-->
              </div>

              <!--Forgot Password-->
              <div class="tab-pane" id="reset_password">
                <h3>Reset Password</h3>
                <p class="text-muted">Enter Email Address to receive password reset link</p>

                <!--Password Reset Form-->
                <form name="PWDreset_form" id='PWDreset_form'>
                  <div class="row">
                    <div class="form-group col-xs-12">
                      <label for="my-email" class="sr-only">Email</label>
                      <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email" />
                    </div>
                  </div>
                  <input type="submit" class="btn btn-success" value="Login" name="login-user">
                </form>
                <!--Login Form Ends-->



              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-6">

          <!--Social Icons-->
          <ul class="list-inline social-icons">
            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
            <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!--preloader-->
  <?php include 'inc/preloader.php'; ?>

  <!--scripts-->
  <?php include 'inc/scripts.php'; ?>

</body>
<script src="js/sweetalert.min.js"></script>

</html>