<?php 

function get_danhsachsp(){
    $sql = "SELECT * FROM sanpham ORDER BY sanpham_id DESC ";
    return pdo_query($sql);
}
function insert_product($sanpham_id, $sanpham_ten, $loai_id, $sanpham_gia, $sanpham_soluong, $sanpham_mota){
    $sql = "INSERT INTO sanpham(null, sanpham_ten, loai_id, sanpham_gia, sanpham_soluong, sanpham_mota) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $sanpham_id, $sanpham_ten, $loai_id, $sanpham_gia, $sanpham_soluong, $sanpham_mota);
}
function showspql($dssp){
    $html_dssp='';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        
        $html_dssp.='<tr style="height:100px;">
        <td class="py-1">
        '.$i.'
        </td>
        <td> '.$sanpham_ten.'  </td>

        <td style="word-wrap: break-word;">
        '.$sanpham_gia.'
        </td>
        <td> '.$sanpham_theloai.'  </td>
        <td>
            <img src="./layout/images/product/large-size/'.$sanpham_img.'" alt="" style="width:100%;height:100%;">
        </td>
       
        <td> '.$Sale.'% </td>
        <td>
            <a href="index.php?action=product_management&amp;id=58" class="mdi text-light">
                <button class="btn btn-warning btn-rounded btn-sm"> Sửa </button>
            </a>
            <a href="index.php?action=delete_product&amp;id=58" class="mdi text-light">
                <button class="btn btn-danger btn-rounded btn-sm"> Xóa </button>
            </a>
        </td>
    </tr>     ';
    $i++;
    }
    return $html_dssp;
}
?>