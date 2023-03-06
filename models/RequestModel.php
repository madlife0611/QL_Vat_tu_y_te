<?php
	trait RequestModel{		
		public function requestAdd($masp){
		    if(isset($_SESSION['request'][$masp])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['request'][$masp]['number']++;
		    } else {
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where masp=:masp");
		        $query->execute(array("masp"=>$masp));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['request'][$masp] = array(
		            'masp' => $masp,
		            'tensp' => $product->tensp,
		            'anh' => $product->anh,
		            'number' => 1,
		            'gianhap' => $product->gianhap
		        );
		    }
		}
		public function requestAddWithNumber($masp,$quantity){
		    if(isset($_SESSION['request'][$masp])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['request'][$masp]['number'] += $quantity;
		    } else {
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where masp=:masp");
		        $query->execute(array("masp"=>$masp));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['request'][$masp] = array(
		            'masp' => $masp,
		            'tensp' => $product->tensp,
		            'anh' => $product->anh,
		            'number' => $quantity,
		            'gianhap' => $product->gianhap
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function requestUpdate($masp, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['request'][$masp]);
		    } else {
		        $_SESSION['request'][$masp]['number'] = $number;
		    }
		}
		/**
		 * @param int
		 */
		public function requestDelete($masp){
		    unset($_SESSION['request'][$masp]);
		}

		public function requestTotal(){
		    $total = 0;
		    foreach($_SESSION['request'] as $product){
		        $total += $product['gianhap'] * $product['number'];
		    }
		    return $total;
		}

		public function requestNumber(){
		    $number = 0;
		    foreach($_SESSION['request'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}

		public function requestList(){
		    return $_SESSION['request'];
		}

		public function requestDestroy(){
		    $_SESSION['request'] = array();
		}
		//=============
		//checkout
		public function requestCheckOut(){
			$conn = Connection::getInstance();			
			//lay masp vua moi insert
			$manv = $_SESSION["employee_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$price = $this->requestTotal();
			$query = $conn->prepare("insert into orders set manv=:manv, date=now(),price=:price");
			$query->execute(array("manv"=>$manv,"price"=>$price));
			//lay masp vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["request"] as $product){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, masp=:masp, price=:price, quantity=:quantity");
				$query->execute(array("order_id"=>$order_id,"masp"=>$product["masp"],"price"=>$product["gianhap"],"quantity"=>$product["number"]));
			}
			//xoa gio hang
			unset($_SESSION["request"]);
		}
		//=============
	}	
?>