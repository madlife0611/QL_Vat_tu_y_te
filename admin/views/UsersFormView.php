<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
<div class="container-fluid mt-3">
    <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Tài khoản người dùng
    </div>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Thêm/Sửa</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=users" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Trở lại <i class="fas fa-undo-alt"></i></a>
        </div>
    </div> 
    
    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <form method="post" action="<?php echo $action; ?>">
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Họ tên</span>
              <input type="text" name="tentk" value="<?php echo isset($record->tentk) ? $record->tentk : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Email</span>
              <input type="text" name="email" value="<?php echo isset($record->email) ? $record->email : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Số điện thoại</span>
              <input type="text" name="sdt" value="<?php echo isset($record->sdt) ? $record->sdt : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Địa chỉ</span>
              <input type="text" name="diachi" value="<?php echo isset($record->diachi) ? $record->diachi : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Mật khẩu</span>
              <input type="text" name="matkhau" <?php if(isset($record->email)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?> class="form-control">
            </div>
            <div class="input-group mb-3">
              <input type="submit" value="Xử lý" class="btn btn-hover" style="font-size: 20px; font-weight: 700; "></input>
            </div>
        </form>
    </div>

</div>