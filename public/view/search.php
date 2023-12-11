<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active">Tìm Kiếm</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="view/images/bg-banner/2.jpg" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing 1 to 9 of 15</span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="trending">Relevance</option>
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                                <option value="rating">Price (Low &gt; High)</option>
                                <option value="date">Rating (Lowest)</option>
                                <option value="price-asc">Model (A - Z)</option>
                                <option value="price-asc">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <?php
                                        $i = 0;
                                        foreach ($show_new as $items) {
                                            if ($i == 12) {
                                                break;
                                            }
                                            $i++;
                                            extract($items);
                                            if ($product_del == 0.00) {
                                                $giamgia = 0;
                                            } else {
                                                $giamgia = (($product_price - $product_del) / $product_price) * 100;
                                            }
                                            $dateNow = date("Y-m-d");
                                            $giamgia = intval($giamgia);
                                            $image = explode(',', $image_files);
                                            echo '
                                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                                    <!-- single-product-wrap start -->
                                                                    <div class="single-product-wrap">
                                                                        <div class="product-image">
                                                                            <a href="?op=detail_pro&product_id='. $product_id .'&category_id='. $category_id .'">
                                                                                <img src="' . $image[0] . '" alt="Li"s Product Image">
                                                                            </a>
                                                                            ';
                                            if ($dateNow == $time_reg) {
                                                echo '<span class="sticker">New</span>';
                                            }
                                            echo '
                                                                        </div>
                                                                        <div class="product_desc">
                                                                            <div class="product_desc_info">
                                                                                <div class="product-review">
                                                                                    <h5 class="manufacturer">
                                                                                        <a href="?op=detail_pro&product_id='. $product_id .'&category_id='. $category_id .'">' . $category_name . '</a>
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
                                                                                <h4><a class="product_name" href="?op=detail_pro&product_id='. $product_id .'&category_id='. $category_id .'">' . $product_name . '</a></h4>
                                                                                <div class="price-box">
                                                                                    ';
                                                                                if ($giamgia == 0) {
                                                                                    echo '<span class="new-price">$' . $product_price . '</span>';
                                                                                    $tienProduct = $product_price;
                                                                                } else {
                                                                                    echo '
                                                                                        <span class="new-price new-price-2">$' . $product_del . '</span>
                                                                                        <span class="old-price">$' . $product_price . '</span>
                                                                                        <span class="discount-percentage">-' . $giamgia . '%</span>
                                                                                    ';
                                                                                    $tienProduct = $product_del;
                                                                                }
                                                                                echo '
                                                                                </div>
                                                                            </div>
                                                                            <div class="add-actions">
                                                                                <ul class="add-actions-link">
                                                                                    <li class="add-cart active" id="addToCartFix">
                                                                                        <form action="controllers/xuly_cart.php" method="POST" enctype="multipart/form-data">
                                                                                            <input type="hidden" name="id" value="'. $product_id .'">
                                                                                            <input type="hidden" name="name" value="'. $product_name .'">
                                                                                            <input type="hidden" name="price" value="'. $tienProduct .'">
                                                                                            <input type="hidden" name="qty" value="1">
                                                                                            <input type="hidden" name="img" value="'. $image[0] .'">
                                                                                            <button class="add-to-cart" name="addToCartDetail" type="submit">Add to cart</button>
                                                                                        </form>
                                                                                    </li>
                                                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                    <li><a href="?op=detail_pro&product_id='. $product_id .'&category_id='. $category_id .'&product_id='. $product_id .'&category_id='. $category_id .'" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- single-product-wrap end -->
                                                                </div>
                                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                    <div class="sidebar-title">
                        <h2>Laptop</h2>
                    </div>
                    <!-- category-sub-menu start -->
                    <div class="category-sub-menu">
                        <ul>
                            <li class="has-sub"><a href="# ">Prime Video</a>
                                <ul>
                                    <li><a href="#">All Videos</a></li>
                                    <li><a href="#">Blouses</a></li>
                                    <li><a href="#">Evening Dresses</a></li>
                                    <li><a href="#">Summer Dresses</a></li>
                                    <li><a href="#">T-Rent or Buy</a></li>
                                    <li><a href="#">Your Watchlist</a></li>
                                    <li><a href="#">Watch Anywhere</a></li>
                                    <li><a href="#">Getting Started</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Computer</a>
                                <ul>
                                    <li><a href="#">TV & Video</a></li>
                                    <li><a href="#">Audio & Theater</a></li>
                                    <li><a href="#">Camera, Photo</a></li>
                                    <li><a href="#">Cell Phones</a></li>
                                    <li><a href="#">Headphones</a></li>
                                    <li><a href="#">Video Games</a></li>
                                    <li><a href="#">Wireless Speakers</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Electronics</a>
                                <ul>
                                    <li><a href="#">Amazon Home</a></li>
                                    <li><a href="#">Kitchen & Dining</a></li>
                                    <li><a href="#">Bed & Bath</a></li>
                                    <li><a href="#">Appliances</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Brand</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Prime Video (13)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Computers (12)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Electronics (11)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Graphic Corner (10)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#"> Studio Design (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Size</h5>
                        <div class="size-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Color</h5>
                        <div class="color-categoriy">
                            <form action="#">
                                <ul>
                                    <li><span class="white"></span><a href="#">White (1)</a></li>
                                    <li><span class="black"></span><a href="#">Black (1)</a></li>
                                    <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                    <li><span class="Blue"></span><a href="#">Blue (2) </a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                        <h5 class="filter-sub-titel">Dimension</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">40x60cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">60x90cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">80x120cm (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!-- category-sub-menu start -->
                <div class="sidebar-categores-box mb-sm-0">
                    <div class="sidebar-title">
                        <h2>Laptop</h2>
                    </div>
                    <div class="category-tags">
                        <ul>
                            <li><a href="# ">Devita</a></li>
                            <li><a href="# ">Cameras</a></li>
                            <li><a href="# ">Sony</a></li>
                            <li><a href="# ">Computer</a></li>
                            <li><a href="# ">Big Sale</a></li>
                            <li><a href="# ">Accessories</a></li>
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
            </div>
        </div>
    </div>
</div>