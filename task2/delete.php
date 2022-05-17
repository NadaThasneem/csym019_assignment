<?php
   session_start();
   if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) === true){
       header("location: index.php");
       exit;
   }
if(isset($_GET['d'])){
    include 'dbcon.php';
    $con = OpenCon();
    $con->beginTransaction();

    $stmt=$con->prepare("delete from nutritions where id=:id");
    $stmt->execute(['id'=>$_GET['d']]);
    $stmt1=$con->prepare("delete from recipe where id=:id");
    $stmt1->execute(['id'=>$_GET['d']]);
    $con->commit();

    header("location: recipeSelectionForm.php");

}

?>