<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/styles.css">
    <!-- link chart morris -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/styles.css">
    <style type="text/css">
        
        
    </style>
    <!-- color: #f48120;//
    #224099;//xanh đậm -->
</head>
<body>
    <div class = "sidebar">
        <div class="logo">
            <img src="../assets/images/logo-HP.png" style="width:auto; height:80px;"> 
        </div>
        <div class="menu">
            <div class="card card-sidebar">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="index.php"><i class="far fa-clipboard"></i> Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a href="index.php?controller=categories"><i class="fas fa-list"></i> Danh mục vật tư</a>
                </li>
                <li class="list-group-item">
                    <a href="index.php?controller=products"><i class="fas fa-list"></i> Quản lý vật tư</a>
                </li>
                <li class="list-group-item">
                    <a href="index.php?controller=companies"><i class="fas fa-list"></i> Danh sách nhà cung ứng</a>
                </li>
                <li class="list-group-item">
                    <a href="index.php?controller=orders"><i class="fas fa-list"></i> Quản lý yêu cầu</a>
                </li>
                <li class="list-group-item">
                    <a href="index.php?controller=users"><i class="fas fa-list"></i>  Danh sách tài khoản</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <header class="" style="border-bottom: 2px solid #224099;">
            <div class="left_header">
                <button id="action_sidebar" class="btn btn-hover action_sidebar" style="border-color: #00adee;">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="right_header">
                <div class="dropdown">
                  <button class="btn btn-hover dropdown" style="border-color: #00adee;">
                    <i class="far fa-users"></i>
                  </button>
                  <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">
                        <i class="far fa-user"></i><span class="mr-2"> Profile</span>
                    </a>
                    <a class="dropdown-item" href="#">
                    <i class="far fa-cog"></i><span class="mr-2"> Setting</span>
                    </a>
                    <a class="dropdown-item" href="index.php?controller=login&action=logout">
                    <i class="far fa-sign-out-alt"></i><span class="mr-2"> Log out</span>
                    </a>
                  </div>
                </div>
            </div>
        </header>
        <!-- đổ dữ liệu các view vào đây -->
        <div class="container-fluid">
            <?php echo $this->view; ?>
        </div>        
    </div>
</body>
    <script type="text/javascript">
        function actionSidebar() {
            var left = $('.sidebar').css('left');
            if(left == '0px'){
                $('.sidebar').css('left', '-300px');
                $('.content').css('margin-left', '0');
            }else{
                $('.sidebar').css('left', '0px');
                $('.content').css('margin-left', '300px');
                $('.content').css('width', '100%');
            }
        }

        $('.action_sidebar').on('click', function(){
            var left = $('.sidebar').css('left');
            if(left == '0px'){
                $('.sidebar').css('left', '-300px');
                $('.content').css('margin-left', '0');
            }else{
                $('.sidebar').css('left', '0px');
                $('.content').css('margin-left', '300px');
                $('.content').css('width', '100%');
            }
        });
    </script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script type="text/javascript" src="../assets/admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/admin/js/jquery.min.js"></script>
   
</html>