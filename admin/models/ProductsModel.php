<?php 
	trait ProductsModel{
		
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//---sap xep theo khau hao, gia nhap, ngay nhap---------------
			$realTime = time();
			$sqlOrder = "";
			$order = isset($_GET["order"]) ? $_GET["order"] : "";
			switch ($order) {
				case 'khauhaotang':
					$sqlOrder = "order by (ceil(($realTime-ngaynhap)/60/60/24)*khauhaoperday+solansudung*khauhaoperused) asc";
					break;
				case 'khauhaogiam':
					$sqlOrder = "order by (ceil(($realTime-ngaynhap)/60/60/24)*khauhaoperday+solansudung*khauhaoperused) desc";
					break;
				case 'giatang':
					$sqlOrder = "order by gianhap asc";
					break;
				case 'giagiam':
					$sqlOrder = "order by gianhap desc";
					break;
				case 'ngaynhaptang':
					$sqlOrder = "order by ngaynhap asc";
					break;
				case 'ngaynhapgiam':
					$sqlOrder = "order by ngaynhap desc";
					break;
				default:
					$sqlOrder = "order by masp desc";
					break;
			}
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products $sqlOrder limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products");
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
		public function modelCategories(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where danhmuccha = 0");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
		}
		public function modelCompanies(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from companies");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
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
		//lay 1 ban ghi category
		public function getCompany($macty){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from companies where macty = $macty");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetch();
		}
		//lay mot ban ghi tuong ung voi masp truyen vao
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
		public function modelUpdate(){
			$masp = isset($_GET["masp"]) && $_GET["masp"] > 0 ? $_GET["masp"] : 0;
			$tensp = $_POST["tensp"];
			$mota = $_POST["mota"];
			$trangthai = isset($_POST["trangthai"]) ? 1 : 0;
			$isvattu = isset($_POST["isvattu"]) ? 1 : 0;
			$solansudung = $_POST["solansudung"];
			$gianhap = $_POST["gianhap"];
			$khauhaoperday = $_POST["khauhaoperday"];
			$khauhaoperused = $_POST["khauhaoperused"];
			$madm = $_POST["madm"];
			$macty = $_POST["macty"];
			$ngaynhap = $_POST["ngaynhap"];
			//update cot tensp
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update products set tensp = :var_tensp, madm = :var_madm, macty = :var_macty, mota = :var_mota, isvattu = :var_isvattu,trangthai = :var_trangthai,solansudung = :var_solansudung,gianhap = :var_gianhap,khauhaoperday = :var_khauhaoperday,khauhaoperused = :var_khauhaoperused, ngaynhap=:var_ngaynhap where masp=:var_masp");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_masp"=>$masp,"var_tensp"=>$tensp,"var_madm"=>$madm,"var_macty"=>$macty,"var_mota"=>$mota,"var_isvattu"=>$isvattu,"var_trangthai"=>$trangthai,"var_solansudung"=>$solansudung,"var_gianhap"=>$gianhap,"var_khauhaoperday"=>$khauhaoperday,"var_khauhaoperused"=>$khauhaoperused,"var_ngaynhap"=>$ngaynhap]);	
			//---
			//neu user upload anh thi thuc hien upload
			$anh = "";
			if($_FILES['anh']['name'] != ""){
				//---
				//lay anh de xoa
				$oldAnh = $db->query("select anh from products where masp=$masp");
				if($oldAnh->rowCount() > 0){
					$record = $oldAnh->fetch();
					//xoa anh
					if($record->anh != "" && file_exists("../assets/upload/products/".$record->anh))
						unlink("../assets/upload/products/".$record->anh);
				}
				//---
				$anh = $_FILES['anh']['name'];
				move_uploaded_file($_FILES['anh']['tmp_name'], "../assets/upload/products/$anh");
				$query = $db->prepare("update products set anh=:var_anh where masp=$masp");
				$query->execute(['var_anh'=>$anh]);
			}
			//---
		}
		public function modelCreate(){
			$tensp = $_POST["tensp"];
			$mota = $_POST["mota"];
			$trangthai = isset($_POST["trangthai"]) ? 1 : 0;
			$isvattu = isset($_POST["isvattu"]) ? 1 : 0;
			$solansudung = $_POST["solansudung"];
			$gianhap = $_POST["gianhap"];
			$khauhaoperday = $_POST["khauhaoperday"];
			$khauhaoperused = $_POST["khauhaoperused"];
			$madm = $_POST["madm"];
			$macty = $_POST["macty"];
			$ngaynhap = $_POST["ngaynhap"];
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//neu user upload anh thi thuc hien upload
			$anh="";
			if($_FILES['anh']['name']!=""){
				$anh=$_FILES['anh']['name'];
				move_uploaded_file($_FILES['anh']['tmp_name'],"../assets/upload/products/$anh");
			}
			// if($ngaynhap == ""){
			// 	//chuan bi truy van
			// 	$query = $db->prepare("insert into products set tensp = :var_tensp, madm = :var_madm,macty = :var_macty, mota = :var_mota, isvattu = :var_isvattu,trangthai = :var_trangthai,solansudung = :var_solansudung,gianhap = :var_gianhap,khauhaoperday = :var_khauhaoperday,khauhaoperused = :var_khauhaoperused, ngaynhap=getdate(), anh=:var_anh");
			// 	//thuc thi truy van, co truyen tham so vao cau lenh sql
			// 	$query->execute(["var_tensp"=>$tensp,"var_madm"=>$madm,"var_macty"=>$macty,"var_mota"=>$mota,"var_isvattu"=>$isvattu,"var_trangthai"=>$trangthai,"var_solansudung"=>$solansudung,"var_gianhap"=>$gianhap,"var_khauhaoperday"=>$khauhaoperday,"var_khauhaoperused"=>$khauhaoperused,"var_anh"=>$anh]);
			// }else{
				//chuan bi truy van
				$query = $db->prepare("insert into products set tensp = :var_tensp, madm = :var_madm,macty = :var_macty, mota = :var_mota, isvattu = :var_isvattu,trangthai = :var_trangthai,solansudung = :var_solansudung,gianhap = :var_gianhap,khauhaoperday = :var_khauhaoperday,khauhaoperused = :var_khauhaoperused, ngaynhap=:var_ngaynhap, anh=:var_anh");
				//thuc thi truy van, co truyen tham so vao cau lenh sql
				$query->execute(["var_tensp"=>$tensp,"var_madm"=>$madm,"var_macty"=>$macty,"var_mota"=>$mota,"var_isvattu"=>$isvattu,"var_trangthai"=>$trangthai,"var_solansudung"=>$solansudung,"var_gianhap"=>$gianhap,"var_khauhaoperday"=>$khauhaoperday,"var_khauhaoperused"=>$khauhaoperused,"var_ngaynhap"=>$ngaynhap,"var_anh"=>$anh]);
			// }				
		}
		public function modelDelete(){
			$masp = isset($_GET["masp"]) && $_GET["masp"] > 0 ? $_GET["masp"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//---
			//lay anh de xoa
			$oldAnh = $db->query("select anh from products where masp=$masp");
			if($oldAnh->rowCount() > 0){
				$record = $oldAnh->fetch();
				//xoa anh
				if($record->anh != "" && file_exists("../assets/upload/products/".$record->anh))
					unlink("../assets/upload/products/".$record->anh);
			}
			//---
			//chuan bi truy van
			$query = $db->prepare("delete from products where masp=:var_masp");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_masp"=>$masp]);
		}
		public function modelUpdateSolansudung(){
		    $masp = isset($_GET["masp"]) && $_GET["masp"] > 0 ? $_GET["masp"] : 0;
			$solansudung = $_POST["solansudung"];
			//update cot tensp
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update products set solansudung = :var_solansudung where masp=:var_masp");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_masp"=>$masp,"var_solansudung"=>$solansudung]);	
			//---
			
		}
	}
 ?>