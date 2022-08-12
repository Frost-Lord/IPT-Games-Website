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
    session_start();

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
    <br></br>


    <a class="topPicks">
        <h1 style="color:white">Your cart:</h1>
        <br></br>
        <?php
        session_start();
        $itemsS = $_SESSION['cart'];
        $items = unserialize($itemsS);
        $total = 0;

        foreach ($items as $item) {
            $total += $item['cost'];
        }

        $_SESSION['total'] = $total;

        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Title:</th>";
        echo "<th>Description:</th>";
        echo "<th>Cost:</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . $item['title'] . "</td>";
            echo "<td>" . $item['description'] . "</td>";
            echo "<td>$" . $item['cost'] . " AUD</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<h3>Total: $" . $total . "</h3>";
        echo "<a href='checkout.php' class='btn btn-primary'>Checkout</a>ㅤㅤ";
        echo "<a href='index.php' class='btn btn-primary'>Continue Shopping</a>ㅤㅤ";
        echo "<a href='removeGame.php' class='btn btn-primary'>Remove Games</a>";

        ?>

<br></br><br></br><br></br>
        <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Types:</h3>
                        <ul>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Tags</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About:</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>About us:</h3>
                        <p>We provide the best and affordable games on the market! So come join us!</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Ewen MacCulloch © 2022</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <style>
            .card {
                background-color: #333;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                width: 100%;
            }

            .card-title {
                font-size: 1.5em;
            }

            .card-text {
                font-size: 1em;
            }
        </style>
    </a>



</body>

</html>