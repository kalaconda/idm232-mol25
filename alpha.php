<!DOCTYPE html>
<title> CookingPro </title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="alphastyles.css"> <!-- css -->
    <link rel="stylesheet" href="normalize.css"> <!-- margins -->
    <script type="text/javascript" src=alphascript.js></script> <!-- javascript -->
</head>
<?php  include 'htdocs/db.php';?>

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

            <!-- section under the sticky header when page is first loaded -->
            <div class="adheader">
                <div class="adheadcol">
                    <!-- Choose your meals -->
                    <img src="images/adheaderpic1.jpg" width="350px" height="290px">
                    <h2> Choose your meals</h2>
                    <p>Our chef-designed recipes include balanced Mediterranean meals, quick one-pan dinners, and top-rated customer favorites.</p>
                </div>
                <div class="adheadcol">
                    <!-- Unpack your box -->
                    <img src="images/adheaderpic2.jpg" width="350px" height="290px">
                    <h2> Unpack your box</h2>
                    <p>We guarantee the freshness of all our ingredients and deliver them in an insulated box right to your door.</p>
                </div>
                <div class="adheadcol">
                    <!-- Create magic -->
                    <img src="images/adheaderpic3.jpg" width="350px" height="290px">
                    <h2> Create magic</h2>
                    <p>Following our step-by-step instructions you’ll experience the magic of cooking recipes that our chefs create with your family’s tastes in mind.</p>
                </div>
            </div> <!-- closing tag for "adheader" -->

            <!-- yellow background -->
            <div class="recipesection">
                <!-- white background -->
                        <div class="whitebg">
                            <div class="centercontent">
                                <h2 class="todaysspecials"> Todays Specials </h2>
                                      <!-- link to recipe -->
                                      <a href="recipe.php">

                                     <?php  

                                        // grab info from database and display 3 rows randomly
                                        $sql = "SELECT tle, `description`, cook_time, cal_per_serving, main_img FROM `recipes` order by rand() limit 3";
                                        $result = $connection->query($sql);

                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                      

                                        // <!-- recipe (the whole container) -->
                                        echo "<div class='recipe'>";

                                        //  <!-- food image -->
                                        echo  "<div class='recipeimg'>";

                                        echo   "<img src=Images/{$row["main_img"]}>";

                                        echo "</div>";
                                    
                                        // container for recipe txt 
                                        echo "<div class='recipeinfo'>";
                                        // <!-- recipe name -->
                                        echo "<div class='recipetxt'>";
                                                
                                        echo "<h2> {$row["tle"]}</h2>";
                                        
                                        echo "</div>";
                                        
                                        echo "<div class='extradetails'>";

                                        // <!-- time it takes to cook food -->
                                        echo "<div class='time'>";

                                        echo "<img src='images/clockicon.jpg' width='20px' height='20px'>";
                                        
                                        echo  "<h3>{$row["cook_time"]}</h3>";

                                        echo "</div>";
                                        
                                        // <!-- amount of calories -->
                                        echo "<div class='calories'>";

                                        echo "<img src='images/caloriesicon.jpg' width='20px' height='20px'>";

                                        echo "<h3>{$row["cal_per_serving"]}</h3>";

                                        echo "</div>";

                                        echo "</div>"; // <!-- closing tag for "recipe info" -->

                                        echo "</div>"; // <!-- closing tag for "extra details " -->

                                        echo "</div>";

                                        echo "<br></br>";
                                        // <!-- closing tag for "recipe" -->
                                        

                                        //echo "id: " . $row["id"]. " tle: " . $row["tle"]. "<br>" ;
                                        // . $row["tle"]. " " . $row["lastname"]. "<br>";
                                        }
                                        } else {
                                        echo "0 results";
                                        }
                                        $conn->close();

                                    ?> 
                                </a>
 
                            </div> <!-- closing tag for "centercontent"-->
                        </div> <!-- closing tag for "whitebg" -->

            </div>
    </body>
</head>
</html>
