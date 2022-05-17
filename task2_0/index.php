<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Submit">
    </form>
    <a href="registrationForm.php" class="recipe">Register Now!</a>
    <?php
        session_start();
    
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: recipeSelectionForm.php");
            exit;
        }
        if(isset($_POST['email'])){
            include 'dbcon.php';
            $con = OpenCon();
            try {
                $q = "SELECT id,CONCAT(first_name, ' ', last_name) AS name,email,password FROM user WHERE email=:email";
                $stmt=$con->prepare($q);
                $values = ['email' => $_POST['email']];
                $stmt->execute($values);
                $result = $stmt->fetch();
                
                if($result['email']==$_POST['email']){
                    if($result['password']==$_POST['password']){
                        echo "Login successfull. Welcome ".$result['name'];
                        // Password is correct, so start a new session
                        session_start();
                            
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $result['id'];
                        $_SESSION["email"] = $result['email'];                            
                        
                        // Redirect user to welcome page
                        header("location: recipeSelectionForm.php");
                    } else{
                        echo "Wrong credentials.";
                    }
                }else{
                    echo "No such user exist.";
                }
                CloseCon($con);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }

        }
    ?>
</body>
</html>