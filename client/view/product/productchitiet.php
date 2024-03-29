    <section class="container mt-4">
      <h2 class="text-center mt-4 mb-5">Chi tiết sản phẩm</h2>
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center p-1 border mb-1 pb-9" >
                <img src="../img/<?=$Product['image_sp']?>" alt="Product Image" class="img-fluid" name="image">
            </div>
            <div class="col-lg-6">
                <h4><?=$Product['name_sp']?> </h4>
                <p>Loại : 
                  <?php
if($Product['matsan']==1){
  echo "Giày cỏ nhân tạo (Turf)";
}
if($Product['matsan']==2){
  echo "Giày cỏ tự nhiên (Ag, Fg)";
}

?>

                 </p>
                <h3 class="text-danger"><?=number_format((int)$Product['price_sp'], 0, ",", ".")?>₫</h3>
    
                <!-- Chọn màu -->
                <div class="container">
                    <div class="row">
                      <div class="col-md-4 ml-2">
                        <p>Chọn size</p>
                        <div class="form-group d-flex">
                        <div>
                      
                          <label for="size 40"  class="border p-2 m-2 checkbox-label atvice">
                            <span>40</span>
                          </label>
                        </div>
                        <div>
                      
                          <label for="size 40"  class="border p-2 m-2 checkbox-label ">
                            <span>41</span>
                          </label>
                        </div>
                        <div class="">
                          <label for="size 40" type="checkbox"   class="border p-2 m-2 checkbox-label ">
                            <span>42</span>
                          </label>
                        </div>
                          <br>
                          <br>
                        </div>
                      </div>
                     
                    </div>
                  </div> <br>
                  <p>Số lượng</p>
                  <div>
        <button onclick="decreaseQuantity()">-</button>
        <input type="number" id="quantityInput" value="1" min="1" style="width: 50px; height: 30px;">
        <button onclick="increaseQuantity()">+</button>
    </div>
    <br>
                <button class="btn btn-success">Thêm vào giỏ hàng</button>
                <button class="btn btn-danger">Mua ngay</button>
                <p class="mt-5 ">Số lượng : <?=$Product['soluong']?></p>
        </div>
            </div>
           
    
        <!-- Thông số kỹ thuật -->
      
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
      <div class="col-3  pd-3  mt-3 mb-3 ">
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
<script>function increaseQuantity() {
    var input = document.getElementById("quantityInput");
    var currentValue = parseInt(input.value);
    input.value = currentValue + 1;
}

function decreaseQuantity() {
    var input = document.getElementById("quantityInput");
    var currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}
</script>