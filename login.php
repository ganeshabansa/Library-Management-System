<?php 
    session_start(); 
    
$id = $_GET['studid'];
$pass = $_GET['password'];

$conn = mysqli_connect('localhost','root','','library');
$db = "library";

if ($conn){
    $query = "SELECT * FROM student WHERE studid = '$id' AND password1 = '$pass'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    $username = mysqli_real_escape_string($db, $_GET['studid']);

    if ($count) {
        $_SESSION['username'] = $id;
        header("Location: home.php");
    } else {
        echo '<script>alert("Invalid Id or Password")</script>';
        include 'index.html';
    }
} else {
    echo '<script>alert("Check Your Connection..")</script>';
}

?>