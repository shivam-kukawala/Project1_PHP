<html>
<head>
<title>Project 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body>   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">BookStore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="store.php">Store</a>
        </li>
      </ul>
    </div>
  </nav>
<?php
require("mysqli.php");

function start_session($x){
    session_start();
    $_SESSION["name"] = $x;
    echo($_SESSION["name"]);   
}

$q = "SELECT * FROM bookinventory; ";
$r = @mysqli_query($dbc, $q);
?>
<table class="table">
    <th>Book Name</th>
    <th>Available in Store</th>
    <th>Price</th>
<?php
while( $row = $r->fetch_array() )
{
    echo "<tr><td><a href='checkout.php?bookname=".$row['Name']."&quantity=".$row['Quantity']."&price=".$row['Price']."'> ".$row['Name']." </a></td>";
    echo "<td> ".$row['Quantity']." </td>";
    echo "<td> $".$row['Price']." </td>";
    echo "</tr>";
}

?>
</table>
</body>
</html>
