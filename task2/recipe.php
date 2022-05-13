<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="recipe.css">
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="bg-dark">
    <h1 class="recipe">RECIPE</h1>
    <a href="logout.php" class="recipe">Sign Out of Your Account</a>

    <table class="table table-striped table-dark align-middle">
        <tr>
            <th scope="col">.</th>
            <th scope="col">SNO</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Ratings</th>
            <th scope="col">Time</th>
            <th scope="col">Serving</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Methods</th>
            <th scope="col">Calorie</th>
        </tr>
        <tbody id="data">
            <form method='post' action='report.php'>
            <?php
                
                include 'dbcon.php';
                $con = OpenCon();
                try {
                    $result=$con->query("SELECT * FROM recipe INNER JOIN nutritions ON recipe.id=nutritions.recipe_id ORDER BY title");
                    $count=0;
                    foreach ($result as $r) {
                        # code...
                        // var_dump($r);
                        $count=$count+1;
                        $row="<tr>";
                        $row.="<td><input type=\"checkbox\" id=\"".$r['id']."\" name=\"recipe[]\" value=\"".$r['id']."\"></td>";
                        $row.="<td>$count</td>";
                        $row.="<td><img src=\"./images/houmous.png\" width=\"100\"vw height=\"100\"vh></td>";
                        $row.="<td>".$r['title']."</td>";
                        $row.="<td>".$r['author']."</td>";
                        $row.="<td>".$r['ratings']."</td>";

                        $time="<td><ul class=\"list-group list-group-flush\">";
                        $time.="<li class=\"list-group-item list-group-item-dark\"><b>Preparation Time: </b><br> ".$r['preparation_time']." min </li>";
                        $time.="<li class=\"list-group-item list-group-item-dark\"><b>Cooking Time: </b><br> ".$r['cooking_time']." min </li>";
                        $time.="</td>";
                        $row.=$time;

                        $row.="<td>Serves ".$r['serving']."</td>";
                    
                        $ingredients="<td><ul class=\"list-group list-group-flush\">";
                        $ing = json_decode($r['ingredients']);
                        // var_dump($ing);
                        for ($i=0; $i < sizeof($ing); $i++) { 
                            $ingredients.="<li class=\"list-group-item list-group-item-dark\">".$ing[$i]."</li>";
                        }
                        $ingredients.="</td>";
                        $row.=$ingredients;

                        $methods="<td><ul class=\"list-group list-group-flush\">";
                        $met = json_decode($r['methods']);
                        for ($i=0; $i < sizeof($met); $i++) { 
                            $methods.="<li class=\"list-group-item list-group-item-dark\"><b>Step ".($i+1)." : </b>".$met[$i]."</li>";
                        }
                        $methods.="</td>";
                        $row.=$methods;

                        $row.="<td>".$r['kcal']."</td>";

                        echo $row;
                    }

                }catch (\PDOException $e) {
                    die($e->getMessage());
                }

            ?>
            <input type="submit" value="Submit">

        </form>
        </tbody>
    </table>
    

</body>

</html>