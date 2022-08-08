<html>
 <head>
  <title>Games Store</title>
  <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">
<link rel="stylesheet" href="styles/addGame.css">
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
<div class="header">
    <h1 style="color:white">What game would you like to add?:</h1>
</div>

<br></br>   
<form action="addGame.php" method="post" class="formquestions">
    <input type="text" name="title" placeholder="Game Title" style="color:black;"><br></br>
    <input type="text" name="description" placeholder="Game Description" style="color:black;"><br></br>
    <input type="text" name="developer" placeholder="Game Developer" style="color:black;"><br></br>
    <input type="text" name="discount" placeholder="Game Discount" style="color:black;"><br></br>
    <input type="text" name="cost" placeholder="Game Cost" style="color:black;"><br></br>
    <h1 style="color:white">Choose a device:</h1>
    <input type="checkbox" id="console" name="console" value="console">
    <label for="console"> It works with consoles</label><br>
    <input type="checkbox" id="pc" name="pc" value="pc">
    <label for="pc"> It works with PC</label><br>
    <input type="checkbox" id="Iphone" name="Iphone" value="Iphone">
    <label for="Iphone"> It works with Iphone</label>
    <br></br>
    <h1 style="color:white">Choose a Categorys:</h1>
    <input type="checkbox" id="action" name="action" value="action">
    <label for="action"> Action</label><br>
    <input type="checkbox" id="adventure" name="adventure" value="adventure">
    <label for="adventure"> Adventure</label><br>
    <input type="checkbox" id="strategy" name="strategy" value="strategy">
    <label for="strategy"> Strategy</label><br>
    <input type="checkbox" id="rpg" name="rpg" value="rpg">
    <label for="rpg"> RPG</label><br>
    <input type="checkbox" id="sports" name="sports" value="sports">
    <label for="sports"> Sports</label><br>
    <input type="checkbox" id="puzzle" name="puzzle" value="puzzle">
    <label for="puzzle"> Puzzle</label><br>
    <input type="checkbox" id="other" name="other" value="other">
    <label for="other"> Other</label><br>
    <input type="checkbox" id="none" name="none" value="none">
    <label for="none"> None</label><br>
    <br></br>
    <h1 style="color:white">Choose a Language:</h1>
    <input type="checkbox" id="english" name="english" value="english">
    <label for="english"> English</label><br>
    <input type="checkbox" id="spanish" name="spanish" value="spanish">
    <label for="spanish"> Spanish</label><br>
    <input type="checkbox" id="french" name="french" value="french">
    <label for="french"> French</label><br>
    <input type="checkbox" id="german" name="german" value="german">
    <label for="german"> German</label><br>
    <input type="checkbox" id="other" name="other" value="other">
    <label for="other"> Other</label><br>
    <br></br>
    <input type="submit" value="Add Game" style="color:black;">
</form>

<?php
echo "Devices: " . $_POST["device"] . "<br>";
echo "Categorys: " . $_POST["category"] . "<br>";
echo "Language: " . $_POST["language"] . "<br>";

echo "test:" . $_POST["console"] . "<br>";

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];
    $cost = $_POST['cost'];
    $developer = $_POST['developer'];

   foreach($_POST['device'] as $temp) {
        $number = 0;
        if ($temp == 'console') {
            $number = 1;
        } else if ($temp == 'pc') {
            $number = 2;
        } else if ($temp == 'Iphone') {
            $number = 3;
        } else if ($temp == 'Mac') {
            $number = 4;
        }
        $sql = "INSERT INTO `listgames`(`id`, `device`) values ($id,$temp)";
        $result = pg_query($sql);
    }


    foreach($_POST['Categorys'] as $temp){
        $number = 0;
        if ($temp == 'action') {
            $number = 1;
        } else if ($temp == 'adventure') {
            $number = 2;
        } else if ($temp == 'rpg') {
            $number = 3;
        } else if ($temp == 'sports') {
            $number = 4;
        } else if ($temp == 'strategy') {
            $number = 5;
        }
        $sql = "INSERT INTO `listgames`(`id`, `Categorys`) values ($id,$temp)";
        $result = pg_query($sql);
    }

    foreach($_POST['language'] as $temp){
        $number = 0;
        if ($temp == 'english') {
            $number = 1;
        } else if ($temp == 'french') {
            $number = 2;
        } else if ($temp == 'german') {
            $number = 3;
        } else if ($temp == 'spanish') {
            $number = 4;
        }
        $sql = "INSERT INTO `listgames`(`id`, `language`) values ($id,$temp)";
        $result = pg_query($sql);
    }
    
    
    $query = "INSERT INTO listgames (title, description, discount, cost, developer) VALUES ('$title', '$description', '$discount', '$cost', '$developer')";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo "Game added successfully!";
}
?>



 </body>
</html>