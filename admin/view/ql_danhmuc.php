<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> Xin chào, chào mừng đến với trang quản lý danh mục!
                <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">
                    Quản lý tất cả danh mục - thêm - sửa - xóa
                </span>
            </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tất cả danh mục</h4>
                    <p></p>
                    <div class="table-responsive">
                        <table class="table table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">Stt</th>
                                    <th style="width: 12%;">Tên danh mục</th>
                                    <th style="width: 15%;">Số lượng sản phẩm</th>
                                    <th style="width: 15%;">Trạng thái</th>
                                    <th style="width: 15%;">Ngày cập nhật</th>
                                    <th style="width: 15%;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm danh mục</h4>
                        <form class="forms-sample" action="controllers/xuly_cate.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="category_name" placeholder="Tên danh mục">
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="add_category" value=" Thêm ">
                            <!-- <button class="btn btn-light">Trở lại</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ps32791
                2023<br>
                Distributed By <a href="https://www.facebook.com/thuy.thien.9003888" target="_blank">DreamMakers</a>

            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://ap.poly.edu.vn/" target="_blank">FPT Polytechnic</a> from
                ap.poly.edu.vn</span>
        </div>
    </footer>
</div>