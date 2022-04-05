<?php 
  session_start(); 
	if (!isset($_SESSION['username'])) {
		header('location: index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- meta tag -->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Title</title>

    <!-- css -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />

    <style>
      .instructionbox {
        background-color: rgba(211, 211, 211, 0.322);
        width: 200px;
        border: 5px solid rgb(0, 98, 128);
        padding: 50px;
        margin: 20px;
        font-style: italic;
        font-weight: bold;
        font-size: 20px;
      }
      body {
        background-image: url("imgs/iStock-494617082.jpg");
        background-attachment: scroll;
        background-size: cover;
      }
    </style>
  </head>

  <body>
    <!-- Navbar -->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <img
          class="img-fluid rounded"
          height="20"
          width="140"
          src="img/lab.jpg"
          alt="image"
        />
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="nav ml-auto">
            <a
              class="nav-link text-light py-1 font-weight-bold"
              href="home.php"
              >Home</a
            >
            <a class="nav-link text-light py-1 font-weight-bold" href="book.php"
              >Books</a
            >
            <a
              class="nav-link text-light py-1 font-weight-bold"
              href="contact.html"
              >Contact Us</a
            >
          </ul>
          <form class="form-inline" method="GET" action="logout.php">
            <button class="btn font-weight-bold bg-success text-light ml-2">
              Log-Out
            </button>
          </form>
        </div>
      </nav>
    </div>
    
    <!-- table -->
    <div class="container mt-5">
    <?php   
      if (isset($_SESSION['username'])) {
        
        $conn = new mysqli('localhost','root','','library');        
        if ($conn){
          $query = "select * from studhistory where studid like '%$_SESSION[username]%'";
          $res = mysqli_query($conn,$query);

          echo "<div class='container jumbotron bg-white ' > ";
          echo "<h2 class='text-dark text-center mb-4'>Book Details</h2> ";
          echo "<table class='table table-bordered table-hover' id='customers' >";
          echo "<tr style='background-color: white;'>";
          //Table header
          echo "<th>"; echo "Book Id";  echo "</th>";
          echo "<th>"; echo "Book Name";  echo "</th>";
          echo "<th>"; echo "Date of issue";  echo "</th>";
          echo "<th>"; echo "Return Date";  echo "</th>";
          echo "<th>"; echo "Fine"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "</tr>";
          while($row=mysqli_fetch_assoc($res))
          {
            echo "<tr>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['bname']; echo "</td>";
            echo "<td>"; echo $row['date']; echo "</td>";
            echo "<td>"; echo $row['rdate']; echo "</td>";
            echo "<td>"; echo $row['fine']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";	
        }
      }
    ?>
    </div>

    <!-- Instructions -->
    <div class="container mt-4">
      <h2 class="text-danger text-center">INSTRUCTIONS</h2>
      <div>
        <p class="h4 text-light mt-4">1. If student want to issue books then student must be registered.</br>
          2. Keep your student id and password safe if you lost your id or password collage will be not responsible for that.</br>
          3. Each student can issue only 3 books at a time.</br>
          4. Make sure to return borrowed items by the due date.</br>    
          5. Each student have only 8 days to return a issued book.</br>
          6. After 8 days library will charges 5 rs per day until student will return the book.</br>
          7. In case any of the borrowed item being lost,damaged or destroyed you are requested replace with new new one.</br>
          8. Never write in books or cut pages out of them.</br>
        </p>
      </div>
    </div>

    <!-- javaScripts libraries-->
    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <!-- pooper.js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
      integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
      integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<!-- created by:- on 21-10-20 -->
