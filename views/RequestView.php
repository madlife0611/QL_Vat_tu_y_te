<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-9">
 			<form action="index.php?controller=request&action=update" method="post">
	 			<table class="table table-data table-hover">
		            <thead>
		                <tr>
		                  <th class="anh" scope="col">Ảnh</th>
		                  <th class="tensp" scope="col">Tên vật tư</th>   
		                  <th class="gianhap" scope="col">Giá nhập</th>
		                  <th class="quantity" scope="col">Số lượng</th>
		                  <th class="price" scope="col">Thành tiền</th>
		                  <th scope="col">Xóa</th>
		                </tr>
		            </thead>
		            <tbody>
		            	<?php 
		                	foreach($_SESSION['request'] as $product):
		                 ?>
		                <tr >
		                    <td>
		                        
		                            <img src="assets/upload/products/<?php echo $product["anh"]; ?>" style="max-width: 100px;">
		                        
		                    </td>
		                    <td><?php echo $product["tensp"]; ?></td>
		                    
		                    <td><?php echo number_format($product["gianhap"]); ?>đ</td>
		                    <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["masp"]; ?>" required="Không thể để trống"></td>
		                    <td><?php echo number_format($product["gianhap"]*$product["number"]); ?>₫</td>
		                    <td>
		                    	<a href="index.php?controller=request&action=delete&masp=<?php echo $product["masp"]; ?>" data-id="2479395"><i class="fa fa-trash" style="color: #f48120;"></i></a>
		                    </td>
		                </tr>
		                <?php endforeach; ?>
		            </tbody>
		            <tfoot>
	                  <tr>
	                    <td colspan="4">               	 
	                    	<a href="index.php" class="btn btn-hover">Trở lại trang chủ</a>
	                  	</td>
	                  	<td><input type="submit" class="btn btn-hover" value="Cập nhật"></td>
	                  	<td><a href="index.php?controller=request&action=destroy" class="btn btn-hover">Xóa toàn bộ</a></td>
	                  </tr>
	                </tfoot>
		        </table>
	 		</form>
 		</div>
 		<div class="col-3"  style="border: 2px solid #224099; padding: 20px; border-radius: 20px;">
 			<?php if($this->requestNumber() > 0): ?>
 			<div class="mb-3" style="color: #224099; font-weight: bold;">VUI LÒNG KIỂM TRA KỸ TRƯỚC KHI REQUEST</div>
 			<div class="mb-3">Tổng tiền: <?php echo number_format($this->requestTotal()); ?>₫</div>
 			<div><a href="index.php?controller=request&action=checkout" class="btn btn-hover">Xác nhận request</a></div>
 			<?php else: ?>
 			<div>Chưa có sản phẩm nào trong request</div>
 			<div><a href="index.php" class="btn btn-hover">Trở lại trang chủ</a></div>
 		<?php endif; ?>
 		</div>
 	</div>
 </div>