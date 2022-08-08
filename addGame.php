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
    <label for="devices">Choose a Device:</label>
        <select id="devices" name="devices" style="color:black;">
        <option value="console" style="color:black;">console</option>
        <option value="pc" style="color:black;">pc</option>
        <option value="Iphone" style="color:black;">Iphone</option>
        <option value="Mac" style="color:black;">Mac</option>
      </select><br></br>
    <label for="language">Choose a Language:</label>
        <select id="language" name="language" style="color:black;">
        <option value="english" style="color:black;">english</option>
        <option value="french" style="color:black;">french</option>
        <option value="german" style="color:black;">german</option>
        <option value="spanish" style="color:black;">spanish</option>
      </select><br></br>
    <label for="Categorys">Choose a Categorys:</label>
        <select id="Categorys" name="Categorys" style="color:black;" >
        <option value="action" style="color:black;">action</option>
        <option value="adventure" style="color:black;">adventure</option>
        <option value="rpg" style="color:black;">rpg</option>
        <option value="sports" style="color:black;">sports</option>
        <option value="strategy" style="color:black;">strategy</option>
        </select><br></br>
    <input type="submit" value="Add Game" style="color:black;">
</form>

<?php
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];
    $cost = $_POST['cost'];
    $developer = $_POST['developer'];
    $certified = false;
    
    $categorys = array();
    if (isset($_POST['Categorys'])) {
        $categorys = $_POST['Categorys'];
    }
    $devices = array();
    if (isset($_POST['devices'])) {
        $devices = $_POST['devices'];
    }
    $language = array();
    if (isset($_POST['language'])) {
        $language = $_POST['language'];
    }

    //Error in SQL query: ERROR: column "devices" of relation "listgames" does not exist LINE 1: ... discount, cost, developer, certified, categorys, devices, l... ^
        

    $query = "INSERT INTO listgames (title, description, discount, cost, developer, certified, categorys, devices, language) VALUES ('$title', '$description', '$discount', '$cost', '$developer', '$certified', '$categorys', '$devices', '$language')";
    $result = pg_query($query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo "Game added successfully!";
}
?>



 </body>
</html>