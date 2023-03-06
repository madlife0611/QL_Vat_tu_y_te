<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/font-awesome.css"> -->
    <!-- <script type="text/javascript" src="assets/admin/js/jquery.min221b.js" ></script> -->
	<title>User-HomePage</title>
	<!-- link chart morris -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<style type="text/css">
		body{
			padding-bottom: 50px;
		}
		.t-white{
			color: #ffffff;
		}
		
		.dropdown{
			position: relative;
			display: inline-block;
		}
		.dropdown-content{
			display: none;
			position: absolute;
			
			background-color: #ffffff;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			list-style-type: none;
			transition: 1s;
		}
		.dropdown:hover .dropdown-content{
			display: block;
			z-index: 1;
		}
		.dropdown-item{
			padding: 0.5rem;
		}
		
		.btn-hover{
            color:#f48120; background-color: #224099;
        }
        .btn-hover:hover{
            color:#224099; background-color: #f48120;
        }
        .table-data th{
            color: #224099;
        }
        /*.table-data a{
            color: #224099;
        }*/
        /*.table-data a:hover{
            color: #f48120;
        }*/

		footer{
			position: fixed;
			bottom: 0;
			margin-top: 1rem;
			padding: 10px;
			background-color: #224099;
			width: 100%;
		}
		b{
			color:#224099 ;
		}
	</style>
</head>
<body class="index">

	<?php include "views/HeaderView.php"; ?>

	<main style="height: auto; margin-top: 1rem; padding: 0px 10px">
		<?php echo $this->view; ?>
	</main>

	<footer>
		<div class="container">
			<span class="t-white fw-bold"><i class="far fa-copyright"></i>Copyright: minhphamhaui@gmail.com </span>
		</div>
	</footer>
</body>
	
    <script type="text/javascript" src="assets/admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/admin/js/scripts.js"></script>
</html>