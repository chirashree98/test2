<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/font-awesome.min.css'); ?>">
    
</head>
<body>
    <?php // $this->load->view('common/header_top_nav'); ?>
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>
    <!--
      <div id="mySidenav" class="sidenav">
            <a href="#" id="about">
                <h4>Sign up</h4> <i class="fas fa-sign-in-alt"></i>
            </a>

        </div>
-->
    <div class="sidebtn">
        <a href="<?php echo base_url('professional-registration'); ?>">
            <h2><i class="fas fa-briefcase" aria-hidden="true"></i> Sale on BenaSmart</h2>
        </a>
    </div>
    <section id="banner-area" style="background-image: url(<?php echo base_url($banner_det[0]['pic_location']); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-6">
                    <div class="banner-caption">
                        <h1><?php echo $banner_det[0]['title']; ?></h1>
                        <p><?php echo $banner_det[0]['sub_title']; ?></p>
                        <form>
                            <div class="form-group">
                                <label>Where do you need a service?</label>
                                <select class="form-control">
                                    <option value="">Select your city</option>
                                    <?php foreach ($city_list as $val) { ?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="why-choose">
        <div class="container">
            <div class="total">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="why-choose-left">
                            <h2>Why Choose BenaSmart?</h2>
                            <ul>
                                <?php foreach ($why_ben_det as $val) { ?>
                                <li><span><img src="<?php echo base_url($val['icon']); ?>" /></span>
                                    <div>
                                        <h4><?php echo $val['titile']; ?></h4>
                                        <p><?php echo $val['sub_title']; ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="why-choose-right">
                            <img src="<?php echo base_url($why_ben_det2[0]['icon']); ?>" />
                            <h2><?php echo $why_ben_det2[0]['titile']; ?></h2>
                            <p><?php echo $why_ben_det2[0]['sub_title']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--    <section id="service-near-you">
        <div class="container">
            <div class="main-heading">
                <h2>Services Near You</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
            </div>
        </div>
        <div class="service-near-you-inner">
            <div class="container">
                <ul>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                    <li><a href="#">Heavy Weight Equipments</a></li>
                </ul>
            </div>
        </div>
    </section>-->

    <section id="stores">
        <div class="container">
            <div class="main-heading2">
                <h2>Stores Near You</h2>
            </div>
            <div class="responsive">
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Salimos Grocery Stores</h3>
                        <p>Daily need grocery</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="daily-deals">
        <div class="container">
            <div class="main-heading2">
                <h2>Daily Deals</h2>
            </div>

            <div class="responsive">
                <?php foreach($deals_list as $val){ ?>
                <div class="item">
                    <img src="<?php echo base_url($val['image']); ?>" />
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="stores">
        <div class="container">
            <div class="main-heading2">
                <h2>Services Near You</h2>
            </div>
            <div class="responsive">
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Astrusec Carpenter</h3>
                        <p>Doors, windows...</p>
                        <span><i class="fas fa-map-marker-alt"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="stores" class="mt-0">
        <div class="container">
            <div class="main-heading2">
                <h2>Recommended For You</h2>
            </div>
            <div class="responsive">
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="item">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('assets/front/'); ?>images/item.jpg">
                            </div>
                        </div>


                    </div>
                    <div class="item-text">
                        <h3>Tabletop Ceremic Bathroom</h3>
                        <p>40x60x14.5 cms (LXBXH) </p>
                        <span>Store: Sajid Hardware</span>
                        <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                        <a href="#"><i class="fas fa-star"></i> 4.6</a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="join-now">
        <div class="container">
            <div class="img-over-text2">


                <div class="img-over-text">

                    <h2>Are you a professional / Supplier
                        looking for customers?</h2>
                    <button class="join-now-btn">Join Now</button>
                </div>
            </div>
        </div>
    </section>

    <section id="demologo">
        <div class="container">
            <div class="slider">
                <?php foreach($logo_list as $val){ ?>
                <div class="slide">
                    <img src="<?php echo base_url($val['image']); ?>">
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pr-0">
                    <div class="subscribe-left">
                        <img src="<?php echo base_url('assets/front/'); ?>images/email.png" />
                        <h4>Subscribe to Bena Smart and get $10 off
                            your next in-store purchase of $100 or more.</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="subscribe-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your email address" />
                            <button class="subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('common/footer'); ?>
</body>
<?php $this->load->view('common/footer_include'); ?>



</html>
