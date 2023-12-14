
<?php
    function countAcc($value) {
        $i = 0;
        foreach($value as $items) {
            $i++;
        }
        return $i;
    }

    function countOrder($value) {
        $i = 0;
        foreach($value as $items) {
            $i++;
        }
        return $i;
    }

    function doanhThuAll($value) {
        $tong = 0;
        foreach($value as $items) {
            extract($items);
            if($order_status == 'Giao thành công') {
                $tong += $order_total;
            }
        }
        return $tong;
    }

    function doanhthuMonth($value) {
        $tong = 0;
        $dateNow = date('Y-m');
        foreach($value as $items) {
            extract($items);
            $dateOld = date('Y-m', strtotime($time_reg));
            if($order_status == 'Giao thành công') {
                if($dateNow == $dateOld) {
                    $tong += $order_total;
                }
            }
        }
        return $tong;
    }

    function doanhthuToday($value) {
        $tong = 0;
        $dateNow = date('Y-m-d');
        foreach($value as $items) {
            extract($items);
            $dateOld = date('Y-m-d', strtotime($time_reg));
            if($order_status == 'Giao thành công') {
                if($dateNow == $dateOld) {
                    $tong += $order_total;
                }
            }
        }
        return $tong;
    }

    function convert($value) {
        $value = date('Y', strtotime($value));
        return $value;
    }
?>
            <div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
        <h3 class="mb-0"> Xin chào, chào mừng bạn quay trở lại! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Trang web của bạn
                     mẫu trang tổng quan phân tích.</span>
             </h3>
            <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                    <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-warning">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Người dùng</p>
                                        <h2 class="text-white"> <?=countAcc($count_acc)?>
                                        </h2>
                                    </div> 
                                    <i class="fas fa-user card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                                </div>
                                <h6 class="text-white"><a href="?act=ql_tk">CHI TIẾT</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-danger">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Sản phẩm</p>
                                        <h2 class="text-white"> <?=$count_pro['tongSp']?>
                                        </h2>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                                </div>
                                <h6 class="text-white"><a href="?act=ql_sanpham">CHI TIẾT</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                        <div class="card bg-primary">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Đơn hàng</p>
                                        <h2 class="text-white"> <?=countAcc($count_order)?>
                                        </h2>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white"><a href="?act=ql_dh">CHI TIẾT</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5>Business Survey</h5>
                                <p class="text-muted"> Bất đầu từ: Năm <?=convert($old_year['time_reg'])?> <a class="text-muted font-weight-medium pl-2" href="?act=ql_dh"><u>Chi tiết</u></a>
                                </p>
                            </div>
                            <div class="col-sm-5 text-md-right">
                                <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                                    <i class="mdi mdi-email btn-icon-prepend"></i>Download Report </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card mb-3 mb-sm-0">
                                    <div class="card-body py-3 px-4">
                                        <p class="m-0 survey-head">Doanh thu tổng</p>
                                        <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                            <div>
                                                <h3 class="m-0 survey-value">$<?=doanhThuAll($count_order)?></h3>
                                            </div>
                                            <div id="earningChart" class="flot-chart" style="padding: 0px;"><canvas class="flot-base" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.0312px; height: 50.9961px;"></canvas><canvas class="flot-overlay" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.0312px; height: 50.9961px;"></canvas></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card mb-3 mb-sm-0">
                                    <div class="card-body py-3 px-4">
                                        <p class="m-0 survey-head">Doanh thu tháng</p>
                                        <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                            <div>
                                                <h3 class="m-0 survey-value">$<?=doanhthuMonth($count_order)?></h3>
                                            </div>
                                            <div id="productChart" class="flot-chart" style="padding: 0px;"><canvas class="flot-base" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.2461px; height: 50.9961px;"></canvas><canvas class="flot-overlay" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.2461px; height: 50.9961px;"></canvas></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body py-3 px-4">
                                        <p class="m-0 survey-head">Doanh thu hôm nay</p>
                                        <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                            <div>
                                                <h3 class="m-0 survey-value">$<?=doanhthuToday($count_order)?></h3>
                                            </div>
                                            <div id="orderChart" class="flot-chart" style="padding: 0px;"><canvas class="flot-base" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.2461px; height: 50.9961px;"></canvas><canvas class="flot-overlay" width="37" height="40" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 47.2461px; height: 50.9961px;"></canvas></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-12">
                                <div class="flot-chart-wrapper">
                                    <div id="flotChart" class="flot-chart" style="padding: 0px;">
                                        <canvas class="flot-base" width="508" height="220" style="width: 635.742px; height: 275.996px;"></canvas>
                                    <canvas class="flot-overlay" width="508" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 635.742px; height: 275.996px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="0.458984375" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">2000</text><text x="528.3316426028481" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">5500</text><text x="75.86936412183545" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">2500</text><text x="151.2797438686709" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">3000</text><text x="226.6901236155063" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">3500</text><text x="302.1005033623418" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">4000</text><text x="377.5108831091772" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">4500</text><text x="452.9212628560126" y="271.3085" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">5000</text></g></svg></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                            <p class="text-muted mb-0"> Điều quan trọng là phải tự mình chăm sóc bệnh nhân, nhưng sau đó anh ta sẽ được tham gia một chương trình huấn luyện
                                     trong thời gian đó chúng xảy ra như khi chuyển dạ và đau đớn. <b>Tìm hiểu thêm</b>
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->