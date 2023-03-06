<?php 
	trait HomeModel{
		//lay danh sach danh muc co danhmuccha=0 thu tu madm tang dan
		public function modelCategories(){
			$db = Connection::getInstance();
		    $query = $db->query("select * from categories where danhmuccha=0 order by madm asc");
		    return $query->fetchAll();
		}
		//tinh tong cac products
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories,products where categories.madm=products.madm");
			//tra ve so luong ban ghi
			return $query->fetchAll();
		}		
	}
 ?>