<?php
    session_start();
    if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) === true){
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSYM019 - BBC GOOD FOOD RECIPES</title>
	<script src="chart.min.js" type="text/javascript"></script>
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="recipe.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="header">
        <h1 class="recipe">CSYM019 - BBC GOOD FOOD RECIPES</h1>
        <div class="header-middle">
            <a href="recipeSelectionForm.php">Recipes</a>
            <a href="newRecipe.php">Add New Recipe</a>
        </div>
        <div class="header-right">
            <a href="logout.php">Sign Out</a>
        </div>
    </div>
    <div class="report-head">
        <p class="report">Recipe Report</p>
    </div>

<script>
        function createPie(id, dataPie){
            let ctx = document.getElementById(id);
            let myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [ 'fat', 'saturates', 'carbs', 'sugars', 'fibre', 'protein', 'salt'],
                    datasets: [{
                        label: '# of Votes',
                        data: dataPie,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(0, 0 , 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(0, 0 , 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
    <table class="table table-striped table-dark align-middle">
        <tr>
            <th scope="col">SNO</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Ratings</th>
            <th scope="col">Time</th>
            <th scope="col">Serving</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Methods</th>
            <th scope="col">Chart</th>
        </tr>
        <tbody id="data">
            <?php
                $d = '';
                include 'dbcon.php';
                $con = OpenCon();
                try {
                    $q1="SELECT * FROM recipe INNER JOIN nutritions ON recipe.id=nutritions.recipe_id WHERE nutritions.recipe_id IN (".trim(str_repeat(', ?', count($_POST['recipe'])), ', ').") ORDER BY title;";
                    $stmt=$con->prepare($q1);
                    $stmt->execute($_POST['recipe']);
                    $result = $stmt->fetchAll();
                    $count=0;
                    foreach ($result as $r) {
                        # code...
                        // var_dump($r);
                        $count=$count+1;
                        $row="<tr>";
                        $row.="<td>$count</td>";
                        $row.="<td><img src=\"./images/".$r['image']."\" width=\"100\"vw height=\"100\"vh></td>";
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
                        
                        $dataPie = $r['fat'] . "," . $r['saturates'] . "," . $r['carbs'] . "," . $r['sugars'] . "," . $r['fibre'] . "," . $r['protein'] . "," . $r['salt'] ;
                        $chart = '<canvas id="chart'.$r['id'].'" width="400" height="400"></canvas>
                                <script>createPie("chart'.$r['id'].'",['.$dataPie.'])</script>';
                        $row.="<td>".$chart."</td>";

                        echo $row;
                    }

                    if(count($_POST['recipe'])>1){
                        function rand_color() {
                            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                        }

                        
                        $barData=[];
                        foreach ($result as $r) {
                            $barValue= [$r['kcal'], $r['fat'], $r['saturates'] , $r['carbs'] , $r['sugars'] , $r['fibre'] , $r['protein'] , $r['salt'] ] ;
                            $array = [
                                "label" => $r['title'],
                                "backgroundColor" => rand_color(),
                                "data" => $barValue
                            ];
                            $barData[] = $array;
                        }
                        $d = json_encode($barData);
                    }

                }catch (\PDOException $e) {
                    die($e->getMessage());
                }

                
            ?>

        </tbody>
    </table>
    
    
    <?php
            if(count($_POST['recipe'])>1){

                echo '<div class="bar-graph">
                <div class="report-head">
                        <p class="report">Bar Graph</p>
                </div><div>
                    <canvas id="myChart"></canvas>
                </div></div>';
                
            }else{
                echo '<div class="bar-graph"></div>';
            }
    ?>
    <!-- <div style="margin:200px;"></div> -->
    
    <script>
    
        
        function createChart(barData){
            var ctx = document.getElementById("myChart").getContext("2d");

            var data = {
            labels: ["kcal","fat", "saturates", "carbs", "sugars", "fibre", "protein", "salt"],
            datasets: barData
            };

            var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                barValueSpacing: 20,
                scales: {
                yAxes: [{
                    ticks: {
                    min: 0,
                    }
                }]
                }
            }
            });

    }

    </script>
<?php
                    echo '<script>createChart('.$d.');</script>';

?>

    
    
</body>
</html>