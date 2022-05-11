<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="recipe.css">
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="bg-dark">

    <h1 class="recipe">RECIPE</h1>

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
            <th scope="col">Nutritions</th>
        </tr>
        <tbody id="data">
            <?php
                $row="<tr>";
                $row.="<td><input type=\"checkbox\" id=\"vehicle1\" name=\"vehicle1\" value=\"Bike\"></td>";
                $row.="<td>01</td>";
                $row.="<td><img src=\"./images/houmous.png\" width=\"100\"vw height=\"100\"vh></td>";
                $row.="<td>Pepper & walnut hummus with veggie dippers</td>";
                $row.="<td>Sara Buenfeld</td>";
                $row.="<td>4</td>";

                $time="<td><ul class=\"list-group list-group-flush\">";
                $time.="<li class=\"list-group-item list-group-item-dark\"><b>Preparation Time: </b><br> 5 min </li>";
                $time.="<li class=\"list-group-item list-group-item-dark\"><b>Cooking Time: </b><br> 30 min </li>";
                $time.="</td>";
                $row.=$time;

                $row.="<td>Serves 8</td>";
            
                $ingredients="<td><ul class=\"list-group list-group-flush\">";
                $ing = array("400g can chickpeas , drained",
                "1 garlic clove",
                "1 large roasted red pepper from a jar (not in oil), about 100g",
                "1 tbsp tahini paste",
                "juice ½ lemon",
                "4 walnut halves , chopped",
                "2 carrots , cut into batons",
                "2 celery sticks, cut into batons");
                for ($i=0; $i < sizeof($ing); $i++) { 
                    $ingredients.="<li class=\"list-group-item list-group-item-dark\">".$ing[$i]."</li>";
                }
                $ingredients.="</td>";
                $row.=$ingredients;

                $methods="<td><ul class=\"list-group list-group-flush\">";
                $met = array("Put the courgette ribbons in a large bowl with a pinch of salt and the lemon juice..",
                                "Bring a large saucepan of water to the boil and cook the asparagus for 2 mins, adding the frozen peas and broad beans for the final min. Drain well, pod the broad beans and toss together with the courgette ribbons. Drizzle over the olive oil, sprinkle on parsley and season to taste."
                            );
                for ($i=0; $i < sizeof($met); $i++) { 
                    $methods.="<li class=\"list-group-item list-group-item-dark\"><b>Step ".($i+1)." : </b>".$met[$i]."</li>";
                }
                $methods.="</td>";
                $row.=$methods;

                $nutritions="<td><ul class=\"list-group list-group-flush\">";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">kcal : 63</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">fat : 2g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">saturates : 0g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">carbs : 4g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">sugars : 2g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">fibre : 4g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">protein : 4g</li>";
                $nutritions.="<li class=\"list-group-item list-group-item-dark\">salt : 0.1g</li>";
                $nutritions.="</td>";
                $row.=$nutritions;
                
                echo $row;
            ?>
        </tbody>
    </table>


</body>

</html>