<?php
$id = $_GET['adminid'];
$pass = $_GET['password'];

$conn = mysqli_connect('localhost','root','','library');

if ($conn){
    $query = "SELECT * FROM librarian WHERE adminid='$id' AND password1 = '$pass'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if ($count) {
        // echo '<script>alert("log-IN successfull....")</script>';
        // echo"<meta http-equiv='refresh' content='0'>";
        header("Location: home.html");
    } else {
        echo '<script>alert("Invalid Id or Password")</script>';
        // echo"<meta http-equiv='refresh' content='0'>";
        include 'login.html';
    }
} else {
    echo '<script>alert("Check Your Connection..")</script>';
}

?>