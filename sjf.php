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
#img
{
  height:500px;
}
</style>
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
    <li class="nav-item">
      <a class="nav-link" href="priority.php">Priority</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rr.php">Round-Robin</a>
    </li>
  </ul>
</nav><br><br><br><br><br><br><br>
<center>
<div class="container">
<form action="inputsjf.php" method="POST">
  <div class="form-group">
    <label for="No of Processes"></label>
    <input type="number" class="form-control" placeholder="No of Processes" name="n">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div>
</center>
</body>
</html>
