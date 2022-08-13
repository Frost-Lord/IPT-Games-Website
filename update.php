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
        <h1 style="color:white">What game would you like to update?:</h1>
    </div>

    <br></br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="addGame.php" method="post" class="formquestions">
                    <input type="text" name="title" placeholder="Game Title"><br></br>
                    <input type="text" name="description" placeholder="Game Description"><br></br>
                    <input type="text" name="discount" placeholder="Game Discount"><br></br>
                    <input type="text" name="device" placeholder="Game Device"><br></br>
                    <input type="text" name="cost" placeholder="Game Cost"><br></br>
                    <input type="submit" value="Add Game" style="color:black;">
                </form>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['title'])) {
        $query = "SELECT * FROM listgames WHERE title = '$_POST[title]'";
        $result = pg_query($query);
        if (!$result) {
            die("Error in SQL query: " . pg_last_error());
        }
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        if ($row) {
            $query = "UPDATE listgames SET description = '$_POST[description]', discount = '$_POST[discount]', device = '$_POST[device]', cost = '$_POST[cost]' WHERE title = '$_POST[title]'";
            $result = pg_query($query);
            if (!$result) {
                die("Error in SQL query: " . pg_last_error());
            }
            echo "Game updated";
        } else {
            $query = "INSERT INTO listgames (title, description, discount, device, cost) VALUES ('$_POST[title]', '$_POST[description]', '$_POST[discount]', '$_POST[device]', '$_POST[cost]')";
            $result = pg_query($query);
            if (!$result) {
                die("Error in SQL query: " . pg_last_error());
            }
            echo "Game added";
        }
    }
    ?>



</body>

</html>