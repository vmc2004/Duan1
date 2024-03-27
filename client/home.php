
<body>
      
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/banner.jpg" class="d-block w-100" alt="Image 1" >
          </div>
          <div class="carousel-item">
            <img src="../img/banner3.jpg" class="d-block w-100" alt="Image 2" >
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="banner">
        <img src="../img/banner4.jpg" class="d-block w-100" alt="Banner 1" style="height: 160px;">
      </div>
      <div class="banner">
        <img src="../img/banner1.png" class="d-block w-100" alt="Banner 2"  style="height: 160px;">
      </div>
    </div>
  </div>
  <hr>
</div> <br>
<br> 


<div class="service-area">
  <div class="container">
      <div class="service-nav">
          <div class="row">
              <div class="col" >
                  <div class="service-item">
                      <div class="content text-center">
                          <h4>Miễn phí vận chuyển</h4>
                          <p>Miễn phí vẫn chuyển cho mọi đơn hàng</p>
                      </div>
                  </div>
              </div>
              
              <div class="col">
                  <div class="service-item">
                      <div class="content text-center">
                          <h4>Hoàn tiền</h4>
                          <p>Bạn có 30 ngày đổi trả miễn phí</p>
                      </div>
                  </div>
              </div>
              
              <div class="col">
                  <div class="service-item">
                      <div class="content text-center">
                          <h4>Hỗ trợ trực tuyến</h4>
                          <p>Hỗ trợ 24/24</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


<div class="product-area ">
<div class="container bg-body-secondary">
<hr>
<div class="row d-flex ">
    <div class="col-lg-12">
        <div class="section-title">
            <h3 class="text-center">Sản phẩm nổi bật</h3>
            <div class="product-arrow"></div>
        </div>
    </div>
    <?php
require_once '../model/List.php';
$listProduct = top6Product();
foreach($listProduct as $sp){ ?>
    <div class="col-4 border p-3 bg-white d-flex justify-content-center">
<form action="?act=add-to-cart" method="POST"  enctype="multipart/form-data">
      <div class="product">
        <input type="hidden" name="id_sp" value="<?=$sp['id_sp']?>">
        <img src="../img/<?=$sp['image_sp']?>" alt="Product 1" >
        <input type="hidden" name="image_sp" value="<?=$sp['image_sp']?>">
        <input type="hidden" name="soluong" value="1" >
        <div class="overlay">
          <div class="content">
            <h3><?=$sp['name_sp']?></h3>
            <input type="hidden" name="name_sp" value="<?=$sp['name_sp']?>">
            <p> $<?=$sp['price_sp']?> </p>
            <input type="hidden" name="price_sp" value="<?=$sp['price_sp']?>">
           <a href="?act=add-to-cart"> <button type="submit" name="addToCart" class=" bg-success text-light rounded p-1" >Add to cart </button></a>
      <a href="?act=viewProduct&id_sp=<?=$sp['id_sp']?>" class="btn bg-dark text-light rounded p-1 ">View Details</a>
          </div>
        </div>
      </div>
      </form>
    </div>

<?php } ?>




</div>

<br>
<br>
</div>



</body>
