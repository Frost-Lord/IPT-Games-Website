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
        <h1 style="color:white">What game would you like to add?:</h1>
    </div>

    <br></br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <form action="addGame.php" method="post" class="formquestions">
                    <input type="text" name="title" placeholder="Game Title" id='GameTitle' style="color:black;"><br></br>
                    <input type="text" name="description" placeholder="Game Description" id='GameDescription' style="color:black;"><br></br>
                    <input type="text" name="developer" placeholder="Game Developer" id='GameDeveloper' style="color:black;"><br></br>
                    <input type="text" name="discount" placeholder="Game Discount" id='GameDiscount' style="color:black;"><br></br>
                    <input type="text" name="cost" placeholder="Game Cost" id='GameCost' style="color:black;"><br></br>

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
            </div>
        </div>

        <div class="col-md-6">
            <div class="fixed-right">
                <div class="fixed-right-inner">
                    <h1 style="color:white">Live Card:</h1>
                    <p style="color:black">


                    <div class="card">
                        <img class="card-img-top" src="https://i.ibb.co/37VJLgz/removal-ai-tmp-62f2332db0f0c.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a class="title" id='printTitle' style="color:white"></a></h5>
                            <p class="card-text"><a class="description" id='printDescription' style="color:white"></a></p>
                            <p class="card-text"><small class="text-muted"><a class="cost" id='printCost' style="color:white"></a></small></p>
                        </div>
                    </div>
                    <div class="line">______________________</div>
                    <h1 style="color:white">Other:</h1>
                    <a class="developer" id='printDeveloper' style="color:white"></a>
                    <a class="discount" id='printDiscount' style="color:white"></a>

                    <button class="console" id='printConsole' style="color:black"></button>
                    <button class="pc" id='printPC' style="color:black"></button>
                    <button class="Iphone" id='printIphone' style="color:black"></button>
                    <button class="action" id='printAction' style="color:black"></button>
                    <button class="adventure" id='printAdventure' style="color:black"></button>
                    <button class="strategy" id='printStrategy' style="color:black"></button>
                    <button class="rpg" id='printRpg' style="color:black"></button>
                    <button class="sports" id='printSports' style="color:black"></button>
                    <button class="puzzle" id='printPuzzle' style="color:black"></button>
                    <button class="other" id='printOther' style="color:black"></button>
                    <button class="none" id='printNone' style="color:black"></button>
                    <button class="english" id='printEnglish' style="color:black"></button>
                    <button class="spanish" id='printSpanish' style="color:black"></button>
                    <button class="french" id='printFrench' style="color:black"></button>
                    <button class="german" id='printGerman' style="color:black"></button>
                    <button class="other" id='printOther' style="color:black"></button>
                    
                </div>
            </div>
        </div>

        <script>
            var inputBox = document.getElementById('GameTitle');
            inputBox.onkeyup = function() {
                document.getElementById('printTitle').innerHTML = "Title: " + inputBox.value;
            }
            var inputBox2 = document.getElementById('GameDescription');
            inputBox2.onkeyup = function() {
                document.getElementById('printDescription').innerHTML = "Description: " + inputBox2.value;
            }
            var inputBox3 = document.getElementById('GameDeveloper');
            inputBox3.onkeyup = function() {
                document.getElementById('printDeveloper').innerHTML = "Developer: " + inputBox3.value;
            }
            var inputBox4 = document.getElementById('GameDiscount');
            inputBox4.onkeyup = function() {
                document.getElementById('printDiscount').innerHTML = "Discount: " + inputBox4.value;
            }
            var inputBox5 = document.getElementById('GameCost');
            inputBox5.onkeyup = function() {
                document.getElementById('printCost').innerHTML = "Cost: " + inputBox5.value + " AUD";
            }

            //tags
            var inputBox6 = document.getElementById('console');
            inputBox6.onclick = function() {
                document.getElementById('printConsole').innerHTML = "Console: " + inputBox6.value;
            }
            var inputBox7 = document.getElementById('pc');
            inputBox7.onclick = function() {
                document.getElementById('printPC').innerHTML = "PC: " + inputBox7.value;
            }
            var inputBox8 = document.getElementById('Iphone');
            inputBox8.onclick = function() {
                document.getElementById('printIphone').innerHTML = "Iphone: " + inputBox8.value;
            }
            var inputBox9 = document.getElementById('action');
            inputBox9.onclick = function() {
                document.getElementById('printAction').innerHTML = "Action: " + inputBox9.value;
            }
            var inputBox10 = document.getElementById('adventure');
            inputBox10.onclick = function() {
                document.getElementById('printAdventure').innerHTML = "Adventure: " + inputBox10.value;
            }
            var inputBox11 = document.getElementById('strategy');
            inputBox11.onclick = function() {
                document.getElementById('printStrategy').innerHTML = "Strategy: " + inputBox11.value;
            }
            var inputBox12 = document.getElementById('rpg');
            inputBox12.onclick = function() {
                document.getElementById('printRpg').innerHTML = "RPG: " + inputBox12.value;
            }
            var inputBox13 = document.getElementById('sports');
            inputBox13.onclick = function() {
                document.getElementById('printSports').innerHTML = "Sports: " + inputBox13.value;
            }
            var inputBox14 = document.getElementById('puzzle');
            inputBox14.onclick = function() {
                document.getElementById('printPuzzle').innerHTML = "Puzzle: " + inputBox14.value;
            }
            var inputBox15 = document.getElementById('other');
            inputBox15.onclick = function() {
                document.getElementById('printOther').innerHTML = "Other: " + inputBox15.value;
            }
            var inputBox16 = document.getElementById('none');
            inputBox16.onclick = function() {
                document.getElementById('printNone').innerHTML = "None: " + inputBox16.value;
            }
            var inputBox17 = document.getElementById('english');
            inputBox17.onclick = function() {
                document.getElementById('printEnglish').innerHTML = "English: " + inputBox17.value;
            }
            var inputBox18 = document.getElementById('spanish');
            inputBox18.onclick = function() {
                document.getElementById('printSpanish').innerHTML = "Spanish: " + inputBox18.value;
            }
            var inputBox19 = document.getElementById('french');
            inputBox19.onclick = function() {
                document.getElementById('printFrench').innerHTML = "French: " + inputBox19.value;
            }
            var inputBox20 = document.getElementById('german');
            inputBox20.onclick = function() {
                document.getElementById('printGerman').innerHTML = "German: " + inputBox20.value;
            }
            var inputBox21 = document.getElementById('other');
            inputBox21.onclick = function() {
                document.getElementById('printOther').innerHTML = "Other: " + inputBox21.value;
            }

        </script>

        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                background-color: #000000 !important;
                max-width: 300px;
                margin: auto;
                text-align: center;
                font-family: arial;
            }
            .fixed-right {
                position: fixed;
                top: 100;
                right: 0;
                width: 300px;
                height: 100%;
                background-color: #000000;
                color: white;
                text-align: center;
                padding-top: 20px;
                border: rgb(28, 0, 104) solid 1px;
            }

            .fixed-right-inner {
                position: absolute;
                top: 0;
                right: 0;
                width: 300px;
                height: 100%;
                background-color: #000000;
                color: white;
                text-align: center;
                padding-top: 20px;
            }
        </style>




        <?php

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