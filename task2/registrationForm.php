<!DOCTYPE html>
<head>
    <title>CSYM019 - BBC GOOD FOOD RECIPES</title>

</head>

<body>
    <form method = 'post' action='#'>
        <label>First Name</label>
        <input type="text"  name="first_name" required>
        <br>
        <label>Last Name</label>
        <input type="text"  name="last_name" required>
        <br>
        <label>Email</label>
        <input type="email"  name="email" required>
        <br>
        <label>Password</label>
        <input type="password"  name="password" required>
        <br>
        <input type="submit" value="submit">

    </form>
    <a href="index.php" class="recipe">Login Now!</a>

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
                    echo "User email already exists.";
                } else{
                    $r = $stmt->execute($values);
                    echo "Account created successfully.";
                }
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
    ?>
</body>
</html>