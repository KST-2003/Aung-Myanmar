<?php
include_once "includes/config.php";
include_once 'layouts/header.php';
?>
    <div class="main-panel">
        <div class="content-wrapper" id="scrollbar">

        <div class="container-fluid">
     <!-- Form Modal Button -->
     <div class="row mb-4">
              <div class="col text-left">
                <a href="" class="btn btn-success"><b>Export Excel File</b></a>
              </div>
    <div class="container-fluid">
        <div class="row" id="scrollbar">
                    <?php
                        $id=$_GET['id'];
                        $query1 = "Select customer.name,lent.* from customer INNER join lent on customer.id=lent.customer_id 
                        where lent.id=".$id;
                        $query1_execute=mysqli_query($con,$query1);
                        while($result1=mysqli_fetch_array($query1_execute)):;
                    ?>
                    <div class='col-md-4 mt-5'>
                        <h3><?php echo $result1['invoice_number']; ?></h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 mt-5">
                        <h3><?php echo $result1['name']; endwhile ?></h3>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ငှါးထားသည့်ရက်စွဲ</th>
                                                        <th>ပြန်အပ်သည့်ရက်စွဲ</th>
                                                        <th>ငှါးထားသည့်ပစ္စည်း</th>
                                                        <th>ကြာချိန်(ရက်)</th>
                                                        <th>ပြန်အပ်အရေအတွက်</th>
                                                        <th>တစ်ရက်ငှါးရမ်းနှုန်း/<br>ကာလပေါက်စျေး</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id='return_detail_content'>
                                                    <?php
                                                        $query2 = "Select lent.*,lent_detail.*,return_tb.* from lent
                                                        inner join lent_detail on lent.id=lent_detail.lent_id inner join return_tb
                                                        on return_tb.LentDetail_id=lent_detail.id where return_tb.lent_id=".$id." and lent.checker>0";
                                                        $query2_execute=mysqli_query($con,$query2);
                                                        while($result2 = mysqli_fetch_array($query2_execute)){
                                                            $date1 = new DateTime($result2['lent_date']);
                                                            $date2 = new DateTime($result2['return_date']);
                                                            // echo $date2;
                                                            $interval = date_diff($date2,$date1);
                                                            $total_days = ($interval->y*365)+($interval->m*30)+($interval->d);
                                                            $lent_price = intval($result2['unit_price']);
                                                            $return_qty = intval($result2['return_qty']);
                                                            $cost = $total_days*$return_qty*$lent_price;
                                                            echo "<tr>";
                                                            echo "<td>".$result2['lent_date']."</td>";
                                                            echo "<td>".$result2['return_date']."</td>";
                                                            echo "<td>".$result2['item_name']."</td>";
                                                            echo "<td>".intval($total_days)."</td>";
                                                            echo "<td>".$result2['return_qty']."</td>";
                                                            echo "<td>".$result2['unit_price']."</td>";
                                                            echo "<td>".$cost."</td>";
                                                            echo "</tr>";
                                                            if($result2['has_broken']==1){
                                                                echo "<tr>";
                                                                echo "<td colspan='4'>ကျိုးပဲ့/ပျောက်ဆုံး</td>";
                                                                echo "<td>".$result2['broken_qty']."</td>";
                                                                echo "<td>".$result2['price']."</td>";
                                                                $broken_qty=intval($result2['broken_qty']);
                                                                $price=intval($result2['price']);
                                                                echo "<td>".$damage_price=$broken_qty*$price."<td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>  
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>