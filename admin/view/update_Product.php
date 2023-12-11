<div class="col-md-6 grid-margin stretch-card" style="position: relative; z-index: 9999;">
                <div class="card" style="margin-top: 100px;">
                    <div class="card-body" >
                        <h4 class="card-title" style="color:red; font-size: 25px;">Cập nhật</h4>
                        <form class="forms-sample" action="controllers/xuly_product.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputName1" value="<?=$_GET['pro_name']?>" name="product_name" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Chọn danh mục</label>
                                <select class="form-control" name="loai_id">
                                    <option value="<?=$_GET['cate_id']?>"><?=$_GET['cate_id']?></option>
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
                                <input type="number" class="form-control" id="exampleInputName1" value="<?=$_GET['pro_price']?>" name="product_price" placeholder="Giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Giá giảm</label>
                                <input type="number" class="form-control" id="exampleInputName1" value="<?=$_GET['pro_del']?>" name="product_del" placeholder="Có thể bỏ qua">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Số Lượng</label>
                                <input type="text" class="form-control" id="exampleInputName1" value="<?=$_GET['pro_qty']?>" name="sanpham_soluong" placeholder="Số Lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Mô Tả</label> <br>
                                <textarea style="border: 1px soild pink;" name="product_des" id="sanpham_mota" cols="60" rows="5"><?=$_GET['pro_des']?></textarea>
                            </div>
                            <input type="hidden" name="pro_id" value="<?=$_GET['id']?>">
                            <input type="submit" class="btn btn-primary mr-2" name="up_product" value=" Cập nhật sản phẩm ">
                            <!-- <button class="btn btn-light">Trở lại</button> -->
                        </form>
                    </div>
                </div>
            </div>