<?php
include_once __DIR__."/includes/config.php";
include_once __DIR__."/includes/db.php";
if(isset($_POST['search'])){
  if(!empty($_POST['year'])){
    $year=$_POST['year'];
    $query="SELECT
    COUNT(id),
    DATE_FORMAT(lent_date, '%Y-%m-%d') AS DAY,
    DATE_FORMAT(lent_date, '%Y-%m') AS MONTH,
    DATE_FORMAT(lent_date, '%Y') AS YEAR,
    sum(deposit) AS deposit
  
    FROM
    lent
    WHERE
    YEAR(lent_date) = ".$year."
    GROUP BY
    DATE_FORMAT(lent_date, '%Y ');";
    $query_run = mysqli_query($con, $query);
    $output=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
    ///
    $query1="SELECT
    COUNT(id),
    DATE_FORMAT(lent_date, '%Y-%m-%d') AS DAY,
    DATE_FORMAT(lent_date, '%Y-%m') AS MONTH,
    DATE_FORMAT(lent_date, '%Y') AS YEAR,
    sum(total_qty) AS Qty
  
    FROM
    lent
    WHERE
    YEAR(lent_date) = ".$year."
    GROUP BY
    DATE_FORMAT(lent_date, '%Y ');";
    $query_run1 = mysqli_query($con, $query1);
    $output1=mysqli_fetch_array($query_run1,MYSQLI_ASSOC);
  }
}
?>
<?php
include_once __DIR__."/layouts/header.php";
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Aamir</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 stretch-card">
                <form method="POST">
                  <label class="form-label">Enter Year</label>
                  <div class="row">
                  <div class="col-md-10">
                  <input type="text" class="form-control" name="year">
                  </div>
                  <div class="col-md-2 d-flex justify-content-center align-items-center">
                  <button class="btn btn-primary" type="submit" name="search"><i class="mdi mdi-magnify mdi-18px"></i></button>
                  </div>
                  </div>
                </form>
                </div>
                <div class="col-md-4  stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Deposit</p>
                      <p class="fs-30 mb-2">
                        <?php
                          if(isset($_POST['year'])){
                          print_r($output['deposit']);
                          }                       
                        ?>
                      </p>
                      <p>Yearly</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Qty of item(lented)</p>
                      <p class="fs-30 mb-2">
                        <?php
                        if(isset($_POST['year'])){
                          print_r($output1['Qty']);
                        }
                        ?>
                      </p>
                        <p>Yearly</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Total Deposit(Monthly)</p>
                  <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                 
                  <canvas id="monthly-deposit"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Lent Qty(Month)</p>
                  <a href="#" class="text-info">View all</a>
                 </div>
                  <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="monthly-lent"></canvas>
                </div>
              </div>
            </div>
          </div>
         
         
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
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
<?php
include_once __DIR__."/layouts/footer.php";

?>
  <script  src="js/Chart.min.js"></script>
<script>
  // location.reload();
 
        //  location.reload();



        var input = document.getElementById('input')
        input.addEventListener("keypress",function(event){
                if(event.key == "Enter"){
                  response=null;
                  // event.preventDefault();
                    console.log("Enter");
                    var value=input.value;
                    if(value !==""){
                        console.log(value);
                        event.preventDefault();
                        $.ajax({
                            url:"dashdata.php",
                            type:"post",
                            data:{year:value},
                            success:function(response){
                              console.log(response);   //350
                              
                              var months = [];
                              var deposits = [];

                              for (var i in response) {
                                
                                  months.push(response[i].month);
                                  deposits.push(response[i].deposit);
                              }
                              console.log(months);    //358
                              var chartdata = {
                                  labels: months,
                                    datasets: [
                                        {
                                            label: 'Monthly Deposit',
                                            backgroundColor: 'coral',
                                            borderColor: '#46d5f1',
                                            hoverBackgroundColor: 'aqua',
                                            hoverBorderColor: 'yellow',
                                            data: deposits
                                        }
                                    ]
                              };

                              var graphTarget = $("#monthly-deposit");

                              var barGraph = new Chart(graphTarget, {
                                  type: 'bar',
                                  data: chartdata
                              });     
                              barGraph.destroy();  
                              barGraph = new Chart(graphTarget, {
                                  type: 'bar',
                                  data: chartdata
                              });    
                            }//success
                        }) ; //ajax


                        $.ajax({
                            url:"dashdata2.php",
                            type:"post",
                            data:{year:value},
                            success:function(response1){
                              console.log(response1);   //
                              var months = [];
                              var total_qty = [];

                              for (var x in response1) {
                                
                                  months.push(response1[x].month);
                                  total_qty.push(response1[x].total_qty);
                              }
                              console.log(months);    //
                              var chartdata2 = {
                                  labels: months,
                              datasets: [
                                  {
                                      label: 'Lent Qty(Monthly)',
                                      backgroundColor: 'coral',
                                      borderColor: '#46d5f1',
                                      hoverBackgroundColor: 'aqua',
                                      hoverBorderColor: 'yellow',
                                      data: total_qty
                                  }
                              ]
                              };

                              var graphTarget1 = $("#monthly-lent");

                              var barGraph1 = new Chart(graphTarget1, {
                                  type: 'bar',
                                  data: chartdata2
                              });                              
                            }//success
                        })  //ajax


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
                }  //enter   
                    
})



</script>
