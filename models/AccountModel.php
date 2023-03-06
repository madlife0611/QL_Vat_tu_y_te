<?php 
	trait AccountModel{
		public function modelRegister(){
			$tennv = $_POST["tennv"];
			$phong = $_POST["phong"];
			$email = $_POST["email"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			$password = $_POST["password"];
			// $repassword = $_POST["repassword"];
			//ma hoa password
			$password = md5($password);
			//---
			$conn = Connection::getInstance();
			//kiem tra neu email chua ton tai thi insert ban ghi
			$queryCheck = $conn->prepare("select email from employees where email=:var_email");
			$queryCheck->execute(["var_email"=>$email]);
			if($queryCheck->rowCount() > 0)
				header("location:index.php?controller=account&action=register&notify=error");
			else{
				//insert ban ghi
				$query = $conn->prepare("insert into employees set tennv=:var_tennv,phong=:var_phong,email=:var_email,diachi=:var_diachi,sdt=:var_sdt,password=:var_password");
				$query->execute(["var_tennv"=>$tennv,"var_phong"=>$phong,"var_email"=>$email,"var_diachi"=>$diachi,"var_sdt"=>$sdt,"var_password"=>$password]);
				header("location:index.php?controller=account&action=login");
			}
		}
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//---
			$conn = Connection::getInstance();
			$query = $conn->prepare("select manv,email,password from employees where email=:var_email");
			$query->execute(["var_email"=>$email]);
			if($query->rowCount() > 0){
				//lay mot ban ghi
				$result = $query->fetch();
				if($password == $result->password){
					//dang nhap thanh cong
					$_SESSION['employee_id'] = $result->manv;
					$_SESSION['employee_email'] = $result->email;
					header("location:index.php");
				}else
					header("location:index.php?controller=account&action=login");
			}
		}
		public function modelLogout(){
			//huy cac bien session
			unset($_SESSION['employee_id']);
			unset($_SESSION['employee_email']);
			header("location:index.php?controller=account&action=login");
		}
	}
 ?>