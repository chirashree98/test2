<?php foreach ($get_professionals as $get_prof) { ?>

    <?php
//    print_r($get_prof);
    ?>
                       
    <div class="add-plumber professinal_div">
        <div class="row">
            <div class="col-lg-1">
                <img src="<?php echo base_url(); ?><?php echo $get_prof->company_logo != '' ? $get_prof->company_logo : '/assets/front/images/210.120.png'; ?>" class="add-plumber-img">
            </div>
            <div class="col-lg-8">
                <h3><?php echo $get_prof->company_name; ?></h3>
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
                <a class="hire-plumber-btn" href="<?php echo base_url(); ?>hire-professionals/<?php echo smart_encode($get_prof->p_user_id) ?>"><i class="fa fa-plus" aria-hidden="true"></i> Hire Professional</a>
            </div>
        </div>
    </div>
<?php } ?>