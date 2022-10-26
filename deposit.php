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
                             <input type="text" class="form-control" name="inv_number" id="" placeholder="ဘောက်ချာနံပါတ်">
                             </div>
                             <div class="col-md-6 mt-3">
                             <label for="">စပေါ်ငွေ</label>
                             <input type="" class="form-control" name="deposit" id="" placeholder="စပေါ်ငွေ"> 
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
