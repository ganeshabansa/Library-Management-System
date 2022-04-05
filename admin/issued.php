<?php 
$id = $_GET['studid'];
$bid = $_GET['bid'];

$conn = new mysqli('localhost','root','','library');

if ($conn){

    $bquery = "SELECT `studid` FROM `issueinfo` WHERE studid = '$id';";
    $res = mysqli_query($conn, $bquery);
    $count = mysqli_num_rows($res);

    if ($count < 3) {    
        $query = "insert into issueinfo (studid, studname, bid, bname)
        select s.studid, s.studname, b.bid, b.bname
        from student s, book b
        where b.bid = '$bid'
        and s.studid = '$id';";

        if (mysqli_query($conn, $query)) {

            $d = date("Y/m/d");
            $nextday = date("Y/m/d", strtotime("$d +9 day"));
            $dquery = "UPDATE `issueinfo` SET `rdate`= '$nextday' WHERE bid='$bid';";

            if (mysqli_query($conn, $dquery)) {

                $conn = new mysqli('localhost','root','','library');
                
                $hquery = "INSERT INTO studhistory (studid, studname, bid, bname, date, rdate)
                SELECT studid, studname, bid, bname, date, rdate
                FROM issueinfo
                where bid = '$bid'
                and studid = '$id';";
                // -- WHERE studid='$id';";

                if (mysqli_query($conn, $hquery)) {

                    $conn = new mysqli('localhost','root','','library');
                    $aquery = "UPDATE `book` SET `stat`= 'Not Available' WHERE bid='$bid';";
                    
                    $bquery = "UPDATE `studhistory` SET `fine`= 0 WHERE bid='$bid' and studid = '$id';";
                    $cquery = "UPDATE `studhistory` SET `status`= 'coming' WHERE bid='$bid' and studid = '$id';";
                    mysqli_query($conn, $bquery);
                    mysqli_query($conn, $cquery);

                    if (mysqli_query($conn, $aquery)) {
                        echo '<script>alert("successfull....")</script>';
                        include 'home.html';
                    } else {
                        echo '<script>alert("Book is not available")</script>';
                        include 'issue.php';
                    }
                    
                }
                else {
                    echo '<script>alert("something wrong..")</script>';
                    include 'issue.php';
                }
            }
        }
        else {
            echo '<script>alert("Book is already issued..")</script>';
            include 'issue.php';
        } 
    } 
    else {
        echo '<script>alert("Student Cant Issue More Than 3 Books.")</script>';
        include 'issue.php';
    }
}
 else {
    echo '<script>alert("Check Your Connection..")</script>';
 } 

?>