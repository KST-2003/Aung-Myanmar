<?php 
include_once "layouts/header.php"
?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Employees Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>စဥ်</th>
                              <th>ပစ္စည်းအမည်</th>
                              <th>စာရင်းရှိအရေအတွက်</th>
                              <th>ငှားထားသည့်အရေအတွက်</th>
                              <th>ပြန်အပ်သည့်အရေအတွက်</th>
                              <th>ကျိုးပဲ့/ပျောက်ဆုံးအရေအတွက်</th>
                              <th>ဆိုင်ရှိအရေအတွက်</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>1</th>
                              <th>Name</th>
                              <th>Qty</th>
                              <th>L_Qty</th>
                              <th>R_Qty</th>
                              <th>B_Qty</th>
                              <th>S_Qty</th>
                              <th><span><img src="images/pencil.png" alt="" width="30px" height="30px"></span><span><img src="images/trash-bin.png" alt="" width="30px" height="30px"></span></th>
                            </tr>
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
include_once "layouts/footer.php"
?>