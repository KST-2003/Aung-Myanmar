<?php
include_once "includes/config.php";
include_once "controller/ReturnController.php";
$returnController = new ReturnController();

?>
<?php 
include_once "layouts/header.php";
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" id="scrollbar">

        <div class="container-fluid">
     <!-- Form Modal Button -->
     <div class="row mb-4">
              <div class="col text-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><b>Add Return Item</b></a>
              </div>
                <div class='col text-left'>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#detailModal"><b>Detail Form</b></a>
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

               <!-- large modal for Return Item Registration Form-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Return Item Registration Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="" method='post'>
        <div class="modal-body">
                        <h4>Return List</h4>
                        <p>ပြန်အပ်စာရင်း</p>
                        <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Invoice No</label>
                            <select name="lent_id" class='form-control' id='invoice_no' placeholder="ဘောင်ချာနံပါတ်" id="">
                                <?php
                                    $selectquery="select * from  lent ";
                                    $select_result = mysqli_query($con,$selectquery);
                                    $outcome=null;
                                    while($outcome=mysqli_fetch_array($select_result,MYSQLI_ASSOC)):;
                                ?>
                                <option value="<?php echo $outcome['id']; ?>"><?php echo $outcome['invoice_no']; ?>
                                </option>
                                <?php 
                                    endwhile;
                                    $query = "select name from customer inner join lent on customer.id=
                                              lent.customer_id inner join return_tb on lent.id=return_tb.lent_id";
                                    $result = mysqli_query($con,$query);
                                    $cus_name=mysqli_fetch_array($result);
                                ?> 
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Customer Name</label>
                            <input type="text" class="form-control" name="" id="customer" placeholder="ငှါးရမ်းသူအမည်" value='<?php echo $cus_name[0]; ?>'>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Return Date</label>
                            <input type="date" class="form-control" name="return_date" id="return_date" placeholder='ပြန်အပ်ရက်စွဲ'>
                        </div>

                                

                      <div class="col-md-4 mt-3">
                          <label class="form-label">Return Item</label>
                            <select class="form-control" name="lentDetail_id" id="return_item" placeholder="ပြန်အပ်သည့်ပစ္စည်း">
                            <option value="">ငြမ်း</option>
                            <option value="">အခင်းပြား</option>
                            </select>
                          </div>
                      <div class="col-md-2 mt-3">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" min="1" id="return_qty" class="form-control" placeholder="အ‌ရေအတွက်">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="" class="form-label">Unit Price</label>
                                <input type="number" name="" class="form-control" placeholder="တစ်ရက်ငှါးရမ်းနှုန်း" id="lent_price">
                                
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="">&nbsp;</label>
                                <button  class="btn btn-outline-primary mt-4" id="addbtn">+</button>
                                </div>

                                <!-- <div class="col-md-1 mt-3">
                                <label for="">&nbsp;</label>
                                <button  class="btn btn-outline-danger ">-</button>
                              </div> -->
                            <div class="container-fluid" id="return_form">

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Employee</label>
                                <select name="" id="" class="form-control" id="employee" placeholder="လက်ခံပေးသည့်တာဝန်ခံ">
                                    <option value="0">Ma Sabel</option>
                                    <option value="1">Mg Toe</option>
                                    <option value="2">Ma Thida</option>
                                    <option value="3">Mg Kaung</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Broken/Lost</label>
                                <select name="" class="form-control" id="hasBroken" plcaeholder="ကျိုးပဲ့/ပျောက်ဆုံး" >
                                    <option value="true" selected>ရှိ</option>
                                    <option value="false">မရှိ</option>
                                </select>
                            </div>
                            <div id='broken'>
                                <div class="col-md-4 mt-3" id="">
                                    <label for="">Broken Item</label>
                                    <select name="" id="" class="form-control" placeholder="ကျိုးပဲ့သည့်ပစ္စည်း">
                                        <option value="">ငြမ်း</option>
                                        <option value="">အခင်းပြား</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" min="1" name="" id="" placeholder="အရေအတွက်">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Item Price</label>
                                    <input type="number" class="form-control mb-3" min="1" name="" id="" placeholder="ကာလပေါက်ဈေး">
                                </div>
                                <div class="col-md-2 mt-3">
                                <label for="">&nbsp;</label>
                                <button  class="btn btn-outline-primary mt-4" id="broken_add_row">+</button>
                                </div>
                            </div>
                            <div id="moreForm" class="container-fluid">

                            </div>
                        </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" name="submit" id="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
        </div>
  </div>
</div>     
</div>
    <div class="container-fluid">
        <div class="row" id="scrollbar">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Return Table</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example" class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>စဥ်</th>
                                                        <th>ဘောင်ချာနံပါတ်</th>
                                                        <th>ငှားရမ်းသူအမည်</th>
                                                        <th>ငှားရမ်းထားသည့်အရေအတွက်</th>
                                                        <th>ပြန်အပ်သည့်ရက်စွဲ</th>
                                                        <th>စုစုပေါင်းကျသင့်ငွေ</th>
                                                        <th>စပေါ်‌ငွေ</th>
                                                        <th>ကျိုးပဲ့/ပျောက်ဆုံး</th>
                                                        <th>မှတ်ချက်</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            <tbody id="return_table">
                                                
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
      <!-- main-panel ends -->
      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">ပြန်အပ်ခြင်း Detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="">
        <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Return Detail Table</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example" class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>စဥ်</th>
                                                        <th>ဘောင်ချာနံပါတ်</th>
                                                        <th>ငှားရမ်းပစ္စည်း</th>
                                                        <th>ငှားရမ်းအ‌ရေအတွက်ရေအတွက်</th>
                                                        <th>ပြန်အပ်သည့်ရက်စွဲ</th>
                                                        <th>ကျသင့်ငွေ</th>
                                                        <th>လက်ခံပေးသည့်တာဝန်ခံ</th>
                                                    </tr>
                                                </thead>
                                            <tbody id="return_detail">
                                                
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
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" name="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>   
        
  </div>
</div>

<?php 
include_once "layouts/footer.php";
?>
