<?php 
    //load file layout vao day
    $this->fileLayout = "Layout.php";
 ?>

<div class="container-fluid mt-3">
    <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Danh sách nhà cung cấp vật tư
    </div>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Thêm/Sửa</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=companies" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Trở lại <i class="fas fa-undo-alt"></i></a>
        </div>
    </div> 
    
    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Tên nhà cung cấp</span>
              <input type="text" name="tencty" value="<?php echo isset($record->tencty) ? $record->tencty : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Địa chỉ</span>
              <input type="text" name="diachi" value="<?php echo isset($record->diachi) ? $record->diachi : ""; ?>" class="form-control" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Số điện thoại</span>
              <input type="text" name="sdt" value="<?php echo isset($record->sdt) ? $record->sdt : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Email</span>
              <input type="text" name="email" value="<?php echo isset($record->email) ? $record->email : "";
               if (empty($email)){
                   $error['email'] = 'Bạn chưa nhập địa chỉ email';
               }
               else if (!is_email($email)){
                    $error['email'] = 'Email không đúng định dạng';
                }
               ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Photo</span>
              <input type="file" name="logo">
            </div>
            <div class="input-group mb-3">
              <input type="submit" value="Xử lý" class="btn btn-hover" style="font-size: 20px; font-weight: 700; "></input>
            </div>
        </form>
    </div>

</div>
 
            