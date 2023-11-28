<?php

// session_start();
// ob_start();

// include ("./../Model/database.php");
include("view/header.php");
include("model/xl_sanpham.php");
include("model/ql_taikhoan.php");
include("model/xl_danhmuc.php");

$in_tk = get_danhsachtk();
$in_sp = get_danhsachsp();
$in_dm = get_danhsachdm();

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'ql_sp':

            include("view/ql_sanpham.php");
            break;

        case 'ql_dm':

            include("view/ql_danhmuc.php");
            break;
        case 'ql_tk':

            include("view/ql_taikhoan.php");
            break;
            case 'logout':

                if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                    unset($_SESSION['s_user']);
                }
                header('location: index.php');
                break;
       
      
     
        default:
            include("View/trangchu.php");
            break;
    }
} else {
    include("View/trangchu.php");
}

?>