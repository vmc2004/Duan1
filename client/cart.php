
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
                            $total_price = $ca['price_sp'] *$ca['soluongcart'] ;
                            $id_sp  = $ca['id_sp'];
                            $total +=$total_price;  
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
                                    
                         <td><span><?=number_format((int)$ca['price_sp'], 0, ",", ".")?>₫</span></td>
                            <td>
                                
                                <!-- Tăng giảm số lươngj  -->
                            
                                <div class="input-group">
                            <div class="input-group-prepend">
                           
                            </div>
                            <input type="number" name="soluongcart" id="quantityInput" value="<?=$ca['soluongcart']?>" min="1" max="<?=$Product['soluong']?>" onchange="updateTotal(this)" >
                               
                                </button>
                                </div>
                                <input type="hidden" value="<?=$ca['id_sp']?>">
                                </div>
                            

                             <!-- kết thúc tăng giảm  -->
                                
                            </td>
                            <td><?=number_format((int)$total_price, 0, ",", ".")?>₫ </td>
                            
                        </tr>
						<?php  } } ?>
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
                                <a href="?act=check-out" class="btn btn-primary">Thanh toán</a>

                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <script>
   function updateTotal(input) {
    var quantity = parseInt(input.value);
    var pricePerItem = parseInt(input.parentNode.previousElementSibling.innerText.replace(/[^0-9]/g, '')); // Lấy giá từ cột Giá và loại bỏ ký tự không phải số
    var total = quantity * pricePerItem;

    // Tìm thẻ TD chứa tổng cộng và cập nhật giá trị
    var totalTd = input.parentNode.nextElementSibling;
    totalTd.innerText = formatCurrency(total);

    // Tính toán tổng tiền toàn bộ giỏ hàng và cập nhật lại
    var tableBody = document.querySelector('#cart tbody');
    var totalSum = 0;
    tableBody.querySelectorAll('tr').forEach(function(row) {
        var totalPrice = parseInt(row.lastElementChild.innerText.replace(/[^0-9]/g, ''));
        totalSum += totalPrice;
    });

    // Tìm thẻ TD chứa tổng tiền và cập nhật giá trị
    var totalAmountTd = document.querySelector('#cart tbody tr:last-of-type td:last-of-type');
    totalAmountTd.innerText = formatCurrency(totalSum);
}

function formatCurrency(value) {
    return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

    
</script>
