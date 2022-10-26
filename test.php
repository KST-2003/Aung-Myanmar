<?php 
include_once "includes/db.php";
$cont = Database::connect();
var_dump($cont);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="date" id="date">
        <button name="submit">Submit</button>
    </form>
    
    <?php  
    if(isset($_POST['submit'])){
        $date=$_POST['date'];
        echo $date;
    }
    ?>
</body>
</html>


