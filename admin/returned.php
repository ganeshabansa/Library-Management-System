<?php 
$id = $_GET['studid'];
$bid = $_GET['bid'];

$conn = new mysqli('localhost','root','','library');

if ($conn){

    $query = "DELETE FROM `issueinfo` WHERE bid='$bid' and studid='$id';";
    $query2 = "DELETE FROM `studhistory` WHERE bid='$bid' and studid='$id';";
    mysqli_query($conn, $query2);

    if (mysqli_query($conn, $query)) {

        $conn = new mysqli('localhost','root','','library');
        $aquery = "UPDATE `book` SET `stat`= 'Available' WHERE bid='$bid';";
                
        if (mysqli_query($conn, $aquery)) {
            echo '<script>alert("Returned....")</script>';
            include 'home.html';
        }
    }     
    else {
        echo '<script>alert("Invalid bid or studid")</script>';
        include 'issue.php';
    }
}
else {
    echo '<script>alert("Check Your Connection..")</script>';
 } 

?>