<?php 
	//include file model vao day
	include "models/ProductsModel.php";
	class ProductsController extends Controller
	{
		//ke thua class ProductsModel
		use ProductsModel;
		public function category(){
			$madm =isset($_GET["madm"]) ? $_GET["madm"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotalRecordCategories()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadCategories($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("CategoryProductsView.php",["data"=>$data,"numPage"=>$numPage, "madm"=>$madm]);
		}
		public function company(){
			$macty =isset($_GET["macty"]) ? $_GET["macty"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotalRecordCompanies()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadCompanies($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("CompanyProductsView.php",["data"=>$data,"numPage"=>$numPage, "macty"=>$macty]);
		}
		//chi tiet san pham
		public function detail(){
			$masp = isset($_GET["masp"]) && $_GET["masp"] > 0 ? $_GET["masp"] : 0;
			$record = $this->modelGetRecord($masp);	
			//goi view, truyen du lieu ra view
			$this->loadView("DetailProductsView.php",["record"=>$record,"masp"=>$masp]);
		}
	}
 ?>