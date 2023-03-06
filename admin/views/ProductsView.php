<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="container-fluid mt-3">
    <div class="d-flex justify-content-between">
        <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
        <i class="far fa-clipboard" style="color: #f48120;"></i> Danh sách vật tư
        </div>
        <div>
            <div class="header-search d-flex">
            <input class="input-control me-2" autocomplete="off" type="search" placeholder="  Tìm kiếm vật tư" id="key" aria-label="Search">
            <button class="btn " type="submit"><i class="fas fa-search" id="btnSearchADMIN"></i></button>
            </div>
            <div class="smart-search">
              <ul>
                <li><a href="#">Sản phẩm 1</a></li>
                <li><a href="#">Sản phẩm 2</a></li>
                <li><a href="#">Sản phẩm 3</a></li>
              </ul>
            </div>
          </div>
        
    </div>
    <style type="text/css">        
        .header-search{
            padding: 0px 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-search input{
            border: 2px solid #224099;
            border-radius: 20px;
            height: 50px;
        }
        .header-search button{
            border: 2px solid #224099;
            border-radius: 20px;
            height: 50px;
            width: 50px;
            background-color: #224099;
            color: #ffffff;
        }
        .header-search button:hover{
            background-color: #f48120;
            border: 2px solid #f48120;
            color: #ffffff;
        }
        .smart-search{position: absolute; border: 1px solid #224099;border-radius: 20px; margin-left: 10px; width: 250px; padding-left: 10px; background: white; height: 250px; overflow: scroll; z-index: 2; display: none;}
      .smart-search ul{padding: 0px; margin: 0px; list-style: none;}
      .smart-search a{text-decoration: none; color: black;}
    </style>
    <script type="text/javascript">
      //tinh nang nay phai dung ket hop voi jquery -> phai load thu vien jquery
      $(document).ready(function(){
        //bat su kien click cua id=btnSearch
        $("#btnSearchADMIN").click(function(){
          var key = $("#key").val();
          //di chuyen den url tim kiem
          location.href="index.php?controller=search&action=name&key="+key;
        });
        //---
        $(".input-control").keyup(function(){
          var strKey = $("#key").val();
          if(strKey.trim() == "")
            $(".smart-search").attr("style","display:none");
          else{
            $(".smart-search").attr("style","display:block");
            //---
            //su dung ajax de lay du lieu
            $.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
              //clear cac the li ben trong the ul
              $(".smart-search ul").empty();
              //them du lieu vua lay duoc bang ajax vao the ul
              $(".smart-search ul").append(data);
            });
            //---
          }
        });
        //---
      });
    </script>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        
        <div class="" style="padding:20px;">
            <?php 
            $order = isset($_GET["order"]) ? $_GET["order"] : "";
         ?>
            <select class="form-select" aria-label="Default select example" style="font-size: 24px; color: #f48120; background-color: #224099; border-color: #00adee;"
            onchange="location.href = 'index.php?controller=products&order='+this.value;">
              <option selected>Sắp xếp mặc định</option>
              <option <?php if($order == "khauhaotang"): ?> selected <?php endif; ?> value="khauhaotang">Khấu hao tăng dần</option>
              <option <?php if($order == "khauhaogiam"): ?> selected <?php endif; ?> value="khauhaogiam">Khấu hao giảm dần</option>
              <option <?php if($order == "giatang"): ?> selected <?php endif; ?> value="giatang">Giá nhập tăng dần</option>
              <option <?php if($order == "giagiam"): ?> selected <?php endif; ?> value="giagiam">Giá nhập giảm dần</option>
              <option <?php if($order == "ngaynhaptang"): ?> selected <?php endif; ?> value="ngaynhaptang">Ngày nhập xa nhất</option>
              <option <?php if($order == "ngaynhapgiam"): ?> selected <?php endif; ?> value="ngaynhapgiam">Ngày nhập gần nhất</option>
            </select>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=products&action=create" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Thêm mới <i class="fas fa-plus-square"></i></a>
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
                <form action="index.php?controller=products&action=tangsolansudung" method="post">
                <tr>
                    <td><?php if($rows->anh != "" && file_exists("../assets/upload/products/".$rows->anh)): ?>
                            <img src="../assets/upload/products/<?php echo $rows->anh; ?>" style="max-width: 100px;">
                        <?php endif; ?></td>
                    <td><?php echo $rows->tensp; ?></td>
                    
                    <td><?php echo $rows->mota; ?></td>
                    <td><?php echo number_format($rows->gianhap); ?>đ</td>
                    <td><?php echo $rows->ngaynhap; ?></td>
                    <td>
                        <input type="number" min="0"  value="<?php echo $rows->solansudung; ?>" name="solansudung" required="Không thể để trống">
                        <input type="submit" class="btn btn-hover" value="Cập nhật">
                    </td>
                    <!-- Hàm tính khấu hao -->
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
                </form>
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