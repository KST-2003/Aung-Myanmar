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
        $(btn).html('+');
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