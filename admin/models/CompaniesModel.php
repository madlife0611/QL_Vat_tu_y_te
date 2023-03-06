<?php 
	trait CompaniesModel{
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
			$query = $db->query("select * from companies order by macty desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from companies");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi macty truyen vao
		public function modelGetRecord(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from companies where macty=:var_macty");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_macty"=>$macty]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			$tencty = $_POST["tencty"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			$email = $_POST["email"];
			//update cot tencty
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update companies set tencty = :var_tencty, diachi=:var_diachi, sdt=:var_sdt, email=:var_email where macty=:var_macty");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_macty"=>$macty,"var_tencty"=>$tencty,"var_diachi"=>$diachi,"var_sdt"=>$sdt,"var_email"=>$email]);
			$logo ="";
			if($_FILES['logo']['name']!=""){
				//---
				//Lay anh de xoa
				$oldLogo=$db->query("select logo from companies where macty=$macty");
				if($oldLogo->rowCount()>0){
					$record =$oldLogo->fetch();
					//xoa anh
					if($record->logo!=""&& file_exists("../assets/upload/companies/".$record->logo))
						unlink("../assets/upload/companies/".$record->logo);
				}
				//---
				$logo=time()."_".$_FILES['logo']['name'];
				move_uploaded_file($_FILES['logo']['tmp_name'],"../assets/upload/companies/$logo");
				$query=$db->prepare("update companies set logo=:var_logo where macty=$macty");
				$query->execute(['var_logo'=>$logo]);
			}
			//---
		}
		public function modelCreate(){
			$tencty = $_POST["tencty"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			$email = $_POST["email"];
			//create
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//Upload anh logo
			$logo="";
			if($_FILES['logo']['name']!=""){
				$logo=time()."_".$_FILES['logo']['name'];
				move_uploaded_file($_FILES['logo']['tmp_name'],"../assets/upload/companies/$logo");
			}
			//chuan bi truy van
			$query = $db->prepare("insert into companies set tencty = :var_tencty, diachi = :var_diachi, sdt = :var_sdt, email = :var_email, logo=:var_logo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_tencty"=>$tencty,"var_diachi"=>$diachi,"var_sdt"=>$sdt,"var_email"=>$email,"var_logo"=>$logo]);
		}
		public function modelDelete(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//--
			//Lay anh de xoa
        	$oldLogo=$db->query("select logo from companies where macty=$macty");
        	if($oldLogo->rowCount()>0){
        		$record=$oldLogo->fetch();
        		//Xoa logo
        		if($record->logo!=""&&file_exists("../assets/upload/companies/".$record->logo))
        			unlink("../assets/upload/companies/".$record->logo);
        	}
			//chuan bi truy van
			$query = $db->prepare("delete from companies where macty=:var_macty");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_macty"=>$macty]);
		}
	}
 ?>