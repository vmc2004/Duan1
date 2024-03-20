
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
        <form method="post" action="#">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                <form method="post" action="remove_from_cart.php">
                                    <!-- Thay đổi 'remove_from_cart.php' thành tên file xử lý của bạn -->
                                    <input type="hidden" name="product_id" value="123"> <!-- Đặt ID sản phẩm để xoá -->
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </form>
                            </td>
                            <th scope="col">&nbsp;</th>
							<th scope="col">Tên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach($Cart as $ca){
							$total_price = $ca['price_sp'] * $ca['soluong'];
							
							?>
                        <tr class="cart_item container  ">
                            <td>
                                <input type="checkbox" name="product_id[]" value="123"> <!-- Đặt ID sản phẩm để xoá -->
                            </td>
                            <td><a title="Remove this item" class="remove" href="#"></a></td>
                            <td><?=$ca['name_sp']?></td>
							<td><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                    src="../img/<?=$ca['image_sp']?>"></td>
                            <td><a href="product.html " class="product-link text-dark" style="list-style-type:none;  text-decoration:none ;">Iphone</a></td>
                            <td><span>$<?=$ca['price_sp']?></span></td>
                            <td>
                                <div class="quantity buttons_added">
                                    <input type="button" class="minus" value="-">
                                    <input type="number" size="4" class="input-text qty text text-center" title="Qty" value="1"
                                        min="0" step="1">
                                    <input type="button" class="plus" value="+">
                                    
                                </div>
                                
                            </td>
                            <td>$<?=$total_price?> </td>
                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </form>