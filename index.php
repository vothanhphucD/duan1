<?php

session_start();
ob_start();
if (!isset($_SESSION["giohang"])) {
    $_SESSION["giohang"] = [];
}
include("./Model/database.php");
include("./Model/sanpham.php");
include("./Model/giohang.php");
include("./Model/user.php");
include("./Model/donhang.php");
//admin
include("./Model/xl_sanpham_admin.php");
include("./Model/xl_taikhoan_admin.php");
include("./Model/xl_danhmuc_admin.php");
$in_tk = get_danhsachtk();
$in_sp = get_danhsachsp();
$in_dm = get_danhsachdm();

//user
$dssp_new = get_dssp_new(5);
//   $dssp_best=get_dssp_best(1);
$dssp_view = get_dssp_view(5);
$dssp_theoloai = get_dssp_loai();

$dssp_theoloai2 = get_dssp_loai2();
$dssp_theoloai3 = get_dssp_loai3();
$dssp_theoloai6 = get_dssp_loai6();

if (isset($_GET['pg'])) {
    switch ($_GET['pg']) {
        case 'product':

            include("View/header.php");
            include('View/sanpham.php');
            include("View/footer_main.php");
           
            break;
        case 'adduser':

            include("View/header.php");
            if (isset($_POST["dangky"]) && ($_POST["dangky"])) {
                $user_name = $_POST["user_name"];
                $user_pass = $_POST["user_pass"];
                $user_email = $_POST["user_email"];
                // xử lý
                user_insert($user_name, $user_pass, $user_email);
            }
            include('View/dangnhap.php');
            include("View/footer_main.php");
            break;
        case 'updateuser':

            include("View/header.php");
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $user_name = $_POST["user_name"];
                $user_pass = $_POST["user_pass"];
                $user_email = $_POST["user_email"];
                $user_diachi = $_POST["user_diachi"];
                $user_id = $_POST["user_id"];
                $user_sdt = $_POST["user_sdt"];

                $role = 0;
                // xử lý
                user_update($user_name, $user_pass, $user_email, $user_diachi, $user_sdt, $role, $user_id);
                include "view/myaccount_confirm.php";
            }
            include("View/footer_main.php");
            break;
        case 'login':



            // if(isset($_POST["login"])){
            //     $user_name=$_POST["user_name"];
            //     $user_pass=$_POST["user_pass"];
            //     $user=checkuser($user_name,$user_pass);
            //     if(isset($user)&&(is_array($user))&&(count($user)>0)){
            //         extract($user);
            //         if($role==1){
            //             $_SESSION['s_user']=$user;
            //             include ("./../admin/index.php");
            //             //header('location: admin/index.php');
            //         }else{
            //             header('location: index.php');
            //         }
            //     }else{
            //         $tb="Tài khoản này không tồn tại. Hoặc đã nhầm!";
            //     }


            //}
            // if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
            //     $user_name = $_POST["user_name"];
            //     $user_pass = $_POST["user_pass"];


            //     $kq = checkuser($user_name, $user_pass);
            //         if (is_array($kq)&&(count($kq))) {
            //             $_SESSION['s_user']=  $kq;
            //             if($role==1){

            //                             include ("./admin/index.php");
            //                             //header('location: admin/index.php');
            //                         }else{
            //                             header('location: index.php');
            //                         }

            //         }else{
            //             header('location: index.php?pg=dangnhap');
            //             $tb= "Tài Khoản không tồn tại hoặc thông tin nhập sai!";
            //             $_SESSION['tb_dangnhap']=$tb;

            //         }
            // }


            //  header('location: index.php');













            // Bắt buộc gọi session_start() ở đầu trang

            if (isset($_POST["dangnhap"]) && $_POST["dangnhap"]) {
                $user_name = $_POST["user_name"];
                $user_pass = $_POST["user_pass"];

                $kq = checkuser($user_name, $user_pass);

                if (is_array($kq) && count($kq)) {
                    $_SESSION['s_user'] = $kq;

                    // Kiểm tra và chuyển hướng dựa vào giá trị của $role
                    $role = isset($kq['role']) ? $kq['role'] : 0;

                    if ($role == 1) {
                        include("View/header_admin.php");
                        include("View/home_admin.php");
                        exit;// Ngăn mã PHP tiếp tục thực thi sau khi chuyển hướng
                    } else {
                        include("View/header.php");
                        include("View/footer_main.php");
                        header('location: index.php');
                        exit; // Ngăn mã PHP tiếp tục thực thi sau khi chuyển hướng
                    }
                } else {
                    $tb = "Tài Khoản không tồn tại hoặc thông tin nhập sai!";
                    $_SESSION['tb_dangnhap'] = $tb;
                    include("View/header.php");
                    header('location: index.php?pg=dangnhap');
                    exit; // Ngăn mã PHP tiếp tục thực thi sau khi chuyển hướng
                }
            }
            break;
            // Mã này sẽ được thực thi nếu không có POST data hoặc không thỏa mãn điều kiện ở trên
            // header('location: index.php');
            // exit; // Ngăn mã PHP tiếp tục thực thi sau khi chuyển hướng

          
        case 'dangnhap':

            include("View/header.php");
            include('View/dangnhap.php');
            include("View/footer_main.php");
            break;
        case 'logout':

            include("View/header.php");
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            include("View/footer_main.php");
            break;
        case 'dangky':

            include("View/header.php");

            include('View/dangky.php');
            include("View/footer_main.php");
            break;
        case 'myaccount':
            include("View/header.php");
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {

                include "view/myaccount.php";
            }
            include("View/footer_main.php");
            break;
        case 'blog2':
            include("View/header.php");
            include('View/blog-2.php');
            include("View/footer_main.php");
            break;
        case 'blog3':
            include("View/header.php");
            include('View/blog-3.php');
            include("View/footer_main.php");
            break;
        case 'aboutus':
            include("View/header.php");
            include('View/about-us.php');
            include("View/footer_main.php");
            break;


        case 'addcart':
            include("View/header.php");
            // include('View/cart.php');
            if (isset($_POST["addcart"])) {
                $sanpham_id = $_POST["sanpham_id"];
                $sanpham_ten = $_POST["sanpham_ten"];
                $sanpham_img = $_POST["sanpham_img"];
                $sanpham_gia = $_POST["sanpham_gia"];
                $soluong = $_POST["soluong"];
                $flag = 0;
                $thanhtient=(int)$soluong*(int)$sanpham_gia;
                $sp = array("sanpham_id" => $sanpham_id, "sanpham_ten" => $sanpham_ten, "sanpham_img" => $sanpham_img, "sanpham_gia" => $sanpham_gia, "soluong" => $soluong, "thanhtien" => $thanhtien);
                foreach ($_SESSION["giohang"] as $key => $item) {
                    if ($item["sanpham_id"] == $sanpham_id) {
                        $_SESSION["giohang"][$key]["soluong"] += $soluong;
                        $flag = 1;
                        break;
                    }
                }

                if ($flag == 0) {
                    array_push($_SESSION["giohang"], $sp);
                }

                header('location: index.php?pg=viewcart');
            }
            include("View/footer_main.php");
            break;
        case 'viewcart':
            include("View/header.php");
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION["giohang"]);
                // $_SESSION["giohang"]=[];
                header('location: index.php');
            } else {
                if (isset($_SESSION["giohang"])) {
                    $tongdonhang = get_tongdonhang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $mavoucher = $_POST['mavoucher'];
                    // so sanh với db để lấy giá trị về
                    $giatrivoucher = 10;

                }
                $thanhtoan = $tongdonhang - $giatrivoucher;
                include "view/viewcart.php";
            }
            include("View/footer_main.php");
            break;
        case 'delcart':
            include("View/header.php");
            if (isset($_GET['ind']) && ($_GET['ind'] >= 1)) {
                array_splice($_SESSION['giohang'], $_GET['ind'], 1);
                unset($_GET['ind']);
                header('location: index.php?pg=viewcart');
            }
            include("View/footer_main.php");
            break;
        case '404':
            include("View/header.php");
            include('View/404.php');
            include("View/footer_main.php");
            break;
        case 'trangchu2':
            include("View/header.php");
            include('View/trangchu2.php');
            include("View/footer_main.php");
            break;
        case 'contact':
            include("View/header.php");
            include('View/contact.php');
            include("View/footer_main.php");
            break;

        case 'dmsanpham':
            include("View/header.php");
            $dsdm = danhmuc_all();

            $kyw = "";
            $titlepage = "";

            if (!isset($_GET['iddm'])) {
                $iddm = 0;
            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            }

            // kiểm tra có phải form search không?
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST["kyw"];
                $titlepage = " Kết quả tìm kiếm với từ khóa: <h2><span>" . $kyw . "</span></h2>";
            }

            $dssp = get_dssp($kyw, $iddm, 6);

            include "view/dmsanpham.php";

            include("View/footer_main.php");



            break;

        case 'chitietsanpham':
            include("View/header.php");
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $spchitiet = get_sanphamchitiet($id);
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }
            include("View/footer_main.php");
            break;
            case 'donhangsubmit':
                include("View/header.php");
                if(isset($_POST['donhangsubmit'])){
                    $user_ten=$_POST['user_ten'];
                    $user_diachi=$_POST['user_diachi'];
                    $user_email=$_POST['user_email'];
                    $user_sdt=$_POST['user_sdt'];
                    include "view/donhang_configm.php";

                }
                include "view/donhang_configm.php";
            

                include('View/thanhtoan.php');
                include("View/footer_main.php");
            
                break;
                case 'donhang':
                    include("View/header.php");
                    include('View/thanhtoan.php');
                    include("View/footer_main.php");
                    break;
            case 'admin':

                include("view/header_admin.php");
                include("view/home_admin.php");
                break;

            case 'ql_sp':

                include("view/header_admin.php");
                include("view/ql_sanpham_admin.php");
                break;
    
            case 'ql_dm':
                include("view/header_admin.php");
                include("view/ql_danhmuc_admin.php");
                break;
            case 'ql_tk':
                include("view/header_admin.php");
                include("view/ql_taikhoan_admin.php");
                break;
            
           
        
        default:
            include("View/home.php");
            include("View/footer_main.php");
            break;
    }
} else {
    include("View/header.php");
    include("View/home.php");
    include("View/footer_main.php");
}

include("View/footer.php");

?>