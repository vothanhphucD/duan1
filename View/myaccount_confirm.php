   <!-- Header Area End Here -->
   <?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
      extract($_SESSION['s_user']);
      $userinfo=get_user($user_id);
      $_SESSION['s_user']=$userinfo;
      extract($userinfo);
    }
?>
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li class="active">Cập Nhập Thông Tin</li>
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

                                <div class="login-form">
                                    <h4 class="login-title">THÔNG TIN TÀI KHOẢN ĐÃ CẬP NHẬT</h4>
                                    <div class="row">
                                        <!-- <div class="col-md-6 col-12 mb-20">
                                            <label>Họ </label>
                                            <input  class="mb-0" type="text" placeholder="First Name">
                                        </div> -->
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên Đăng Nhập</label>
                                          <?=$user_name?>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email *</label>
                                            <?=$user_email?>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Địa Chỉ *</label>
                                           <?=$user_diachi?>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Điện Thoại</label>
                                           <?=$user_sdt?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->