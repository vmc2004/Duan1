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
     if(!empty($_SESSION['cart'])){
      $cart = $_SESSION['cart'];
     
       
      // $Cart = loadCart($idList);
     }
     
     require_once 'cart.php';      

  
     
        break;   
      case 'add-to-cart':
        if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if(isset($_POST['addToCart'])){
          $id_sp = $_POST['id_sp'];
          $name_sp = $_POST['name_sp'];
          $soluongcart = $_POST['soluongcart'];
          $price_sp = $_POST['price_sp'];
          $image_sp = $_POST['image_sp'];
          $cart =[
            'id_sp'=>$id_sp,
            'name_sp'=>$name_sp,
            'price_sp'=> $price_sp,
            'soluongcart'=>$soluongcart,
            'image_sp'=>$image_sp
          ];

          $_SESSION['cart'][] = $cart;
          
        header("location: ?act=cart");
        exit();
        
       }
      
        break;
        case 'delete-cart':
        
          if(isset($_POST['delete']) ) {
            $id_sp = $_POST['cart_id']; // Lấy ID sản phẩm từ form
        
            // Kiểm tra xem sản phẩm có trong giỏ hàng không
            
            if(!empty($_SESSION['cart'])) {
              // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
              $index = array_search($id_sp, array_column($_SESSION['cart'], 'id_sp'));
      
              // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
              if($index !== false) {
                  // Xóa sản phẩm khỏi giỏ hàng
                  unset($_SESSION['cart'][$index]);
                  $_SESSION['cart'] = array_values($_SESSION['cart']);
              } else {
                  echo 'Sản phầm ko tồn tại trong giỏ hàng';
              }
          }
           header("location: ?act=cart");
          }
          break;
        
        case 'check-out':
          if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
           
             
            // $Cart = loadCart($idList);
           }
           
          require_once 'checkout.php';
          break;
        case 'thanhtoan':
        if(isset($_SESSION['cart'])){
          if(isset($_POST['thanhtoan'])){
            $id_user = $_POST['id_user'];
            $name_user = $_POST['name_user']; 
            $diachi = $_POST['address_user'];
            $ngaytao = date('Y-m-d');
            $tongbill = $_SESSION['tongbill'] ;
            $trangthai = $_POST['trangthai'];
            $trangthaitt = $_POST['trangthaitt'];
            $pttt = $_POST['pttt'];
            if ($pttt == 2) {
              header('Location: ?act=ttqrmomo');
              die();
              
          }
          if ($pttt == 3) {
            $trangthai = 2;
            $trangthaitt = 1;
            $idBill = insert_hoadon($ngaytao, $pttt, $tongbill, $trangthai, $trangthaitt, $id_user);
            foreach ($_SESSION['cart'] as $carttt) {
              insert_billhoadon($idBill, $carttt['id_sp'], $carttt['name_sp'], $carttt['price_sp'], $carttt['soluongcart'], $tongtien = $carttt['tongbill'] );
          }
          include('view/thanhtoan/ttATMmomo.php');
                        break;
          }
         
          $tbdh = "Đặt hàng thành công! Cảm ơn quý khách đã ủng hộ shop của chúng tôi!";
                    unset($_SESSION['giohang']);
                    unset($_SESSION['tongdh']);
                    
                    break;
        
          
          }
          else {
            header('Location: ?act=cart');
            die();

        }
      }
          break;
        case 'ttqrmomo':
          include('view/thanhtoan/xulyttmomo.php');
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
        case 'phukien':
          $Product =phukien();
          
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
        case 'my-order':
          require_once 'view/users/my-order.php';
          
          break;
        case 'view-bill':
          if(isset($_GET['id_bill'])){
            $id_bill = $_GET['id_bill'];
            $listbhd = select_billhoadon($id_bill);
          }
          require_once 'view/users/chitiet_bill.php';
          break;

      
         
  }

}
else{
    
  require_once './home.php';
    }
require_once 'footer.php';


ob_end_flush();
?>