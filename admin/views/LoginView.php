<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div class="container mt-5 ">
 	<div class="dangnhap " style="width: 500px; margin: auto;">
 		<div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Đăng nhập tài khoản</b>
        </div>
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <form method='post' action="index.php?controller=login&action=login">
			  <div class="mb-3">
			    <label class="form-label">Địa chỉ Email</label>
			    <input type="email" name="email" class="form-control">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Password</label>
			    <input type="password" name="matkhau" class="form-control">
			  </div>
			  <button type="submit" class="btn btn-primary">Đăng nhập</button>
			</form>

    </div>
 			
 	</div>
 </div>
</body>
</html>