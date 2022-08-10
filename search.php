<html>

<head>
    <title>Games Store</title>
    <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<style>
</style>

<body style="background-color:#07111a">
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
        <a href="shoppingCart.php" class="shoppingcart"><i class="fa fa-shopping-cart"></i></a>
    </div>
    <div class="header">
        <h1 style="color:white">Search for a game:</h1>
    </div>
    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Search..." style="color:black;">
        <input type="submit" value="Search" style="color:black;">
    </form>
    <?php
    if (isset($_POST['search'])) {
        $query = "SELECT * FROM listgames WHERE title = '$_POST[search]'";
        $result = pg_query($query);
        if (!$result) {
            die("Error in SQL query: " . pg_last_error());
        }
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        if ($row) {
            echo "<div class='header'>";
            echo "<h1>Game Information:</h1>";
            echo "</div>";
            echo "<div class='gameinfo'>";
            echo "<p>Title: " . $row['title'] . "</p>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<p>Discount: " . $row['discount'] . "%</p>";
            echo "<p>Devices: " . $row['device'] . "</p>";
            echo "<p>Cost: $" . $row['cost'] . "</p>";
            echo "</div>";
        } else {
            echo "<div class='header'>";
            echo "<h1>Game not found!</h1>";
            echo "</div>";
        }
    }
    ?>
    <style>
        .h1 {
            width: 50%;
            margin: 0 auto;
            color: white;
            text-align: center;
        }

        .gameinfo {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
    </style>

</body>

</html>