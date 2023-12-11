<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> Xin chào, chào mừng đến với trang quản lý sản phẩm!
                <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">
                    Quản lý tất cả sản phẩm - thêm - sửa - xóa
                </span>
            </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tất cả sản phẩm</h4>
                    <p></p>
                    <div class="table-responsive">
                        <table class="table table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th style="width: 2%;">#</th>
                                    <th style="width: 28%;">Tên sản phẩm</th>
                                    <th style="width: 10%;">Giá</th>
                                    <th style="width: 18%;">danh mục</th>
                                    <th style="width: 15%;">Hình sản phẩm</th>
                                    <th style="width: 15%;">Số lượng</th>
                                    <th style="width: 13%;">Ngày cập nhật</th>

                                    <th style="width: 12%;">Xóa sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                    $i = 0;
                                    foreach($show as $mod) {
                                        $i++;
                                        extract($mod);
                                        $image = explode(',', $image_files);
                                        $name = mb_substr($product_name, 0, 5, 'UTF-8') . '...';
                                        echo '
                                            <tr>
                                                <td class="py-1">
                                                '. $i .'
                                                </td>
                                                <td>'. $name .'</td>
                                                <td style="word-wrap: break-word;">
                                                $'. $product_price .'
                                                </td>
                                                <td style="word-wrap: break-word;">
                                                '. $category_name .'
                                                </td>
                                                <td>
                                                    <img style="height:70px; width:100px;" src="../public/'. $image[0] .'" alt="" style="width:100%;">
                                                </td>
                                                <td>'. $product_qty .'</td>
                                                <td>'. $time_reg .'</td>
                                                <td>
                                                    <a href="index.php?act=update_Product&id='. $product_id .'&cate_id='. $category_id .'&pro_price='. $product_price .'&pro_del='. $product_del .'&pro_name='. $product_name .'&pro_qty='. $product_qty .'&pro_des='. $product_des .'" class="mdi text-light">
                                                        <button class="btn btn-warning btn-rounded btn-sm"> Sửa </button>
                                                    </a>
                                                    <a href="controllers/xuly_product.php?action=delete_product&id='. $product_id .'" class="mdi text-light">
                                                        <button class="btn btn-danger btn-rounded btn-sm"> Xóa </button>
                                                    </a>
                                                </td>
                                            </tr>    
                                        ';
                                    }
                                ?>                  
                                
                                
                                <!-- <tr style="height:100px;">
                                    <td class="py-1">
                                        '.$i.'
                                    </td>
                                    <td> '.$sanpham_ten.' </td>

                                    <td style="word-wrap: break-word;">
                                        '.$sanpham_gia.'
                                    </td>
                                    <td> '.$sanpham_theloai.' </td>
                                    <td>
                                        <img src="./../layout/images/product/large-size/'.$sanpham_img.'" alt="" style="width:100%;height:100%;">
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
                                </tr> -->


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quản lý sản phẩm</h4>
                        <form class="form-group" action="index.php?action=option_product" method="POST"
                            enctype="multipart/form-data">
                            <label>Chọn chức năng</label>
                            <select class="js-example-basic-single" style="width: 45%;" name="product_function">
                                <option value="update_catalog">Cập nhật sản phẩm</option>
                                <option value="add_product">Thêm sản phẩm</option>
                            </select>
                            <input type="submit" name="option_product" class="btn btn-primary mr-2"
                                value="Thực hiện"></input>
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                        <form class="forms-sample" action="controllers/xuly_product.php" method="POST" enctype="multipart/form-data">   
                            <div class="form-group">
                                <label for="exampleInputName1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="product_name" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Chọn danh mục</label>
                                <select class="form-control" name="loai_id">
                                    <?php 
                                        foreach($showCate as $mod) {
                                            extract($mod);
                                            echo '
                                                <option value="'. $category_id .'">'. $category_name .'</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Giá gốc</label>
                                <input type="number" class="form-control" id="exampleInputName1" name="product_price" placeholder="Giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Giá giảm</label>
                                <input type="number" class="form-control" id="exampleInputName1" name="product_del" placeholder="Có thể bỏ qua">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Số Lượng</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="sanpham_soluong" placeholder="Số Lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Mô Tả</label> <br>
                                <textarea style="border: 1px soild pink;" name="product_des" id="sanpham_mota" cols="45" rows="5" placeholder="Nhập Mô Tả sản Phẩm..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Upload hình</label>
                                <input type="file" class="form-control" id="exampleInputName1" name="images[]" multiple>
                            </div>

                            <input type="submit" class="btn btn-primary mr-2" name="add_product" value=" Thêm Sản Phẩm ">
                            <!-- <button class="btn btn-light">Trở lại</button> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body" action="index.php?action=update_product" method="POST"
                        enctype="multipart/form-data">
                        <div class="row mb-1">
                            <h4 class="card-title mb-0">Cập nhật sản phẩm</h4>
                            <span class="pl-0 h4 pl-sm-2 text-muted d-inline-block" name="tensp" value="">
                                Only Check Trouser </span>
                        </div>
                        <div class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên sản phẩm mới</label>
                                <input type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Tên sản phẩm mới" name="tensp" value="Only Check Trouser">
                                <input type="hidden" class="form-control" id="exampleInputName1"
                                    placeholder="Tên sản phẩm mới" name="id" value="58">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Chọn danh mục</label>
                                <select class="form-control" name="iddm">
                                    <option value="3">
                                        Women </option>
                                    <option value="5" selected="">
                                        Men </option>
                                    <option value="8">
                                        Bag </option>
                                    <option value="9">
                                        Shoes </option>
                                    <option value="10">
                                        Watches </option>
                                    <option value="11">
                                        Test </option>
                                    <option value="14">
                                        Test 2 </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Upload hình</label>
                              <img class="col-12" src="../uploads/product-03.jpg" alt="">
                                <input type="file" class="form-control" id="exampleInputName1" name="img">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Giá</label>
                                <input class="form-control" id="exampleTextarea1" rows="4" name="gia" value="999999">
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" value=" Cập nhật ">
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ps32791
                2023<br>
                Distributed By <a href="https://www.facebook.com/thuy.thien.9003888" target="_blank"></a>

            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://ap.poly.edu.vn/" target="_blank">FPT Polytechnic</a> from
                ap.poly.edu.vn</span>
        </div>
    </footer>
</div>