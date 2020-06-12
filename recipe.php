<!DOCTYPE html>
<title> CookingPro </title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="recipestyles.css"> <!-- css -->
    <link rel="stylesheet" href="normalize.css"> <!-- margins -->
    <script type="text/javascript" src=alphascript.js></script> <!-- javascript -->
</head>
<?php  require 'htdocs/db.php';

if (isset($_POST['submit'])) {
    $table = 'recipes';
    //echo "User clicked on submit";
    $search = $_POST['search'];
    // select everything from table
    $query = "SELECT * FROM {$table} WHERE tle LIKE '%{$search}%' OR subtitle LIKE '%{$search}%'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die ('Database query failed');
    }
} else {
    $table = 'recipes';
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die ('Database query failed');
    }
}

$id = $GET['id'];

$table = 'recipes';
$query = "SELECT * FROM {$table}";
$result = mysqli_query($connection, $query);
?>

    <body>
        <!-- sticky header with the text "CookingPro" -->
        <header>
            <h1> CookingPro </h1>
                <!-- navigation -->
                    <ul class="navigation">
                        <li>
                            <a href="alpha.php">HOME</a>
                        </li>
                        <li>
                            <a href="menu.php">MENU</a>
                        </li>
                        <li>
                            <a href="help.html">HELP</a>
                        </li>
                    </ul>
                <!-- search bar -->
                <form class="formsearch" action="menu.php" method="POST">
                    <input type="text" placeholder="Search..." name="search" class="inputsearch">
                    <input type="submit" name="submit" value="Submit">
                </form>
                </header> <!-- closing tag for sticky header -->
            <!-- yellow background -->
            <div class="recipesection">
                        <div class="recipe">
                            <div class="centercontent">

                            <?php


                                //grab info from database and display 3 rows randomly
                                $sql = "SELECT tle, subtitle, `description`, cook_time, servings, cal_per_serving, proteine, main_img, ingredients_img, step_imgs, all_ingredients, all_steps FROM `recipes` WHERE id = {$_GET['id']}";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                            
                                    // <!-- food image -->

                                    echo "<div class='recipeimg'>";

                                    echo "<img src=Images/{$row["main_img"]}>";

                                    echo "</div>";

                                    // <!-- recipe name -->

                                    echo "<div class='recipetxt'>";

                                    echo "<h2> {$row["tle"]}</h2>";

                                    // <!-- subtitle -->

                                    echo "<h2 class='subtitle'> {$row["subtitle"]}</h2>";

                                    // <!-- description -->

                                    echo "<p class='paragraph'> {$row["description"]}</p>";

                                    echo "</div>";
                                    
                                    // <!-- containing div for time + cals per serving -->

                                    echo "<div class='extradetails'>";

                                    // <!-- time it takes to cook food -->
                                    
                                    echo "<div class='time'>";

                                    echo "<img src='Images/clockicon.jpg' width='40px' height='40px'>";
                                        
                                    echo "<h3>{$row["cook_time"]}</h3>";

                                    echo "</div>";

                                    // <!-- amount of calories -->
                                    
                                    echo "<div class='calories'>";

                                    echo "<img src='Images/caloriesicon.jpg' width='40px' height='40px'>";
                                        
                                    echo "<h3>{$row["cal_per_serving"]}</h3>";

                                    echo "</div>";

                                    // <!-- proteine -->

                                    echo "<div class='proteine'>";

                                    echo "<h3>{$row["proteine"]}</h3>";

                                    echo "</div>";

                                    // <!-- servings -->

                                    echo "<div class='servings'>";

                                    echo "<h3>Serving:&nbsp;{$row["servings"]}</h3>";

                                    echo "</div>";

                                    echo "</div>"; // <!-- closing tag for "extra details " -->

                                    // <!-- Ingredients: -->

                                    echo "<p class='ingredients'>Ingredients:</p>";
                                    
                                    // <!-- ingredient image -->

                                    echo "<div class='ingredimg'>";

                                    echo "<img src=Images/{$row["ingredients_img"]}>";

                                    echo "</div>";

                                    // <!-- all ingredients -->
                                    echo "<ol class='ingredlist'>";

                                    $ingredStr = $row ['all_ingredients'];
                                    //echo $ingredStr;
                                    // convert string into an array 
                                    $ingredArray = explode("*", $ingredStr);
                                    //print_r($ingredArray);
                                    // as long as the loop var is less than the count of the array, the array will keep looping
                                    for ($lp = 0;  $lp < count($ingredArray); $lp++)  {
                                        //one ingredient is going to equal one item from the array
                                        $oneIngred = $ingredArray[$lp];
                                        echo "<li>" . $oneIngred . "</li>";
                                    }

                                    echo "</ol>";

                                    // <!-- Steps: -->

                                    echo "<p class='ingredients'>Steps:</p>";

                                    // <!-- all steps -->
                                    echo "<ol class='ingredlist'>";

                                    $stepStr = $row ['all_steps'];
                                    $stepImgStr = $row['step_imgs'];
  
                                    // convert string into an array 
                                    $stepArray = explode("*", $stepStr);
                                    $stepImgArray = explode("*", $stepImgStr);

                                    // as long as the loop var is less than the count of the array, the array will keep looping
                                    for ($lp = 0;  $lp < count($stepArray); $lp++)  {
                                        $step = $stepArray[$lp];
                                        $stepImg = $stepImgArray[$lp];
                                        echo "<div class='stepimg'>";
                                        echo "<img src=\"Images/" . $stepImg . "\">";
                                        echo "</div>";
                                        echo "<li>" . $step . "</li>";
                                    }

                                    echo "</ol>";


                                    // <!-- closing tag for "centercontent"-->
                                    echo "</div>";

                                    // <!-- closing tag for "recipe" -->
                                    echo "</div>"; 

                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    $conn->close();

                        ?>

            </div>
    </body>
</head>
</html>