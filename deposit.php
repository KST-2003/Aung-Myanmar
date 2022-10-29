<?php 
include_once __DIR__. "/includes/config.php";
if(isset($_POST['submit'])){
  if(!empty($_POST['inv_number'])){
    $inv_number=$_POST['inv_number'];
  }
  if(!empty($_POST['deposit'])){
    $deposit=$_POST['deposit'];
  }
  if(!empty($_POST['description'])){
    $description=$_POST['description'];
  }
  $status=false;
  $query="INSERT INTO dep(deposit,descripton,condition,lent_id) VALUES ('$deposit','$description','$status','$inv_number')";
  $query_run= mysqli_query($con,$query);
}
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><b>Deposit</b></a>
              </div>
              <!-- Search Button -->
              <div class="input-group col-md-4">
              <input type="text" class="form-control" name="" id="" placeholder="ပစ္စည်းအမည်">
                <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="mdi mdi-magnify"></i>
                </button>
                </div>
              </div>
               

            <!-- large modal for New Item Registration Form-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Deposit Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
   
      <div class="modal-body">
                     <h4 >Employees</h4>
                     <p >ဝန်ထမ်း</p>
                         <div class="row">
                             <div class="col-md-6 mt-3">
                             <label for="">ဘောက်ချာနံပါတ်</label>
                             <select name="inv_number" id="inv_no" class="form-control">
                                <option value="">Select an invoice number</option>
                                <?php 
                                    $selectquery1="select * from  lent ";
                                    $select_result1 = mysqli_query($con,$selectquery1); 
                                                     
                                                    
                                               
                                    while($output=mysqli_fetch_array($select_result1,MYSQLI_ASSOC)):; 
                                    ?> 
                                    <option value="<?php echo $output['id']; ?>"> 
                                    <?php  echo $output['invoice_number'] ?> 
                                    </option> 
                                    <?php endwhile;?>  
                                </select>

                             </div>
                             <div class="col-md-6 mt-3">
                             <label for="">စပေါ်ငွေ</label>
                             <input type="" class="form-control" name="deposit" id="deposit" placeholder="စပေါ်ငွေ"> 
                             </div>
                             <div class="col-md-12 mt-3">
                             <label for="">မှတ်ချက်</label>
                             <input type="text" class="form-control" name="description" id="" placeholder="မှတ်ချက်">  
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


                 <!-- New Item Table -->
            <div class="container-fluid">
        <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Deposit</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="datatable" class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                    <th>စဥ်</th>
                                                    <th>ဘောက်ချာနံပါတ်</th>
                                                    <th>စပေါ်ငွေ</th>
                                                    <th>မှတ်ချက်</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dep_table">
                                                  <?php
                                                  
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

<?php 
include_once "layouts/footer.php";
?>
<script>
  $('#inv_no').change(function(){
    $.ajax({
        type:'Post',
        url: "deposit_script.php",
        data:{id:$('#inv_no').val()},
        success: function(response){
            $('#deposit').val(response);
        }
    })
})
</script>

