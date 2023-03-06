<?php 
	trait CategoriesModel{
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
			$query = $db->query("select * from categories where danhmuccha = 0 order by madm desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where danhmuccha = 0");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//hien thi cac danh muc cap con
		public function modelCategoriesSub($madm){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where danhmuccha = $madm");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
		}
		//hien thi cac danh muc cap 0
		public function modelCategories($madm){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where danhmuccha = 0 and madm <> $madm");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
		}
		//lay mot ban ghi tuong ung voi madm truyen vao
		public function modelGetRecord(){
			$madm = isset($_GET["madm"]) && $_GET["madm"] > 0 ? $_GET["madm"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from categories where madm=:var_madm");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_madm"=>$madm]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$madm = isset($_GET["madm"]) && $_GET["madm"] > 0 ? $_GET["madm"] : 0;
			$tendm = $_POST["tendm"];
			$mota = $_POST["mota"];
			$danhmuccha = $_POST["danhmuccha"];
			//update cot tendm
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update categories set tendm = :var_tendm, mota = :var_mota, danhmuccha = :var_danhmuccha where madm=:var_madm");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_madm"=>$madm,"var_tendm"=>$tendm,"var_mota"=>$mota,"var_danhmuccha"=>$danhmuccha]);			
		}
		public function modelCreate(){
			$tendm = $_POST["tendm"];
			$mota = $_POST["mota"];
			$danhmuccha = $_POST["danhmuccha"];
			//create
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van}		    
			$query = $db->prepare("insert into categories set tendm = :var_tendm, mota = :var_mota, danhmuccha = :var_danhmuccha");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_tendm"=>$tendm,"var_mota"=>$mota,"var_danhmuccha"=>$danhmuccha]);
		}
		public function modelDelete(){
			$madm = isset($_GET["madm"]) && $_GET["madm"] > 0 ? $_GET["madm"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("delete from categories where madm=:var_madm or danhmuccha=:var_madm");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_madm"=>$madm]);
		}
	}
 ?>