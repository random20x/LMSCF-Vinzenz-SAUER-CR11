if (isset($_POST['change'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $img = $_POST['img'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $type = $_POST['type'];
    $sql = "UPDATE animal SET `name`='$name', age='$age', img='$img', `description`='$description', `address`=$address, website='$website', `type`=$type WHERE id='$id'";

$res = mysqli_query($conn, $sql);



}

$update=false;

if (isset($_GET['change'])){
$udpate = true;
$id = $_GET['change'];
 $sql = "SELECT * FROM animal WHERE id='$id'";
$res = mysqli_query($conn, $sql);
if($res->num_rows){
    $row = $res->fetch_array();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $img = $_POST['img'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $type = $_POST['type'];
}

}

if (isset($_GET['delete'])){
$id = $_GET['delete'];
$conn->query("DELETE FROM animal WHERE id=$id") or die($conn->error());
unset($_SESSION['message']);
$_SESSION['message'] = "Record has been deleted";
$_SESSION['msg_type'] = "danger";

}


