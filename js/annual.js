//  var input = document.getElementsByClassName('input');
//   input.addEventListener("click", function(event) {
//   if (event.key == "Enter") {
//     console.log("enter")

//     event.preventDefault();
//   }
// });
var search = document.getElementById('search');
search.click()=function(event){
    console.log('hello')
    var input = document.getElementById('input')
    var value=input.value;
    if(value !==""){
        console.log(value);
        $.ajax({
            url:"test.php",
            type:"post",
            data:{year:value},
            success:function(response){
                if(response == 1){ 
                    console.log('12345'); 
                    
                }else{ 
                    console.log(response); 
                    var split = response.split("_")
                    var here_val = split[0];
                    var there_val = split[1];
                    var here= document.getElementById('here');
                    here.innerHTML= here_val;
                    var there=document.getElementById('there');
                    there.innerHTML=there_val;
                    
                }             
            }
        })  
    } 
    event.preventDefault();
}