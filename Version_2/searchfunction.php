<?php

require_once 'dbconnect.php';

 $search = $_POST['search'];
 $sql = "SELECT * From animal WHERE `name` LIKE '%$search%' OR age LIKE '%$search%'";
 $result = $conn-> query($sql);
 
 if($result->num_rows > 0){
     while($row = mysqli_fetch_array($result)){
         echo '<div class="card" style="width: 18rem;">
         <img class="card-img-top" src=" '.$row["img"].'" alt="Card image cap">
         <div class="card-body">
             <h5 class="card-title">'.$row["name" ].'</h5>
             <p class="card-text"><b> Description:</b> <br> '.$row["description"].'</p>
             <p class="card-text"><b>Age:</b>  '.$row["age"].'</p>
             <p class="card-text">"<b>Website:</b>'.$row["Website"].'</p>
             
         </div>
     </div>';

     } 
    } else{
        echo "No animal matching";
    };
 
$conn->close();
 


?>