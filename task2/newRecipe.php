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
            // $con = OpenCon();
            // $q="insert into"
            // if ($con->query($q) === TRUE) {
            //     echo $con->insert_id;
            // }

        }
    ?>
</body>