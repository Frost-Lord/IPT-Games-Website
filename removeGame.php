<html>
 <head>
  <title>Games Store</title>
  <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">
<link rel="stylesheet" href="styles/removeGame.css">
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
    <a href="removeGame.php">Remove Games</a>
    <a href="developers.php">Developers</a>
    <a href="publishers.php">Publishers</a>
    <a href="search.php">Search</a>
    <a href="#"></a>
    <a href="#"></a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="header">
    <h1>What game would you like to Remove?:</h1>
</div>

<a class="addgame"></a>
<br></br>   
<form action="addGame.php" method="post">
    <input type="text" name="title" placeholder="Game Title"><br></br>
    <input type="submit" value="Add Game">
</form>
</a>

<?php
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $query = "DELETE FROM listgames WHERE title = '$title'";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo "Game Removed";
}
?>



 </body>
</html>