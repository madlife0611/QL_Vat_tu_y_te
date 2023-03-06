<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>
<style type="text/css">
	h1{color: #224099;}
	.register-ip input{width: 100%; border-radius: 10px; border-color: #224099; padding: 6px;}
	.register-ip label{float: right; font-weight: bold; color: #224099;}
	.register-ip .form-text{float: left; color: #f48120;}
</style>
 <div class="container">

	<div class="text-center">
		<h1>Đăng ký tài khoản</h1>
		<form method="post" action="index.php?controller=account&action=registerPost">
	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Họ và tên</label>
		  </div>
		  <div class="col-6">
		    <input type="text" name="tennv" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		    </span>
		  </div>
		</div>
	  </div>
	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Email</label>
		  </div>
		  <div class="col-6">
		    <input type="email" name="email" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		    </span>
		  </div>
		</div>
	  </div>
	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Password</label>
		  </div>
		  <div class="col-6">
		    <input type="password" name="password" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		      Phải trên 6 ký tự
		    </span>
		  </div>
		</div>
	  </div>

	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Địa chỉ</label>
		  </div>
		  <div class="col-6">
		    <input type="text" name="diachi" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		    </span>
		  </div>
		</div>
	  </div>
	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Phòng ban</label>
		  </div>
		  <div class="col-6">
		    <input type="text" name="phong" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		    </span>
		  </div>
		</div>
	  </div>
	  <div class="register-ip mb-3">
	    <div class="row g-3 align-items-center">
		  <div class="col-3">
		    <label class="col-form-label">Số điện thoại</label>
		  </div>
		  <div class="col-6">
		    <input type="text" name="sdt" class="form-input" required>
		  </div>
		  <div class="col-3">
		    <span class="form-text">
		    </span>
		  </div>
		</div>
	  </div>
	  <button type="submit" class="btn btn-hover">Đăng ký</button>
	</form>
	</div>
 		
 </div>
