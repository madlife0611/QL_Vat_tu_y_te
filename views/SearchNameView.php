<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>

<div class="container  p-0" style="">
    
    <div class="d-flex" style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Tìm kiếm      
           </b>
        </div>
        
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <table class="table table-data table-hover">
            <thead>
                <tr>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Tên vật tư</th>                  
                  <th scope="col">Mô tả</th>
                  <th scope="col">Giá nhập</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col">Danh mục</th>
                  <th scope="col" width="150px">Nhà cung cấp</th>
                  <th scope="col" width="150px"></th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($data as $rows): ?> 
                <tr onclick="location.href= 'index.php?controller=products&action=detail&masp=<?php echo $rows->masp; ?>' ">
                    <td>
                        <?php if($rows->anh != "" && file_exists("assets/upload/products/".$rows->anh)): ?>
                            <img src="assets/upload/products/<?php echo $rows->anh; ?>" style="max-width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->tensp; ?></td>
                    
                    <td><?php echo $rows->mota; ?></td>
                    <td><?php echo number_format($rows->gianhap); ?>đ</td>
                    <td><?php if(isset($rows->trangthai) && $rows->trangthai == 1): ?>
                            Đang được sử dụng   
                        <?php endif; ?>
                        <?php if(isset($rows->trangthai) && $rows->trangthai == 0): ?>
                            Rảnh rỗi
                        <?php endif; ?></td>
                    <td><?php 
            //co the goi ham tu class model o day
            $category = $this->getCategory($rows->madm);
            echo isset($category->tendm) ? $category->tendm : "";
         ?></td>
                         <td><?php 
                            //co the goi ham tu class model o day
                            $company = $this->getCompany($rows->macty);
                            echo isset($company->tencty) ? $company->tencty : "";
                         ?></td>
                    <td>
                    	<a href="index.php?controller=detail">Yêu cầu</a>&nbsp;
                        <a href="index.php?controller=products&action=detail&masp=<?php echo $rows->masp; ?>" >Chi tiết</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" >
                <span style="color:#f48120">Trang</span>
              </a>
            </li>
            
                <?php for($i = 1; $i <= $numPage; $i++): ?>
              <li class="page-item"><a class="page-link" href="index.php?controller=products&action=category&madm=<?php echo $madm; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            
          </ul>
        </nav>
    </div>
    
</div>