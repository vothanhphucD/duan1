<?php 

function get_danhsachdm(){
    $sql = "SELECT * FROM loai ORDER BY loai_id DESC ";
    return pdo_query($sql);
}

    function get_slloaisp1(){
    $sql = "SELECT COUNT(*) AS loai_id
    FROM sanpham
    WHERE loai_id = 1 ; ";
    return pdo_query_one($sql);
}
function get_slloaisp2(){
    $sql = "SELECT COUNT(*) AS loai_id
    FROM sanpham
    WHERE loai_id = 2 ; ";
    return pdo_query_one($sql);
}

// function get_slloaisp3(){
//     $sql = "SELECT COUNT(*) AS loai_id
//     FROM sanpham
//     WHERE loai_id = 3; ";
//     return pdo_query_one($sql);
// }
// // function get_slloaisp2(){
// //     $sql = "SELECT COUNT(*) AS loai_id
// //     FROM sanpham
// //     WHERE loai_id = '2'; ";
// //     return pdo_query_one($sql);
// // }



function showspdm($dssp){
    $html_dssp='';
    $i = 1;
    $soluong= get_slloaisp1();
    $string = implode(', ', $soluong);
   
    foreach ($dssp as $sp) {
        extract($sp);
        
        $html_dssp.='  
        <tr>
        <td class="py-1">
        '.$i.'
        </td>
        <td>  '.$loai_ten.'</td>
        <td style="word-wrap: break-word;">
        '.$loai_ten.'
        </td>
        <td>
           '.$string.' 
        </td>
        <td>'.$ngay_reg.'</td>
        <td>
            <a href="index.php?action=catalog_management&amp;id=5" class="mdi text-light">
                <button class="btn btn-warning btn-rounded btn-sm"> Sửa </button>
            </a>
            <a href="index.php?action=delete_category&amp;id=5" class="mdi text-light">
                <button class="btn btn-danger btn-rounded btn-sm"> Xóa </button>
            </a>
        </td>
        </tr>
         ';
    $i++;
    }
    return $html_dssp;
}
?>