<br>
<br>
<br>
<br>
    <div class="kenne-content_wrapper">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
              <aside>
                <div class="kenne-sidebar_categories">
                  <div class="kenne-categories_title first-child">
                    <h5>Tìm kiếm sản phẩm tại đây</h5> <br>
                  </div>
                  <div class="price-filter">
                    <!-- <div id="slider-range"></div> -->
                    <form class="price-slider-amount" method="POST" action="?act=search">
                      <div class="label-input">
                        <input type="text" name="content" placeholder="Tìm kiếm" />
                        <button class="filter-btn" name="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="kenne-sidebar-catagories_area">
                  <div class="kenne-sidebar_categories category-module">
                    <div class="kenne-categories_title">
                      <br>
                      <h5>Tìm kiếm theo thương hiệu</h5>
                    </div>
                    <div class="sidebar-categories_menu">
                      <ul>
                        <?php
                        require_once '../model/category.php';
                        $listCat = loadAll();
                        foreach($listCat as $cat) {?>
                        <li><a href="?act=search-by-id&id_dm=<?=$cat['id_dm']?>"><?=$cat['name_dm']?></a></li>

                        <?php } ?>

                      </ul>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
        
            <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
           
              <select class="select-filter" name="" id="select-filter">
                <option value="">Bộ lọc</option>
                <option value="?act=a-z">Giá tăng dần</option>
                <option value="?act= z-a">Giá giảm dần</option>
                <option value="?act=tu-nhien">Sân cỏ tự nhiên</option>
                <option value="?act=nhan-tao">Sân cỏ nhân tạo</option>
              </select>
              
              <section>
                <div class="container text-center">
                  <div class="row">
                  <?php
                  

foreach($Product as $sp){ ?>
    <div class="col-4 mt-3 mb-3 ">
    <a href="?act=viewProduct&id_sp=<?=$sp['id_sp']?>&id_dm=<?=$sp['id_dm']?>" class="text-black" style="text-decoration: none;">
    <form action="?act=add-to-cart" method="POST"  enctype="multipart/form-data">
      <div class="product">
        <input type="hidden" name="id_sp" value="<?=$sp['id_sp']?>">
        <img src="../img/<?=$sp['image_sp']?>" alt="Product 1" style="min-height: 270px; max-width:300px;">
        <input type="hidden" name="image_sp" value="<?=$sp['image_sp']?>">
        <input type="hidden" name="soluongcart" value="1" >
        <div class="overlay">
          <div class="content">
            <p><?=$sp['name_sp']?></p>
            <input type="hidden" name="name_sp" value="<?=$sp['name_sp']?>">
            <p class="text-danger fw-bold"><?=number_format((int)$sp['price_sp'], 0, ",", ".")?>₫ </p>
            <input type="hidden" name="price_sp" value="<?=$sp['price_sp']?>">
            <button type="submit" name="addToCart" class=" bg-success text-light rounded p-1" >Add to cart </button>
            <a href="?act=viewProduct&id_sp=<?=$sp['id_sp']?>&id_dm=<?=$sp['id_dm']?>" class="btn bg-dark text-light rounded p-1 ">View Details</a>

          </div>
        </div>
      </div>
      </form>
    </a>
    </div>

<?php } ?>
              </section>
              <div class="container mt-2 d-flex justify-content-center pagination" id="pagination">
                
          
               <?php
                  echo $hien_thi_so_trang;
               ?>
              
            </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $('.select-filter').change(function(){
          var value = $(this).find(':selected').val();
          alert(value);



        })
      


      
      </script>