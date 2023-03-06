<?php 
	trait UsersModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from users order by matk desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from users");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi matk truyen vao
		public function modelGetRecord(){
			$matk = isset($_GET["matk"]) && $_GET["matk"] > 0 ? $_GET["matk"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from users where matk=:var_matk");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_matk"=>$matk]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$matk = isset($_GET["matk"]) && $_GET["matk"] > 0 ? $_GET["matk"] : 0;
			$tentk = $_POST["tentk"];
			$matkhau = $_POST["matkhau"];
			$email = $_POST["email"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			//update cot tentk
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update users set tentk = :var_tentk, email = :var_email, diachi = :var_diachi, sdt = :var_sdt where matk=:var_matk");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_matk"=>$matk,"var_tentk"=>$tentk,"var_email"=>$email,"var_sdt"=>$sdt,"var_diachi"=>$diachi]);
			//neu matkhau khong rong thi update matkhau
			if($matkhau != ""){
				//ma hoa matkhau
				$matkhau = md5($matkhau);
				//chuan bi truy van
				$query = $db->prepare("update users set matkhau = :var_matkhau where matk=:var_matk");
				//thuc thi truy van, co truyen tham so vao cau lenh sql
				$query->execute(["var_matk"=>$matk,"var_matkhau"=>$matkhau]);
			}
		}
		public function modelCreate(){
			$tentk = $_POST["tentk"];
			$matkhau = $_POST["matkhau"];
			$email = $_POST["email"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			//ma hoa matkhau
			$matkhau = md5($matkhau);
			//create
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("insert into users set tentk = :var_tentk, email = :var_email, matkhau = :var_matkhau, diachi = :var_diachi, sdt = :var_sdt");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_tentk"=>$tentk,"var_email"=>$email,"var_matkhau"=>$matkhau,"var_sdt"=>$sdt,"var_diachi"=>$diachi]);
		}
		public function modelDelete(){
			$matk = isset($_GET["matk"]) && $_GET["matk"] > 0 ? $_GET["matk"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("delete from users where matk=:var_matk");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_matk"=>$matk]);
		}
	}
 ?>