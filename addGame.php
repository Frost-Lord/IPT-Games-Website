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
    <input type="checkbox" id="rpg" name="rpg" value="pg">
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
echo "Categorys: " . $_POST["categorys"] . "<br>";
echo "Language: " . $_POST["languages"] . "<br>";

echo "test:" . $_POST["console"] . "<br>";

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];
    $cost = $_POST['cost'];
    $developer = $_POST['developer'];


    $device = array();
    if (isset($_POST['console'])) {
        array_push($device, $_POST['console']);
    }
    if (isset($_POST['pc'])) {
        array_push($device, $_POST['pc']);
    }
    if (isset($_POST['Iphone'])) {
        array_push($device, $_POST['Iphone']);
    }
    if (isset($_POST['Mac'])) {
        array_push($device, $_POST['Mac']);
    }

    $categorys = array();
    if (isset($_POST['action'])) {
        array_push($categorys, $_POST['action']);
    }
    if (isset($_POST['adventure'])) {
        array_push($categorys, $_POST['adventure']);
    }
    if (isset($_POST['strategy'])) {
        array_push($categorys, $_POST['strategy']);
    }
    if (isset($_POST['rpg'])) {
        array_push($categorys, $_POST['rpg']);
    }
    if (isset($_POST['sports'])) {
        array_push($categorys, $_POST['sports']);
    }
    if (isset($_POST['puzzle'])) {
        array_push($categorys, $_POST['puzzle']);
    }
    if (isset($_POST['other'])) {
        array_push($categorys, $_POST['other']);
    }

    $languages = array();
    if (isset($_POST['english'])) {
        array_push($languages, $_POST['english']);
    }
    if (isset($_POST['spanish'])) {
        array_push($languages, $_POST['spanish']);
    }
    if (isset($_POST['french'])) {
        array_push($languages, $_POST['french']);
    }
    if (isset($_POST['german'])) {
        array_push($languages, $_POST['german']);
    }
    if (isset($_POST['other'])) {
        array_push($languages, $_POST['other']);
    }


    $device = implode(",", $device);
    $categorys = implode(",", $categorys);
    $languages = implode(",", $languages);

    $query = "INSERT INTO listgames (title, description, discount, cost, developer, device, categorys, languages) VALUES ('$title', '$description', '$discount', '$cost', '$developer', '$device', '$categorys', '$languages')";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo "Game added successfully!";
}
?>



 </body>
</html>
