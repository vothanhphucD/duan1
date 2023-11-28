   <!-- Header Area End Here -->
   <?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
      extract($_SESSION['s_user']);
    }
?>
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Thông Tin Tài Khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="index.php?pg=updateuser" method="post">
                                <div class="login-form">
                                    <h4 class="login-title">THÔNG TIN TÀI KHOẢN CỦA BẠN</h4>
                                    <div class="row">
                                        <!-- <div class="col-md-6 col-12 mb-20">
                                            <label>Họ </label>
                                            <input  class="mb-0" type="text" placeholder="First Name">
                                        </div> -->
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên Đăng Nhập</label>
                                            <input id="user_name" name="user_name" value="<?=$user_name?>" class="mb-0" type="text" placeholder="Nhập tên đăng nhập...">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email *</label>
                                            <input id="user_email" name="user_email" value="<?=$user_email?>" class="mb-0" type="email" placeholder="Nhập email...">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật khẩu</label>
                                            <input id="user_pass" name="user_pass" value="<?=$user_pass?>" class="mb-0" type="password" placeholder="Nhập mật khẩu...">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Địa Chỉ *</label>
                                            <input id="user_diachi" name="user_diachi" value="<?=$user_diachi?>" class="mb-0" type="text" placeholder="Nhập địa chỉ...">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Điện Thoại</label>
                                            <input id="user_sdt" name="user_sdt" value="<?=$user_sdt?>" class="mb-0" type="number" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="col-12 input-khang">
                                            <input type="hidden" name="user_id" value="<?$user_id?>">
                                            <input class="register-button" type="submit" name="capnhat" value="Cập Nhật">
    
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->