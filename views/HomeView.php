
<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>	
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
		<div class="container-fluid" style="width: 100%; height: 100%;">
			<div class="row">
				<div class="col-7">
					<div id="chart"></div>
					<div class="text-center"><b>Biểu đồ số lượng sản phẩm theo từng nhóm vật tư y tế</b></div>
				</div>
				<script>
					Morris.Bar({
					 element : 'chart',
					 data:[<?php echo $chart_data; ?>],
					 xkey:'year',
					 ykeys:['profit'],
					 labels:['Profit'],
					 hideHover:'auto',
					 stacked:true
					});
				</script>
				<div class="col-5" style="border: 2px solid #224099; padding: 20px; border-radius: 20px;">
					<div class="list-group">
					
		             <?php 
		              $categories = $this->modelCategories();

		             ?>
		            <?php foreach($categories as $rows): ?> 		
					  <a href="index.php?controller=products&action=category&madm=<?php echo $rows->madm; ?>" class="list-group-item list-group-item-action"><b><?php echo $rows->tendm;?></b> : <?php echo $rows->mota; ?></a>					  	
					<?php endforeach; ?>		 
					</div>
				</div>
			</div>
			
		</div>

	