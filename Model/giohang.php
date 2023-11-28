<?php
function cart_insert($bill_id, $giohang_ten, $giohang_gia, $giohang_img, $giohang_soluong,$thanhtien, $sanpham_id){
    $sql = "INSERT INTO user(bill_id, giohang_ten, giohang_gia, giohang_img, giohang_soluong,thanhtien, sanpham_id) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $bill_id, $giohang_ten, $giohang_gia, $giohang_img, $giohang_soluong,$thanhtien, $sanpham_id);
}
function viewcart(){
    $html_cart='';
  
    foreach($_SESSION['giohang'] as $sp){
        $i = 1;
        extract($sp);
        $sanpham_tt=(Int)$sanpham_gia*(Int)$soluong;
        $linkdel = "index.php?pg=delcart&ind=".$sanpham_id;
        var_dump($linkdel);
        $html_cart.='
        <tbody>
        <tr>
            <td class="li-product-remove"><a href="'.$linkdel.'">Xóa</a></td>
            <td class="li-product-thumbnail"><a href="#"><img style="width:150px;" src="layout/images/product/large-size/'.$sanpham_img.'" alt="Lis Product Image"></a></td>
            <td class="li-product-name"><a href="#">'.$sanpham_ten.'</a></td>
            <td class="li-product-price"><span class="amount">'.$sanpham_gia.'</span></td>
            <td class="quantity">
                <input type="number" class="cart_qty" name="soluong" value="'.$soluong.'">
                </div>
            </td>
            <td class="product-subtotal"><span class="amount">'.number_format($sanpham_tt,0,',','.').'</span></td>
        </tr>
    </tbody>

        ';
        $i++;
    }
    $html_cart .= '    
<script>
    $(".cart_qty").on("change", function(){
        var value = $(this).val();
        var sanpham_id = $(this).closest("tr").find(".sanpham_id").val();
        $.ajax({ 
            url: "controllers/xuly_giohang.php",
            method:"POST",
            data: { 
                check:"update_qty",
                value: value
                sanpham_id: sanpham_id
            },
            success: function() {
                location.reload();
            }

        });
            
    });
</script>';
    return $html_cart;
}
function get_tongdonhang(){
    $tong = 0;
    foreach($_SESSION['giohang'] as $sp){
        extract($sp);
        $sanpham_tt=(Int)$sanpham_gia*(Int)$soluong;
        $tong+=$sanpham_tt;
    }
    return $tong;
}



?>