<?php

if(isset($_GET['d'])){
    include 'dbcon.php';
    $con = OpenCon();
    $con->beginTransaction();

    $con->query("delete from nutritions where id=".$_GET['d']);
    $con->query("delete from recipe where id=".$_GET['d']);

    $con->commit();

    header("location: recipeSelectionForm.php");

}

?>