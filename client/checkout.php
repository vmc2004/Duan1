<main class="container"> 
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Xác nhận thông tin </h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" class="">
                            <?php
                                if(isset($_SESSION['user'])){
                                    $name = $_SESSION['user']['name_user'];
                                    $address = $_SESSION['user']['diachi'];
                                    $tel = $_SESSION['user']['sdt'];
                                }
                                else {
                                    $name ="";
                                    $address ="";
                                    $tel = "";
                                }
                            ?>
                            <h5 class="text-center">Thông tin khách hàng</h5>
                          <label for="" class="form-label">Họ và tên</label>
                          <input class="form-control" type="text" name="name" placeholder="Họ và tên"  value="<?=$name?>">
                          <label for="" class="form-label">Địa chỉ</label>
                          <input class="form-control" type="text" name="name" placeholder="Địa chỉ" value="<?=$address?>">
                          <label for="" class="form-label">Số điện thoại</label>
                          <input class="form-control" type="text" name="name" placeholder="Số điện thoại" value="<?=$tel?>" >
                        
                        </form>
                    
                        <form action="">
                            <label for="" class="form-label">Phương thức thanh toán</label> <br>
                           
                          <input type="checkbox" name="paymentMethod" id="cashOnDelivery" class="payment-method" onchange="uncheckOthers(this)"> Thanh toán khi nhận hàng <br>
                          <input type="checkbox" name="paymentMethod" id="momo" class="payment-method" onchange="uncheckOthers(this)"> Thanh toán bằng Momo <br>
                          <input type="checkbox" name="paymentMethod" id="internetBanking" class="payment-method" onchange="uncheckOthers(this)"> Internet banking
                          
                          <script>
                          function uncheckOthers(checkbox) {
                              var checkboxes = document.querySelectorAll('.payment-method');
                              checkboxes.forEach(function(cb) {
                                  if (cb !== checkbox) {
                                      cb.checked = false;
                                  }
                              });
                          }
                          </script>
                          
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <?php
                       $total =0 ;
                       if(isset($_SESSION['cart'])){
                        foreach($cart as $ca){
                            $total_price = $ca['price_sp']* $ca['soluongcart'];
                           
                            $total +=$total_price;
							?>
                    <div class="card-body d-flex">
                        
                        <img src="../img/<?=$ca['image_sp']?>" alt="" width="80px">
                        <p style="max-width:500px;" ><?=$ca['name_sp']?></p> <br>
                        <p class=" d-flex justify-content-center"><?=number_format((int)$ca['price_sp'], 0, ",", ".")?>₫</p>
                      
                        
                    </div>
                <?php } }?>
                <hr>
                <p class="m-3">Tổng tiền: <?=number_format((int)$total, 0, ",", ".")?>₫</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <a href="confrim.html"><button type="button" class="btn btn-primary ">Xác nhận đặt hàng</button></a>
       </div>

</main>             