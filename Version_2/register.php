<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System<?php echo $title; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
</head>
<body>
   <form method="post" id='fone' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
 
     
            <h2>Sign Up.</h2>
            <hr />
         
<?php
   if ( isset($errMSG) ) {
 
   ?>
<div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
</div>

<?php
  }
  ?>
         
     
         

<input type ="text"  name="name"  class ="form-control"  placeholder ="Enter Name" maxlength ="50"   value = "<?php echo $name ?>"  />
   <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
         
   <input   type = "email"   name = "email"   class = "form-control"   placeholder = "Enter Your Email"   id='email'  maxlength = "40"     />  
   <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
      <span id='email_result'></span>
               
               
   <input   type = "password"   name = "pass"  id='pass' class = "form-control"   placeholder = "Enter Password"   maxlength = "15"  />



   <input   type = "password"   name = "passVerif"  id='passVerif' class = "form-control"   placeholder = "Enter Password"   maxlength = "15"  />


   <span class = "text-danger" > <?php   echo  $passError; ?> </span >


   <span id='password'></span>
            <hr />

   <button   type = "submit"   class = "btn btn-block btn-primary"   name = "btn-signup" >Sign Up</button >
            <hr  />
         
            <a   href = "index.php" >Sign in Here...</a>
   
 
   </form >
</body >
<script>  
$(document).ready(function(){
        $('#email').keyup(function(){
            var email = $(this).val();
            if(email != '')
            {
                $.ajax({
                    url:"dbfunctions.php",
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        $('#email_result').html(data);
                    }
                });
            }
        });
        $('#passVerif').keyup(function(){
            var passVerif = $(this).val();
            var password = $('#pass').val();
            if(passVerif !== '' && password !== '')
            {
                $.ajax({
                    url:"passwordfunction.php",
                    method:"POST",
                    data:{pass:password, passVerif:passVerif},
                    success:function(response){
                        $('#password').html(response);
                    }
                });
            }
        });
    
    });


//  $(document).ready(function(){

// load_data();

// function load_data(query)
// {
//  $.ajax({
//   url:"dbfunctions.php",
//   method:"POST",
//   data:{query:query},
//   success:function(data)
//   {
//    $('#email_result').html(data);
//   }
//  });
// }
// $('#email').keyup(function(){
//  var search = $(this).val();
//  if(search != '')
//  {
//   load_data(search);
//  }
//  else
//  {
//   load_data();
//  }
// });
// });

// // Variable to hold request
// var request;
// // Bind to the submit event of our form
// $("#fone").keyup(function(event){
//   // Prevent default posting of form - put here to work in case of errors
//   event.preventDefault();
//   // Abort any pending request
//   if (request) {
//     request.abort();
//   }
//   // setup some local variables
//   var $form = $(this);
//   // Let's select and cache all the fields
//   var $inputs = $form.find("input, select, button, textarea");
//   // Serialize the data in the form
//   var serializedData = $form.serialize();
//   // Let's disable the inputs for the duration of the Ajax request.
//   // Note: we disable elements AFTER the form data has been serialized.
//   // Disabled form elements will not be serialized.
//   $inputs.prop("disabled", true);
//   // Fire off the request to /form.php
//   request = $.ajax({
//     url: "email_availibilty.php",
//     type: "post",
//     data: serializedData
//   });
//   // Callback handler that will be called on success
//   request.done(function (response, textStatus, jqXHR){
//     // Log a message to the console
//    document.getElementById('content').innerHTML = response;
//   });
//   // Callback handler that will be called on failure
//   request.fail(function (jqXHR, textStatus, errorThrown){
//     // Log the error to the console
//     console.error(
//       "The following error occurred: "+
//       textStatus, errorThrown
//     );
//   });
//   // Callback handler that will be called regardless
//   // if the request failed or succeeded
//   request.always(function () {
//     // Reenable the inputs
//     $inputs.prop("disabled", false);
//   });
// });


</script>


 </script>  
</html >
<?php  ob_end_flush(); ?>