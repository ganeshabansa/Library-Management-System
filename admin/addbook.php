<?php 
$bname = $_POST['bname'];
$bid = $_POST['bid'];
$auth = $_POST['auth'];
$publ = $_POST['publish'];
$stat = $_POST['stat'];

$conn = new mysqli('localhost','root','','library');

if ($conn){
    $query = "INSERT INTO book (bname, bid, auth, publish, stat) VALUES ('$bname','$bid','$auth','$publ','$stat');";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("successfull....")</script>';
        include 'home.html';
    } else {
        echo '<script>alert("Book is already register with this id")</script>';
        include 'addBook.html';
    }
}
 else {
    echo '<script>alert("Check Your Connection..")</script>';
 }

?>