<?php
include_once "includes/config.php";
include_once "controller/ReturnController.php";
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    mysqli_select_db($con,"return_tb");
    $query = "SELECT customer.name FROM customer JOIN lent ON customer.id=".$id;
    $result = mysqli_query($con,$query);
    $outcome = mysqli_fetch_row($result);
    echo $outcome[0];
}
?>