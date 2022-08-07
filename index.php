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
    <a href="addGame.php">Add Games</a>
    <a href="removeGame.php">Remove Games</a>
    <a href="update.php">Update Games</a>
    <a href="search.php">Search</a>
    <a href="#"></a>
    <a href="#"></a>
</div>
<div class="header">
    <h1>Games:</h1>
</div>

<a class="gameslist">
    <br></br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Discount</th>
                <th scope="col">Device</th>
                <th scope="col">Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['discount']."%</td>";
                    echo "<td>".$row['device']."</td>";
                    echo "<td>$".$row['cost']."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
</a>



 </body>
</html>