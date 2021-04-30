<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
</head>
<body>
    <?php // $this->load->view('common/header_top_nav'); ?>
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>
    <section id="plumber-profile-user-view">
        <img src="<?php if($profe_det[0]['banner_profile']){ echo base_url($profe_det[0]['banner_profile']); }else{ echo base_url('assets/front/images/banner-temp-pic.jpg'); } ?>"/>
<!--
        <div class="container">
            <div class="row">
                <div class="col-sm-5 offset-7">

                </div>
            </div>
        </div>
-->
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
                                        <h4><?php if($about_us[0]['yr_of_exp'] == ''){ echo'---'; }else{ echo $about_us[0]['yr_of_exp']; } ?> Year(s) Experience</h4>
                                        <p><?php if($about_us[0]['word_of_exp'] == ''){ echo'---'; }else{ echo $about_us[0]['word_of_exp']; } ?></p>
                                    </div>
                                </li>
                                <li><span><img src="<?php echo base_url('assets/front/'); ?>images/bookarea-icon2.png" /></span>
                                    <div>
                                        <h4><?php if($about_us[0]['no_of_project'] == ''){ echo'---'; }else{ echo $about_us[0]['no_of_project']; } ?> Project Completed</h4>
                                        <p><?php if($about_us[0]['word_project'] == ''){ echo'---'; }else{ echo $about_us[0]['word_project']; } ?></p>
                                    </div>
                                </li>
                                <li><span><img src="<?php echo base_url('assets/front/'); ?>images/bookarea-icon3.png" /></span>
                                    <div>
                                        <h4><?php if($about_us[0]['no_emergency_service'] == ''){ echo'---'; }else{ echo $about_us[0]['no_emergency_service']; } ?> Emergency Services</h4>
                                        <p><?php if($about_us[0]['word_emergency'] == ''){ echo'---'; }else{ echo $about_us[0]['word_emergency']; } ?></p>
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
                                if(count($skills) > 0){
                                    $temp_count = count($skills);
                                    $temp = 0;
                                    foreach($skills as $val){
                                        echo $val['name'];
                                        $temp++;
                                        if($temp < $temp_count){
                                            echo ', ';
                                        }
                                    }
                                }else{
                                    echo'---';
                                }
                            ?></p>
                            <ul>
                                <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/plum-pro-user-green-star.png" /> <?php if($review_count[0]['rate'] == '') {echo'0.0';}else{ echo $review_count[0]['rate']; } ?> <strong> <?php echo $review_count[0]['num_rate']; ?> Rating(s)</strong></a></li>
                            </ul>
                            <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $profe_det[0]['address1'].', '.$profe_det[0]['address2'].', '.$profe_det[0]['city_name'].', '.$profe_det[0]['state_name'].', '.$profe_det[0]['country_name'].', '.$profe_det[0]['zipcode']; ?></span>
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
                    <p><?php if($about_us[0]['about_us'] == ''){ echo'---'; }else{ echo $about_us[0]['about_us']; } ?></p>
                    <div class="responsive">
                        <?php if(count($project_image) > 0){
                            foreach($project_image as $val){ ?>
                            <div class="item">
                                <img src="<?php echo base_url($val['image']); ?>" alt="">
                            </div>
                        <?php }}else{ ?>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('assets/front/images/project-temp-pic.jpg'); ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="chatarea" class="review-plumber plum-profile">
        <div class="container">
            <h5 class="pro-user-inner-head">Review</h5>
            <?php
                $i = 0;
                foreach($review_list as $val){
                if($val['remarks'] != ''){
                $i++;
                $review_reply = get_review_reply_list($val['review_id']);
            ?>
            <div class="add-plumber">
                <div class="row mb29">
                    <div class="col-lg-1">
                        <img src="<?php if($val['company_logo'] != ''){ echo base_url($val['company_logo']); }else{ echo base_url('assets/front/images/customer-temp-pic.jpg');  } ?>" class="add-plumber-img">
                    </div>
                    <div class="col-lg-8">
                        <h3><?php echo $val['name'].' , '.$val['project_name']; ?></h3>
                        <p><?php echo $val['remarks']; ?></p>
                        <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $val['address1'].','.$val['address2'].','.$val['city_name'].','.$val['state_name'].','.$val['country_name'].','.$val['zipcode']; ?> </span>
                        <ul>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/black-star.png" /> <?php echo $val['rate']; ?> <strong></strong></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="write-a-review">
                        <div class="col-lg-2">
                            &nbsp;
                        </div>
                        <div class="col-lg-10">
                            <?php foreach($review_reply as $val1){ ?>
                            <div class="write-a-review-item plum-pro">
                                <div class="user-img">
                                    <span>M</span>
                                </div>
                                <div class="user-review">
                                    <h3><?php echo $val1['name']; ?></h3>
                                  <h4> <span>Ask admin to publish:</span> <div class="md-switch">
                                        <input type="checkbox" id="text-to-confirm" name="text-to-confirm" title="Register for Text to Confirm" class="md-toggle md-toggle-round">
                                        <label for="text-to-confirm"></label>
                                    </div></h4>  
                                   <hr>
                                    <p><?php echo $val1['remarks']; ?> <!--<a href="#">read more</a>--> </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } }
                if($i < 1){
            ?>
            <div>No review found !</div>
            <?php } ?>
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


</html>
