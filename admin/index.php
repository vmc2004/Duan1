<?php
ob_start();
require_once 'header.php';

require_once '../model/pdo.php';
require_once '../model/category.php';
require_once '../model/product.php';


if(isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'list-categories':
            require_once '../admin/categories/list.php';
            break;
        case 'add-category':
            $listCat = loadAll();
            require_once '../admin/categories/add.php';
            if(isset($_POST['add_category'])){
                $name = $_POST['category_name'];
                addCategory($name);
                header("Location: index.php?act=list-categories");
                exit(); 
            }
            
            break;


        case 'update-category':
            if(isset($_GET['id_dm'])){
                $id_dm = $_GET['id_dm'];
                $info = LoadById($id_dm);
                if(isset($_POST['update_category'])){
                    $id_dm = $_POST['id_dm'];
                    $name = $_POST['category_name'];
                    updateCategory($id_dm,$name);
                    header("Location: index.php?act=list-categories");
                    exit(); 
                }
            }

            require_once '../admin/categories/update.php';
            break;
        case 'list-products':
            require_once '../admin/products/list.php';
            break;
        case 'add-product':
            require_once '../admin/products/add.php';
            if(isset($_POST['submit'])){
                $category =  $_POST['category'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $product_quantity = $_POST['product_quantity'];
                $product_avatar = basename($_FILES['product_avatar']['name']);

                // Di chuyển tệp ảnh vào thư mục img
                $target_dir = "../img/";
                $target_file = $target_dir . $product_avatar;
                move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                $matsan = $_POST['matsan'];
                addProduct($category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar,$matsan);
                header("location: index.php?act=list-products");
                exit();


            }
            
            break;
        case 'add-product-with-cat':
            require_once '../admin/products/addByCat.php';
            if(isset($_POST['submit'])){
                $category =  $_POST['category'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $product_quantity = $_POST['product_quantity'];
                $product_avatar = basename($_FILES['product_avatar']['name']);

                // Di chuyển tệp ảnh vào thư mục img
                $target_dir = "../img/";
                $target_file = $target_dir . $product_avatar;
                move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                $matsan = $_POST['matsan'];
                addProduct($category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar,$matsan);
                header("location: index.php?act=list-products");
                exit();


            }
            break;
        case 'list-products':

            require_once '../admin/product/list.php';
            break;
        case 'delete-product':
            if(isset($_GET['id_sp'])){
                $id_sp = $_GET['id_sp'];
                delete_pro($id_sp);
                header("location: index.php?act=list-products");
                exit(); 
            }
            
            break;    
        case 'update-product':
            if(isset($_GET['id_sp'])){
                $id_sp = $_GET['id_sp'];
                
                $info = LoadProById($id_sp);
                if(isset($_POST['update-product'])){
                    $id_sp = $_GET['id_sp'];
                    $category =  $_POST['category'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $product_quantity = $_POST['product_quantity'];
                $product_avatar = basename($_FILES['product_avatar']['name']);

                // Di chuyển tệp ảnh vào thư mục img
                $target_dir = "../img/";
                $target_file = $target_dir . $product_avatar;
                move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                updateProduct($id_sp,$category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar);
                header("location: index.php?act=list-products");
                exit();

                }
            }
            
            require_once '../admin/products/update.php';
            break;
        case 'list-carts':
            require_once '../admin/categories/list.php';
            break;
        case 'list-posts':
            require_once '../admin/categories/list.php';
            break;
        case 'list-comments':
            require_once '../admin/categories/list.php';
            break;
        case 'list-users':
            require_once '../admin/user/list.php';
            break;
        case 'delete-category':
            if(isset($_GET['id_dm'])){
                $id_dm = $_GET['id_dm'];
                delete($id_dm);
            }
            require_once '../admin/categories/list.php';
            break;
    }
}
require_once 'footer.php';

ob_end_flush();
?>