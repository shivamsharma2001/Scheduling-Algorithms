<!DOCTYPE html>
<html>
<head>
  <title>Scheduling Algorithms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="#">Scheduling Algorithms</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="index.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="fcfs.php">FCFS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="sjf.php">SJF</a>
    </li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="priority.php">Priority</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rr.php">Round-Robin</a>
    </li>
  </ul>
</nav>
<?php
$n=$_POST["n"];
#echo "$n";
echo "<br>"."<br>"."<br>"."<br>"."<br>";
echo '<form action="priority2.php" method="POST">';
echo '<div class="row">';
 echo '<div class="col-sm-4">';
   echo '<div class="container">';
   echo '<div class="form-group">';
   for($i=1;$i<=$n;$i++)
   { 
    echo "Process &nbsp;$i :     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo '<input name="bt[]" type="number"  placeholder="Burst Time" required>'."<br>"."<br>";
   }
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '<div class="col-sm-4">';
   echo '<div class="container">';
   echo '<div class="form-group">';
   for($i=1;$i<=$n;$i++)
   { 
   
    echo 'Priority : <input name="arrt[]" type="number" placeholder="Priority" required>'."<br>"."<br>";
   }
  echo '</div>';
  echo '</div>';
 echo '</div>';
 echo '<div class="col-sm-4">';
   echo '<div class="container">';
   echo '<div class="form-group">';
  echo '</div>';
  echo '</div>';
  echo '</div>';
 echo '</div>';
 echo '<center>';
 echo '<button type="submit" class="btn btn-primary">Submit</button>';
 echo '</center>';
 echo '</form>';
?>
</body>
</html>
