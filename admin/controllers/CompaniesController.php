<?php 
	//include file model vao day
	include "models/CompaniesModel.php";
	class CompaniesController extends Controller{
		//ke thua class CompaniesModel
		use CompaniesModel;
		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 10;
			//tinh so trang
			//ham ceil(so) se lay gia tri lam tron tren cua so do. VD: ceil(3.1) = 4
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("CompaniesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function update(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			//lay mot ban ghi
			$record = $this->modelGetRecord();
			//tao bien $action de biet duoc khi an nut submit thi trang se submit den dau
			$action = "index.php?controller=companies&action=updatePost&macty=$macty";
			//goi view, truyen du lieu ra view
			$this->loadView("CompaniesFormView.php",["record"=>$record,"action"=>$action]);
		}
		public function updatePost(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate();
			//quay tro lai trang companies
			header("location:index.php?controller=companies");
		}
		public function create(){
			//tao bien $action de biet duoc khi an nut submit thi trang se submit den dau
			$action = "index.php?controller=companies&action=createPost";
			//goi view, truyen du lieu ra view
			$this->loadView("CompaniesFormView.php",["action"=>$action]);
		}
		public function createPost(){
			//goi ham modelCreate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang companies
			header("location:index.php?controller=companies");
		}
		public function delete(){
			$macty = isset($_GET["macty"]) && $_GET["macty"] > 0 ? $_GET["macty"] : 0;
			//goi ham modelDelete
			$this->modelDelete();
			//quay tro lai trang categories
			header("location:index.php?controller=companies");
		}
	}
 ?>