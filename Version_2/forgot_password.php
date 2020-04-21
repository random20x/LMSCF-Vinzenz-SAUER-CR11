<?php
session_start();
require_once 'dbconnect.php';
if($_POST['i_forgot'])
$email = $mysqli->escape_string(['email']);
$result = $mysqli->("SELECT * FROM users WHERE userEmail = '$email'");
if($result->$num_rows == 0 ){
   echo "<p>user doesnt exsit!</p>"
    header('location: index.php')
} else {
    $user = $result->fetch_assoc();

    $email = $user['userEmail'];

}




?>

<form  method="post" class='lg_form' action="forgot_password.php" autocomplete= "off">
<input  type="email" name="email"  class="form-control box" placeholder= "Your Email"  value="<?php echo $email; ?>"  maxlength="40"/>