<html>
 <head>
  <title>Games Store</title>
  <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">
 </head>
 <style>
</style>
 <body>
<?php
    $db_connection = pg_connect("host=localhost dbname=Games user=postgres password=password");
    if (!$db_connection) {
        die("Error in connection: " . pg_last_error());
    }
    $query = "SELECT * FROM listgames";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }   
    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
?>
<div class="topnav">
    <a href="index.php">Home</a>
    <a href="addgame.php">Add Games</a>
    <a href="platforms.php">Platforms</a>
    <a href="developers.php">Developers</a>
    <a href="publishers.php">Publishers</a>
    <a href="genres.php">Genres</a>
    <a href="#"></a>
    <a href="#"></a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="header">
    <h1>What game would you like to add?:</h1>
</div>

<a class="addgame"></a>
<br></br>   
<form action="addGame.php" method="post">
    <input type="text" name="title" placeholder="Game Title"><br></br>
    <input type="text" name="description" placeholder="Game Description"><br></br>
    <input type="text" name="discount" placeholder="Game Discount"><br></br>
    <input type="text" name="device" placeholder="Game Device"><br></br>
    <input type="text" name="cost" placeholder="Game Cost"><br></br>
    <input type="submit" value="Add Game">
</form>
</a>

<?php
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];
    $device = $_POST['device'];
    $cost = $_POST['cost'];
    $query = "INSERT INTO listgames (title, description, discount, device, cost) VALUES ('$title', '$description', '$discount', '$device', '$cost')";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo "Game added successfully!";
}
?>



 </body>
</html>