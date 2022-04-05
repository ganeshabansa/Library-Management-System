<?php 
$name = $_POST['name'];
$id = $_POST['id'];
$mob = $_POST['mob'];
$pass = $_POST['password'];
$email = $_POST['email'];

$conn = new mysqli('localhost','root','','library');

if ($conn){
    $query = "INSERT INTO student (studid, password1, email, studname, contact) VALUES ('$id','$pass','$email','$name',$mob);";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("successfull....")</script>';
        include 'home.html';
    } else {
        echo '<script>alert("Student with this ID is already exists..")</script>';
        include 'register.html';
    }
}
 else {
    echo '<script>alert("Check Your Connection..")</script>';
 }

?>