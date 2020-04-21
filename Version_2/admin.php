<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require 'admin_functions.php';



// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
 header("Location: index.php");
 exit;
}
if (isset($_SESSION['user'])){
    header("Location: home.php");
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<title>Welcome - DAVE<?php echo $userRow['userEmail' ]; ?></title>
<style>
.bg{
    background-color: #E6E6E8;;
}
.other{
    background-color: black;
    color: white;
}

</style>



</head>
<body class='bg'>
<div class="container-fluid other">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

<table class="table table-striped text-white">

 
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Update</th>
    </tr>
</thead>
<tbody>


    <?php echo "Welcome back,". " ". $userRow['userName' ].". ". "Have a look at your current situation below.". "<br>"; 
    $sql = "SELECT * FROM users";    
    
    $result = $conn->query('SELECT * FROM users');
    while ($row = $result->fetch_assoc()): 
        ?>
      
        <tr>
          <td><?php echo $row['userName']; ?></td>
          <td><?php echo $row['userEmail']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>
              <a href="admin.php?edit=<?php echo $row['userId']; ?>" class="btn btn-primary" >edit</a>
              <a href="admin.php?delete=<?php echo $row['userId']; ?>" class="btn btn-info" >Delete</a>
          </td>
      </tr>
      
    <?php endwhile; ?>

</tbody>

<a  href="logout.php?logout">Sign Out</a>
</table>

 <?php if($_GET['edit']){   ?> 

<form action='admin_functions.php' method='POST'>
    <input type="hidden" name="id" value="<?= $id; ?>">
    <label for='Name'>Name:</label>
    <input type="text" name="userName" value="<?= $userName; ?>">
    <label for="email">Email:</label>
    <input type="text" name='userEmail' value="<?= $userEmail; ?>"  >
    <label for="status">Status</label>
    <select name="status" id="status">
    <?php if($status == 'user'){ ?>
    <option value="user" selected>User</option>
    <option value="admin">Admin</option>
    <?php } else {
        ?>
    <option value="user">User</option>
    <option value="admin" selected>Admin</option>
    <?php } ?>
    </select>
   
    <button type='submit' name='update' id='update'>Update info</button>




</form>

 <?php } else{  ?>


 <?php } ?>
 </div>



<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

<table class="table table-striped text-white">

 
<thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Image</th>
        <th>Descritpion</th>
        <th>Address</th>
        <th>Hobbies</th>
        <th>Website</th>
        <th>Adoption Date</th>
        <th>type</th>
        <th>Update</th>
        
    </tr>
</thead>
<tbody>
<a  href="logout.php?logout">Sign Out</a>



<a href="admin.php?create=<?php echo $row['id']; ?>" class="btn btn-info">Create</a>
 
 
 
 <?php 
                $sql = "SELECT * FROM animal";    
                
                $result = $conn->query('SELECT * FROM animal');
                while ($row = $result->fetch_assoc()): 
                    ?>
                
                    <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['img']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['hobbies']; ?></td>
                    <td><?php echo $row['Website']; ?></td>
                    <td><?php echo $row['adoption_ready_date']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td>
                        <a href="admin.php?editone=<?php echo $row['id']; ?>" class="btn btn-primary" >edit</a>
                        <a href="admin.php?deleteone=<?php echo $row['id']; ?>" class="btn btn-danger" >Delete</a>
                        
                    </td>
                </tr>
                
                <?php endwhile; ?>

            </tbody>
        </div>
        </table>
        <?php if($_GET['editone']){   ?> 

            <form action='admin_functions.php' method='POST'>
                <input type="hidden" name="id" value="<?= $id ?>">

                <label for='Name'>Name:</label>
                <input type="text" name="name" value="<?= $name; ?>">
                
                <label for="age">Age:</label>
                <input type="text" name='age' value="<?= $age; ?>"  >

                <label for="img">Img:</label>
                <input type="text" name="img" id="img" value="<?= $img; ?>" >

                <label for="description">Descript:</label>
                <input type="text" name="description" id="description" value="<?= $description; ?>" >

                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?= $address; ?>" >

                <label for="hobbies">Hobbies:</label>
                <input type="text" name="hobbies" id="hobbies" value="<?= $hobbies; ?>" >

                <label for="website">Website:</label>
                <input type="text" name="website" id="website" value="<?= $website; ?>" >

                <label for="type">Type:</label>
                <input type="text" name="type" id="type" value="<?= $type; ?>" >

                <label for="type">Adoption Date:</label>
                <input type="text" name="type" id="type" value="<?= $adoption; ?>" >
                
        
                <button type='submit' name='updateone' id='updateone'>Update info</button>




            </form>
            <?php } else{  ?>
                    


            <?php } ?>

            
           
<form action='admin_functions.php' method='POST'>
    <input type="hidden" name="id" value="<?= $id ?>">

    <label for='Name'>Name:</label>
    <input type="text" name="name" value="<?= $name; ?>">
    
    <label for="age">Age:</label>
    <input type="text" name='age' value="<?= $age; ?>"  >

    <label for="img">Img:</label>
    <input type="text" name="img" id="img" value="<?= $img; ?>" >

    <label for="description">Descript:</label>
    <input type="text" name="description" id="description" value="<?= $description; ?>" >

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="<?= $address; ?>" >

    <label for="hobbies">Hobbies:</label>
    <input type="text" name="hobbies" id="hobbies" value="<?= $hobbies; ?>" >

    <label for="website">Website:</label>
    <input type="text" name="website" id="website" value="<?= $website; ?>" >

    <label for="type">Type:</label>
    <input type="text" name="type" id="type" value="<?= $type; ?>" >

    <label for="type">Adoption Date:</label>
    <input type="text" name="adoption" id="adoption" value="<?= $adoption; ?>" >
    

    <button type='submit' name='createone' id='create'>create</button>




</form>


        

            </div>
    </div>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>