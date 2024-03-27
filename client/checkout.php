<main class="container"> 
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Xác nhận thông tin </h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" class="">
                            <h5 class="text-center">Thông tin khách hàng</h5>
                          <label for="" class="form-label">Họ và tên</label>
                          <input class="form-control" type="text" name="name" placeholder="Họ và tên" >
                          <label for="" class="form-label">Địa chỉ</label>
                          <input class="form-control" type="text" name="name" placeholder="Địa chỉ" >
                          <label for="" class="form-label">Số điện thoại</label>
                          <input class="form-control" type="text" name="name" placeholder="Số điện thoại" >
                        
                        </form>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sản phẩm</h5>
                        <p class="card-text"><strong>Sản phẩm:</strong> Iphone 15 Pro Max(x1)</p>
                        <p class="card-text"><strong>Tổng cộng:</strong> $1000</p>
                      
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
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <a href="confrim.html"><button type="button" class="btn btn-primary ">Xác nhận đặt hàng</button></a>
       </div>

</main>   