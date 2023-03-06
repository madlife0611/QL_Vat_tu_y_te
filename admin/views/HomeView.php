<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
 <style type="text/css">
  .alert-animation{
    animation:
      skeleton 1s linear infinite alternate;
  }
  @keyframes skeleton{
    0%{
      color: #00adee;
    }
    50%{
      color: #224099;
    }
    100%{
      color: #f48120;
    }
  }
</style>
<!--  -->
<div class="container-fluid mt-3">
  <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Dashboard
  </div>
  <hr width="100%" style="color: #224099;">    
  
</div>
<!--  -->
<div class="container-fluid mt-3" style="border: 2px solid #224099; border-radius:20px;"> 
  <?php 
    $db = Connection::getInstance();
    //thuc hien truy van
    $record = $db->query("select * from products");
    //tra ve so luong ban ghi
    $totalRecord = $record->rowCount();
    
   ?>
   <?php 
      $db = Connection::getInstance();
      //thuc hien truy van
    $query = $db->query("select * from products where (ceil((now()-ngaynhap)/60/60/24)*khauhaoperday)+(solansudung*khauhaoperused) > 1000");
    //tra ve so luong ban ghi
    $TotalVatTuSapHetHan = $query->rowCount();
    ?>
    <?php 
    $db = Connection::getInstance();
    //thuc hien truy van
    $record = $db->query("select * from orders where status = 0");
    //tra ve so luong ban ghi
    $totalOrder = $record->rowCount();
    
   ?>
  <div class="row">
    <div class="col" style="padding: 20px;">
      <a href="#" style="font-size: 24px;"><i class="fas fa-medkit alert-animation"></i></i> Tổng sản phẩm (<?php echo("$totalRecord"); ?>)</a>
    </div>

    <div class="col" style="padding: 20px;">
      <a href="#" style="font-size: 24px;"><i class="fas fa-file-medical-alt alert-animation"></i></i> Request chưa xác nhận (<?php echo("$totalOrder"); ?>)</a>
    </div>

    <div class="col" style="padding: 20px;">
      <a href="#" style="font-size: 24px;"><i class="fas fa-exclamation-triangle alert-animation"></i> Vật tư sắp hết hạn (<?php echo("$TotalVatTuSapHetHan"); ?>)</a>
    </div>
  </div>  
</div>
<!--  -->
 <div class="container-fluid mt-3">
   <div class="row" name="dashboard">
    <div class="col-8">
      <?php 
      $connect = mysqli_connect("localhost", "root", "", "php_qlvattu");
      $query = "SELECT * FROM account";
      $result = mysqli_query($connect, $query);
      $chart_data = '';
      while($row = mysqli_fetch_array($result))
      {
       $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
      }
      $chart_data = substr($chart_data, 0, -2);
     ?>
      <div>
        <div id="chart"></div>
        <div class="text-center alert-animation"><b>Biểu đồ thống kê doanh số sản phẩm theo từng nhóm vật tư y tế</b></div>
          <script>
            Morris.Bar({
             element : 'chart',
             data:[<?php echo $chart_data; ?>],
             xkey:'year',
             ykeys:['profit', 'purchase', 'sale'],
             labels:['Profit', 'Purchase', 'Sale'],
             hideHover:'auto',
             stacked:true
            });
          </script>
      </div>
    </div>
    <div class="col-4" style="border: 2px solid #224099; padding: 20px;  border-radius: 20px;">
      <p><b>Tháng 5: </b>29 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 6: </b>21 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 7: </b>18 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 8: </b>2 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 9: </b>29 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 10: </b>21 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 11: </b>18 requests (nhập tổng: 1,650,000 đ)</p>
      <p><b>Tháng 12: </b>2 requests (nhập tổng: 1,650,000 đ)</p>
    </div>
   </div>
   <style type="text/css">b{color: #224099;} p{color: #f48120;}</style>
 
		
 </div>