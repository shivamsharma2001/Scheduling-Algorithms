<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheduling Algorithms</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<style>
#pr
{
  color:red;
}
    .container {
        width: 50%;
        height: 50%;
    }
body{
  background-color: #ffffff;
}
#d1
{
  color:red;
}
#barChart{
  background-color: wheat;
  border-radius: 6px;
/*   Check out the fancy shadow  on this one */
  box-shadow: 0 3rem 5rem -2rem rgba(0, 0, 0, 0.6);
}
</style>
<body>
<center>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="index.html">Scheduling Algorithms</a>
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
<br><br><br><h1 id="d1"><u>Comparision of four CPU Scheduling Algorithms</u></h1><br><br>
    <div class="container">
  <br />
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
<!--       Chart.js Canvas Tag -->
      <canvas id="barChart"></canvas>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</center>
<br><br><br><br><br><br><h5><u>**Description</u></h5>
<p>Here we are comparing four CPU Scheduling Algorithms, all the required values such as burst time,arrival time, priority etc are randomly generated.</p>
</html>
<?php
$n=rand(5,10);
// storing burst time,Arrival Time, Priority of each process in array name bt,arrt,pt respectively
for($i=0;$i<$n;$i++)
 { 
    $bt[$i]=rand(1,20);
    $arrt[$i]=rand(1,10);
    $pt[$i]=rand(1,10);
 } 

//Storing a copy of burst time to be used further
for($i=0;$i<$n;$i++)
{
   $btcp[$i]=$bt[$i];
}
// storing Process id of each process in array name psnam
for($rr=0;$rr<$n;$rr++)
{
   $psnam[$rr]=$rr+1;
}

//   *******   SJF ALGORITHM STARTS *******
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
// Calculating Waiting time for SJF
$wtsjf[0]=0; 
$avgsjf=0;
for($i=1;$i<$n;$i++)
{
  $wtsjf[$i]=$bt[$i-1]+$wtsjf[$i-1];
  $avgsjf=$avgsjf+$wtsjf[$i];
}
// Sorting the process id array to print the waiting time in sorted order
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($psnam[$j] > $psnam[$j+1]) {
            $temp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $temp;
            $tempp = $wtsjf[$j];
            $wtsjf[$j] = $wtsjf[$j+1];
            $wtsjf[$j+1] = $tempp;
        }
    }
}
// Average waiting time of SJF
$totalwtsjf=$avgsjf/$n;  
//   *******   SJF ALGORITHM ENDS *******

//Saving the original burst time again in array bt
for($i=0;$i<$n;$i++)
{
   $bt[$i]=$btcp[$i];
}


// storing Process id of each process in array name psnam
for($rr=0;$rr<$n;$rr++)
{
   $psnam[$rr]=$rr+1;
}

//   *******   FCFS ALGORITHM STARTS *******
// sorting arrival time to calculate fcfs
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($arrt[$j] > $arrt[$j+1]) {
            $temp = $arrt[$j];
            $arrt[$j] = $arrt[$j+1];
            $arrt[$j+1] = $temp;
            $tempp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $tempp;
            $temppp = $bt[$j];
            $bt[$j] = $bt[$j+1];
            $bt[$j+1] = $temppp;
        }
    }
}
// Calculating Waiting time for FCFS
$wtfcfs[0]=0; 
$avgfcfs=0;
for($i=1;$i<$n;$i++)
{
  $wtfcfs[$i]=$bt[$i-1]+$wtfcfs[$i-1];
  $avgfcfs=$avgfcfs+$wtfcfs[$i];
}
// Sorting the process id array to print the waiting time in sorted order
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($psnam[$j] > $psnam[$j+1]) {
            $temp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $temp;
            $tempp = $wtfcfs[$j];
            $wtfcfs[$j] = $wtfcfs[$j+1];
            $wtfcfs[$j+1] = $tempp;
        }
    }
}
// Average waiting time of FCFS
$totalwtfcfs=$avgfcfs/$n;  
//   *******   FCFS ALGORITHM ENDS *******


//Saving the original burst time again in array bt
for($i=0;$i<$n;$i++)
{
   $bt[$i]=$btcp[$i];
}


// storing Process id of each process in array name psnam
for($rr=0;$rr<$n;$rr++)
{
   $psnam[$rr]=$rr+1;
}

//   *******   PRIORITY ALGORITHM STARTS *******
// sorting priority to calculate Priority scheduling
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($pt[$j] > $pt[$j+1]) {
            $temp = $pt[$j];
            $pt[$j] = $pt[$j+1];
            $pt[$j+1] = $temp;
            $tempp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $tempp;
            $temppp = $bt[$j];
            $bt[$j] = $bt[$j+1];
            $bt[$j+1] = $temppp;
        }
    }
}
// Calculating Waiting time for Priority 
$wtps[0]=0; 
$avgps=0;
for($i=1;$i<$n;$i++)
{
  $wtps[$i]=$bt[$i-1]+$wtps[$i-1];
  $avgps=$avgps+$wtps[$i];
}
// Sorting the process id array to print the waiting time in sorted order
for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
        if ($psnam[$j] > $psnam[$j+1]) {
            $temp = $psnam[$j];
            $psnam[$j] = $psnam[$j+1];
            $psnam[$j+1] = $temp;
            $tempp = $wtps[$j];
            $wtps[$j] = $wtps[$j+1];
            $wtps[$j+1] = $tempp;
        }
    }
}
// Average waiting time of Priority
$totalwtps=$avgps/$n;  
//   *******   PRIOROTY ALGORITHM ENDS *******


//Saving the original burst time again in array bt
for($i=0;$i<$n;$i++)
{
   $bt[$i]=$btcp[$i];
}

// storing Process id of each process in array name psnam
for($rr=0;$rr<$n;$rr++)
{
   $psnam[$rr]=$rr+1;
}
//    *********   ROUND ROBIN ALGORITHM STARTS  **********
$tq=rand(5,10);

for ($i=0;$i<$n;$i++) 
    {
      $rembt[$i]=$bt[$i];
    }
    $t = 0; 
    while(1) 
    { 
        $done = true; 
        for ($i=0;$i<$n;$i++) 
        {
            if($rembt[$i]>0) 
            { 
                $done = false;
                if ($rembt[$i] > $tq) 
                {
                    $t += $tq; 
                    $rembt[$i] -= $tq; 
                } 
                else
                {
                    $t = $t + $rembt[$i]; 
                    $wtrr[$i] = $t - $bt[$i]; 
                    $rembt[$i] = 0; 
                } 
            } 
        } 
        if ($done == true) 
          break; 
   }
//    *********   ROUND ROBIN ALGORITHM ENDS  **********

?>
<script type="text/JavaScript">
function draw(fcfs,sjf,rr,priority)
{
var canvas = document.getElementById("barChart");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
var label=[];
for(var i=0;i<fcfs.length;i++)
{
  label.push(i+1);
}
var data = {
  labels: label,
  datasets: [{
      label: "FCFS",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(225,0,0,0.4)",
      borderColor: "red", // The main line color
      borderCapStyle: 'square',
      borderDash: [], 
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      data: fcfs,
      spanGaps: true,
    }, {
      label: "SJF",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(167,105,0,0.4)",
      borderColor: "rgb(167, 105, 0)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      data: sjf,
      spanGaps: false,
    }
    , {
      label: "Round-Robin",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(117,115,0,0.4)",
      borderColor: "rgb(110, 205, 0)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      data: rr,
      spanGaps: false,
    }
    , {
      label: "Priority",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(27,95,0,0.4)",
      borderColor: "rgb(220, 215, 0)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      data: priority,
      spanGaps: false,
    }

  ]
};
var options = {
  scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Process Number',
                     fontSize: 20 
                  }
            }] ,
             yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Waiting Time',
                     fontSize: 20 
                  }
            }] 
                     
        }   
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});
}
  var fcfs=new Array(<?php echo implode(',', $wtfcfs); ?>);
  var sjf=new Array(<?php echo implode(',', $wtsjf); ?>);
  var rr=new Array(<?php echo implode(',', $wtrr); ?>);
  var priority=new Array(<?php echo implode(',', $wtps); ?>);
  var x=new draw(fcfs,sjf,rr,priority);
</script>
