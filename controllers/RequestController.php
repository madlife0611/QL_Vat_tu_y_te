<?php 
	include "models/RequestModel.php";
	class RequestController extends Controller{
		use RequestModel;
		public function __construct(){
			//kiem tra neu request chua ton tai thi khoi tao no
			if(isset($_SESSION['request']) == false)
				$_SESSION['request'] = array();
		}
		//hien thi danh sach cac san pham 
		public function index(){
			$this->loadView("RequestView.php");
		}
		//them san pham vao request
		public function create(){
			$masp = isset($_GET["masp"]) ? $_GET['masp'] : 0;
			//goi ham trong model
			$this->requestAdd($masp);
			header("location:index.php?controller=request");
		}
		//xoa san pham khoi request
		public function delete(){
			$masp = isset($_GET["masp"]) ? $_GET["masp"] : 0;
			//goi ham trong model
			$this->requestDelete($masp);
			header("location:index.php?controller=request");
		}
		//xoa toan bo san pha khoi request
		public function destroy(){
			//goi ham trong model
			$this->requestDestroy();
			header("location:index.php?controller=request");
		}
		//sap nhat so luong san pham
		public function update(){
			foreach($_SESSION['request'] as $product){
				$name = "product_".$product["masp"];
				$number = $_POST[$name];
				$this->requestUpdate($product["masp"],$number);
			}
			header("location:index.php?controller=request");
		}
		//thanh toan request
		public function checkout(){
			//kiem tra neu user chua dang nhap thi yeu cau dang nhap
			if(isset($_SESSION["employee_email"]) == false)
				header("location:index.php?controller=account&action=login");
			else{
				//goi ham requestCheckOut trong model
				$this->requestCheckOut();
				header("location:index.php?controller=request");
			}
		}
	}
 ?>