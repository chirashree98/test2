<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>

    </head>
    <body>
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>

        <section id="inner-menu-list">
            <div class="container-fluid">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home <span>/</span></a></li>
                    <li><a href="javascript:void(0);">All Professionals</a></li>
                </ul>
            </div>
        </section>
        <section id="plumbing-banner" style="<?php if (isset($all_professionals_cms_banner['image']) && $all_professionals_cms_banner['image'] != '') { ?>background-image: url('<?php echo base_url() . $all_professionals_cms_banner['image'] ?>'); <?php } ?>">

            <div class="container">
                <div class="row">
                    <div class="col-sm-5 offset-7">
                        <div class="banner-caption">
                            <h1><?php echo isset($all_professionals_cms_banner['heading']) && $all_professionals_cms_banner['heading'] != '' ? $all_professionals_cms_banner['heading'] : ''; ?></h1>
                            <p><?php echo isset($all_professionals_cms_banner['content']) && $all_professionals_cms_banner['content'] != '' ? $all_professionals_cms_banner['content'] : ''; ?></p>
                            <!--<form method="post" action="<?php echo base_url(); ?>all-professionals">-->
                            <div class="form-group">
                                <label>Need a professional for?</label>
                                <select name="search_by_cat" id="search_by_cat" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach ($categories->result() as $cat) { ?>
                                        <option <?php
                                        if (isset($cat_slug) && $cat_slug == $cat->slug) {
                                            echo 'selected';
                                        }
                                        ?> value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <!--</form>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="why-choose" class="addplumber">
            <div class="container">
                <div class="total">
                    <div class="row">

                        <div class="col-sm-7">
                            <div class="why-choose-left">
                                <h2>How to book?</h2>
                                <ul>
                                    <?php foreach ($all_professionals_cms_section_two->result() as $row) { ?>
                                        <li><span><img src="<?php echo isset($row->image) ? base_url() . $row->image : base_url() . 'assets/front/images/bookarea-icon1.png'; ?>"></span>
                                            <div>
                                                <h4><?php echo isset($row->heading) ? $row->heading : ''; ?></h4>
                                                <p><?php echo isset($row->content) ? $row->content : ''; ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
<!--                                    <li><span><img src="<?php echo base_url(); ?>assets/front/images/bookarea-icon2.png"></span>
                                    <div>
                                        <h4>Choose your time-slot</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                    </div>
                                </li>
                                <li><span><img src="<?php echo base_url(); ?>assets/front/images/bookarea-icon3.png"></span>
                                    <div>
                                        <h4>Professional services</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                    </div>
                                </li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-5">

                            <div class="why-choose-right plm">
                                <?php foreach ($all_professionals_cms_section_three->result() as $row) { ?>
                                    <img src="<?php echo isset($row->image) ? base_url() . $row->image : base_url() . 'assets/front/images/our-support-icon.png'; ?>">
                                    <h2><?php echo isset($row->heading) ? $row->heading : ''; ?></h2>
                                    <p><?php echo isset($row->content) ? $row->content : ''; ?></p><br>
                                    <a href="<?php echo isset($row->btn_url) ? $row->btn_url : ''; ?>" class="our-support-btn"><?php echo isset($row->btn_text) ? $row->btn_text : ''; ?></a>
                                <?php } ?>

                            </div>
                        </div>
                    </div> 
                    <div class="mt66"></div>
                    <div id="all-professional-sec">
                        <?php if (count($get_professionals) > 0) {
                            foreach ($get_professionals as $get_prof) {
                                ?>                               
                                <div class="add-plumber professinal_div"> 
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <a href="<?php echo base_url(); ?>professional/profile/<?php echo smart_encode($get_prof->p_user_id) ?>">
                                                <img src="<?php echo base_url(); ?><?php echo $get_prof->thumnail_image != '' ? $get_prof->thumnail_image : 'assets/front/images/210.120.png'; ?>" class="add-plumber-img">
                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <a href="<?php echo base_url(); ?>professional/profile/<?php echo smart_encode($get_prof->p_user_id) ?>"><h3><?php echo $get_prof->company_name; ?></h3></a>
                                            <p><?php echo $get_prof->about_us; ?></p>

                                            <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $get_prof->address1; ?></span>
                                            <?php if ($get_prof->address2 != '') { ?>
                                                <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $get_prof->address2; ?></span>
        <?php } ?>
                                            <ul>
                                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/black-star.png"> 4.6 <strong>248 Ratings</strong></a></li>
                                                <li><span class="line">|</span> <i class="fas fa-heart" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <?php if ($this->session->userdata('client_id') && $this->session->userdata('client_id') != '') { ?>
                                                <a class="hire-plumber-btn" href="<?php echo base_url(); ?>hire-professionals/<?php echo smart_encode($get_prof->p_user_id) ?>"><i class="fa fa-plus" aria-hidden="true"></i> Hire Professional</a>
                                            <?php } else { ?>
                                                <a class="hire-plumber-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please login as customer to hire"><i class="fa fa-plus" aria-hidden="true"></i> Hire Professional</a>
        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else {
                            ?>
                            <div class="add-plumber professinal_div">
                                No Professional Found <?php echo isset($cat_slug) && $cat_slug != '' ? 'By ' . $cat_slug : ''; ?> , Please search with other preference.
                            </div>
                    <?php } ?>

                    </div>
<?php if (count($get_professionals) && $get_total_professionals > count($get_professionals)) { ?>
                        <div class="lodemoreplumbers">
                            <button class="lode-more-plumber-btn load-more-professional" >Load More Professionals</button>
                        </div>
<?php } ?>



                </div>
            </div>
        </section>
        <section id="questions">
            <div class="container">
                <div class="main-heading2">
                    <h2>Frequently Asked Questions</h2>
                </div>






                <div id="main">
                    <div class="container">
                        <div class="accordion" id="faq">
<?php foreach ($all_professionals_cms_section_faq->result() as $row) { ?>
                                <div class="card">
                                    <div class="card-header" id="faqhead<?php echo $row->id; ?>">
                                        <h5 class="btn-header-link" data-toggle="collapse" data-target="#faq<?php echo $row->id; ?>" aria-expanded="true" aria-controls="faq<?php echo $row->id; ?>"><span><?php echo $row->heading ?></span></h5>
                                    </div>

                                    <div id="faq<?php echo $row->id; ?>" class="collapse " aria-labelledby="faqhead<?php echo $row->id; ?>" data-parent="#faq">
                                        <div class="card-body">
    <?php echo $row->content; ?>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                            <!--                            <div class="card">
                                                            <div class="card-header" id="faqhead2">
                                                                <h5 href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2"><span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium?</span></h5>
                                                            </div>
                            
                                                            <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="faqhead3">
                                                                <h5 href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3"><span>At vero eos et accusamus et iusto odio dignissimos ducimus?</span></h5>
                                                            </div>
                            
                                                            <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                                </div>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>







            </div>
        </section>
        <section id="stores" class="mb68">
            <div class="container">
                <div class="main-heading2">
                    <h2>Recommended For You</h2>
                </div>
                <div class="responsive slick-initialized slick-slider slick-dotted"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: inline-block;">Previous</button>







                    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 5219px; transform: translate3d(-921px, 0px, 0px);"><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="-3" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="-2" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" aria-describedby="slick-slide-control02" style="width: 277px;" data-slick-index="-1" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-current slick-active" tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00" style="width: 277px;" data-slick-index="0" aria-hidden="false">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item carousel-item-next carousel-item-left">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active carousel-item-left">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="0"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-active" tabindex="0" role="tabpanel" id="slick-slide01" style="width: 277px;" data-slick-index="1" aria-hidden="false">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item carousel-item-next carousel-item-left">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active carousel-item-left">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="0"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-active" tabindex="0" role="tabpanel" id="slick-slide02" style="width: 277px;" data-slick-index="2" aria-hidden="false">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="0"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide" tabindex="-1" role="tabpanel" id="slick-slide03" aria-describedby="slick-slide-control01" style="width: 277px;" data-slick-index="3" aria-hidden="true">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class="active"></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide" tabindex="-1" role="tabpanel" id="slick-slide04" style="width: 277px;" data-slick-index="4" aria-hidden="true">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class="active"></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide" tabindex="-1" role="tabpanel" id="slick-slide05" style="width: 277px;" data-slick-index="5" aria-hidden="true">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class="active"></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide" tabindex="-1" role="tabpanel" id="slick-slide06" aria-describedby="slick-slide-control02" style="width: 277px;" data-slick-index="6" aria-hidden="true">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class="active"></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" aria-describedby="slick-slide-control00" style="width: 277px;" data-slick-index="7" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class="active"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="8" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class=""></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class="active"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="9" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" aria-describedby="slick-slide-control01" style="width: 277px;" data-slick-index="10" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="11" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" style="width: 277px;" data-slick-index="12" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div><div class="item slick-slide slick-cloned" tabindex="-1" role="tabpanel" aria-describedby="slick-slide-control02" style="width: 277px;" data-slick-index="13" aria-hidden="true">
                                <div id="" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1" class=""></li>
                                        <li data-target="#demo" data-slide-to="2" class=""></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url(); ?>assets/front/images/item.jpg">
                                        </div>
                                    </div>


                                </div>
                                <div class="item-text">
                                    <h3>Tabletop Ceremic Bathroom</h3>
                                    <p>40x60x14.5 cms (LXBXH) </p>
                                    <span>Store: Sajid Hardware</span>
                                    <span>Price: <strong>$200 </strong> <span class="rs">$250</span></span>
                                    <a href="#" tabindex="-1"><i class="fas fa-star" aria-hidden="true"></i> 4.6</a>
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </div>
                            </div></div></div><button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;">Next</button><ul class="slick-dots" style="" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 3" tabindex="0" aria-selected="true">1</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide03" aria-label="2 of 3" tabindex="-1">2</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control02" aria-controls="slick-slide06" aria-label="3 of 3" tabindex="-1">3</button></li></ul></div>
            </div>
        </section>
        <section id="plumber-join-now">
            <div class="container">
                <div class="plumber-join-now-inner">
                    <h3>Are you a professional looking for customers?</h3>
                    <a target="_blank" href="<?php echo base_url(); ?>professional-registration" class="join-now-btn">Join Now</a>
                </div>
            </div>
        </section>
        <section id="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 pr-0">
                        <div class="subscribe-left">
                            <img src="<?php echo base_url(); ?>assets/front/images/email.png">
                            <h4>Subscribe to Bena Smart and get $10 off
                                your next in-store purchase of $100 or more.</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="subscribe-right">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your email address">
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
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $(function () {
            $('#search_by_cat').on('change', function () {
                var slug = $(this).val();
                if (slug) {
                    window.location = '<?php echo base_url(); ?>all-professionals/' + slug;
                }
                return false;
            });
        });

        $(document).on('click', '.load-more-professional', function () {
            var start_page = $("#all-professional-sec .professinal_div").length;
            $.post('<?php echo base_url(); ?>frontend/professional_controller/allProfessionalsUsingAjax', '<?php if (isset($cat_slug) && $cat_slug != '') { ?>cat_slug= <?php echo $cat_slug;
} ?>' + '<?php if (isset($sub_cat_slug) && $sub_cat_slug) { ?>&sub_cat_slug=<?php echo $sub_cat_slug;
} ?>' + '&start_page=' + start_page, function (data) {
                        if (data != '') {
                            $("#all-professional-sec").append(data);
                        } else {
                            $(".lodemoreplumbers").hide();
                        }
                    });
                });

    </script>


</html>
