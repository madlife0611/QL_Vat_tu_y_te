<?php 
	trait LoginModel{
		public function modelLogin(){
			$email = $_POST["email"];
			$matkhau = $_POST["matkhau"];
			//ma hoa matkhau -> ma hoa chuoi thanh doan ma 128 bit
			$matkhau = md5($matkhau);
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select email from users where email=:var_email and matkhau=:var_matkhau");
			//thuc thi truy van
			$query->execute(["var_email"=>$email,"var_matkhau"=>$matkhau]);
			//echo $query->rowCount();
			if($query->rowCount() > 0){
				//dang nhap thanh cong
				$_SESSION['email'] = $email;
				header("location:index.php");
			}else
				header("location:index.php?controller=login");
		}
	}
 ?>