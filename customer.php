<?php 
include_once __DIR__."/controller/custcontroller.php";
include_once "includes/config.php";
$customercontroller = new CustomerController();



if(isset($_POST['submit']))
{
  if(!empty($_POST['name']))
  {
      $name=$_POST['name'];
  }
  if(!empty($_POST['nrc']))
  {
      $nrc=$_POST['nrc'];
  }
  if(!empty($_POST['add']))
  {
      $add=$_POST['add'];
  }
  if(!empty($_POST['ph']))
  {
      $ph=$_POST['ph'];
  }
  if(!empty($_POST['work_add']))
  {
      $work_add=$_POST['work_add'];
  }


$result=$customercontroller->addCustomer($name,$nrc,$add,$ph,$work_add);
  if($result){
    header('location:customer.php');
  }
  else{
    echo "error";
  }
  $work = $customercontroller->addWork($work_add);
//   $customers=$customercontroller->getCustomers();
};



?>













<?php 
include_once "layouts/header.php";
?>
      <!-- partial -->
      <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                     <!-- Form Modal Button -->
            <div class="row mb-4">
              <div class="col text-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><b> Add Customer</b></a>
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
             

            <!-- large modal for Customer Registration Form-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Customer Registration Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    <form action="" method="post">
                    <div class="modal-body">
                    <h4>Customer</h4>
                    <p >ငှားရမ်းသူ</p>
                    
                                        <div class="row" id="">
                                            <div class="col-md-6 mt-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" name="name" id="" class="form-control" placeholder="အမည်">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="" class="form-label">NRC</label>
                                                <input type="text" name="nrc" id="" class="form-control" placeholder="မှတ်ပုံတင်နံပါတ်">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="" class="form-label">Ph No</label>
                                                <input type="text" name="ph" id="" class="form-control" placeholder="ဖုန်းနံပါတ်">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="" class="form-label">Address</label>
                                                <input type="text" name="add" id="" class="form-control" placeholder="နေရပ်လိပ်စာ">
                                            </div>
                                            <div class="col-md-11 mt-3">
                                                <label for="" class="form-label">Work Address</label>
                                                <input type="text" name="work_add" id="" class="form-control" placeholder="လုပ်ငန်းခွင်လိပ်စာ">
                                            </div>
                                            <div class="col-md-1 mt-5">
                                                <button  class="btn btn-outline-primary new" id="" >+</button>
                                            </div> 
                                            <div class="container-fluid content" ></div>
                                        </div>   
                    </div>     
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
                </form>
                </div>
                </div>
            </div>
</div>

<div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Customer Table</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="datatable" class="display expandable-table no-footer" style="width:100%">
                                                <thead>
                                                    <tr>
                                                    <th>စဥ်</th>
                                                    <th>အမည်</th>
                                                    <th>မှတ်ပုံတင်နံပါတ်</th>
                                                    <th>နေရပ်လိပ်စာ</th>
                                                    <th>ဖုန်းနံပါတ်</th>
                                                    <th>လုပ်ငန်းခွင်လိပ်စာ</th>
                                                    <th>Action</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                          $query = "select * from customer ";
                          $result = mysqli_query($con,$query);
                          $count = 1;
                          while($row = mysqli_fetch_array($result) ){
                          $data_id = $row['id'];
                          $data_name = $row['name'];
                          $data_nrc= $row['NRC'];
                          $data_add = $row['address'];
                          $data_ph = $row['phone_number'];
                          ?>
                        <tr>
                        <td><?php echo $count; ?></td>
                        <td> <div contentEditable='true' class='cust_edit' id='name_<?php echo $data_id; ?>'> <?php echo $data_name; ?></div> </td>
                        <td> <div contentEditable='true' class='cust_edit' id='nrc_<?php echo $data_id; ?>'> <?php echo $data_nrc; ?></div> </td>
                        <td> <div contentEditable='true' class='cust_edit' id='address_<?php echo $data_id; ?>'><?php echo $data_add; ?> </div> </td>
                        <td> <div contentEditable='true' class='cust_edit' id='phone_number_<?php echo $data_id; ?>'><?php echo $data_ph; ?> </div> </td>
                        <td> <div contentEditable='true' class='cust_edit' id='phone_number_<?php echo $data_id; ?>'><?php echo $data_ph; ?> </div> </td>
                        <td  cid='<?php echo $data_id; ?>'><a class='btn btn-danger deleteCustomer '> Delete</a></td>
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
                
            </div>
     </div>  
     </div>  
        
        
   
     

<?php 
include_once "layouts/footer.php";
?>

<script>
  $(document).ready(function(){
  
    // Add Class
    $('.cust_edit').click(function(){
        $(this).addClass('editMode');
    
    });

    // Save data
    $(".cust_edit").focusout(function(){
        $(this).removeClass("editMode");
 
        var id = this.id;
        var id1= this.id;
        var split_id = id.split("_");
        var split_id1=id1.split("_");
        
        if(split_id.length==2)
        {
            var field_name = split_id[0];
            var edit_id = split_id[1];
            console.log(field_name);

            var value = $(this).text();
        
            $.ajax({
                url: 'customer_update.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    if(response == 1){ 
                        console.log('Save successfully'); 
                        
                    }else{ 
                        console.log("Not saved."); 
                        
                    }             
                }
            });
        }
        else{
            
            var remove_last=split_id.pop();
         //   console.log(remove_last); // 3
         //   console.log(split);  // item name
            var one =split_id[0];
            var two = split_id[1];
            var field_name = one.concat('_',two);
            var edit_id = split_id1[2];
            console.log(field_name);
            console.log(edit_id);
            
            var value = $(this).text();
        
            $.ajax({
                url: 'additem_update.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    if(response == 1){ 
                        console.log('Save successfully'); 
                        
                    }else{ 
                        console.log("Not saved."); 
                        
                    }             
                }
            });
        }        
    });

});

$('.deleteCustomer').click(function(){
    var status = confirm("Are you sure to delete?");
    if(status){
        var id=$(this).parents('td').attr('cid');
        var row = $(this).parents('tr');
        console.log(id);
        $.ajax({
            type:'post',
            url:'customer_delete.php',
            data:{cid:id},
            success:function(response){
                alert(response);
                row.fadeOut('slow');
            }
        })
    }
    return false;
})



</script>