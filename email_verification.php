
<?php

include('config.php');

$message = '';

if(isset($_GET['activation_code']))
{
 $query = "
  SELECT * FROM users 
  WHERE user_activation_code = :user_activation_code
 ";
 $statement = $connection->prepare($query);
 $statement->execute(
  array(
   ':user_activation_code'   => $_GET['activation_code']
  )
 );
 $no_of_row = $statement->rowCount();
 
 if($no_of_row > 0)
 {
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row)
  {
   if($row['status'] == 'Not Verified')
   {
    $update_query = "
    UPDATE users 
    SET status = 'verified' 
    WHERE user_id = '".$row['user_id']."'
    ";
    $statement = $connection->prepare($update_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();
    if(isset($sub_result))
    {
        echo "<script>alert('Email Address Successfully Verified');</script>";
    }
   }
   else
   {
    echo "<script>alert('Email Address Already Verified');</script>";
   }
  }
 }
 else
 {
    echo "<script>alert('Invalid Link');</script>";
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Naijacrats Nigeria Activation Page</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">PHP Register Login Script with Email Verification</h1>
  
   <h3><a href="index.php">click to login</a></h3>
   
  </div>
 
 </body>
 
</html>

