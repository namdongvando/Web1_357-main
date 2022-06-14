<?php

namespace Theme\KuteShop;

use Model\Banner;
use Model\Menu;
use Model\Options;
use Model\Setting;

class Functions
{

    public static function Footer()
    {
?>
        <footer id="footer">
            <!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>e</span>-shopper</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed
                                    do eiusmod tempor
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="/public/Eshopper/images/home/iframe1.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="/public/Eshopper/images/home/iframe2.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="/public/Eshopper/images/home/iframe3.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="/public/Eshopper/images/home/iframe4.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="/public/Eshopper/images/home/map.png" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $menu = new Menu();
                                    $MenuItem = $menu->GetByGroupNameCapCha("FooterMenu", 0);
                                    if ($MenuItem)
                                        while ($row = $MenuItem->fetch_assoc()) {
                                            $_item = new Menu($row);
                                    ?>
                                        <li>
                                            <a href="<?php echo $_item->Link; ?>">
                                                <?php echo $_item->Name; ?>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $menu = new Menu();
                                    $MenuItem = $menu->GetByGroupNameCapCha("FooterMenu1", 0);
                                    if ($MenuItem)
                                        while ($row = $MenuItem->fetch_assoc()) {
                                            $_item = new Menu($row);
                                    ?>
                                        <li>
                                            <a href="<?php echo $_item->Link; ?>">
                                                <?php echo $_item->Name; ?>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $menu = new Menu();
                                    $MenuItem = $menu->GetByGroupNameCapCha("FooterMenu2", 0);
                                    if ($MenuItem)
                                        while ($row = $MenuItem->fetch_assoc()) {
                                            $_item = new Menu($row);
                                    ?>
                                        <li>
                                            <a href="<?php echo $_item->Link; ?>">
                                                <?php echo $_item->Name; ?>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $menu = new Menu();
                                    $MenuItem = $menu->GetByGroupNameCapCha("FooterMenu3", 0);
                                    if ($MenuItem)
                                        while ($row = $MenuItem->fetch_assoc()) {
                                            $_item = new Menu($row);
                                    ?>
                                        <li>
                                            <a href="<?php echo $_item->Link; ?>">
                                                <?php echo $_item->Name; ?>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-arrow-circle-o-right"></i>
                                    </button>
                                    <p>
                                        Get the most recent updates from <br />our site and be
                                        updated your self...
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">
                            Copyright © __Copyright__. All rights reserved.
                        </p>
                        <p class="pull-right">
                            Designed by
                            <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->
    <?php
    }

    public static function Header()
    {
    ?>
        <header id="header">
            <!--header-->
            <div class="header_top">
                <!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li>
                                        <a href="#"><i class="fa fa-phone"></i> __SDT__</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-envelope"></i> __Email__</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header_top-->
            <div class="header-middle">
                <!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.html">
                                    <img style="height: 80px;" src="__Logo__" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        USA
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canada</a></li>
                                        <li><a href="#">UK</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        DOLLAR
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canadian Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php
                                    $menu = new Menu();
                                    $MenuItem = $menu->GetByGroupNameCapCha("MenuTopHeader", 0);
                                    while ($row = $MenuItem->fetch_assoc()) {
                                        $_item = new Menu($row);
                                    ?>
                                        <li>
                                            <a href="<?php echo $_item->Link; ?>">
                                                <i class="<?php echo $_item->Icon; ?>"></i>
                                                <?php echo $_item->Name; ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->

            <div class="header-bottom">
                <!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <?php
                                    $MenuItem = $menu->GetByGroupNameCapCha("MainMenu", 0);
                                    if ($MenuItem) {
                                        while ($row = $MenuItem->fetch_assoc()) {
                                            $_item = new Menu($row);
                                            // lấy danh sách menu cấp 2
                                            $MenuItem2 = $menu->GetByGroupNameCapCha("MainMenu", $_item->Id);
                                            // có cấp 2
                                            if ($MenuItem2) {
                                    ?>
                                                <li class="dropdown">
                                                    <a href="#"><?php echo  $_item->Name ?><i class="fa fa-angle-down"></i></a>
                                                    <ul role="menu" class="sub-menu">
                                                        <?php
                                                        while ($row1 = $MenuItem2->fetch_assoc()) {
                                                            $_item1 = new Menu($row1);
                                                        ?>
                                                            <li><a href="<?php echo  $_item1->Link ?>"><?php echo  $_item1->Name ?></a></li>
                                                        <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>

                                            <?php
                                            } else {
                                                // không có cấp 2
                                            ?>
                                                <li><a href="<?php echo  $_item->Link; ?>"><?php echo  $_item->Name; ?></a></li>
                                    <?php
                                            }
                                        }
                                    }

                                    ?>


                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-bottom-->
        </header>
        <!--/header-->
    <?php
    }

    public static function slider($controller, $actions)
    {
        if ($controller != "index" || $actions != "index") {
            return;
        }
        $banner = new Banner();
        // danh sách item của banner theo nhóm
        $items = $banner->GetByGroupName("BannerHome");

    ?>
        <section id="slider">
            <!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <?php
                                if ($items) {
                                    $index = 0;
                                    while ($row = $items->fetch_assoc()) {
                                        $_item = new Banner($row);
                                ?>
                                        <div class="item <?php echo  $index++ == 0 ? "active" : "" ?>">
                                            <div class="col-sm-6">
                                                <?php echo $_item->Description ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="<?php echo $_item->UrlImages ?>" class="girl img-responsive" alt="" />

                                            </div>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/slider-->
    <?php
    }
    public static function leftSidebar()
    {
    ?>
        <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian">
                <!--category-productsr-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Sportswear
                            </a>
                        </h4>
                    </div>
                    <div id="sportswear" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Nike </a></li>
                                <li><a href="#">Under Armour </a></li>
                                <li><a href="#">Adidas </a></li>
                                <li><a href="#">Puma</a></li>
                                <li><a href="#">ASICS </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Mens
                            </a>
                        </h4>
                    </div>
                    <div id="mens" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Fendi</a></li>
                                <li><a href="#">Guess</a></li>
                                <li><a href="#">Valentino</a></li>
                                <li><a href="#">Dior</a></li>
                                <li><a href="#">Versace</a></li>
                                <li><a href="#">Armani</a></li>
                                <li><a href="#">Prada</a></li>
                                <li><a href="#">Dolce and Gabbana</a></li>
                                <li><a href="#">Chanel</a></li>
                                <li><a href="#">Gucci</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Womens
                            </a>
                        </h4>
                    </div>
                    <div id="womens" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Fendi</a></li>
                                <li><a href="#">Guess</a></li>
                                <li><a href="#">Valentino</a></li>
                                <li><a href="#">Dior</a></li>
                                <li><a href="#">Versace</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Kids</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Fashion</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Households</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Interiors</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Clothing</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Bags</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Shoes</a></h4>
                    </div>
                </div>
            </div>
            <!--/category-products-->

            <div class="brands_products">
                <!--brands_products-->
                <h2>Brands</h2>
                <div class="brands-name">
                    <ul class="nav nav-pills nav-stacked">
                        <?php
                        $modelOptions = new Options();
                        $options = $modelOptions->GetByGroupName("ThuongHieu");
                        while ($row = $options->fetch_assoc()) {
                            $_item = new Options($row);
                        ?>
                            <li>
                                <a href="#"> <span class="pull-right">(50)</span>
                                    <?php echo  $_item->Name ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <!-- <li>
                            <a href="#">
                                <span class="pull-right">(56)</span>Grüne Erde</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-right">(27)</span>Albiro</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-right">(32)</span>Ronhill</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-right">(5)</span>Oddmolly</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-right">(9)</span>Boudestijn</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-right">(4)</span>Rösch creative
                                culture</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!--/brands_products-->

            <div class="price-range">
                <!--price-range-->
                <h2>Price Range</h2>
                <div class="well text-center">
                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" /><br />
                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                </div>
            </div>
            <!--/price-range-->

            <div class="shipping text-center">
                <!--shipping-->
                <img src="/public/Eshopper/images/home/shipping.jpg" alt="" />
            </div>
            <!--/shipping-->
        </div>

<?php
    }

    public  static function DecodeHTML()
    {
        $str = ob_get_clean();
        $setting = new Setting();
        $settings =  $setting->Get();
        while ($row = $settings->fetch_assoc()) {
            $str = str_replace(
                "__{$row["Code"]}__",
                $row["Description"],
                $str
            );
        }
        // var_dump($settings);
        echo $str;
    }
}
