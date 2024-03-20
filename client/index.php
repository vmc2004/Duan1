<?php
session_start();
ob_start();
require_once '../model/user.php';
require_once '../model/list.php';
require_once '../model/cart.php';
require_once '../model/pdo.php';
require_once 'header.php';
if(isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'all-product':
      $Product = loadAllProduct();
      require_once './view/product/product.php';
      break;
      case '/':
        require_once './home.php';
        break;
      case 'home':
        require_once './home.php';
        break;
        case 'login':
          require_once './view/users/login.php';
      
          if (isset($_POST['submit'])) {
              $email = $_POST['email'];
              $password = $_POST['password'];
              $check = checklogin($email,$password);
              if($check){
                $_SESSION['user'] = $check;
              }
              header('Location: http://localhost/PlayMobile/client/index.php');
              exit();
   
              
          }
          break;
        case 'logout':
          session_unset();
          session_destroy();
        header('Location: http://localhost/PlayMobile/client/index.php');
          break;
        case 'profile':
          require_once './view/users/profile.php';
          break;
        case 'update-profile':
          if(isset($_POST['btn-save'])){
            $id_user = $_SESSION['user']['id_user'];
            $name_user = $_POST['name_user'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $avatar = basename($_FILES['avatar']['name']);

            // Di chuyển tệp ảnh vào thư mục img
            $target_dir = "../img/";
            $target_file = $target_dir . $avatar;
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            update_profile($id_user,$name_user,$gender,$avatar,$email,$sdt,$diachi);
            // cập nhật session sau khi update user
            $_SESSION['user']['name_user'] =$name_user ;
             $_SESSION['user']['email'] =$email ;
            $_SESSION['user']['gender'] = $gender ;
            $_SESSION['user']['sdt'] = $sdt ;
             $_SESSION['user']['diachi'] =$diachi ;
            $_SESSION['user']['avatar'] = $avatar;
            header("location: ?act=profile");
          }
          break;
      case 'register':
        require_once './view/users/register.php';
        if(isset($_POST['btn-register'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = ($_POST['password']); 
          register($name,$email,$password);
          header("location: ?act=login");
          exit();
        }
        break;  
      case 'viewProduct':
        $id = $_GET['id_sp'];
        $Product = loadProductById($id);
        require_once './view/product/productchitiet.php';
        break;    
      case 'cart':
        $Cart = loadCart();
        require_once 'cart.php';
        break;   
      case 'add-to-cart':
        if(isset($_POST['addToCart'])){
          $id_sp = $_POST['id_sp'];
          $name_sp = $_POST['name_sp'];
          $soluong = $_POST['soluong'];
          $price_sp = $_POST['price_sp'];
          $image_sp = $_POST['image_sp'];
          AddToCart($id_sp,$name_sp,$price_sp,$soluong,$image_sp);
          header("location: ?act=cart");
          exit();
        }
        break;
         
  }

}
else{
    
  require_once './home.php';
    }
require_once 'footer.php';


ob_end_flush();
?>