<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Order Me</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="li-product-thumbnail">ID-Order</th>
                                <th class="cart-product-name">Ghi Chú</th>
                                <th class="li-product-price">Tổng Tiền</th>
                                <th class="li-product-stock-status">Trạng Thái</th>
                                <th class="li-product-stock-status">Ngày Đặt</th>
                                <th class="li-product-add-cart">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($results as $items) {
                                    extract($items);
                                    echo '
                                        <tr>
                                            <input type="hidden" value="'. $order_id .'" id="order-id-up">
                                            <input type="hidden" value="'. $order_status .'" id="order-status-up">
                                            <td class="li-product-thumbnail">Order-'. $order_id .'</td>
                                            <td class="li-product-name"><a href="#">'. $order_note .'</a></td>
                                            <td class="li-product-price"><span class="amount">$'. $order_total .'</span></td>
                                            ';
                                                if($order_status == 'Đã hủy') {
                                                    echo '<td class="li-product-stock-status"><span class="out-stock">'. $order_status .'</span></td>';
                                                } else {
                                                    echo '<td class="li-product-stock-status"><span class="in-stock">'. $order_status .'</span></td>';
                                                }
                                            echo '
                                            <td class="li-product-stock-status">'. $time_reg .'</td>
                                            <td class="li-product-add-cart"><a class="seen-details-order" style="cursor: pointer;">Xem Chi tiết</a></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-details" style="display: none;">
</div>

<script>
    $(".seen-details-order").on('click', function() {
        var id = $(this).closest('tr').find('#order-id-up').val();
        var status = $(this).closest('tr').find('#order-status-up').val();

        $.ajax({
            url: "controllers/xuly_order.php",
            method: "POST",
            data: {
                check: 'showDetailOrder',
                id: id,
                status: status
            },
            success: function(data) {
                $(".box-details").html(data);
                $(".box-details").css('display', 'block');
            }
        });
    });
</script>