<?php
session_start();
ob_start();
require_once '../model/product.php';
require_once '../model/user.php';
require_once '../model/list.php';
require_once '../model/cart.php';
require_once '../model/pdo.php';
require_once '../model/binhluan.php';
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
                echo '
                  <script>
                  alert("Đăng nhập thành công !");
                      setTimeout(function() {
                          window.location.href = "./index.php";
                      }, 0); 
                  </script>
                ';
              }
          }
          break;
        case 'logout':
          session_unset();
          session_destroy();
          echo '
          <script>
          alert("Đăng Xuất thành công !");
              setTimeout(function() {
                  window.location.href = "./index.php";
              }, 0);
          </script>
        ';
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
      if(isset($_GET['id_sp'])){
        $id = $_GET['id_sp'];
        $Product = loadProductById($id);
        $cmt = loadAllcmt();
        require_once './view/product/productchitiet.php';
      }
        break;    
      case 'cart':
     if(!isset($_SESSION['user'])){
      header("location: ?act=login");


     }
     $Cart = loadCart();
     require_once 'cart.php';      

  
     
        break;   
      case 'add-to-cart':
       if(isset($_SESSION['user'])){
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
       }
       else{
        header('location: ?act=login');
       }
        break;
        case 'delete-cart':
          if(isset($_POST['delete'])){
            $id_cart = $_GET['id_cart'];
            deleteCart($id_cart);
            header("location: ?act=cart");
            
          }
        case 'check-out':
          require_once 'checkout.php';
          break;
        case 'search':
          if(isset($_POST['search'])){
            $content = $_POST['content'];
            $Product = search($content);
            require_once './view/product/product.php';
          }
          break;
        case 'search-by-id':
          if(isset($_GET['id_dm'])){
            $id_dm = $_GET['id_dm'];
            $Product = searchnbyid_dm($id_dm);
          }
            
            require_once './view/product/product.php';
          
          break;
        case 'giay-nhantao':
          $Product =loaigiay();
          
          require_once './view/product/product.php';
          break;
        case 'giay-tunhien':
          $Product =tunhien();
          
          require_once './view/product/product.php';
          break;
        case 'comment':
          if(isset($_POST['comment'])){
            $cmt = $_POST['cmt'];
            $id_sp = $_POST['id_sp'];
            $id_user = $_POST['id_user'];
            $time = date("Y-m-d h:i:sa");
            addCmt($cmt,$id_sp,$id_user,$time);
            
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