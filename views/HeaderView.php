	
	<style type="text/css">
		.header-top{
			background-color: #224099;
			padding: 10px;
		}
		.header-top-link a{
			margin-left: 25px;
		}

		.header-mid{
			background-color: #ffffff;
		}
		.header-menu{
			padding: 0px 10px;
			font-weight: bold;
			text-transform: uppercase;
			color: #224099;
		}

		.header-search{
			padding: 0px 10px;
			font-weight: bold;
			text-transform: uppercase;
			
		}
		.header-search input{
			border: 2px solid #224099;
			border-radius: 20px;
			height: 50px;
			width: 250px;
			position: relative;
			padding: 10px;
		}
		.header-search button{
			border: 2px solid #224099;
			border-radius: 20px;
			height: 50px;
			width: 50px;
			background-color: #224099;
			color: #ffffff;
		}
		.header-search button:hover{
			background-color: #f48120;
			border: 2px solid #f48120;
			color: #ffffff;
		}
		.hr-under-header{
			color: #224099;
		}
	</style>
	<header>
		<div class="header-top">
			<div class="container d-flex justify-content-between">
				<div name="phone"><span class="t-white fw-bold">HOTLINE: 0123-456-789</span></div>
				<div class="dropdown">
                  <span class="t-white fw-bold dropdown">
                    Tài khoản
                  </span>
                  <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                  	<?php if(isset($_SESSION["employee_email"])): ?>
                  		<a class="dropdown-item" href="#">
                        <i class="far fa-user"></i><span class="mr-2"> <?php echo $_SESSION["employee_email"]; ?></span>
                    </a>
                    <a class="dropdown-item" href="index.php?controller=account&action=logout">
                    <i class="far fa-sign-out-alt"></i><span class="mr-2"> Log out</span>
                    </a>
                    <?php else: ?>
                    <a class="dropdown-item" href="index.php?controller=account&action=login">
                        <i class="far fa-user"></i><span class="mr-2"> Đăng nhập</span>
                    </a>
                    <a class="dropdown-item" href="index.php?controller=account&action=register">
                    <i class="far fa-registered"></i><span class="mr-2"> Đăng ký</span>
                    </a>
                    <?php endif; ?> 
                  </div>
                </div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light">
		  <div class="container">
		    <a class="navbar-brand" href="#">
		    	<div class="header-logo">
					<img src="./assets/images/logo-HP.png" style="width:200px; height:auto;">
				</div>
			</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0 header-menu">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php" style="color:#f48120;">Trang chủ</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link" href="#" style="color: #224099;">
		            Danh mục
		          </a>
		          <?php 
		              $db = Connection::getInstance();
					    $query = $db->query("select * from categories order by madm asc");
					    $categories = $query->fetchAll();
		             ?>
		          <ul class="dropdown-content">
		          	<?php foreach($categories as $rows): ?>
		            <li><a class="dropdown-item" href="index.php?controller=products&action=category&madm=<?php echo $rows->madm; ?>"><b><?php echo $rows->tendm;?>: </b><?php echo $rows->mota; ?></a></li>
		            <?php endforeach; ?>

		          </ul>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link" href="#" style="color: #224099;">
		            Nhà cung cấp
		          </a>
		          <?php 
		              $db = Connection::getInstance();
					    $query = $db->query("select * from companies order by macty asc");
					    $companies = $query->fetchAll();
		             ?>
		          <ul class="dropdown-content">
		          	<?php foreach($companies as $rows): ?>
		            <li><a class="dropdown-item" href="index.php?controller=products&action=company&macty=<?php echo $rows->macty; ?>"><b><?php echo $rows->tencty;?></b></a></li>
		            <?php endforeach; ?>

		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index.php?controller=request" style="color: #224099;">Request</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index.php?controller=contact" style="color: #224099;">Liên hệ</a>
		        </li>
		      </ul>
		      <div>
		      	<div class="header-search d-flex">
		        <input class="input-control me-2" autocomplete="off" type="search" placeholder="  Tìm kiếm vật tư" id="key" aria-label="Search">
		        <button class="btn " type="submit"><i class="fas fa-search" id="btnSearch"></i></button>
		        </div>
		      	<div class="smart-search">
		          <ul>
		            <li><a href="#">Sản phẩm 1</a></li>
		            <li><a href="#">Sản phẩm 1</a></li>
		            <li><a href="#">Sản phẩm 1</a></li>
		          </ul>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		</nav>
	</header>
	<style type="text/css">
      .smart-search{position: absolute; border: 1px solid #224099;border-radius: 20px; margin-left: 10px; width: 250px; padding-left: 10px; background: white; height: 250px; overflow: scroll; z-index: 2; display: none;}
      .smart-search ul{padding: 0px; margin: 0px; list-style: none;}
      .smart-search a{text-decoration: none; color: black;}
    </style>
    <script type="text/javascript">
      //tinh nang nay phai dung ket hop voi jquery -> phai load thu vien jquery
      $(document).ready(function(){
        //bat su kien click cua id=btnSearch
        $("#btnSearch").click(function(){
          var key = $("#key").val();
          //di chuyen den url tim kiem
          location.href="index.php?controller=search&action=name&key="+key;
        });
        //---
        $(".input-control").keyup(function(){
          var strKey = $("#key").val();
          if(strKey.trim() == "")
            $(".smart-search").attr("style","display:none");
          else{
            $(".smart-search").attr("style","display:block");
            //---
            //su dung ajax de lay du lieu
            $.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
              //clear cac the li ben trong the ul
              $(".smart-search ul").empty();
              //them du lieu vua lay duoc bang ajax vao the ul
              $(".smart-search ul").append(data);
            });
            //---
          }
        });
        //---
      });
    </script>
<hr class="container hr-under-header">