<?php 
    //load file Layout.php vao day
    $this->fileLayout = "Layout.php";
 ?>
 <?php 
        $conn = Connection::getInstance();
        $query = $conn->query("select * from employees where manv = (select manv from orders where id = $id limit 0,1)");
        $employee = $query->fetch();
  ?>
  <div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Thông tin nhân viên request</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=orders" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Trở lại <i class="fas fa-undo-alt"></i></a>
        </div>
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <table class="table table-data">
            <tbody>
                <tr>
                    <th style="width:150px;">Họ tên:</th>
                    <th><?php echo $employee->tennv; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Phòng ban:</th>
                    <th><?php echo $employee->phong; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Email:</th>
                    <th><?php echo $employee->email; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Địa chỉ:</th>
                    <th><?php echo $employee->diachi; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Điện thoại:</th>
                    <th><?php echo $employee->sdt; ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Thông tin vật tư được request</b>
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
                  <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $rows): ?>
                	<?php 
                        $product = $this->modelGetProduct($rows->masp);
                     ?>
                <tr>
                    <td><?php if($product->anh != "" && file_exists("../assets/upload/products/".$product->anh)): ?>
                            <img src="../assets/upload/products/<?php echo $product->anh; ?>" style="max-width: 100px;">
                        <?php endif; ?></td>
                    <td><?php echo $product->tensp; ?></td>
                    
                    <td><?php echo $product->mota; ?></td>
                    <td><?php echo number_format($product->gianhap); ?>đ</td>
                    <td><?php echo $product->ngaynhap; ?></td>
                    <td><?php echo $product->solansudung; ?></td>
                    <?php 
                        $ngaynhap = strtotime("$product->ngaynhap");
                        $songaysudung = ceil((time()-$ngaynhap)/60/60/24);
                        $khauhao = ($songaysudung * $product->khauhaoperday) + ($product->solansudung * $product->khauhaoperused);

                     ?>
                    <td><?php echo $khauhao; ?> %</td>                   
                    <td><?php if(isset($product->trangthai) && $product->trangthai == 1): ?>
                            Đang được sử dụng   
                        <?php endif; ?>
                        <?php if(isset($product->trangthai) && $product->trangthai == 0): ?>
                            Rảnh rỗi
                        <?php endif; ?>
                    </td>
                    <td><?php if(isset($product->isvattu) && $product->isvattu == 1): ?>
                            <i class="fas fa-check"></i>
                        <?php endif; ?>
                        <?php if(isset($product->isvattu) && $product->isvattu == 0): ?>
                            <i class="fas fa-times"></i>
                        <?php endif; ?>
                    </td>
                    <td><?php 
                            //co the goi ham tu class model o day
                            $category = $this->getCategory($product->madm);
                            echo isset($category->tendm) ? $category->tendm : "";
                         ?></td>
                    <td><?php 
                            //co the goi ham tu class model o day
                            $company = $this->getCompany($product->macty);
                            echo isset($company->tencty) ? $company->tencty : "";
                         ?></td>
                    <td>
                        <?php 
                            //co the goi ham tu class model o day
                            $orderdetail = $this->modelGetOrdersDetail($rows->order_id, $product->masp);
                            echo isset($orderdetail->quantity) ? $orderdetail->quantity : "";
                         ?>
                    </td>     
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>