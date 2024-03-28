
<body>
      
<div class="container">
  <!-- Phần banner  -->
  <div class="row">
    <div class="col">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class=" carousel-inner">
          <div class="carousel-item active">
            <img src="https://theme.hstatic.net/200000278317/1000929405/14/slideshow_1.jpg?v=1170" class="d-block w-100" alt="Image 1" >
          </div>
          <div class="carousel-item">
            <img src="https://theme.hstatic.net/200000278317/1000929405/14/slideshow_4.jpg?v=1170" class="d-block w-100" alt="Image 2" >
          </div>
          <div class="carousel-item">
            <img src="https://theme.hstatic.net/200000278317/1000929405/14/slideshow_7.jpg?v=1170" class="d-block w-100" alt="Image 3" >
          </div>
          <div class="carousel-item">
            <img src="https://theme.hstatic.net/200000278317/1000929405/14/slideshow_7.jpg?v=1170" class="d-block w-100" alt="Image 3" >
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
    
  </div>

  <hr>
</div> <br>
<br> 
<!-- hết banner  -->


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
    <div class="col-lg-3 col-md-4 col-3 pt-3 pb-3 bg-light ">
<form action="?act=add-to-cart" method="POST"  enctype="multipart/form-data">
      <div class="product " >
        <input type="hidden" name="id_sp" value="<?=$sp['id_sp']?>">
        <img src="../img/<?=$sp['image_sp']?>" alt="Product 1" style="min-height: 270px; max-width:300px;" >
        <input type="hidden" name="image_sp" value="<?=$sp['image_sp']?>">
        <input type="hidden" name="soluong" value="1" >
        <div class="overlay">
          <div class="content">
            <p><?=$sp['name_sp']?></p>
            <input type="hidden" name="name_sp" value="<?=$sp['name_sp']?>">
            <p class="text-danger fw-bold"> <?=$sp['price_sp']?>₫ </p>
            <input type="hidden" name="price_sp" value="<?=$sp['price_sp']?>">
            <button class="add-to-cart btn-success text-light rounded shadow " style="height: 33px;">Add To Cart</button>
            <a href="index.php?act=viewProduct&id_sp=<?=$sp['id_sp']?>&id_dm=<?=$sp['id_dm']?>"style="height: 33px;" class="btn bg-dark text-light rounded p-1 ">View Details</a>
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
