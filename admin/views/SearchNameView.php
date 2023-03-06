<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="container-fluid mt-3">
    <div class="d-flex justify-content-between">
        <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
        <i class="far fa-clipboard" style="color: #f48120;"></i>Tìm kiếm vật tư
        </div>      
    </div> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Danh sách tìm kiếm</b>
        </div>
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <table class="table table-data">
            <thead>
                <tr>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Tên vật tư</th>
                  
                  <th scope="col">Mô tả</th>
                  <th scope="col">Giá nhập</th>
                  <th scope="col">Ngày nhập</th>
                  <th scope="col">Số lần sử dụng</th>
                  <th scope="col">Khấu hao</th> 
                  <th scope="col">Trạng thái</th>
                  <th scope="col">isVatTu</th>
                  <th scope="col">Danh mục</th>
                  <th scope="col">Nhà cung cấp</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php if($rows->anh != "" && file_exists("../assets/upload/products/".$rows->anh)): ?>
                            <img src="../assets/upload/products/<?php echo $rows->anh; ?>" style="max-width: 100px;">
                        <?php endif; ?></td>
                    <td><?php echo $rows->tensp; ?></td>
                    
                    <td><?php echo $rows->mota; ?></td>
                    <td><?php echo number_format($rows->gianhap); ?>đ</td>
                    <td><?php echo $rows->ngaynhap; ?></td>
                    <td><?php echo $rows->solansudung; ?></td>
                    <?php 
                        $ngaynhap = strtotime("$rows->ngaynhap");
                        $songaysudung = ceil((time()-$ngaynhap)/60/60/24);
                        $khauhao = ($songaysudung * $rows->khauhaoperday) + ($rows->solansudung * $rows->khauhaoperused);

                     ?>
                    <td><?php echo $khauhao; ?> %</td>                   
                    <td><?php if(isset($rows->trangthai) && $rows->trangthai == 1): ?>
                            Đang được sử dụng   
                        <?php endif; ?>
                        <?php if(isset($rows->trangthai) && $rows->trangthai == 0): ?>
                            Rảnh rỗi
                        <?php endif; ?>
                    </td>
                    <td><?php if(isset($rows->isvattu) && $rows->isvattu == 1): ?>
                            <i class="fas fa-check"></i>
                        <?php endif; ?>
                        <?php if(isset($rows->isvattu) && $rows->isvattu == 0): ?>
                            <i class="fas fa-times"></i>
                        <?php endif; ?>
                    </td>
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
                        <a class="btn btn-hover" href="index.php?controller=products&action=update&masp=<?php echo $rows->masp; ?>">Edit</a>&nbsp;
                        <a class="btn btn-hover" href="index.php?controller=products&action=delete&masp=<?php echo $rows->masp; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
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
                <li class="page-item"><a href="index.php?controller=products&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php endfor; ?>

          </ul>
        </nav>
    </div>
    
</div>