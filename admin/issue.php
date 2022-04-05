<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta tag -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Title</title>
      <!-- css -->
      <style>
      body {
        background-image: url("../imgs/lab.jpg");
        background-attachment: scroll;
        background-size: cover;
      }
    </style>
  <!-- css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/astyle.css">
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    </style>

</head>

<body>
    <!-- Navbar -->
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <img class="img-fluid rounded" height="20" width="140" src="../img/lab.jpg" alt="image">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav ml-auto">
          <a class="nav-link text-muted py-1 font-weight-bold" href="home.html">Home<span class="sr-only">(current)</span></a>
          <a class="nav-link text-muted py-1 font-weight-bold" href="book.php">Books</a>
          <a class="btn font-weight-bold bg-success text-light ml-2" href="login.html">Log-Out</a>
        </ul>
      </div>    
    </nav>
    </div>
  
  <!--Input-->
  <div class="container"> 
    <form action="issued.php" method="GET">
      <label>
        <p class="label-txt">ENTER STUDENT ID</p>
        <input type="text" class="input" name="studid">
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER BOOK ID</p>
        <input type="text" class="input" name="bid">
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label><br><br>
      <button type="submit" >ISSUE</button>
    </form>
  </div> 

<?php
        $conn = new mysqli('localhost','root','','library');
        $query = "SELECT * FROM issueinfo;";
        $res = mysqli_query($conn,$query);
        // ORDER BY `book`.`name` ASC
        echo "<div class='container jumbotron bg-white' >";
		    echo "<table class='table table-bordered table-hover' id='customers' >";
			  echo "<tr style='background-color: white;'>";
				//Table header
				echo "<th>"; echo "Book Id";	echo "</th>";
				echo "<th>"; echo "Student Id";  echo "</th>";
				echo "<th>"; echo "Student Name";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Date of issue";  echo "</th>";
				echo "<th>"; echo "Expeted Return Date";  echo "</th>";
        echo "</tr>";
        while($row=mysqli_fetch_assoc($res))
        {
          echo "<tr>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['studid']; echo "</td>";
          echo "<td>"; echo $row['studname']; echo "</td>";
          echo "<td>"; echo $row['bname']; echo "</td>";
          echo "<td>"; echo $row['date']; echo "</td>";
          echo "<td>"; echo $row['rdate']; echo "</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</div>";	
    ?>

    <!-- Footer -->
    <div class="footer container-fluid text-center bg-dark text-white py-3">
      <b> &copy; Copyright 2020</b>
    </div>
      
  <!-- javaScripts libraries-->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- pooper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <!-- bootstrap.js -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<!-- created by:- on 21-10-20 -->