<?php

session_start();
ob_start();

// include ("./../Model/database.php");
include("view/header.php");
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'ql_sp':
            include_once("model/product.php");
            $pro = new pro();
            $show = $pro->show_pro();
            $showCate = $pro->showCate();
            include("view/ql_sanpham.php");
            break;
        case 'ql_dm':
            include_once("model/category.php");
            $cate = new cate();
            $show = $cate->showCate();
            include("view/ql_danhmuc.php");
            break;
        case 'ql_tk':
            include_once("model/account.php");
            $acc = new account();
            $show = $acc->show_account();
            include("view/ql_taikhoan.php");
            break;
        case 'update_Product':
            include_once("model/product.php");
            $pro = new pro();
            $showCate = $pro->showCate();
            include("view/update_Product.php");
            break;
        case 'ql_dh':
            include 'model/order.php';
            $order = new order_lass();
            $results = $order->show_order();
            include("view/ql_dh.php");
            break;
        default:
            include("View/trangchu.php");
            break;
    }
} else {
    include("View/trangchu.php");
}
include("view/footer.php");
?>