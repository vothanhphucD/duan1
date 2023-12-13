<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active">Xác Nhận Thanh Toán</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <?php
                        if(!isset($_SESSION['x_user'])) {
                            echo '
                                <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                <div id="checkout-login" class="coupon-content">
                                    <div class="coupon-info">
                                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                        <form action="#">
                                            <p class="form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row-last">
                                                <label>Password <span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row">
                                                <input value="Login" type="submit">
                                                <label>
                                                    <input type="checkbox">
                                                    Remember me
                                                </label>
                                            </p>
                                            <p class="lost-password"><a href="#">Lost your password?</a></p>
                                        </form>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    <!--Accordion End-->
                    <!--Accordion Start-->
                    <!-- <?php
                    if(isset($giamgia) && isset($magiamgia)) {
                        if($giamgia == 0 && $magiamgia == '') {
                            echo '
                                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input placeholder="Coupon code" type="text">
                                                <input value="Apply Coupon" type="submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        echo '
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        ';
                    }
                    ?> -->
                    <!--Accordion End-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="#">
                    <div class="checkbox-form">
                        <h3>Chi Tiết Thanh Toán</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ<span class="required">*</span></label>
                                    <input placeholder="" value="<?=$_SESSION['x_user']['account_firstName']?>" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên<span class="required">*</span></label>
                                    <input placeholder="" value="<?=$_SESSION['x_user']['account_lastName']?>" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa Chỉ <span class="required">*</span></label>
                                    <?php
                                        if(isset($_SESSION['x_user']) && $_SESSION['x_user']['account_address'] != '') {
                                            echo '
                                                <input placeholder="Street address" value="'. $_SESSION['x_user']['account_address'] .'" type="text">
                                            ';
                                        } else {
                                            echo '
                                                <input placeholder="Street address" type="text" id="address" required>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <?php
                                        if(isset($_SESSION['x_user']) && $_SESSION['x_user']['account_email'] != '') {
                                            echo '
                                                <input placeholder="" value="'. $_SESSION['x_user']['account_email'] .'" type="email" readonly>
                                            ';
                                        } else {
                                            echo '
                                                <input placeholder="" type="email" required>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số Điện Thoại <span class="required">*</span></label>
                                    <?php
                                        if(isset($_SESSION['x_user']) && $_SESSION['x_user']['account_phone'] != '') {
                                            echo '
                                                <input placeholder="" value="'. $_SESSION['x_user']['account_phone'] .'" type="text" readonly>
                                            ';
                                        } else {
                                            echo '
                                                <input placeholder="" id="yourphone" type="text" required>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <label>Account password <span class="required">*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div> -->
                        </div>
                        <div class="different-address">
                            <!-- <div class="ship-different-title">
                                <h3>
                                    <label>Ship to a different address?</label>
                                    <input id="ship-box" type="checkbox">
                                </h3>
                            </div>
                            <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="nice-select wide">
                                            <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div> -->
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi Chú Đặt Hàng</label>
                                    <textarea id="checkout-mess" cols="30" rows="10" placeholder="Ghi chú về đơn đặt hàng của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>ĐẶT HÀNG CỦA BẠN</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Sản Phẩm</th>
                                    <th class="cart-product-name">Số lượng</th>
                                    <th class="cart-product-total">Tổng</th>
                                 
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($results as $items) {
                                        extract($items);
                                        echo '
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> '. $cart_name .'</td>
                                                <td><strong class="product-quantity"> × '. $cart_qty .'</strong></td>
                                                <td class="cart-product-total"><span class="amount">$'.$cart_price .'</span></td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tổng phụ của giỏ hàng</th>
                                    <td></td>
                                    <td><span class="subTotal">$<?=$subTotal?></span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Giảm giá</th>
                                    <td></td>
                                    <td><span class="discount"><?=$giamgia?>%</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Tổng số đơn hàng</th>
                                    <td></td>
                                    <td><strong><span class="amount">$<?=$total?></span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <!-- <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title">
                                            <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Chuyển khoản trực tiếp.
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                        <p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã được chuyển vào tài khoản của chúng tôi.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Cheque Payment
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-3">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                PayPal
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="order-button-payment">
                                <form action="controllers/xuly_order.php" method="POST">
                                    <div class="ptpay" style="border-bottom: 1px solid black;">
                                        <select name="phuongthuc" id="phuongthuc">
                                            <option value="Tiền mặt">Tiền mặt</option>
                                            <option value="Chuyển khoản">Chuyển khoản</option>
                                        </select>
                                        <img id="qrCode" src="" width="150px" alt="">
                                    </div>
                                    <input type="hidden" id="note-up" name="note" value="<?=$total?>">
                                    <input type="hidden" id="address-form" name="address" value="<?=$total?>">
                                    <input type="hidden" id="check-form" name="check" value="0">
                                    <input type="hidden" id="phone-form" name="phone" value="<?=$total?>">
                                    <input type="hidden" id="total-up" name="total" value="<?=$total?>">
                                    <input type="hidden" id="subTotal-up" name="subTotal" value="<?=$subTotal?>">
                                    <input type="hidden" id="discount" name="magiamgia" value="<?=$magiamgia?>">
                                    <input id="payOrder" name="payOrder" name="phuongthuc" value="Thanh Toán" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#payOrder").on('click', function(e) {
            var valAddress = $("#address").val();
            var valPhone = $("#yourphone").val();
            if(valAddress === '' && valPhone === '') {
                e.preventDefault();
                alert('Vui lòng điền đủ địa chỉ và số điện thoại nhận hàng!')
            } else {
                $("#address-form").val(valAddress);
                $("#phone-form").val(valPhone);
                $("#check-form").val(1);
            }
        });
    });

    $("#phuongthuc").on('change', function() {
        var val = $(this).val();
        if(val == "Chuyển khoản") {
            $("#qrCode").css('display', 'block');
            $("#qrCode").attr("src", "view/images/payment/qr.png");
        } else {
            $("#qrCode").css('display', 'none');
        }
    });

    $("#checkout-mess").change(function() {
        var value = $(this).val();
        $("#note-up").val(value);
    });
</script>