<?php 
  //load file Layout.php vao day
  $this->fileLayout = "Layout.php";
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col">
 			<h1>Đăng nhập tài khoản</h1>
 			<form method='post' action="index.php?controller=account&action=loginPost">
			  <div class="mb-3">
			    <label class="form-label">Địa chỉ Email</label>
			    <input type="email" name="email" class="form-control">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Password</label>
			    <input type="password" name="password" class="form-control">
			  </div>
			  <button type="submit" class="btn btn-hover">Đăng nhập</button>
			</form>
 		</div>
 		<div class="col">
 			<h1>Tạo tài khoản mới</h1>
 			<p>Người dùng mới cần tạo tài khoản để thực hiện chức năng request vật tư</p>
 			<a href="index.php?controller=account&action=register" class="btn btn-hover">Đăng ký ngay</a>
 		</div>
 	</div>
 </div>
