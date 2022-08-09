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
<body style="background-color:black">
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


<div>
    <div id="img-right" class="img-right">  
        <img src="https://wallpapershome.com/images/pages/pic_v/13886.jpg" alt="banner" class="img-fluid">
    </div>
</div>


<style>

.img-right {
    position: absolute;
    top: 53px;
    right: 0px;
    width: 15%;
    height: 15%;
    border-radius: 0px 0px 80px 80px;
    animation-name: flow;
    animation-duration: 4s;
    animation-iteration-count: infinite;
    animation-delay: -2s;
    transition-timing-function: cubic-bezier(0,.57,1,.46);
    box-shadow: 2px 2px 16px 2px rgba(0,0,0,0.5);
  
}
.second-animation {
  animation-delay: -1.5s;
}
@keyframes flow {
  0% {height: 20%; border-radius: 0px 0px 30px 30px;}
  50% {height: 90%; border-radius: 0px 0px 100px 100px;}
  100% {height: 20%; border-radius: 0px 0px 30px 30px;}
}


</style>


<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>



<a class="topPicks">
<h1 style="color:white">Top Picks:</h1>
<br></br>
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

    $i = 0;
    while ($i < 3) {
        echo "<div class='row'>";
        $j = 0;
        while ($j < 3) {
            echo "<div class='col'>";
            echo "<div class='card'>";
            echo "<h3>".$row['title']."</h3>";
            echo "<p>".$row['description']."</p>";
            echo "<p>".$row['cost']."</p>";
         
            echo "<form action='index.php' method='post'>";
            echo "<input type='hidden' name='title' value='".$row['title']."'>";
            echo "<input type='hidden' name='description' value='".$row['description']."'>";
            echo "<input type='hidden' name='cost' value='".$row['cost']."'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
         
            echo "</div>";
            echo "</div>";
            $row = pg_fetch_array($result, null, PGSQL_ASSOC);
            $j++;
        }
        echo "</div>";
        echo "<br></br>";
        $i++;
    }

    if (isset($_POST['title'])) {
        $gameTitle = $_POST['title'];
        $gameCost = $_POST['cost'];
        $gameDescription = $_POST['description'];

        $cart[] = array('title' => $gameTitle, 'cost' => $gameCost, 'description' => $gameDescription);
        setcookie('cart', serialize($cart), time() + (86400 * 30), "/");
        echo "You have added ".$gameTitle."| Cost: ".$gameCost." to your cart";
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
