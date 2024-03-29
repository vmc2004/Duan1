
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
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
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>

						<?php
                        $total = 0 ;
                        foreach($Cart as $ca){
							$total_price = $ca['price_sp'] * $ca['soluong'];
							$total += $total_price;
							?>
                        <tr class="cart_item container  ">
                            <td>
                            <form method="post" action="?act=delete-cart&id_cart=<?=$ca['id_cart']?>">
                                    <!-- Thay đổi 'remove_from_cart.php' thành tên file xử lý của bạn -->
                                    <input type="hidden" name="cart_id" value="<?=$ca['id_cart']?>"> <!-- Đặt ID sản phẩm để xoá -->
                                    <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng ?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                            <td><a title="Remove this item" class="remove" href="#"></a></td>
                            <td><?=$ca['name_sp']?></td>
							<td><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                    src="../img/<?=$ca['image_sp']?>"></td>
                         <td><span><?=number_format((int)$ca['price_sp'], 0, ",", ".")?>₫</span></td>
                            <td>
                                <!-- Tăng giảm số lươngj  -->
                            
                                <div class="input-group">
                            <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary btn-number" type="button" onclick="giam(this)">
                                <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                                <input type="text"  class="form-control input-number" value="<?=$ca['soluong']?>" min="1" style="width: 10px; height: 40px;">
                                <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-number" type="button" onclick="tang(this)">
                                <i class="fa-solid fa-plus"></i>
                                </button>
                                </div>
                                <input type="hidden" value="<?=$ca['id_sp']?>">
                                </div>
                            

                             <!-- kết thúc tăng giảm  -->
                                
                            </td>
                            <td><?=number_format((int)$total_price, 0, ",", ".")?>₫ </td>
                            
                        </tr>
						<?php } ?>
                        <tr>
                            <td colspan="6" align="right"><strong>Tổng tiền:</strong></td>
                            <td align="right"><strong><?=number_format((int)$total, 0, ",", ".")?>₫</strong></td> 
                        </tr>
                        <td colspan="6">
                            <div class="coupon">
                                <label for="coupon_code">Mã giảm giá:</label>
                                <input type="text" placeholder="Nhập mã" value="" id="coupon_code" class="input-text"
                                    name="coupon_code">
                                <input type="submit" value="Áp dụng" name="apply_coupon" class="btn btn-warning">
                                <input type="submit" value="Cập nhật" name="update_cart" class="btn btn-danger">
                                <a href="Paypal.html" class="btn btn-primary">Thanh toán</a>

                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <script>
   function tang(x){
      var paren = x.parentNode;
      var  slcu = paren.previousSibling.previousSibling;
      var slmoi = parseInt(slcu.value) + 1; 
      slcu.value = slmoi;
      var id_pro = paren.nextSibling.nextSibling;
      $.post("?act=soluong",{
        "id_sp": id_pro,
        "soluong": slmoi
      }, 
      function(data, textStatus, jqXHR){
            document.getElementById('cart').innerHTML = data ;
      }
      );
    //   if (soluong<11){
    //     slcu.value = slmoi;
    // }
    // else{
    //     alert "Số lượng không thể lớn hơn ";
    // }
 
   }
   function giam(x){
      var paren = x.parentNode;
      var  slcu = paren.nextSibling.nextSibling;
      var slmoi = parseInt(slcu.value) - 1; 
      if(slmoi >=1){
        slcu.value = slmoi;
      }
      else{
        alert ("Số lượng không thể nhỏ hơn 1");
      }
 
   }
    
    
</script>
