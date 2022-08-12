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

    <section class=" slider_section ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="detail_box">
                                    <h1>
                                        ALL THE GAMES YOU WANT <br>
                                        IN ONE <span>PLACE!</span>
                                    </h1>
                                    <p>
                                        This is the best video game digital distribution service
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="img-box">
                                    <img src="https://i.ibb.co/37VJLgz/removal-ai-tmp-62f2332db0f0c.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <div class="sidenav">
        <a class="smmtitle">BROWSE BY GENRE:</a>
        <a class="smm">Action</a>
        <a class="smm">Adventure</a>
        <a class="smm">Strategy</a>
        <a class="smm">Racing</a>
        <a class="smm">Sports</a>
        <a class="smm">Other</a>
        <a class="smm">All</a>
        <a class="smmtitle">BROWSE BY LANGUAGE:</a>
        <a class="smm">English</a>
        <a class="smm">French</a>
        <a class="smm">Spanish</a>
        <a class="smm">Other</a>
        <a class="smm">All</a>
        <a class="smmtitle">BROWSE BY DEVICE:</a>
        <a class="smm">PC</a>
        <a class="smm">PS4</a>
        <a class="smm">Xbox One</a>
        <a class="smm">Nintendo Switch</a>
        <a class="smm">Other</a>
        <a class="smm">All</a>
    </div>
    <br></br>
    <style>
        .sidenav {
            position: fixed;
            top: 150;
            right: 30;
            width: 300px;
            height: 600px;
            background-color: #07111a;
            z-index: 2;
            overflow-x: hidden;
            padding: 20px;
            border: #0e4a80 2px solid;
            border-radius: 10px;
            animation: 3s;
        }
        @keyframes sidenav {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-50px);
            }
            100% {
                transform: translateY(0);
            }
        }
        
        .smmtitle{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            animation: 3s;
        }
        .smm{
            padding: 3px 8px 3px 16px;
            font-size: 13px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
    </style>

    <br></br><br>
    <h1 style="color:white">ㅤㅤTop 4 Games:</h1>
    <br></br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
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
                    $limit = 0;

                    while ($limit < 3 && $row) {
                        $limit++;
                        echo '<div class="card">';
                        echo '<img class="card-img-top" src="https://i.ibb.co/37VJLgz/removal-ai-tmp-62f2332db0f0c.png" alt="Card image cap">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                        echo '<p class="card-text">' . $row['description'] . '</p>';
                        echo '<p class="card-text"><small class="text-muted">Cost: $' . $row['cost'] . ' AUD</small></p>';
                        echo "<form action='index.php' method='post'>";
                        echo "<input type='hidden' name='title' value='" . $row['title'] . "'>";
                        echo "<input type='hidden' name='description' value='" . $row['description'] . "'>";
                        echo "<input type='hidden' name='cost' value='" . $row['cost'] . "'>";
                        echo "<input type='submit' class='btn btn-primary' value='Add to Cart'>";
                        echo "</form>";
                        echo '</div>';
                        echo '</div>';
                        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
                    }

                    echo '<br></br><br></br><br></br>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br></br>



    <a class="topPicks">
        <h1 style="color:white">ㅤㅤTop Picks:</h1>
        <br></br>
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

        $i = 0;
        while ($i < 3) {
            echo "<div class='row'>";
            $j = 0;
            while ($j < 3) {
                echo "<div class='col'>";
                echo "<div class='card'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                if (!$row['price']) {
                    echo "<p></p>";
                } else {
                    echo "<p>Cost: $" . $row['cost'] . " AUD</p>";
                }

                echo "<form action='index.php' method='post'>";
                echo "<input type='hidden' name='title' value='" . $row['title'] . "'>";
                echo "<input type='hidden' name='description' value='" . $row['description'] . "'>";
                echo "<input type='hidden' name='cost' value='" . $row['cost'] . "'>";
                echo "<input type='submit' class='btn btn-primary' value='Add to Cart'>";
                echo "</form>";

                echo "</div>";
                echo "</div>";
                $row = pg_fetch_array($result, null, PGSQL_ASSOC);
                $j++;
                if ($j > 9) {
                    break;
                }
            }
            echo "</div>";
            echo "<br></br>";
            $i++;
        }

        echo "<br></br><br></br><br></br>";




        if (isset($_POST['title'])) {
            $gameTitle = $_POST['title'];
            $gameCost = $_POST['cost'];
            $gameDescription = $_POST['description'];

            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart[] = [
                    'title' => $gameTitle,
                    'cost' => $gameCost,
                    'description' => $gameDescription
                ];

                $_SESSION['cart'] = serialize($cart);
                echo "<script>alert(" . $game['title'] . " added to cart!)</script>";
            } else {
                $cart[] = [
                    'title' => $gameTitle,
                    'cost' => $gameCost,
                    'description' => $gameDescription
                ];
                $_SESSION['cart'] = serialize($cart);
                echo "<script>alert(" . $game['title'] . " added to cart!)</script>";
            }
        }


        if (isset($_COOKIE['cart'])) {
            $cart = unserialize($_COOKIE['cart']);
            echo "<h1>Your Cart:</h1>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Cost</th>";
            echo "<th>Description</th>";
            echo "</tr>";
            foreach ($cart as $game) {
                echo "<tr>";
                echo "<td>" . $game['title'] . "</td>";
                echo "<td>" . $game['cost'] . "</td>";
                echo "<td>" . $game['description'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

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
                background-color: #1b2838;
                padding: 20px;
                border: #0e4a80 2px solid;
                border-radius: 10px;
                color: #fff;
                width: 100%;
                height: 100%;
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

            .card:hover {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
            }

            .btn {
                background-color: #1b2838;
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 100%;
                border-radius: 3px;
                cursor: pointer;
                font-size: 1.2em;
            }
        </style>
    </a>



</body>

</html>