


    <section class="container mt-4">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center p-1 border mb-1 pb-9" >
                <img src="../img/<?=$Product['image_sp']?>" alt="Product Image" class="img-fluid" name="image">
            </div>
            <div class="col-lg-6">
                <h2><?=$Product['name_sp']?> </h2>
                <h3 class="text-danger">$<?=$Product['price_sp']?></h3>
    
                <!-- Chọn màu -->
                <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <h3>Dung lượng</h3>
                        <select class="form-control" name="so_luong">
                          <option value="1">64GB</option>
                          <option value="2">128GB</option>
                          <option value="3">512GB</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <h3>Chọn số lượng</h3>
                        <div class="form-group">
                          <input type="number" value="1" class="form-control" id="quantity" name="quantity">
                          <br>
                          <br>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                <button class="btn btn-success">Thêm vào giỏ hàng</button>
                <button class="btn btn-danger">Mua ngay</button>
            </div>
        </div>
    
        <!-- Thông số kỹ thuật -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3>Thông số kỹ thuật</h3>
                <ul>
                    
                </ul>
            </div>
        </div>
      
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3>Mô tả chi tiết</h3>
               <p>
               <?=$Product['desc_sp']?>
               </p>
            </div>
        </div>
        <h3>Sản phẩm khác</h3>
       <div class="container row">
        
       
       <?php 
               require_once '../model/list.php';
               $id_dm = $_GET['id_dm'];
               $Product = productrelated ($id_dm);
               foreach($Product as $sp){ ?>
      <div class="col-3 border p-3 pd-3  ">
      <div class="product" >
        <img src="../img/<?=$sp['image_sp']?>" alt="Image Product" style="min-height: 270px; max-width:300px;" >
        <div class="overlay">
          <div class="content">
            <h3><?=$sp['name_sp']?></h3>
            <p>Price : $   <?=$sp['price_sp']?> </p>
            <button class="add-to-cart btn-success text-light rounded shadow " style="height: 33px;">Add To Cart</button>
            <a href="index.php?act=viewProduct&id_sp=<?=$sp['id_sp']?>&id_dm=<?=$sp['id_dm']?>"><button class="view-details bg-dark text-light rounded p-1 " style="height: 33px;">View Details</button></a>
          </div>
        </div>
        </div>
    </div>

      <?php  } ?>
       </div>
    </section>