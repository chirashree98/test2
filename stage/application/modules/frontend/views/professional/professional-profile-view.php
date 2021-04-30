<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <!--
    <style>
        .sidebtn {
            background: #1df2b5;

            position: fixed;
            top: 38%;
            z-index: 99;
            right: -130px;
            width: 180px;
            cursor: pointer;
            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
            -o-transition: all 0.25s ease-in-out;
            transition: all 0.25s ease-in-out;
        }

        .sidebtn h2 {
            font-size: 16px;
            padding: 15px;
            color: #ffffff;
            line-height: 18px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .sidebtn h2 i {
            padding-right: 25px;
            font-size: 18px;
        }

        .sidebtn:hover {
            right: 0px;
        }

        #why-choose .plumber-profile-user-view-btn {
            float: left;
            text-align: center;
        }

        @media(min-width:768px) and (max-width:1024px) {
            .sidebtn {
                top: 15%;
            }
        }

        @media(min-width:1025px) and (max-width:1540px) {
            .sidebtn {
                top: 15%;
            }
        }

    </style>-->
</head>

<body>
    <?php // $this->load->view('common/header_top_nav'); ?>
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>
    <section id="plumber-profile-user-view" style="background-image: url(<?php echo base_url($profe_det[0]['banner_profile']); ?>);">

        <div class="container">
            <div class="row">
                <div class="col-sm-5 offset-7">

                </div>
            </div>
        </div>
    </section>

    <section id="why-choose" class="addplumber">
        <div class="container">
            <div class="plumber-profile-user-total total">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="why-choose-left">
                            <h2>Work Experience</h2>
                            <ul>
                                <li><span><img src="<?php echo base_url('assets/front/'); ?>images/bookarea-icon1.png" /></span>
                                    <div>
                                        <h4><?php echo $about_us[0]['yr_of_exp']; ?> Year(s)</h4>
                                        <p><?php echo $about_us[0]['word_of_exp']; ?></p>
                                    </div>
                                </li>
                                <li><span><img src="<?php echo base_url('assets/front/'); ?>images/bookarea-icon2.png" /></span>
                                    <div>
                                        <h4><?php echo $about_us[0]['no_of_project']; ?> Project Completed</h4>
                                        <p><?php echo $about_us[0]['word_project']; ?></p>
                                    </div>
                                </li>
                                <li><span><img src="<?php echo base_url('assets/front/'); ?>images/bookarea-icon3.png" /></span>
                                    <div>
                                        <h4><?php echo $about_us[0]['no_emergency_service']; ?> Emergency Services</h4>
                                        <p><?php echo $about_us[0]['word_emergency']; ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="why-choose-right plm plumber-profile-details">
                            <h2><?php echo $user_detail[0]['name']; ?></h2>
                            <h4><?php echo $profe_det[0]['role_name']; ?></h4>
                            <p><?php
                                    foreach($skills as $val){
                                        echo $val['skill'].',';
                                    }
                            ?></p>
                            <ul>
                                <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/plum-pro-user-green-star.png" /> 4.6 <strong>248 Ratings</strong></a></li>
                                <li><span class="line">|</span> <i class="fas fa-heart" aria-hidden="true"></i></li>
                            </ul>
                            <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $profe_det[0]['address1'].','.$profe_det[0]['address2'].','.$profe_det[0]['city_name'].','.$profe_det[0]['state_name'].','.$profe_det[0]['country_name'].','.$profe_det[0]['zipcode']; ?></span>
                            <a class="plumber-profile-user-view-btn our-support-btn" href="<?php echo base_url('professional/updateinfo/personal'); ?>">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-the-plumber">
        <div class="container">
            <div class="plumber-profile-user-total">
                <div class="about-the-plumber-inner">
                    <h5 class="pro-user-inner-head">About <?php echo $user_detail[0]['name']; ?></h5>
                    <p><?php echo $about_us[0]['about_us']; ?></p>

                    <div class="responsive">
                        <?php foreach($project_image as $val){ ?>
                        <div class="item">
                            <img src="<?php echo base_url($val['image']); ?>" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="chatarea" class="review-plumber">
        <div class="container">
            <h5 class="pro-user-inner-head">Review</h5>
            <div class="add-plumber">

                <div class="row mb29">
                    <div class="col-lg-1">
                        <img src="<?php echo base_url($profe_det[0]['thumnail_image']); ?>" class="add-plumber-img">
                    </div>
                    <div class="col-lg-8">
                        <h3>Sahid Raja</h3>
                        <p>All type of plumbung Solution and expert on water likages</p>
                        <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> 24/A, Lecusa Lane, Solimon, Country 12345</span>
                        <ul>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/black-star.png" /> 4.6 <strong>248 Ratings</strong></a></li>
                            <li><span class="line">|</span> <i class="fas fa-heart" aria-hidden="true"></i></li>
                        </ul>


                    </div>
                    <div class="col-lg-3">
                        <button class="hire-plumber-btn">Write a Review</button>
                    </div>
                </div>
                <div class="row">
                    <div class="write-a-review">
                        <div class="col-lg-2">
                            &nbsp;
                        </div>
                        <div class="col-lg-10">

                            <div class="write-a-review-item">
                                <div class="user-img">
                                    <span>M</span>
                                </div>
                                <div class="user-review">
                                    <h3>Mohd Siraj Ali</h3>
                                    <span><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/yellow-star.png" /> 3.0</a></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi... <a href="#">read more</a> </p>
                                </div>
                            </div>

                            <div class="write-a-review-item mb-0">
                                <div class="user-img">
                                    <span>S</span>
                                </div>
                                <div class="user-review">
                                    <h3>Shrikant</h3>
                                    <span class="colorgreen"><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/green-star.png" /> 5.0</a></span>
                                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris accusamus et iusto odio.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="writeareview">
                <h3>Write a Review</h3>
                <p>Select Rating</p>
                <ul>
                    <li><a href=""><img src="<?php echo base_url('assets/front/'); ?>images/green-star.png" /></a></li>
                    <li><a href=""><img src="<?php echo base_url('assets/front/'); ?>images/green-star.png" /></a></li>
                    <li><a href=""><img src="<?php echo base_url('assets/front/'); ?>images/green-star.png" /></a></li>
                    <li><a href=""><img src="<?php echo base_url('assets/front/'); ?>images/black-star.png" /></a></li>
                    <li><a href=""><img src="<?php echo base_url('assets/front/'); ?>images/black-star.png" /></a></li>
                </ul>
                <span>You Select 3 Star out of 5 Star</span>
                <div class="form-group">
                    <label>Message Description</label>
                    <textarea type="text" class="form-control" placeholder="Enter Message"></textarea>
                </div>
                <div class="btn-area">
                    <button class="submit-btn">Submit Now!</button>
                </div>
            </div>
        </div>
    </section>



    <section id="plumber-join-now">
        <div class="container">
            <div class="plumber-join-now-inner">
                <h3>Are you a professional looking for customers?</h3>
                <button class="join-now-btn">Join Now</button>
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
<?php if ($this->session->userdata('errmsg') && $this->session->userdata('errmsg') != '') { ?>
<script>
    toastr.error("<?php echo $this->session->userdata('errmsg'); ?>");

</script>
<?php } ?>
<?php if ($this->session->userdata('sucmsg') && $this->session->userdata('sucmsg') != '') { ?>
<script>
    toastr.success("<?php echo $this->session->userdata('sucmsg'); ?>");

</script>
<?php } ?>

</html>
