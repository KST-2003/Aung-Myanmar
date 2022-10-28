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

$('#invoice_no').change(function(){
    $.ajax({
        type:"post",
        url:'return_script.php',
        data:{id:$('#invoice_no').val()},
        success:function(response){
            $('#customer').val(response);
        }
    })
})

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
    $(label3).html('return date');

    $(label1).addClass('form-label');
    $(label2).addClass('form-label');
    $(label3).addClass('form-label');

    var selectbox = document.createElement('select');
    var option1 = document.createElement('option');
    $(option1).html('ငြမ်း');
    var option2 = document.createElement('option');
    $(option2).html('အခင်းပြား');
    $(selectbox).append(option1,option2)


    var qty = document.createElement('input');
    $(qty).attr('type','number');
    var return_date = document.createElement('input');
    $(return_date).attr('type','date');

    $(selectbox).attr('placeholder','ပစ္စည်းအမျိုးအမည်');
    $(qty).attr('placeholder','အရေအတွက်');
    $(return_date).attr('placeholder','ပြန်အပ်ရက်စွဲ');

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

var thing = document.getElementsByClassName('thing');
var amount = document.getElementsByClassName('amount');
var time = document.getElementsByClassName('time');
var submit = document.getElementById('submit');
var return_table = document.getElementById('return_table');
var broken_qty = document.getElementsByClassName('broken-qty');
var actual_price= document.getElementsByClassName('actual-price')
var content = '';
var broken_table_content = '';

submit.onclick= function submitForm(e){
    console.log("added row length is "+thing.length)
    for(var index = 0; index < thing.length; index++){
        console.log(thing[index].value);
    }
    if($('#customer').val().length >0 && $('#invoice').val().length >0 && $('#return_qty').val().length >0 && $('#return_date').val().length >0)
    {
        console.log('hello');
        tableData();
        console.log('count more than once')
        if(hasrow){
            for(var index = 0; index<thing.length;index++){
                content+='<tr>';
                content+='<td>'+time[index].value+'</td>';
                content+='<td>ငြမ်း</td>';
                content+='<td>'+amount[index].value+'</td>';
                content+='</tr>';
            }
        }
        $('#return_table').html(content);
        if($('#hasBroken').val() == 'true'){
            for(var index = 0; index<= broken_qty.length; index++){
                broken_table_content+='<tr>';
                broken_table_content+='<td>'+2+"</td>";
                broken_table_content+='<td>'+$('#invoice').val()+"</td>";
                broken_table_content+='<td>ငြမ်း</td>';
                broken_table_content+='<td>'+broken_qty[index].value+"</td>";
                broken_table_content+='<td>'+actual_price[index].value+"</td>";
                broken_table_content+='<td>'+((broken_qty[index].value)*(actual_price[index].value))+"</td>";
                broken_table_content+='<td>action</td>';
                broken_table_content+='</tr>';
            }
            broken_table.innerHTML=broken_table_content;
        }


    }
    $('#customer').val(null);
    $('#invoice').val(null);
    $("#return_qty").val(null);
    $('#return_date').val(null);
    $('#hasBroken').val("false");
    // $('#return').empty();
    count = 1;
    e.preventDefault();
}
function tableData(){
    content+="<tr>";
    content+="<td rowspan = '"+count+"'>1</td>";
    content+="<td rowspan = '"+count+"'>"+$("#invoice").val()+"</td>";
    content+="<td rowspan = '"+count+"'>"+$('#customer').val()+"</td>";
    content+="<td>"+$('#return_date').val()+"</td>";
    content+="<td>"+$('#return_item :selected').text()+"</td>";
    content+="<td>"+$("#return_qty").val()+"</td>";
    content+="<td rowspan = '"+count+"'>"+100000+"</td>";
    content+="<td rowspan = '"+count+"'>"+$('#employee :selected').text()+"</td>";
    content+="<td rowspan = '"+count+"'>"+10000+"</td>";
    content+="<td rowspan = '"+count+"'>"+$('#hasBroken :selected').text()+"</td>";
    content+="<td rowspan = '"+count+"'>blah</td>";
    content+="<td rowspan = '"+count+"'>blah</td>";
    content+="<td rowspan = '"+count+"'>blah</td>";
    content+="</tr>";  
}

