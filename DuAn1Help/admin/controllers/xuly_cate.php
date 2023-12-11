<?php
    include '../model/category.php';
    extract($_REQUEST);

    if(isset($check)) {
        if($check == 'downCate') {
            $cate = new cate();
            $cate->upCate('Không hoạt động', $id);
            echo '
                <script>
                    alert("Cập nhật danh mục thành công");
                    window.location.href = "../?act=ql_dm"
                </script>
            ';
        } else if($check == 'upCate') {
            $cate = new cate();
            $cate->upCate('Đang hoạt động', $id);
            echo '
                <script>
                    alert("Cập nhật danh mục thành công");
                    window.location.href = "../?act=ql_dm"
                </script>
            ';
        }
    }

    if(isset($add_category)) {
        $cate = new cate();
        $cate->addCate($category_name);
        echo '
            <script>
                alert("Thêm danh mục thành công");
                window.location.href = "../?act=ql_dm"
            </script>
        ';
    }
?>