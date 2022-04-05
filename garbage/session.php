<?php
$error_msg = "";
//checks the session to see if the user is logged in
if (!isset($_SESSION['userid'])) {
    if (!isset($_POST['submit'])) {
        $dbc = mysqli_connect('localhost', 'root', '', 'login')
        or die('Error Connecting to Database on the SQL Server');
        //grabs data from POST
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        //lookup username and password in the database
        if (!empty($user_username) && !empty($password)) {
            $query = "SELECT userid, username FROM tuser WHERE username = '$user_username' AND password = SHA('$user_password')";
            $res = mysqli_query($dbc, $query);
            //login is ok so set the user ID and username cookies, redirect to homepage
            if (mysqli_num_rows($res) == 1) {
                $row = mysqli_fetch_array($res);
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['username'] = $row['username'];
                setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30), "/");
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30), "/");
                setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30), "/");
                setcookie('password', $row['password'], time() + (60 * 60 * 24 * 30), "/");
                //redirect after successful login
                header("Location: index.php");
            } else {
                //the username and password are incorrect so set error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in. <a href="Signup.php">Please sign up!</a>';
            }
        }
    }
}
?>