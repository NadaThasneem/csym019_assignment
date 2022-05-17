<?php
    session_start();
            
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: recipeSelectionForm.php");
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
    <link rel="stylesheet" href="recipe.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="test.css">
</head>
<body>
    
    <div>
        
        <div>
            <div class="login-heading">
                <h1>CSYM019 - BBC GOOD FOOD RECIPES</h1>
            </div> 
            <!-- <div class="login-form"> -->
                <form action="#" method="post">
                    <!-- <div class="form-group">
                        <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div> -->
                    <!-- <input type="submit" value="Submit"> -->
                    <!-- <input type="submit" value="Submit" class="recipesbt" > -->

                    <section class="gradient-custom">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </div>

                                    <div>
                                    <p class="mb-0">Don't have an account? <a href="registrationForm.php" class="text-white-50 fw-bold">Sign Up</a>
                                    </p>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>

                </form>
            <!-- </div> -->
            <!-- <a href="registrationForm.php" class="">Register Now!</a> -->
            <?php
                
                if(isset($_POST['email'])){
                    include 'dbcon.php';
                    $con = OpenCon();
                    try {
                        $q = "SELECT id,CONCAT(first_name, ' ', last_name) AS name,email,password FROM user WHERE email=:email";
                        $stmt=$con->prepare($q);
                        $values = ['email' => $_POST['email']];
                        $stmt->execute($values);
                        $result = $stmt->fetch();
                        
                        if(isset($result['email']) && $result['email']==$_POST['email']){
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
        </div>
    </div>

</body>
</html>