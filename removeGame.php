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
        <a href="#"></a>
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
        <h1 style="color:white">What game would you like to Remove?:</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <a class="addgame"></a>
                <br></br>
                <form action="removeGame.php" method="post">
                    <input type="text" name="title" placeholder="Game Title" style="color:black"><br></br>
                    <input type="submit" value="Add Game" style="color:black;">
                </form>
                </a>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $query = "DELETE FROM listgames WHERE title = '$title'";
        $result = pg_query($query);
        if (!$result) {
            //echo "Invalid Game Title Provided!";
            die("Invalid Game Title Provided!");
        }
        echo "Game Removed";
    }
    ?>



</body>

</html>