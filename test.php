<?php 
include_once __DIR__."/includes/config1.php";
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
<?php 
    $selectquery="select * from  item "; 
    $select_result = mysqli_query($con,$selectquery); 
                                                                                                                                                 
    while($select_data=mysqli_fetch_array($select_result,MYSQLI_ASSOC)):; 
    ?> 
    <option value="<?php echo $select_data['id']; ?>"> 
    <?php  echo $select_data['item_name'] ?> 
    </option> 
    <?php endwhile;?>

    <form action="" method="post">
    <!--id from another table (php);
        2value one from another!-->
        <input type="text" name="name" value="">
        <input type="text" name="price" value="">
        <button name="submit">Submit</button>
    </form>
    
    <?php  
    if(isset($_POST['submit'])){
        if(!empty($_POST['name'])){
            $name=$_POST['name'];
        }
        if(!empty($_POST['price'])){
            $price=$_POST['price'];
        }
        //parent tb -> id,name,price
        //child tb-> parent_id,new_price
        $query = "INSERT INTO child (parent_id,new_price) VALUES ()";
        $query_run = mysqli_query($con, $query);
    }
    ?>
</body>
</html>


