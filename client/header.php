
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <script src="lib/font-fontawesome-ae333ffef2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
    <style>



    </style>
    <link rel="stylesheet" href="../public/css.css">
    <link rel="stylesheet" href="../public//profile.css">
    <link rel="stylesheet" href="../public//user.css">
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <script src="../lib/bootstrap.css"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../lib/font-fontawesome-ae333ffef2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
  <body>
    <header>
      <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
          <div class="container">
            <a class="navbar-brand" href="index.php">
              <img src="../img/tải xuống.png" alt="Logo website" width="70" >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Iphone</a></li>
                    <li><a class="dropdown-item" href="#">Samsung</a></li>
                    <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                    <li><a class="dropdown-item" href="index.php?act=all-product">Tất cả sản phẩm</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="ms-auto">
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          
            <div class="pt-2 pe-2">
              <button class="btn position-relative pt-2 pe-3">
                <a href="?act=cart"> <i class="fa-solid fa-cart-shopping fa-2xl text-dark"></i></a>
                <span class="badge bg-light text-danger rounded-pill position-absolute top-0 end-0">
<?php 
require_once '../model/cart.php';
$count = count_sp();
echo $count['0']['COUNT(id_cart)'];
?>

                </span>
              </button>
            </div>
           
            
            <div class="ms-2">
              <?php
               if(isset($_SESSION['user'])){
              ?>
             <div class="header-action" style="width: 150px; height: 30px;" >
                    <div class="user-profile d-flex " >
                        <img src="../img/<?=$_SESSION['user']['avatar']?>" alt="User Avatar" class="user-avatar " width="40px">
                        <p><?=$_SESSION['user']['name_user']?></p>
                        <div class="submenu">
                            <ul>
                              
                            <?php
                            
                            if (($_SESSION['user']['role']) === 'Admin' ){ ?>
                                <li><a href="/PlayMobile/admin/index.php">Truy cập trang admin</a></li>
                            <?php } ?>
                                <li><a href="index.php?act=profile">Trang cá nhân</a></li>
                                <li><a href="index.php?act=my-courses">Đơn hàng của tôi</a></li>
                                <li><a href="index.php?act=logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


              <?php
               }
               else{
                ?>
                <button class="btn">
                <a href="index.php?act=login"> <i class="fa-solid fa-user fa-2xl text-dark"> </i></a>
              </button>
              <?php }  ?>
            
            </div>
          </div>
        </nav>
      </div> 
      
      
    </header>