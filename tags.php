<?php
session_start();
?>
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
        <a href="tags.php">Tags</a>
        <a href="#"></a>
        <a href="shoppingCart.php" class="shoppingcart"><i class="fa fa-shopping-cart"></i>
            <?php
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $cartCount = count($cart);
                echo "<span class='badge badge-light'>$cartCount</span>";
            } else {
                echo "<span class='badge badge-light'>0</span>";
            }
            ?>
    </a>
    </div>
    <div class="header">
        <h1 style="color:white">Search for a game:</h1>
    </div>
    <div class="row">
        <div class="column">
            <ul>
                <li><a href="tags.php?category=action">Action</a></li>
                <li><a href="tags.php?category=adventure">Adventure</a></li>
                <li><a href="tags.php?category=sports">Sports</a></li>
                <li><a href="tags.php?category=strategy">Strategy</a></li>
                <li><a href="tags.php?category=rpg">RPG</a></li>
                <li><a href="tags.php?category=puzzle">Puzzle</a></li>
                <li><a href="tags.php?category=other">Other</a></li>
                <li><a href="tags.php?category=none">None</a></li>
                <li><a href="tags.php?device=console">Console</a></li>
                <li><a href="tags.php?device=Iphone">Iphone</a></li>
                <li><a href="tags.php?device=pc">PC</a></li>
                <li><a href="tags.php?languages=english">English</a></li>
                <li><a href="tags.php?languages=french">French</a></li>
                <li><a href="tags.php?languages=german">German</a></li>
                <li><a href="tags.php?languages=spanish">Spanish</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <?php
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $query = "SELECT * FROM listgames WHERE categorys LIKE '%$category%'";
                $result = pg_query($query);
                if (!$result) {
                    die("Error in SQL query: " . pg_last_error());
                }
                while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<div class='card' style='color:black'>";
                    echo "<div class='container'>";
                    echo "<h2 style='color:black'>" . $row['title'] . "</h2>";
                    echo "<p class='price' style='color:black'>$" . $row['cost'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            if (isset($_GET['device'])) {
                $device = $_GET['device'];
                $query = "SELECT * FROM listgames WHERE device LIKE '%$device%'";
                $result = pg_query($query);
                if (!$result) {
                    die("Error in SQL query: " . pg_last_error());
                }
                while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<div class='card' style='color:black'>";
                    echo "<div class='container'>";
                    echo "<h2 style='color:black'>" . $row['title'] . "</h2>";
                    echo "<p class='price' style='color:black'>$" . $row['cost'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            if (isset($_GET['languages'])) {
                $languages = $_GET['languages'];
                $query = "SELECT * FROM listgames WHERE languages LIKE '%$languages%'";
                $result = pg_query($query);
                if (!$result) {
                    die("Error in SQL query: " . pg_last_error());
                }
                while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<div class='card' style='color:black'>";
                    echo "<div class='container'>";
                    echo "<h2 style='color:black'>" . $row['title'] . "</h2>";
                    echo "<p class='price' style='color:black'>$" . $row['cost'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(4, 2fr);
            grid-gap: 10px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            color: black;
            font-family: arial;
            background-color: #1b2838;
            padding: 20px;
            border: #0e4a80 2px solid;
          border-radius: 10px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        .container {
            padding: 2px 16px;
        }
        .price {
            color: grey;
            font-size: 22px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
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