<?php 
include_once 'layouts/header.php'
?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Form Modal Button -->
            <div class="row mb-4">
              <div class="col text-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><b>Add Broken Item</b></a>
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
            </div>

            <!-- large modal for Broken Item Registration Form-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Broken Item Registration Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="">
                <div class="modal-body">
                            <h4>Broken Items</h4>
                            <p>ကျိုးပဲ့/ ပျောက်ဆုံး</p>
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                <label for="">Items Name</label>
                                <input type="text" class="form-control" name="" id="" placeholder="ပစ္စည်းအမည်">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Broken Qty</label>
                                <input type="text" class="form-control" name="" id="" placeholder="အရေအတွက်	">
                                </div>
                            </div>
                                 <div class="row">

                                <div class="col-md-6 mt-3">
                                <label for="">Actual Price</label>
                                <input type="text" class="form-control" name="" id="" placeholder="ကာလပေါက်ဈေး">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Compensate</label>
                                <input type="text" class="form-control" name="" id="" placeholder="	လျော်ကြေးငွေ">
                                </div>
                            </div>
                            <div class="modal-footer mt-5">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" name="submit" class="btn btn-primary">Submit</button>
      </div>
                </form>
      
      
    </div>
  </div>
</div>     
            </div>

            <!-- Broken Table -->
            <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">ကျိုးပဲ့/ပျောက်ဆုံး</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="" class="display expandable-table" style="width:100%">
                          <thead>

                            <tr>
                              <th>စဥ်</th>
                              <th>ဘောင်ချာနံပါတ်</th>
                              <th>ပစ္စည်းအမည်</th>
                              <th>အရေအတွက်</th>
                              <th>ကာလပေါက်ဈေး</th>
                              <th>လျော်ကြေးငွေ</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="broken_table">
                            
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
include_once 'layouts/footer.php'
?>