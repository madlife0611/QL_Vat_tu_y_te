<?php 
	trait OrdersModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"])&& $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders");
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
		//lay 1 ban ghi category
		public function getCompany($macty){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from companies where macty = $macty");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetch();
		}
		//lay ban ghi ho va ten
		public function modelGetEmployee($manv){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from employees where manv=$manv");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		//chi tiet don hang
		public function modelOrdersDetail($order_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orderdetails where order_id=$order_id");
			//tra ve mot ban ghi
			return $query->fetchAll();
		}
		public function modelGetProduct($masp){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where masp=$masp");
			//tra ve nhieu ban ghi
			return $query->fetch();
		}
		public function modelGetOrdersDetail($order_id, $masp){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orderdetails where order_id=$order_id and masp=$masp");
			//tra ve nhieu ban ghi
			return $query->fetch();
		}
		//giao hang
		public function modelDelivery($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("update orders set status = 1 where id=$id");
		}
	}
 ?>