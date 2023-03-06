<?php 
    //load file layout vao day
    $this->fileLayout = "Layout.php";
 ?>

<div class="container-fluid mt-3">
    <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Danh mục vật tư
    </div>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Thêm/Sửa</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=products" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Trở lại <i class="fas fa-undo-alt"></i></a>
        </div>
    </div> 
    
    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <form method="post" action="<?php echo $action; ?>">
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Tên sản phẩm</span>
              <input type="text" name="tensp" value="<?php echo isset($record->tensp) ? $record->tensp : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Ảnh</span>
              <input type="file" name="anh" class="form-control">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Mô tả</span>
              <input type="text" name="mota" value="<?php echo isset($record->mota) ? $record->mota : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Giá nhập</span>
              <input type="text" name="gianhap" value="<?php echo isset($record->gianhap) ? $record->gianhap : "0"; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Ngày nhập</span>
              <input type="datetime-local" name="ngaynhap" value="<?php echo isset($record->ngaynhap) ? $record->ngaynhap : ""; ?>" class="form-control">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Khấu hao trên ngày</span>
              <input type="text" name="khauhaoperday" value="<?php echo isset($record->khauhaoperday) ? $record->khauhaoperday : "0"; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Khấu hao trên lần sử dụng</span>
              <input type="text" name="khauhaoperused" value="<?php echo isset($record->khauhaoperused) ? $record->khauhaoperused : "0"; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Số lần sử dụng</span>
              <input type="text" name="solansudung" value="<?php echo isset($record->solansudung) ? $record->solansudung : "0"; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              
              <input type="checkbox" name="trangthai" <?php if(isset($record->trangthai) && $record->trangthai == 1): ?> checked <?php endif; ?> class="input_checkbox"><span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Trạng thái đang được sử dụng</span>
            </div>
            <div class="input-group mb-3">
              <!-- <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">isVatTu</span> -->
              <input type="checkbox" name="isvattu" <?php if(isset($record->isvattu) && $record->isvattu == 1): ?> checked <?php endif; ?> class="input_checkbox"><span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Nếu là vật tư thì chọn</span>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Danh mục</span>
              <?php 
                $categories = $this->modelCategories();
             ?>
              <select name="madm" class="form-control" style="width:250px;">
                    <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->madm) && $record->madm == $rows->madm): ?> selected <?php endif; ?> value="<?php echo $rows->madm; ?>"><?php echo $rows->tendm; ?>: <?php echo $rows->mota; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Nhà cung cấp</span>
              <?php 
                $companies = $this->modelCompanies();
             ?>
              <select name="macty" class="form-control" style="width:250px;">
                    <?php foreach($companies as $rows): ?>
                        <option <?php if(isset($record->macty) && $record->macty == $rows->macty): ?> selected <?php endif; ?> value="<?php echo $rows->macty; ?>"><?php echo $rows->tencty; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
              <input type="submit" value="Xử lý" class="btn btn-hover" style="font-size: 20px; font-weight: 700; "></input>
            </div>
        </form>
    </div>

</div>
 
            