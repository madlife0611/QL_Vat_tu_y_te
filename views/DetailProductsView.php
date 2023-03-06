<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>
 <div class="container  p-0" style="">
    
    <div class="row" style="border: 2px solid #224099; border-radius: 20px; padding: 20px;">
        <div class="col-6">
        	<img width="100%" src="assets/upload/products/<?php echo $record->anh; ?>">
        </div>
        <div class="col-6">
        	<div class="detail-product">
        		<a><b>Danh mục: </b><?php 
                $category = $this->getCategory($record->madm);
                echo isset($category->tendm) ? $category->tendm : "";
             ?></a>        		
        	</div>
        	<div class="detail-product">
        		<b>Nhà cung cấp: </b><?php 
                $company = $this->getCompany($record->macty);
                echo isset($company->tencty) ? $company->tencty : "";
             ?>
        	</div >
        	<div class="detail-product">
        		<b>Tên sản phẩm: </b><?php echo $record->tensp; ?>
        	</div>
        	<div class="detail-product">
        		<b>Mô tả: </b><?php echo $record->mota; ?>
        	</div>
        	<div class="detail-product">
        		<b>Giá: </b><?php echo $record->gianhap; ?>
        	</div>
        	<div class="detail-product">
        		<b>Trạng thái: </b><?php if(isset($record->trangthai) && $record->trangthai == 1): ?>
                            Đang được sử dụng   
                        <?php endif; ?>
                        <?php if(isset($record->trangthai) && $record->trangthai == 0): ?>
                            Rảnh rỗi
                        <?php endif; ?>
        	</div>
        	<div>
        		<a class="btn btn-hover" href="index.php?controller=request&action=create&masp=<?php echo $record->masp; ?>" style="font-size: 24px; font-weight: 700; ">Yêu cầu</a>
        	</div>
        </div>
    </div>
    <style type="text/css">
    	.detail-product{
    		font-size: 24px;
    		margin-bottom: 1rem;
    	}
    </style>
    
</div>
