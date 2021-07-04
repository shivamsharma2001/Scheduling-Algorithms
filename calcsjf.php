<!DOCTYPE html>
<html>
<head>
  <title>Scheduling Algorithms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
#pr
{
  color:red;
}
#s1 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#s1 td, #s1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#s1 tr:nth-child(even){background-color: #2374F8 ;}

#s1 tr:hover {background-color: #0888dc;}

#s1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2374F8;
  color: white;
}
</style>
</head>
<body>
<center>
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
    <li class="nav-item">
      <a class="nav-link" href="priority.php">Priority</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rr.php">Round-Robin</a>
    </li>
  </ul>
</nav>
<?php
$bt=$_POST["bt"]; // storing burst time of each process in array name bt
$arrt=$_POST["arrt"];
$n=count($bt);
$wt[0]=0; // storing waiting time of each process in array name wt
$avg=0;
 // storing Process id of each process in array name psnam
for($rr=0;$rr<$n;$rr++)
{
   $psnam[$rr]=$rr+1;
}
// sorting burst time to calculate sjf
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($bt[$j] > $bt[$j+1]) {
            $temp = $bt[$j];
            $bt[$j] = $bt[$j+1];
            $bt[$j+1] = $temp;
            $tempp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $tempp;
        }
    }
}

// storing process id in array psname

for($i=1;$i<$n;$i++)
{
  $wt[$i]=$bt[$i-1]+$wt[$i-1];
  $avg=$avg+$wt[$i];
}
echo "<br>"."<br>"."<br>"."<br>"."<br>";
//echo "<br>".'<p id="pr" >Waiting Time of each Process :</p>'."<br>"."<br>";
// Sorting the process id array to print in sorted order
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($psnam[$j] > $psnam[$j+1]) {
            $temp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $temp;
            $tempp = $wt[$j];
            $wt[$j] = $wt[$j+1];
            $wt[$j+1] = $tempp;
        }
    }
}

 echo '<table id="s1" style="width:400px">
  <tr id="t1">
    <th>Process Number</th>
    <th>Waiting Time</th>
  </tr>';
for($i=0;$i<$n;$i++)
{
    $pn=$psnam[$i];
    echo '
  <tr>
    <th>'. $pn; echo '</th>';
    echo '<th>' . $wt[$i]; echo '</th>
  </tr>';
}
$totalwt=$avg/$n;
echo '<tr><th>Average Waiting Time :</th>';
echo '<th>'. $totalwt; echo '</th></tr></table>';
?>

<br><br>
<div class="container">
  <a href="randomgraph.php" button type="button" class="btn btn-outline-danger">Click here to see some random comparision </button></a>
</div>
</center>
</body>
</html>
