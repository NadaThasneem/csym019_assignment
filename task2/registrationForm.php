<!DOCTYPE html>
<head>
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
                <form action="#" method="post">

                    <section class="gradient-custom">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                    <p class="text-white-50 mb-5">Please enter your details!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" required/>
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" required/>
                                        <label class="form-label" for="last_name">Last Name</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                                    </div>

                                    <div>
                                    <p class="mb-0">Have an account? <a href="index.php" class="text-white-50 fw-bold">Login Now!</a>
                                    </p>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>

                </form>
        </div>
    </div>





    <?php
        if(isset($_POST['first_name'])){
            include 'dbcon.php';
            $con = OpenCon();
            try{
                $q = "INSERT INTO user(first_name, last_name, email, password) VALUES(:first_name,:last_name, :email, :password)";
                $stmt=$con->prepare($q);
                $values = [
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                $q1 = "SELECT email FROM user WHERE email=:email";
                $stmt1=$con->prepare($q1);
                $values1 = ['email' => $_POST['email']];
                $stmt1->execute($values1);
                $r1=$stmt1->fetchAll();

                if(count($r1)>0){
                    echo '<script>alert("User email already exists.")</script>';
                } else{
                    $r = $stmt->execute($values);
                    echo '<script>alert("Account created successfully.")</script>';
                }
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
    ?>
</body>
</html>