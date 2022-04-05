<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta tag -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Title</title>
  
  <!-- css -->
        <!-- css -->
        <style>
      body {
        background-image: url("../imgs/lab.jpg");
        background-attachment: scroll;
        background-size: cover;
      }
    </style>
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
    <form action="studwork.php" method="GET">
      <label>
        <p class="label-txt">ENTER STUDENT ID</p>
        <input type="text" class="input" name="studid">
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label><br><br>
      <button type="submit" >FETCH DETAILS</button> <br/>
    </form>
  </div> 

  <?php
  if (isset($_GET['studid'])) {

    $conn = new mysqli('localhost','root','','library');

    if ($conn){
  
      $query = "select * from studhistory where studid like '%$_GET[studid]%'";
  
          $res = mysqli_query($conn,$query);

          echo "<div class='container jumbotron bg-white' >";
          echo "<table class='table table-bordered table-hover' id='customers' >";
          echo "<tr style='background-color: white;'>";
          
          //Table header
          echo "<th>"; echo "Student Id";	echo "</th>";
          echo "<th>"; echo "Student Name";  echo "</th>";
          echo "<th>"; echo "Book Id";  echo "</th>";
          echo "<th>"; echo "Book Name";  echo "</th>";
          echo "<th>"; echo "Date of issue";  echo "</th>";
          echo "<th>"; echo "Return Date";  echo "</th>";
          echo "<th>"; echo "Fine"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Pay-Due"; echo "</th>";
          echo "</tr>";
          
          while($row=mysqli_fetch_assoc($res))
          {
            echo "<tr>";
            echo "<td>"; echo $row['studid']; echo "</td>";
            echo "<td>"; echo $row['studname']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['bname']; echo "</td>";
            echo "<td>"; echo $row['date']; echo "</td>";
            echo "<td>"; echo $row['rdate']; echo "</td>";
            echo "<td>"; echo $row['fine']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo "<input type='submit' class='btn btn-primary' value='submit' name='Submit'/> </td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";	
      }
  }
  else {
    $query = "select * from studhistory;";
  
          $conn = new mysqli('localhost','root','','library');
          $query = "SELECT * FROM studhistory;";
          $res = mysqli_query($conn,$query);
          // ORDER BY `book`.`name` ASC
          echo "<div class='container jumbotron bg-white' >";
          echo "<table class='table table-bordered table-hover' id='customers' >";
          echo "<tr style='background-color: white;'>";
          //Table header
          echo "<th>"; echo "Student Id";	echo "</th>";
          echo "<th>"; echo "Student Name";  echo "</th>";
          echo "<th>"; echo "Book Id";  echo "</th>";
          echo "<th>"; echo "Book Name";  echo "</th>";
          echo "<th>"; echo "Date of issue";  echo "</th>";
          echo "<th>"; echo "Return Date";  echo "</th>";
          echo "<th>"; echo "Fine"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Pay-Due"; echo "</th>";
          echo "</tr>";
          while($row=mysqli_fetch_assoc($res))
          {
            echo "<tr>";
            echo "<td>"; echo $row['studid']; echo "</td>";
            echo "<td>"; echo $row['studname']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['bname']; echo "</td>";
            echo "<td>"; echo $row['date']; echo "</td>";
            echo "<td>"; echo $row['rdate']; echo "</td>";
            echo "<td>"; echo $row['fine']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo "<input type='submit' class='btn btn-primary disabled' href='pay.php' value='Pay' name='Pay'/> </td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";	
          $conn = new mysqli('localhost','root','','library');

          if ($conn){
              function update_all_fines()
              {
                  $result1 = mysql_query("SELECT * FROM studhistory;");
          
                  while ($row1 = mysql_fetch_array($result1)) {
                      $do_not_take_fine = 0;
                      $loan_id = $row1{'bid'};
                      $date_in = strtotime($row1{'date'});
                      $due_date = strtotime($row1{'rdate'});
              
                      $days_diff = $date_in - $due_date;
                      $days_past_due_date = floor($days_diff / (60 * 60 * 24));
              
                      if ($days_past_due_date > 0 || $row1{'Date_in'} == '0000-00-00') {
                          //book is returned after due date, charge fine
                          //Fine Computation :-
              
                          $current_date = time();
                          $future_due_diff = $current_date - $due_date;
                          $future_due = floor($future_due_diff / (60 * 60 * 24));
              
                          if ($row1{'Date_in'} == '0000-00-00' && $future_due > 0) {
                              // if book is not returned till today's date, and due date has passed
                              $diff = $current_date - $due_date;
                          } elseif ($row1{'Date_in'} != '0000-00-00') {
                              // if book is returned but delayed from its due date
                              $diff = $date_in - $due_date;
                          } else {
                              //if book is not returned till today, but due date has still not passed
                              //do nothing
                              $do_not_take_fine++;
                          }
                          $paid = 0;
                          $date_diff = floor($diff / (60 * 60 * 24));
                          $fine_amt = $date_diff * 5;
              
                          $result2 = mysql_query("SELECT * FROM studhistory WHERE bid = '$loan_id'");
                          // checking if this loan id is already there in fines table
                          if ($row2 = mysql_fetch_array($result2)) {
                              // Already paid the fine. do nothing
                              // if not paid fine then update the fine table with new fine_amt
                              if ($row2{'fine'} == 0 && $do_not_take_fine == 0) {
                                  $result3 = mysql_query("UPDATE studhistory SET fine = $fine_amt WHERE bid = '$loan_id'");
                              }
              
                          } 
                      }
                  }
              }
          }  
     }

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