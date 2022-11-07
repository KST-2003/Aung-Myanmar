<?php
include_once __DIR__."/includes/config.php";
    if(isset($_POST['year'])){
      $year=$_POST['year'];
      $query="SELECT
      COUNT(id),
      DATE_FORMAT(lent_date, '%Y-%m-%d') AS DAY,
      DATE_FORMAT(lent_date, '%Y-%m') AS MONTH,
      DATE_FORMAT(lent_date, '%Y') AS YEAR,
      sum(deposit) AS deposit
    
      FROM
      lent
      WHERE
      YEAR(lent_date) = ".$year."
      GROUP BY
      DATE_FORMAT(lent_date, '%Y ');";
      $query_run = mysqli_query($con, $query);
      $output=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
      ///
      $query1="SELECT
      COUNT(id),
      DATE_FORMAT(lent_date, '%Y-%m-%d') AS DAY,
      DATE_FORMAT(lent_date, '%Y-%m') AS MONTH,
      DATE_FORMAT(lent_date, '%Y') AS YEAR,
      sum(total_qty) AS Qty
    
      FROM
      lent
      WHERE
      YEAR(lent_date) = ".$year."
      GROUP BY
      DATE_FORMAT(lent_date, '%Y ');";
      $query_run1 = mysqli_query($con, $query1);
      $output1=mysqli_fetch_array($query_run1,MYSQLI_ASSOC);
    //   echo json_encode($output1,$output);
         
    echo $output['deposit']."_".$output1['Qty'];
    }
  
?>