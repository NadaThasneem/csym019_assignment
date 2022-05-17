<?php
    session_start();
    if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) === true){
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="recipe.css">
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>CSYM019 - BBC GOOD FOOD RECIPES</title>

</head>

<body class="bg-dark">

    <div class="header">
        <h1 class="recipe">CSYM019 - BBC GOOD FOOD RECIPES</h1>
        <div class="header-middle">
            <a href="recipeSelectionForm.php" class="active">Recipes</a>
            <a href="newRecipe.php">Add New Recipe</a>
        </div>
        <div class="header-right">
            <a href="logout.php">Sign Out</a>
        </div>
    </div>

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
            <th scope="col"></th>
        </tr>
        <tbody id="data">
            <form method='post' action='SampleRecipeReport.php' id="recipe-form">
            <?php
                
                include 'dbcon.php';
                $con = OpenCon();
                try {
                    $result=$con->query("SELECT u.*,r.*,n.*,r.id as recId FROM user u INNER JOIN recipe r ON u.id=r.author INNER JOIN nutritions n ON r.id=n.recipe_id ORDER BY title");
                    $count=0;
                    foreach ($result as $r) {
                        # code...
                        // var_dump($r);
                        $count=$count+1;
                        $row="<tr>";
                        $row.="<td><input type=\"checkbox\" id=\"".$r['recId']."\" name=\"recipe[]\" value=\"".$r['recId']."\"></td>";
                        $row.="<td>$count</td>";
                        $row.="<td><img src=\"./images/".$r['image']."\" alt=\"".$r['title']."\" width=\"100\"vw height=\"100\"vh></td>";
                        $row.="<td>".$r['title']."</td>";
                        $row.="<td>".$r['first_name']." ".$r['last_name']."</td>";
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

                        $row.='<td><a class="deletebtn" href="delete.php?d='.$r['id'].'"><svg width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></a></td>';

                        echo $row;
                        
                    }



                }catch (\PDOException $e) {
                    die($e->getMessage());
                }

            ?>
            </table>
            <div class="recipe-submit">
                <input type="submit" value="Create Recipe Report" class="recipesbt" >
            </div>

        </form>

        <script>

            $("#recipe-form").submit(function(e){
                if ($('input[name="recipe[]"]:checked').length > 0) {
                    return true;
                } else {
                    // if($('#delete')){
                    //     return true;
                    // }
                    alert("Please select one or more recipe")
                    return false;
                }
            });
        </script>
        </tbody>
    </table>
    

</body>

</html>