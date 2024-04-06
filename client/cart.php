
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
        <div>
        <form method="post" action="#">
            <div class="container" id="cart">
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                
                               
                            </td>
                            <th scope="col">&nbsp;</th>
							<th scope="col">Tên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Size</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>

						<?php
                        $total = 0 ;
                        $id_sp = 0;
                        
                       if(isset($_SESSION['cart'])){
                        foreach($cart as $ca){
                            $id_sp  = $ca['id_sp'];
                            $Product = loadProductById($id_sp);
							?>
                        <tr class="cart_item container  ">
                            <td>
                            <form method="POST" action="?act=delete-cart&id_sp=<?=$id_sp?>">
                                    <input type="hidden" name="cart_id" value="<?=$id_sp?>"> <!-- Đặt ID sản phẩm để xoá -->
                                    <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng ?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                            <td><a title="Remove this item" class="remove" href="#"></a></td>
                            <td><?=$ca['name_sp']?></td>
							<td><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                    src="../img/<?=$ca['image_sp']?>"></td>
                                    <td><?=$ca['size']?></td>
                                    
                         <td>
                            <span><?=number_format((int)$ca['price_sp'], 0, ",", ".")?>₫</span>
                        <input type="hidden" class="iprice" value="<?=$ca['price_sp']?>">
                        </td>
                            <td>
                                
                                <!-- Tăng giảm số lươngj  -->
                            
                                <div class="input-group">
                            <div class="input-group-prepend">
                           
                            </div>
                            <input type="number" class="iquantity" name="soluongcart"  value="<?=$ca['soluongcart']?>" min="1" max="<?=$Product['soluong']?>"  onchange="subTotal()" >
                                    </button>
                                </div>
                                <input type="hidden" value="<?=$ca['id_sp']?>">
                                </div>
                            

                             <!-- kết thúc tăng giảm  -->
                                
                            </td>
                            <td class="itotal"></td>
                        </tr>
						<?php  } } ?>
                        <tr>
                            <td colspan="6" align="right"><strong>Tổng tiền:</strong></td>
                            <td align="right"  id="gtotal">
                        </td> 
                        </tr>
                        <td colspan="6">
                            <div class="coupon">
                                <label for="coupon_code">Mã giảm giá:</label>
                                <input type="text" placeholder="Nhập mã" value="" id="coupon_code" class="input-text"
                                    name="coupon_code">
                                <input type="submit" value="Áp dụng" name="apply_coupon" class="btn btn-warning">
                                <input type="submit" value="Cập nhật" name="update_cart" class="btn btn-danger">
                                <a href="?act=check-out" class="btn btn-primary">Thanh toán</a>

                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
        <script>
var gt = 0;
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');
var gtotal= document.getElementById('gtotal');
function subTotal(){
    gt = 0;
    for(i = 0; i<iprice.length;i++){
        itotal[i].innerText = (iprice[i].value)* (iquantity[i].value);
        gt = gt+ (iprice[i].value)* (iquantity[i].value);
    }
    
    $.ajax({
        type: 'POST',
        url: 'xulysoluong.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
        data: { gtotalValue: gt 
        },
        success: function(response) {
            // Xử lý phản hồi từ máy chủ nếu cần
            console.log('Dữ liệu đã được gửi thành công đến máy chủ.');
        },
        error: function(error) {
            // Xử lý lỗi nếu có
            console.error('Đã xảy ra lỗi khi gửi dữ liệu đến máy chủ: ' + error);
        }
    });
    gtotal.innerText = gt;
}
subTotal();
</script>

