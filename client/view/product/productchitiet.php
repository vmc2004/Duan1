


    <section class="container mt-4">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center p-1 border mb-1 pb-9" >
                <img src="../img/<?=$Product['image_sp']?>" alt="Product Image" class="img-fluid" name="image">
            </div>
            <div class="col-lg-6">
                <h2><?=$Product['name_sp']?> </h2>
                <p><?=$Product['price_sp']?></p>
    
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
                    <li><strong>Màn hình:</strong> 6.5 inch, Super AMOLED</li>
                    <li><strong>Camera:</strong> Chính 48MP, Selfie 20MP</li>
                    <li><strong>RAM:</strong> 8GB</li>
                    <li><strong>Pin:</strong> 5000mAh</li>
                </ul>
            </div>
        </div>
      
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3>Mô tả chi tiết</h3>
               <p>
                Samsung Galaxy S24 Plus: Siêu phẩm AI, hoàn hảo từng cái chạm
Samsung Galaxy S24 Plus, phiên bản kế nhiệm của S23 Plus, đang được dự đoán sẽ trở thành mẫu điện thoại cao cấp khuấy đảo thị trường di động trong năm 2024. Hiện sản phẩm vẫn chưa được ra mắt, nhưng đã thu hút được nhiều sự quan tâm của cộng đồng người dùng. Theo đó, Galaxy S24 Plus được trang bị chip Snapdragon 8 Gen 3 For Galaxy, cùng nhiều nâng cấp và cải tiến về thiết kế, camera, hiệu năng,... giúp mang đến trải nghiệm tốt hơn cho người dùng.
               </p>
            </div>
        </div>
        <div class="product-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3>Sản phẩm khác </h3>
                            <div class="product-arrow">
                            <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
              <section>
                <div class="container text-center">
                  <div class="row">
               <?php 
               require_once '../model/product.php';
               $Product = loadAllProduct();
               foreach($Product as $sp){ ?>
      <div class="col-3 border p-3 pd-3 bg-white d-flex justify-content-center">
      <div class="product">
        <img src="../img/<?=$sp['image_sp']?>" alt="Product 1">
        <div class="overlay">
          <div class="content">
            <h3><?=$sp['name_sp']?></h3>
            <p> <?=$sp['price_sp']?> </p>
            <button class="add-to-cart bg-success text-light rounded p-1">Add to Cart</button>
            <a href="index.php?act=viewProduct&id_sp=<?=$sp['id_sp']?>"><button class="view-details bg-dark text-light rounded p-1 ">View Details</button></a>
          </div>
        </div>
        </div>
    </div>

      <?php  } ?>


                            </div>
                        </div>
                    </div>

    </section>