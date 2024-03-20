<form class="mt-4 d-flex flex-column gap-2" id="add-product"aciton="index.php?act=add-product" enctype="multipart/form-data" method="POST">
     <br>
     <h2 class="text-center text-primary">Add new product</h2>
     <div class="form-group">
          <label>Category</label>
          <select name="category" id="">
          <?php
          require_once '../model/category.php';
          $listCat = loadAll();
          foreach($listCat as $cat) {?>

            <option value="<?=$cat['id_dm']?>" selected><?=$cat['name_dm']?></option>
         
          <?php } ?>
          </select>
     </div> <br>

     <input type="hidden" name="id_sp">
     <div class="form-group">
          <label>Product Name </label>
          <input type="text" class="form-control" placeholder="Enter product name" require id="product_name" name="product_name" value="<?=$info['name_sp']?>">
     </div>
     <div class="form-group">
          <label>Product Price</label>
          <input type="text" class="form-control" placeholder="Enter product price" require id="product_price" name="product_price" value="<?=$info['price_sp']?>">
     </div>
     <div class="form-group">
          <label>Product Desc</label>
          <textarea type="text" class="form-control" placeholder="Enter product desc" require id="product_desc" name="product_desc" ><?=$info['desc_sp']?> </textarea>
     </div>
     <div class="form-group">
          <label>Product Image</label> <br>
          <img src="../img/<?=$info['image_sp']?>" alt="Ảnh sản phẩm" width="70px">
          <input type="file" class="form-control" placeholder="Enter product image" require id="product_avatar" name="product_avatar" value="<?=$info['image_sp']?>">
     </div>
     <div class="form-group">
          <label>Product Quantity</label>
          <input type="text" class="form-control" placeholder="Enter product quantity" require id="product_quantity" name="product_quantity" value="<?=$info['soluong']?>"> 
     </div>
     

     <div class="d-flex justify-content-between"> 
          <button type="submit" class="btn btn-primary w-25 mt-4" name="update-product">Submit</button>
          <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
     </div>
</form>