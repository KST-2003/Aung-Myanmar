<?php 
include_once __DIR__."/controller/lentcontroller.php";
include_once __DIR__."/includes/config.php";
$lentcontroller = new Lentcontroller();
if(isset($_POST['submit'])){
  if(!empty($_POST['cus_name'])){
    $cus_name=$_POST['cus_name'];
  }
  if(!empty($_POST['inv_number'])){
    $inv_number=$_POST['inv_number'];
  }   
  if(!empty($_POST['lent_date'])){
    $lent_date=$_POST['lent_date'];
  }
  if(!empty($_POST['total_qty'])){
    $total_qty=$_POST['total_qty'];
  }
  if(!empty($_POST['deposit'])){
    $deposit=$_POST['deposit'];
  }
  if(!empty($_POST['emp_name'])){
    $emp_name=$_POST['emp_name'];
  }
  $query1 = "INSERT INTO lent (invoice_number,customer_id,lent_date,total_qty,deposit) VALUES ('$inv_number','$cus_name','$lent_date','$total_qty','$deposit')";
  $query_run1 = mysqli_query($con, $query1);
  $lent_id= mysqli_insert_id($con);

  $name=$_POST['item_name'];
  $unit_price=$_POST['unit_price'];
  $qty=$_POST['qty'];
  foreach($name as $index => $names){
    $s_name=$names;
    $s_unit_price=$unit_price[$index];
    $s_qty=$qty[$index];
    $query = "INSERT INTO lent_detail (item_name,unit_price,item_qty,emp_id,lent_id) VALUES ('$s_name','$s_unit_price','$s_qty','$emp_name','$lent_id')";
    $query_run = mysqli_query($con, $query);
  }
  // $lent=$lentcontroller->addLent($inv_number,$lent_date,$cus_name,$deposit,$total_qty);
  // if($lent) 
  // { 
  //     header('location:lent.php'); 
  // } 
  // else  
  // { 
  //     echo "<div class='alert alert-danger'></div>"; 
  //     echo "Unsuccessful"; 
  // } 
}
?>
<?php 
include_once 'layouts/header.php';
?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Form Modal Button -->
            <div class="row mb-4">
              <div class="col text-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><b>Add Lent Item</b></a>
              </div>
              <!-- Search Button -->
              <div class="input-group col-md-4">
              <input type="text" class="form-control" name="" id="" placeholder="အမည်">
                <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="mdi mdi-magnify"></i>
                </button>
                </div>
              </div>
              

            <!-- large modal for Lent Item Registration Form-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Lent Item Registration Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="" method="POST">
                <div class="modal-body">
                <h4>Lent</h4>
                <p>ငှါးရမ်းခြင်း</p>
                           
                            <div class="row" id="content2">

                                <div class="col-md-6 mt-3">
                                <label for="">Customer Name</label>
                                <select name="cus_name" id="" class="form-control">
                                <?php 
                                    $selectquery1="select * from  customer "; 
                                    $select_result1 = mysqli_query($con,$selectquery1); 
                                                     
                                                    
                                               
                                    while($output=mysqli_fetch_array($select_result1,MYSQLI_ASSOC)):; 
                                    ?> 
                                    <option value="<?php echo $output['id']; ?>"> 
                                    <?php  echo $output['name'] ?> 
                                    </option> 
                                    <?php endwhile;?>  
                                </select>
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Invoice No</label>
                                <input type="text" class="form-control" name="inv_number" id="" placeholder="ဘောင်ချာနံပါတ်">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Lent Date</label>
                                <input type="date" class="form-control" name="lent_date">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Total Qty</label>
                                <input type="text" class="form-control" name="total_qty" id="" placeholder="စုစုပေါင်းအရေအတွက်">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Deposit</label>
                                <input type="text" class="form-control" name="deposit" id="" placeholder="	စပေါ်ငွေ">
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                <label for="">Employee</label>
                                <select name="emp_name" id="" class="form-control">
                                <?php 
                                    $selectquery="select * from  employee "; 
                                    $select_result = mysqli_query($con,$selectquery); 
                                                     
                                                    
                                               
                                    while($ans=mysqli_fetch_array($select_result,MYSQLI_ASSOC)):; 
                                    ?> 
                                    <option value="<?php echo $ans['id']; ?>"> 
                                    <?php  echo $ans['name'] ?> 
                                    </option> 
                                    <?php endwhile;?>  
                                </select>
                                </div>
                                <div class="container-fluid mt-3">
                                <div class="row">
                                <div class="col-md-4 mt-3">
                                <label for="">Item Name</label>
                                <input type="text" class="form-control" name="item_name[]" id="" placeholder="">
                                </div>

                                <div class="col-md-3 mt-3">
                                <label for="">Qty</label>
                                <input type="text" class="form-control" name="qty[]" id="" placeholder="အရေအတွက်">
                                </div>

                                <div class="col-md-4 mt-3">
                                <label for="">Unit Price Per Day</label>
                                <input type="text" class="form-control" name="unit_price[]" id="" placeholder="တစ်ရက်ငှါးရမ်းနှုန်း" value="700">
                                </div>
                                <div class="col-md-1 mt-3">
                                <button  class="btn btn-outline-primary add mt-4" name="more">+</button>
                                </div>
                              </div>
                                </div>
                              </div>
          
                            </div>
                      
                      
                      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
                </form>
                </div>
  </div>
</div>    
            </div> 


        <!-- Lent Table -->
            <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Lent Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="datatable" class="display expandable-table" style="width:100%">
                          <thead>

                            <tr>
                              <th>စဥ်</th>
                              <th>ငှါးရမ်းသူအမည်	</th>
                              <th>ဘောင်ချာနံပါတ်</th>
                              <th>စုစုပေါင်းအရေအတွက်</th>
                              <th>စပေါ်ငွေ	</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="lent_table">
                          <?php 
                          $query = "select customer.name, lent.* from customer join lent on customer.id = lent.customer_id";
                          $result = mysqli_query($con,$query);
                          $count = 1;
                          foreach($result as $row){ 
                                                      
                            $cus_name=$row['name']; 
                          
                            $data_id = $row['id']; 
                            $data_inv = $row['invoice_number']; 
                             
                            $data_date = $row['lent_date']; 
                            $data_qty = $row['total_qty']; 
                            $data_dep = $row['deposit'];  
                             
                        ?> 
                        <tr> 
                        <td><?php echo $count; ?></td> 
                        <td> <div  class='' id='name_<?php echo $data_id; ?>'> <?php echo $cus_name; ?></div> </td> 
                        <td> <div contentEditable='true' class='edit_lent' id='invoice_number_<?php echo $data_id; ?>'><?php echo $data_inv; ?> </div> </td> 
                        <td> <div contentEditable='true' class='edit_lent' id='total_qty_<?php echo $data_id; ?>'><?php echo $data_qty; ?> </div> </td> 
                        <td> <div contentEditable='true' class='edit_lent' id='deposit_<?php echo $data_id; ?>'><?php echo $data_dep ?> </div> </td> 
                        <td><a data-toggle="modal" data-target="#detail_model" class="btn btn-outline-primary">Detail</a></td> 
                        </tr> 
                        <?php 
                        $count ++; 
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
            <div class="modal fade" id="detail_model" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-body">
                    <table>
                    <thead>
                      <tr>
                      <th>စဥ်</th>
                      <th>ငှါးရမ်းသူအမည်	</th>
                      <th>ဘောင်ချာနံပါတ်</th>
                      <th>စုစုပေါင်းအရေအတွက်</th>
                      <th>စပေါ်ငွေ</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
<?php 
include_once 'layouts/footer.php'
?>
<?php 
$index0=0;
?>
<!--js file here!-->
<script>
  $(document).ready(function () { 
    $('.add').click(function(e){
        console.log('ok');

        var div=document.createElement('div');
        $(div).attr('class','container-fluid mt-3');
        var row=document.createElement('div');
        $(row).attr('class','row');
        var col1 = document.createElement('div');
        $(col1).attr('class','col-md-4 mt-3');
        var col2 = document.createElement('div');
        $(col2).attr('class','col-md-3 mt-3');
        var col3 = document.createElement('div');
        $(col3).attr('class','col-md-4 mt-3');
        var col4 = document.createElement('div');
        $(col4).attr('class','col-md-1 mt-3');
        
        var btn = document.createElement('button');
        $(btn).addClass('btn btn-outline-danger mt-4');
        $(btn).html('-');
        $(col4).append(btn);

        var label1= document.createElement('label');
        var label2= document.createElement('label');
        var label3= document.createElement('label');

        $(label1).html('Item name');
        $(label2).html('Qty');
        $(label3).html('Unit Price Per Day');

        $(label1).addClass('form-label');
        $(label2).addClass('form-label');
        $(label3).addClass('form-label');

        var name = document.createElement('input');
        
        $(name).attr('type','text');
        var qty = document.createElement('input');
        $(qty).attr('type','number');
        var unit_price = document.createElement('input');
        $(unit_price).attr('type','number');

        $(name).attr('placeholder','ပစ္စည်းအမျိုးအမည်');
        $(qty).attr('placeholder','အရေအတွက်');
        $(unit_price).attr('placeholder','တစ်ရက်ငှါးရမ်းနှုန်း');

        $(name).attr('class','form-control');
        $(qty).attr('class','form-control');
        $(unit_price).attr('class','form-control');

        $(name).attr('name','item_name[]');
        $(qty).attr('name','qty[]');
        $(unit_price).attr('name','unit_price[]')

        col1.appendChild(label1);
        col1.appendChild(name);

        col2.appendChild(label2);
        col2.appendChild(qty);

        col3.appendChild(label3);
        col3.appendChild(unit_price);


        $(btn).click(function(){
            $(this).parent().parent().parent().remove();
        });


        $(row).append(col1,col2,col3,col4);
        $(div).append(row);
        $('#content2').append(div);
        e.preventDefault();
    })
 })
</script>