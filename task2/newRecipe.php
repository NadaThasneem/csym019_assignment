<!DOCTYPE html>
<head>
	<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
</head>
</body>
<script>
    //Ingredients
    $(document).ready(function() {
        var wrapper = $(".ingredients");
        var add_button = $(".add_ingredient");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            x++;
            $(wrapper).append('<div><input type="text" name="ingredients[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
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
            $(wrapper2).append('<div><input type="text" name="methods[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
        });

        $(wrapper2).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            y--;
        })
    });
</script>
    <form method="post" action="#">
        <label>Title</label>
        <input type="text"  name="title">
        <br>
        <label>Author</label>
        <input type="text"  name="author">
        <br>
        <label>Ratings</label>
        <input type="text"  name="ratings">
        <br>
        <label>Time</label><br>
        <label>Preparation Time</label>
        <input type="text"  name="preptime"><br>
        <label>Cooking Time</label>
        <input type="text"  name="cooktime">
        <br>
        <label>Serving</label>
        <input type="text"  name="serving">
        <br>
        <label>Ingredients</label>
        <div class="ingredients">
            <button class="add_ingredient">Add Ingredient &nbsp; 
              <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            <div><input type="text" name="ingredients[]"></div>
        </div>
        <br>
        <label>Methods</label>
        <div class="methods">
            <button class="add_methods">Add Method &nbsp; 
              <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            <div><input type="text" name="methods[]"></div>
        </div>
        <br>
        <label>Nutritions</label>
        <br>
        <label>kcal</label>
        <input type="text"  name="kcal">
        <br>
        <label>fat</label>
        <input type="text"  name="fat">
        <br>
        <label>saturates</label>
        <input type="text"  name="saturates">
        <br>
        <label>carbs</label>
        <input type="text"  name="carbs">
        <br>
        <label>sugars</label>
        <input type="text"  name="sugars">
        <br>
        <label>fibre</label>
        <input type="text"  name="fibre">
        <br>
        <label>protein</label>
        <input type="text"  name="protein">
        <br>
        <label>salt</label>
        <input type="text"  name="salt">
        <br>
        <label>Image</label>
        <input type="file" id="myFile" name="filename">
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if(isset($_POST['title'])){
            include 'dbcon.php';
            $con = OpenCon();
            try {
                $con->beginTransaction();
                $q="insert into recipe(title, author, ratings,preparation_time, cooking_time,serving, ingredients, methods) values(:title,:author,:ratings, :preparation_time, :cooking_time, :serving, :ingredients, :methods);";
                $stmt=$con->prepare($q);
                $values = [
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'ratings' => $_POST['ratings'],
                    'preparation_time' => $_POST['preptime'],
                    'cooking_time' => $_POST['cooktime'],
                    'serving' => $_POST['serving'],
                    'ingredients'=> "".json_encode($_POST['ingredients']),
                    'methods' => "".json_encode($_POST['methods'])
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
                echo "Recipe saved successfully.";
            } catch (\PDOException $e) {
                $con->rollBack();
                die($e->getMessage());
            }


        }
    ?>
</body>