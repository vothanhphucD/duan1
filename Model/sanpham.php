<?php
require_once 'database.php';
function get_dssp_new($limi){
    $sql = "SELECT * FROM sanpham ORDER BY sanpham_id DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp_loai(){
    $sql = "SELECT * FROM sanpham WHERE loai_id = 1 ";
    return pdo_query($sql);
}
function get_dssp_loai2(){
    $sql = "SELECT * FROM sanpham WHERE loai_id = 2 ";
    return pdo_query($sql);
}
function get_dssp_loai3(){
    $sql = "SELECT * FROM sanpham WHERE loai_id = 3 ";
    return pdo_query($sql);
}
function get_dssp_loai6(){
    $sql = "SELECT * FROM sanpham WHERE loai_id = 6 ";
    return pdo_query($sql);
}
// function get_dssp_best($limi){
//     $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY sanpham_id DESC limit ".$limi;
//     return pdo_query($sql);
//}
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham ORDER BY sanpham_view DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp($kyw,$iddm,$limi){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND loai_id=".$iddm;
    }
    if($kyw!=""){
        $sql .=" AND sanpham_ten like '%".$kyw."%'";
    }

    $sql .= " ORDER BY loai_id DESC limit ".$limi;
    return pdo_query($sql);
}



function get_dssp_lienquan($iddm,$id,$limi){
    $sql = "SELECT * FROM sanpham WHERE loai_id=? AND sanpham_id<>? ORDER BY sanpham_id DESC limit ".$limi;
    return pdo_query($sql,$iddm,$id);
}





function showsp($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        // if($bestseller==1){
        //     $best='<div class="best"></div>';
        // }else{
        //     $best='';
        // }
        $html_dssp.='<div class="col-lg-12">
        <!-- single-product-wrap start -->
        <div class="single-product-wrap">
            <div class="product-image">
                <a href="index.php?pg=chitietsanpham&id='.$sanpham_id.'">
                    <img src="layout/images/product/large-size/'.$sanpham_img.'" alt="Lis Product Image">
                </a>
                <span class="sticker">'.$Sale.'%</span>
            </div>
            <div class="product_desc">
                <div class="product_desc_info">
                    <div class="product-review">
                        <h5 class="manufacturer">
                            <a href="shop-left-sidebar.html">'.$sanpham_theloai.'</a>
                        </h5>
                        <div class="rating-box">
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                    <h4><a class="product_name" href="index.php?pg=chitietsanpham&id='.$sanpham_id.'"> '.$sanpham_ten.' </a></h4>
                    <div class="price-box">
                        <span class="new-price"> '.$sanpham_gia.' VNĐ</span>
                        <span class="discount-percentage">'.$Sale.'%</span>
                    </div>
                </div>
                <div class="add-actions">
                    <ul class="add-actions-link">
                    <form action="index.php?pg=addcart" method="post">
                    <input type="hidden" name="sanpham_id"value="'.$sanpham_id.'">
                    <input type="hidden" name="sanpham_ten" class="name-sp" value="'.$sanpham_ten.'">
                    <input type="hidden" name="sanpham_img" value="'.$sanpham_img.'">
                    <input type="hidden" name="sanpham_gia" value="'.$sanpham_gia.'">
                    <input type="hidden" name="soluong" value="1">
                   
                    <li class="add-cart active" > <button class="button" style="border:0;" type="submit" name="addcart" style="font-size: 13px;" >Thêm Giỏ Hàng</button></li>
                    </form>
                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- single-product-wrap end -->
    </div>';
    }
    return $html_dssp;
}
function get_sanphamchitiet($id){
    $sql = "SELECT * FROM sanpham WHERE sanpham_id=?";
    return pdo_query_one($sql,$id);
}
function danhmuc_all(){
    $sql = "SELECT * FROM loai ORDER BY loai_id DESC";
    return pdo_query($sql);


}
function showdm($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?pg=dmsanpham&iddm='.$loai_id;
        $html_dm.='<li class="has-sub"><a href="'.$link.'">'.$loai_ten.'</a></li>';
    }
    return $html_dm;
}
function get_name_dm($iddm){
    $sql = "SELECT loai_ten FROM loai WHERE loai_id=".$iddm;
    $kq=pdo_query_one($sql);
    return $kq["loai_ten"];
}
?>
