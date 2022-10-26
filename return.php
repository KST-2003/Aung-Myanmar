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
        <form action="">
        <div class="modal-body">
                        <h4>Return List</h4>
                        <p>ပြန်အပ်စာရင်း</p>
                        <div class="row">
                        <div class="col-md-6 mt-3">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" name="" id="customer" placeholder="ငှါးရမ်းသူအမည်">
                                </div>

                                <div class="col-md-6 mt-3">
                                <label for="">Invoice No</label>
                                <input type="text" class="form-control" name="" id="invoice" placeholder="ဘောင်ချာနံပါတ်">
                                </div>

                      <div class="col-md-4 mt-3">
                          <label class="form-label">Return Item</label>
                            <select class="form-control" id="return_item" placeholder="ပြန်အပ်သည့်ပစ္စည်း">
                            <option value="">ငြမ်း</option>
                            <option value="">အခင်းပြား</option>
                            </select>
                          </div>
                      <div class="col-md-2 mt-3">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" min="1" id="return_qty" class="form-control" placeholder="အ‌ရေအတွက်">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="" class="form-label" placeholder="ပြန်အပ်ရက်စွဲ">Return Date</label>
                                <input type="date" name="" class="form-control" id="return_date">
                                
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
                                <select name="" id="" class="form-control" id="employee" placeholder="လက်ခံပေးသည့်တာဝန်ခံ(select)">
                                    <option value="0">Ma Sabel</option>
                                    <option value="1">Mg Toe</option>
                                    <option value="2">Ma Thida</option>
                                    <option value="3">Mg Kaung</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Broken/Lost</label>
                                <select name="" class="form-control" id="hasBroken" plcaeholder="ကျိုးပဲ့/ပျောက်ဆုံး" >
                                    <option value="true">ရှိ</option>
                                    <option value="false" selected>မရှိ</option>
                                </select>
                            </div>

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
                                                        <th>ပြန်အပ်သည့်ရက်စွဲ</th>
                                                        <th>ပြန်အပ်ပစ္စည်း</th>
                                                        <th>အရေအတွက်</th>
                                                        <th>စုစုပေါင်းကျသင့်ငွေ</th>
                                                        <th>လက်ခံပေးသည့်တာဝန်ခံ</th>
                                                        <th>ပြန်အမ်း/ပေးရန်ကျန်ငွေ</th>
                                                        <th>ကျိုးပဲ့/ပျောက်ဆုံး</th>
                                                        <th>လျှော့စျေး</th>
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

<?php 
include_once "layouts/footer.php";
?>
<script>
    var count = 1;
var kount = 0;
var hasrow = false;
$('#return_date').html("2022/10/2");
$('#hasBroken').change(function(){
    console.log($('#hasBroken').val());
    if($('#hasBroken').val() == 'false'){
        $('#broken').hide();
        $('#moreForm').empty();
        kount = 0;
    }
    else
        $('#broken').show();
})

console.log(count);

$('#addbtn').click(function(e){
    console.log('ok');

    var row=document.createElement('div');
    $(row).attr('class','row mt-3');
    var col1 = document.createElement('div');
    $(col1).attr('class','col-md-4 mt-3');
    var col2 = document.createElement('div');
    $(col2).attr('class','col-md-2 mt-3');
    var col3 = document.createElement('div');
    $(col3).attr('class','col-md-4 mt-3');
    var col4 = document.createElement('div');
    $(col4).attr('class','col-md-2 mt-3');
    
    var btn = document.createElement('button');
    $(btn).addClass('btn btn-danger mt-4');
    $(btn).html('Delete');
    $(col4).append(btn);

    var label1= document.createElement('label');
    var label2= document.createElement('label');
    var label3= document.createElement('label');

    $(label1).html('Item name');
    $(label2).html('Qty');
    $(label3).html('Unit Price');

    $(label1).addClass('form-label');
    $(label2).addClass('form-label');
    $(label3).addClass('form-label');

    var selectbox = document.createElement('select');
    var option1 = document.createElement('option')
    $(option1).html('ငြမ်း');
    var option2 = document.createElement('option');
    $(option2).html('အခင်းပြား');
    $(selectbox).append(option1,option2)


    var qty = document.createElement('input');
    $(qty).attr('type','number');
    var return_date = document.createElement('input');
    $(return_date).attr('type','number');

    $(selectbox).attr('placeholder','ပစ္စည်းအမျိုးအမည်');
    $(qty).attr('placeholder','အရေအတွက်');
    $(return_date).attr('placeholder','တစ်ရက်ငှါးရမ်းနှုန်း');

    $(selectbox).attr('class','form-control thing');
    $(qty).attr('class','form-control amount');
    $(return_date).attr('class','form-control time');

    col1.appendChild(label1);
    col1.appendChild(selectbox);

    col2.appendChild(label2);
    col2.appendChild(qty);

    col3.appendChild(label3);
    col3.appendChild(return_date);


    $(btn).click(function(){
        $(this).parent().parent().remove();
        count--;
    });

    $(row).append(col1,col2,col3,col4);
    $('#return_form').append(row);
    count++;
    hasrow = true;
    console.log(count);
    e.preventDefault();
})

$('#broken_add_row').click(function(e){
    var row=document.createElement('div');
    $(row).attr('class','row');
    var col1 = document.createElement('div');
    $(col1).attr('class','col-md-4 mt-3');
    var col2 = document.createElement('div');
    $(col2).attr('class','col-md-2 mt-3');
    var col3 = document.createElement('div');
    $(col3).attr('class','col-md-4 mt-3');
    var col4 = document.createElement('div');
    $(col4).attr('class','col-md-2 mt-3');
    
    var btn = document.createElement('button');
    $(btn).addClass('btn btn-danger mt-4');
    $(btn).html('Delete');
    $(col4).append(btn);

    var label1= document.createElement('label');
    var label2= document.createElement('label');
    var label3= document.createElement('label');

    $(label1).html('Item name');
    $(label2).html('Qty');
    $(label3).html('Actual Price');

    $(label1).addClass('form-label');
    $(label2).addClass('form-label');
    $(label3).addClass('form-label');

    var selectbox = document.createElement('select');
    var option1 = document.createElement('option')
    $(option1).html('ငြမ်း');
    var option2 = document.createElement('option');
    $(option2).html('အခင်းပြား');
    $(selectbox).append(option1,option2);

    var qty = document.createElement('input');
    $(qty).attr('type','number');
    var return_date = document.createElement('input');
    $(return_date).attr('type','number');

    $(selectbox).attr('placeholder','ပစ္စည်းအမျိုးအမည်');
    $(qty).attr('placeholder','အရေအတွက်');
    $(return_date).attr('placeholder','ကာလပေါက်စျေး');

    $(selectbox).attr('class','form-control');
    $(qty).attr('class','form-control borken-qty');
    $(return_date).attr('class','form-control actual-price');

    col1.appendChild(label1);
    col1.appendChild(selectbox);

    col2.appendChild(label2);
    col2.appendChild(qty);

    col3.appendChild(label3);
    col3.appendChild(return_date);


    $(btn).click(function(){
        $(this).parent().parent().remove();
    });


    $(row).append(col1,col2,col3,col4);
    $('#moreForm').append(row);
    kount++; 
    e.preventDefault(); 
})

// var thing = document.getElementsByClassName('thing');
// var amount = document.getElementsByClassName('amount');
// var time = document.getElementsByClassName('time');
// var submit = document.getElementById('submit');
// var return_table = document.getElementById('return_table');
// var broken_qty = document.getElementsByClassName('broken-qty');
// var actual_price= document.getElementsByClassName('actual-price')
// var content = '';
// var broken_table_content = '';

// submit.onclick= function submitForm(e){
//     console.log("added row length is "+thing.length)
//     for(var index = 0; index < thing.length; index++){
//         console.log(thing[index].value);
//     }
//     if($('#customer').val().length >0 && $('#invoice').val().length >0 && $('#return_qty').val().length >0 && $('#return_date').val().length >0)
//     {
//         console.log('hello');
//         tableData();
//         console.log('count more than once')
//         if(hasrow){
//             for(var index = 0; index<thing.length;index++){
//                 content+='<tr>';
//                 content+='<td>'+time[index].value+'</td>';
//                 content+='<td>ငြမ်း</td>';
//                 content+='<td>'+amount[index].value+'</td>';
//                 content+='</tr>';
//             }
//         }
//         $('#return_table').html(content);
//         if($('#hasBroken').val() == 'true'){
//             for(var index = 0; index<= broken_qty.length; index++){
//                 broken_table_content+='<tr>';
//                 broken_table_content+='<td>'+2+"</td>";
//                 broken_table_content+='<td>'+$('#invoice').val()+"</td>";
//                 broken_table_content+='<td>ငြမ်း</td>';
//                 broken_table_content+='<td>'+broken_qty[index].value+"</td>";
//                 broken_table_content+='<td>'+actual_price[index].value+"</td>";
//                 broken_table_content+='<td>'+((broken_qty[index].value)*(actual_price[index].value))+"</td>";
//                 broken_table_content+='<td>action</td>';
//                 broken_table_content+='</tr>';
//             }
//             broken_table.innerHTML=broken_table_content;
//         }


//     }
//     $('#customer').val(null);
//     $('#invoice').val(null);
//     $("#return_qty").val(null);
//     $('#return_date').val(null);
//     $('#hasBroken').val("false");
//     // $('#return').empty();
//     count = 1;
//     e.preventDefault();
// }
// function tableData(){
//     content+="<tr>";
//     content+="<td rowspan = '"+count+"'>1</td>";
//     content+="<td rowspan = '"+count+"'>"+$("#invoice").val()+"</td>";
//     content+="<td rowspan = '"+count+"'>"+$('#customer').val()+"</td>";
//     content+="<td>"+$('#return_date').val()+"</td>";
//     content+="<td>"+$('#return_item :selected').text()+"</td>";
//     content+="<td>"+$("#return_qty").val()+"</td>";
//     content+="<td rowspan = '"+count+"'>"+100000+"</td>";
//     content+="<td rowspan = '"+count+"'>"+$('#employee :selected').text()+"</td>";
//     content+="<td rowspan = '"+count+"'>"+10000+"</td>";
//     content+="<td rowspan = '"+count+"'>"+$('#hasBroken :selected').text()+"</td>";
//     content+="<td rowspan = '"+count+"'>blah</td>";
//     content+="<td rowspan = '"+count+"'>blah</td>";
//     content+="<td rowspan = '"+count+"'>blah</td>";
//     content+="</tr>";  
// }


</script>
