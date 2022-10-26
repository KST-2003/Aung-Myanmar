$(document).ready(function () { 
    var index= 2;
    $('.new').click(function (e) { 
        console.log('ok');

        // var div=document.createElement('div');
        // $(div).attr('class','container-fluid mt-3');
        var row=document.createElement('div');
        $(row).attr('class','row');
        var col1 = document.createElement('div');
        $(col1).attr('class','col-md-11 mt-3');
        var col2 = document.createElement('div');
        $(col2).attr('class','col-md-1 mt-3');
        var label= document.createElement('label');
        $(label).html('Work address'+index);
        $(label).attr('class','form-label');
        

        var address = document.createElement('input');
        $(address).attr('type','text');
        $(address).attr('class','form-control');
        $(address).attr('placeholder','လုပ်ငန်းခွင်လိပ်စာ');
        var btn = document.createElement('button');
        $(btn).addClass('btn btn-outline-danger mt-5');
        $(btn).html('-');
        col2.appendChild(btn)
        col1.appendChild(label)
        col1.appendChild(address)
        $(btn).click(function(){
            $(this).parent().parent().remove();
            index--;
        });
        row.append(col1,col2)
        // $(div).append(row);
        $('.content').append(row);
        index++;
        e.preventDefault();

     })
 })