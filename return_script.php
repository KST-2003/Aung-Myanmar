<?php
include_once "includes/config.php";
include_once "controller/ReturnController.php";
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    mysqli_select_db($con,"return_tb");
    $query = "select name from customer inner join lent on customer.id=".$id." inner join return_tb on lent.id=return_tb.lent_id Limit 1";
    $result = mysqli_query($con,$query);
    $outcome = mysqli_fetch_row($result);
    echo $outcome[0];
}
?>