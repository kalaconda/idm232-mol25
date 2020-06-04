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
<?php  require 'htdocs/db.php';?>

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
                <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Search</button>
                        <div id="myDropdown" class="dropdown-content">
                          <input type="text" placeholder="Search Recipes.." id="myInput" onkeyup="filterFunction()">
                          <a href="#">Carb Conscious</a>
                          <a href="#">Diabetes Friendly</a>
                          <a href="#">Mediterranean</a>
                          <a href="#">Vegetarian</a>
                        </div>
                </div>
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

                                    echo "<img src='images/clockicon.jpg' width='40px' height='40px'>";
                                        
                                    echo "<h3>{$row["cook_time"]}</h3>";

                                    echo "</div>";

                                    // <!-- amount of calories -->
                                    
                                    echo "<div class='calories'>";

                                    echo "<img src='images/caloriesicon.jpg' width='40px' height='40px'>";
                                        
                                    echo "<h3>{$row["cal_per_serving"]}</h3>";

                                    echo "</div>";

                                    echo "</div>"; // <!-- closing tag for "extra details " -->

                                    // <!-- Ingredients: -->

                                    echo "<p class='ingredients'>Ingredients:</p>";
                                    
                                    // <!-- ingredient image -->

                                    echo "<div class='ingredimg'>";

                                    echo "<img src=images/{$row["ingredients_img"]}>";

                                    echo "</div>";

                                    // <!-- all ingredients -->

                                    echo "<p class='paragraph'> {$row["all_ingredients"]}</p>";

                                    // <!-- Steps: -->

                                    echo "<p class='ingredients'>Steps:</p>";

                                    // <!-- step images -->

                                    echo "<div class='ingredimg'>";

                                    echo "<img src=images/{$row["step_imgs"]}>";

                                    echo "</div>";

                                    // <!-- all steps -->

                                    echo "<p class='paragraph'> {$row["all_steps"]}</p>";

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