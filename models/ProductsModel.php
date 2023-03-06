<?php 
	trait ProductsModel{
		//lay ve danh sach cac ban ghi
		public function modelReadCategories($recordPerPage){
			$madm =isset($_GET["madm"]) ? $_GET["madm"] : 0;
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where madm in (select madm from categories where madm=$madm or danhmuccha=$madm) limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecordCategories(){
			$madm =isset($_GET["madm"]) ? $_GET["madm"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where madm in (select madm from categories where madm=$madm or danhmuccha=$madm)");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		public function modelReadCompanies($recordPerPage){
			$macty =isset($_GET["macty"]) ? $_GET["macty"] : 0;
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where macty in (select macty from companies where macty=$macty) limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecordCompanies(){
			$macty =isset($_GET["macty"]) ? $_GET["macty"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where macty in (select macty from companies where macty=$macty)");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay 1 ban ghi category
		public function getCategory($madm){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where madm = $madm");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetch();
		}
		//lay 1 ban ghi companies
		public function getCompany($macty){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from companies where macty = $macty");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetch();
		}

		//lay mot ban ghi tuong ung voi madm truyen vao
		public function modelGetRecord(){
			$masp = isset($_GET["masp"]) && $_GET["masp"] > 0 ? $_GET["masp"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from products where masp=:var_masp");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_masp"=>$masp]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
	}
 ?>