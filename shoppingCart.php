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
    <br></br>


    <a class="topPicks">
        <h1 style="color:white">ㅤYour cart:</h1>
        <br></br>
        <?php
        session_start();
        $itemsS = $_SESSION['cart'];
        $items = unserialize($itemsS);
        $total = 0;

        foreach ($items as $item) {
            $costOfItem = $item['cost'];
            $discount = $item['discount'];
            $discountPrice = $costOfItem - ($costOfItem * ($discount / 100));
            $total += $discountPrice;
        }

        $_SESSION['total'] = $total;

        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Title:</th>";
        echo "<th>Description:</th>";
        echo "<th>Discount:</th>";
        echo "<th>Cost:</th>";
        echo "<th>Remove:</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . $item['title'] . "</td>";
            echo "<td>" . $item['description'] . "</td>";
            echo "<td>" . $item['discount'] . "</td>";
            echo "<td>$" . $item['cost'] . " AUD</td>";
            echo "<td><form action='shoppingCart.php' method='post'>";
            echo "<input type='hidden' name='remove' value='" . $item['title'] . "'>";
            echo "<input type='submit' class='btn btn-primary' value='Remove'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<br></br><br></br>";
        echo "<h3>ㅤTotal: $" . $total . " AUD</h3>";
        echo "ㅤㅤ<a href='checkout.php' class='btn btn-primary'>Checkout</a>ㅤ";
        echo "ㅤㅤ<a href='index.php' class='btn btn-primary'>Continue Shopping</a>ㅤ";

        if (isset($_POST['remove'])) {
            $remove = $_POST['remove'];
            $items = unserialize($itemsS);
            foreach ($items as $key => $item) {
                if ($item['title'] == $remove) {
                    unset($items[$key]);
                }
            }
            $itemsS = serialize($items);
            $_SESSION['cart'] = $itemsS;
        }
        ?>



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