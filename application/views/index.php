 <?php $this->load->view('header'); ?>
    <div class="main-wrapper wrapper">
        <!-- slide banner -->
        <div id="top-slide" class="main-slide-wrap ">
            <div class="main-slide">
                <?php foreach($bannerloai1 as $item){?>
					<div>
                        <a href="<?=$item['link']?>">
			        <img src="<?=$item['img']?>" class="img-responsive des-slide " alt="MAIN PC SLIDE IMAGE">
			        </a>

                    </div>
                <?php }?>
            </div>
            <div class="scroll-animate"></div>
        </div>
        <!-- end slider banner -->

        <!-- banner 2 -->
        <div id="main-banner2">
          
                <?php foreach($bannerloai3 as $item){?>
					
                    <div class="col-2-des  wow fadeInLeft">
                   <a href="<?=$item['link']?>">
                        <img src="<?=$item['img']?>" class="img">
                        </a>
                        </div>
                <?php }?>
               
					<div class="col-2-des wow fadeInRight">
                        <!-- slide banner 2 -->
                        <div class="main-slide-wrap ">
                            <div class="main-slide2">                              
                                <?php foreach($bannerloai2 as $item){?>
                                <div>
                                    <a href="<?=$item['link']?>">
                                <img src="<?=$item['img']?>" class="img-responsive " alt="MAIN PC SLIDE IMAGE">
                                </a>
                                </div>
                                <?php }?>                                
                            </div>
                        </div>
                        <!-- end slider banner 2 -->
                    </div>
            
                    
        </div>
        <!-- end banner 2 -->






        <!-- video airun -->
        <div id="airun-banner" class="banner-main  wow fadeIn " data-wow-duration="2s" data-wow-offset="100">
            <div class="r-video wow fadeIn " data-wow-duration="2s" data-wow-offset="100">
                <iframe width="100%" height="630" src="https://www.youtube.com/embed/3n10HWgXesw" frameborder="0" allowfullscreen=""></iframe>
                <div class="r-ytb_thumb">
                    <div class="r-ytb_thumb_op">
                        <a href="#" class="r-ytb-button"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end video airun -->
        <!-- special item -->
        <div id="special-item-product" class="catori-product container-main">
            <div class="title-cato">
                <h3 class="tile-text">LIME BASIS</h3>
                <p class="seemore">
                    <a href="category/limebasis">XEM THÊM</a>
                </p>
            </div>
            <div class="productlist">
                 <?php foreach($lime as $item){?>
               
                    <div class="product-item col-4-des col-2-mob wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">

                        <div class="img-product">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <img src="<?= $item['img_main'] ?>" class="img img-stock ">
                            </a>
                            <img src="<?= $item['img_sub'] ?>" class="img img-detail">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="gallery-over">
                                    <div class="gallery-over-item">
                                        <div class="gallery-over-wrap-contents">
                                            <!-- Normal -->
                                            <img src="/assets/img/gallery-search1.png" class="gallery-heart">
                                            <p class="gallery-txt-wrap">
                                                <span class="gallery-txt">XEM CHI TIẾT</span>
                                            </p>
                                            <!-- Normal -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="info-product ">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="info-left">
                                    <div class="gallery-icon">
                                        <div class="new">NEW</div>
                                    </div>
                                    <p class="product-code">
                                        <?= $item['id'] ?>
                                    </p>
                                    <p class="product-name">
                                        <?= $item['name'] ?>
                                    </p>
                                </div>
                                <p class="product-price number" data="
                                <?= $item['cost'] ?>">
                                    <?= $item['cost'] ?>
                                </p>
                            </a>
                            <div class="color-list">
                                <ul>
                                    <li>
                                        <span>
		                                	<img class="img-color" src="http://admocmgo2o.limeorange.vn/uploads/color/20150508155405_lMMtnUK78i.jpg">
										</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 <?php } ?>



            </div>
        </div>
        <!-- end special item -->
        <!--  rhyme video item -->
        <div id="rhymeorange-banner" class="banner-main wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
            <div class="r-video wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
                <iframe width="100%" height="630" src="https://www.youtube.com/embed/2Fs8B82URZI" frameborder="0" allowfullscreen=""></iframe>
                <div class="r-ytb_thumb">
                    <div class="r-ytb_thumb_op">
                        <a href="#" class="r-ytb-button"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end rhyme video item -->
        <!-- AW item -->
        <div id="special-item-product" class="catori-product container-main">
            <div class="title-cato">
                <h3 class="tile-text">AW PRODUCT</h3>
                <p class="seemore">
                    <a href="category/afterwork">XEM THÊM</a>
                </p>
            </div>
            <div class="productlist">
                 <?php foreach($rhyme as $item){?>
                    <div class="product-item col-4-des col-2-mob wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">

                        <div class="img-product">
                            <a href="detailproduct/<?= $item['id'] ?>">
                            <img src="<?= $item['img_main'] ?>" class="img img-stock ">
                        </a>
                            <img src="<?= $item['img_sub'] ?>" class="img img-detail">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="gallery-over">
                                    <div class="gallery-over-item">
                                        <div class="gallery-over-wrap-contents">
                                            <!-- Normal -->
                                            <img src="/assets/img/gallery-search1.png" class="gallery-heart">
                                            <p class="gallery-txt-wrap">
                                                <span class="gallery-txt">XEM CHI TIẾT</span>
                                            </p>
                                            <!-- Normal -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="info-product ">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="info-left">
                                    <div class="gallery-icon">
                                        <div class="new">NEW</div>
                                    </div>
                                    <p class="product-code">
                                        <?= $item['id'] ?>
                                    </p>
                                    <p class="product-name">
                                        <?= $item['name'] ?>
                                    </p>
                                </div>
                                <p class="product-price number" data="
                                <?= $item['cost'] ?>">
                                    <?= $item['cost'] ?>
                                </p>
                            </a>
                            <div class="color-list">
                                <ul>
                                    <li>
                                        <span>
                                        <img class="img-color" src="http://admocmgo2o.limeorange.vn/uploads/color/20150508155405_lMMtnUK78i.jpg">
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 <?php } ?>



            </div>
        </div>
        <!-- end AW item -->
        <!--  rhyme video item -->
        <div id="rhymeorange-banner" class="banner-main wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
            <div class="r-video wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
                <iframe width="100%" height="630" src="https://www.youtube.com/embed/2Fs8B82URZI" frameborder="0" allowfullscreen=""></iframe>
                <div class="r-ytb_thumb">
                    <div class="r-ytb_thumb_op">
                        <a href="#" class="r-ytb-button"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end rhyme video item -->
        <!-- BW item -->
        <div id="special-item-product" class="catori-product container-main">
            <div class="title-cato">
                <h3 class="tile-text">BW PRODUCT</h3>
                <p class="seemore">
                    <a href="category/bwproduct">XEM THÊM</a>
                </p>
            </div>
            <div class="productlist">
                <?php foreach($lime as $item){?>
                    <div class="product-item col-4-des col-2-mob wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">

                        <div class="img-product">
                            <a href="detailproduct/<?= $item['id'] ?>">
                            <img src="<?= $item['img_main'] ?>" class="img img-stock ">
                        </a>
                            <img src="<?= $item['img_sub'] ?>" class="img img-detail">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="gallery-over">
                                    <div class="gallery-over-item">
                                        <div class="gallery-over-wrap-contents">
                                            <!-- Normal -->
                                            <img src="/assets/img/gallery-search1.png" class="gallery-heart">
                                            <p class="gallery-txt-wrap">
                                                <span class="gallery-txt">XEM CHI TIẾT</span>
                                            </p>
                                            <!-- Normal -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="info-product ">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="info-left">
                                    <div class="gallery-icon">
                                        <div class="new">NEW</div>
                                    </div>
                                    <p class="product-code">
                                        <?= $item['id'] ?>
                                    </p>
                                    <p class="product-name">
                                        <?= $item['name'] ?>
                                    </p>
                                </div>
                                <p class="product-price number" data="
                                <?= $item['cost'] ?>">
                                    <?= $item['cost'] ?>
                                </p>
                            </a>
                            <div class="color-list">
                                <ul>
                                    <li>
                                        <span>
                                        <img class="img-color" src="http://admocmgo2o.limeorange.vn/uploads/color/20150508155405_lMMtnUK78i.jpg">
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
        <!-- end BW item -->
        <!--  rhyme video item -->
        <div id="rhymeorange-banner" class="banner-main wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
            <div class="r-video wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
                <iframe width="100%" height="630" src="https://www.youtube.com/embed/2Fs8B82URZI" frameborder="0" allowfullscreen=""></iframe>
                <div class="r-ytb_thumb">
                    <div class="r-ytb_thumb_op">
                        <a href="#" class="r-ytb-button"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end rhyme video item -->
        <!-- RHYME item -->
        <div id="special-item-product" class="catori-product container-main">
            <div class="title-cato">
                <h3 class="tile-text">RHYME PRODUCT</h3>
                <p class="seemore">
                    <a href="category/rhymeorange">XEM THÊM</a>
                </p>
            </div>
            <div class="productlist">
                <?php foreach($rhyme as $item){?>
                    <div class="product-item col-4-des col-2-mob wow fadeIn" data-wow-duration="2s" data-wow-offset="100" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">

                        <div class="img-product">
                            <a href="detailproduct/<?= $item['id'] ?>">
                            <img src="<?= $item['img_main'] ?>" class="img img-stock ">
                        </a>
                            <img src="<?= $item['img_sub'] ?>" class="img img-detail">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="gallery-over">
                                    <div class="gallery-over-item">
                                        <div class="gallery-over-wrap-contents">
                                            <!-- Normal -->
                                            <img src="/assets/img/gallery-search1.png" class="gallery-heart">
                                            <p class="gallery-txt-wrap">
                                                <span class="gallery-txt">XEM CHI TIẾT</span>
                                            </p>
                                            <!-- Normal -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="info-product ">
                            <a href="detailproduct/<?= $item['id'] ?>">
                                <div class="info-left">
                                    <div class="gallery-icon">
                                        <div class="new">NEW</div>
                                    </div>
                                    <p class="product-code">
                                        <?= $item['id'] ?>
                                    </p>
                                    <p class="product-name">
                                        <?= $item['name'] ?>
                                    </p>
                                </div>
                                <p class="product-price number" data="<?= $item['cost'] ?>">
                                    <?= $item['cost'] ?>
                                </p>
                            </a>
                            <div class="color-list">
                                <ul>
                                    <li>
                                        <span>
                                        <img class="img-color" src="http://admocmgo2o.limeorange.vn/uploads/color/20150508155405_lMMtnUK78i.jpg">
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
        <!-- end RHYME item -->

    </div>
    <script src="assets/js/jquery-3.2.1.min.js "></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.js"></script>

    <script src="assets/js/wow.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            new WOW().init();



            $('.main-slide').slick({
                dots: true,
                infinite: true,
                autoplay: true,
                speed: 2000,
                slidesToShow: 1,
                adaptiveHeight: false,
                pauseOnHover: false
            });

            $('.bw-slide33').slick({
                dots: false,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                    breakpoint: 770,
                    settings: {
                        infinite: true,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });

            $(".regular").slick({
                autoplay: true,
                infinite: true,
                speed: 2000,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                    breakpoint: 480,
                    settings: {
                        infinite: true,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            });

            $(".pill-slide").slick({
                autoplay: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true

            });

            $('.insta-slide').slick({
                dots: false,
                autoplay: true,
                infinite: true,
                speed: 2000,
                arrows: true
            });

            $('.main-slide2').slick({
                infinite: true,
                autoplay: true,
                speed: 2000,
                slidesToShow: 1,
                adaptiveHeight: false,
            });

            $(".event").slick({
                autoplay: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                variableHeight: false
            });

            $("#airun-banner .r-ytb-button").click(function(e) {
                e.preventDefault();
                $("#airun-banner .r-ytb_thumb").hide();
            });

            $("#rhymeorange-banner .r-ytb-button").click(function(e) {
                e.preventDefault();
                $("#rhymeorange-banner .r-ytb_thumb").hide();
            });


            $("#afterwork-banner .r-ytb-button").click(function(e) {
                e.preventDefault();
                $("#afterwork-banner .r-ytb_thumb").hide();
            });


        });
    </script>

     <?php $this->load->view('footer'); ?>