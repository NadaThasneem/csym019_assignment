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
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <title>CSYM019 - BBC GOOD FOOD RECIPES</title>
    <link rel="stylesheet" href="recipe.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="test.css">

</head>
<body>
   
    <script>
        //Ingredients
        $(document).ready(function() {
            var wrapper = $(".ingredients");
            var add_button = $(".add_ingredient");

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                x++;
                $(wrapper).append('<div><input type="text" name="ingredients[]" class="form-control"/><a href="#" class="delete">Delete</a></div>'); //add input box
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
            
            //Methods
            var wrapper2 = $(".methods");
            var add_button2 = $(".add_methods");

            var y = 1;
            $(add_button2).click(function(e) {
                e.preventDefault();
                y++;
                $(wrapper2).append('<div><input type="text" name="methods[]" class="form-control"/><a href="#" class="delete">Delete</a></div>'); //add input box
            });

            $(wrapper2).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                y--;
            })
        });
    </script>
    <div class="header">
        <h1 class="recipe">RECIPE HUB</h1>
        <div class="header-middle">
            <a href="recipeSelectionForm.php">Recipes</a>
            <a href="newRecipe.php" class="active">Add New Recipe</a>
        </div>
        <div class="header-right">
            <a href="logout.php">Sign Out</a>
        </div>
    </div>
    
                <div class="form-content">
                    <div class="form-items">

                        <form method="post" action="#" enctype="multipart/form-data">
                            <h1 style="color:#fff; text-align:center; font-size:70px">Recipe</h1>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                                <input type="text"  name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-form-label col-form-label-lg">Ratings</label>
                                <input type="text"  name="ratings" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <h2 style="color:#fff;">Time</h2>
                                <label class="col-sm-2 col-form-label col-form-label-lg">Preparation Time</label>
                                <input type="text"  name="preptime" class="form-control">
                                <label class="col-sm-2 col-form-label col-form-label-lg">Cooking Time</label>
                                <input type="text"  name="cooktime" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-form-label col-form-label-lg">Serving</label>
                                <input type="text"  name="serving"  class="form-control">
                            </div>

                            <br>
                            <div class="form-group">
                                <h2 style="color:#fff;">Ingredients</h2>
                                <div class="ingredients">
                                    <button class="add_ingredient">Add Ingredient &nbsp; 
                                    <span style="font-size:16px; font-weight:bold;">+ </span>
                                    </button>
                                    <div><input type="text" name="ingredients[]"  class="form-control"><br></div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <h2 style="color:#fff;">Methods</h2>
                                <div class="methods">
                                    <button class="add_methods">Add Method &nbsp; 
                                    <span style="font-size:16px; font-weight:bold;">+ </span>
                                    </button>
                                    <div><input type="text" name="methods[]"  class="form-control"><br></div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <h2 style="color:#fff;">Nutritions</h2>
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">kcal</label>
                                        <input type="text"  name="kcal"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">fat</label>
                                        <input type="text"  name="fat"  class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="form-group  col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">saturates</label>
                                        <input type="text"  name="saturates"  class="form-control">
                                    </div>
                        
                                    
                                    <div class="form-group  col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">carbs</label>
                                        <input type="text"  name="carbs"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">sugars</label>
                                        <input type="text"  name="sugars"  class="form-control">
                                    </div>
                        
                                    
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">fibre</label>
                                        <input type="text"  name="fibre"  class="form-control">
                                    </div>
                                </div>

                                
                    
                                
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">protein</label>
                                        <input type="text"  name="protein"  class="form-control">
                                    </div>
                        
                                    
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">salt</label>
                                        <input type="text"  name="salt"  class="form-control">
                                    </div>
                                </div>

                                <br>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                    <input type="file" name="image"  class="form-control"/>
                                </div>
                    
                                <br>
                                
                            </div>



                            <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>

    <?php
        if(isset($_POST['title'])){
            include 'dbcon.php';
            $con = OpenCon();
            try {
                $file_name = $_FILES['image']['name'];
                $temp = explode(".", $_FILES["image"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $newfilename);

                $con->beginTransaction();
                $q="insert into recipe(title, author, ratings,preparation_time, cooking_time,serving, ingredients, methods, image) values(:title,:author,:ratings, :preparation_time, :cooking_time, :serving, :ingredients, :methods, :image);";
                $stmt=$con->prepare($q);
                $values = [
                    'title' => $_POST['title'],
                    'author' => $_SESSION['id'],
                    'ratings' => $_POST['ratings'],
                    'preparation_time' => $_POST['preptime'],
                    'cooking_time' => $_POST['cooktime'],
                    'serving' => $_POST['serving'],
                    'ingredients'=> "".json_encode($_POST['ingredients']),
                    'methods' => "".json_encode($_POST['methods']),
                    'image' => $newfilename
                   ];
                   
               
                $stmt->execute($values);
    
                $recipeid=$con->lastInsertId();
                $q1 = "insert into nutritions (recipe_id, kcal, fat, saturates, carbs, sugars, fibre, protein, salt) values( :recipe_id, :kcal, :fat, :saturates, :carbs, :sugars, :fibre, :protein, :salt);";
                $stmt1=$con->prepare($q1);
                $values1 = [
                    'recipe_id' => $recipeid,
                    'kcal' => $_POST['kcal'],
                    'fat' => $_POST['fat'],
                    'saturates' => $_POST['saturates'],
                    'carbs' => $_POST['carbs'],
                    'sugars' => $_POST['sugars'],
                    'fibre' => $_POST['fibre'],
                    'protein' => $_POST['protein'],
                    'salt' => $_POST['salt']
                ];
                $stmt1->execute($values1);
                $con->commit();
                CloseCon($con);
                
                echo "<script type='text/javascript'>alert('Recipe saved successfully');</script>";
            } catch (\PDOException $e) {
                $con->rollBack();
                die($e->getMessage());
            }


        }
    ?>
</body>

</html>