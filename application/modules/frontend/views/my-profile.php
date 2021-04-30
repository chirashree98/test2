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
                    <li><a href="<?php echo base_url(); ?>"> Home <span>/</span></a></li>
                    <li><a href="<?php echo base_url('my-profile'); ?>"> My Profile </a></li>
                </ul>
            </div>
        </section>

        <section id="atif-aslam">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="atif-inner">
                            <div class="media">
                                <img src="<?php echo base_url('assets/front/'); ?>images/atif-img.jpg" alt="">
                                <div class="media-body text-white">
                                    <h4><?php echo $user_det[0]['name']; ?></h4>
                                    <h6><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>
                                        <?php if($user_det[0]['address1'] != '' || $user_det[0]['address2'] != '' || $user_det[0]['country_id'] != '' || $user_det[0]['state_id'] != '' || $user_det[0]['city_id'] != '' || $user_det[0]['zipcode'] != ''){  
                                            echo $user_det[0]['address1'].', '.$user_det[0]['address2'].', '.$user_det[0]['country_id'].', '.$user_det[0]['state_id'].', '.$user_det[0]['city_id'].', '.$user_det[0]['zipcode'];
                                        }else{
                                            echo'---';
                                        } ?>
                                    </span></a></h6>
                                    <h6><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span><?php if($user_det[0]['mobile_no']){echo $user_det[0]['mobile_no'];}else{ echo '---'; } ?></span></a></h6>
                                    <h6><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span> <?php echo $user_det[0]['email']; ?></span></a></h6>
                                    <a href="<?php echo base_url('edit-profile'); ?>"><button class="atif-btn">Edit Profile</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="atif-inner">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="atif-inner-right">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img1.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3><?php echo count($user_service_list); ?></h3>
                                            <h6>Total Services</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="atif-inner-right">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img2.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3>10</h3>
                                            <h6>New Messages</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="atif-inner-right">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img3.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3>245</h3>
                                            <h6>Product Order</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="atif-inner-right">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img4.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3><?php echo count($user_wish_list); ?></h3>
                                            <h6>Saved Wishlist</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="atif-inner-right mb-0">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img5.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3>139</h3>
                                            <h6>Review Submit</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="atif-inner-right mb-0">
                                        <div class="atif-right-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/atif-img6.png" alt="">
                                        </div>
                                        <div class="atif-right-content">
                                            <h3>15</h3>
                                            <h6>Recent View</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="project-booking">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Service Booking</h2>
                    </div>
                    
                </div>

                <div class="cart-inner">
                    <div class="table-responsive">
                        <table class="table custom-pro-table">
                            <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Service Type</th>
                                    <th>Date & Time <i class="fa fa-sort"></i></th>
                                    <th>Address</th>
                                    <th>Status <i class="fa fa-sort"></i></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($user_service_list) > 0){
                                foreach($user_service_list as $val){ ?>
                                <tr id="sec_forr_<?php echo $val['id']; ?>">
                                    <td>
                                        <p>
                                            <?php if($val['serivices'] !='' || $val['serivices'] !='null'){
                                                $service_name = get_service_name(json_decode($val['serivices']));
                                                $count = count($service_name);
                                                $temp = 1;
                                                foreach($service_name as $val1){
                                                    echo $val1;
                                                    if($count > $temp){
                                                        echo ', ';
                                                    }
                                                    $temp++;
                                                }
                                            }else{
                                                echo'---'; 
                                            } 
                                            ?>
                                            </p>
                                        <h6>Add-on: 
                                            <?php if($val['add_ons'] !='' || $val['add_ons'] !='null'){ 
                                                    $addons = get_addons(json_decode($val['add_ons']));
                                                    $count = count($addons);
                                                    $temp = 1;
                                                    foreach($addons as $val1){
                                                        echo $val1;
                                                        if($count > $temp){
                                                            echo ', ';
                                                        }
                                                        $temp++;
                                                    }
                                                }else{
                                                    echo'---'; } 
                                                ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <?php 
                                        $service_types= isset($val['service_types'])?json_decode($val['service_types']):array();
                                        if(is_array($service_types) && count($service_types)>0){ 
                                            $service_type = get_service_type($service_types);
                                            $count = count($service_type);
                                            $temp = 1;
                                            foreach($service_type as $val1){
                                                echo $val1;
                                                if($count > $temp){
                                                    echo ', ';
                                                }
                                                $temp++;
                                            }
                                        }else{
                                            echo'---'; 
                                        } 
                                        ?>
                                    </td>
<!--                                    <td><?php echo date('d-M-Y',strtotime($val['date'])); ?> - <?php echo date('H:i',strtotime($val['time'])); ?></td>-->
                                    <td><?php echo date('d-m-Y', strtotime(str_replace('/', '-', $val['date']))) ; ?> - <?php echo date('H:i', strtotime($val['time'])); ?></td>
                                    <td>
                                        <?php if($user_det[0]['address1'] != '' || $user_det[0]['address2'] != '' || $user_det[0]['country_id'] != '' || $user_det[0]['state_id'] != '' || $user_det[0]['city_id'] != '' || $user_det[0]['zipcode'] != ''){  
                                            echo $user_det[0]['address1'].', '.$user_det[0]['address2'].', '.$user_det[0]['country_id'].', '.$user_det[0]['state_id'].', '.$user_det[0]['city_id'].', '.$user_det[0]['zipcode'];
                                        }else{
                                            echo'---';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if($val['status'] == 0){ ?>
                                            <span class="ongoing">Waiting</span>
                                        <?php }else if($val['status'] == 1){ ?>
                                            <span class="ongoing">Ongoing</span>
                                        <?php }else if($val['status'] == 2){ ?>
                                            <span class="ongoing">Complete</span>
                                        <?php }else if($val['status'] == 3){ ?>
                                            <span class="ongoing">Cancel</span>
                                        <?php } ?>   
                                    </td>
                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="<?php echo base_url('customer-service-details/'.smart_encode($val['id'])); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a onclick="return delete_service('<?php echo $val['id']; ?>');"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php }}else{ ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            No service booking found!
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <a href="#" class="seeall-btn">See All <i class="fa fa-angle-double-right"></i></a>
                </div>

               
                <div class="you-order">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <h2>Your Order</h2>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search project" />
                                    <a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/search.png"></a>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="cart-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Project Name</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Date <i class="fa fa-sort"></i></th>

                                        <th>Status <i class="fa fa-sort"></i></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/you-order-img.jpg" alt="">


                                        </td>
                                        <td>
                                            <h4>Wash Basin/Glossy Finish/Wall Hung/Wall<br>  Mounted Bathroom Sink</h4>


                                            <h5>Brand: <span>Aura</span></h5>
                                        </td>
                                        <td>Silver</td>
                                        <td>480x370x130mm</td>
                                        <td class="price">
                                            $410.00
                                        </td>

                                        <td>
                                            28 Feb 2020
                                        </td>
                                        <td>Delivered</td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/you-order-img.jpg" alt="">


                                        </td>
                                        <td>
                                            <h4>Wash Basin/Glossy Finish/Wall Hung/Wall<br>  Mounted Bathroom Sink</h4>


                                            <h5>Brand: <span>Aura</span></h5>
                                        </td>
                                        <td>Silver</td>
                                        <td>480x370x130mm</td>
                                        <td class="price">
                                            $410.00
                                        </td>

                                        <td>
                                            28 Feb 2020
                                        </td>
                                        <td>Delivered</td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/you-order-img.jpg" alt="">


                                        </td>
                                        <td>
                                            <h4>Wash Basin/Glossy Finish/Wall Hung/Wall<br>  Mounted Bathroom Sink</h4>


                                            <h5>Brand: <span>Aura</span></h5>
                                        </td>
                                        <td>Silver</td>
                                        <td>480x370x130mm</td>
                                        <td class="price">
                                            $410.00
                                        </td>

                                        <td>
                                            28 Feb 2020
                                        </td>
                                        <td>Delivered</td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/you-order-img.jpg" alt="">


                                        </td>
                                        <td>
                                            <h4>Wash Basin/Glossy Finish/Wall Hung/Wall<br> Mounted Bathroom Sink</h4>


                                            <h5>Brand: <span>Aura</span></h5>
                                        </td>
                                        <td>Silver</td>
                                        <td>480x370x130mm</td>
                                        <td class="price">
                                            $410.00
                                        </td>

                                        <td>
                                            28 Feb 2020
                                        </td>
                                        <td>Delivered</td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/you-order-img.jpg" alt="">


                                        </td>
                                        <td>
                                            <h4>Wash Basin/Glossy Finish/Wall Hung/Wall<br>Mounted Bathroom Sink</h4>


                                            <h5>Brand: <span>Aura</span></h5>
                                        </td>
                                        <td>Silver</td>
                                        <td>480x370x130mm</td>
                                        <td class="price">
                                            $410.00
                                        </td>

                                        <td>
                                            28 Feb 2020
                                        </td>
                                        <td>Delivered</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="product-pagination">
                        <div class="page-num">
                            Page 1 of 58
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <li class="page-item d-none pagination-btn">
                                    <a class="page-link" href="#" aria-label="Previous">

                                        <span aria-hidden="true">�</span>
                                        <span>Previous</span>

                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item pagination-btn">

                                    <a class="" href="#" aria-label="Next">
                                        <span>Next</span>
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>

                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>



            </div>
        </section>

        <?php $this->load->view('common/footer'); ?>
    </body>
    <?php $this->load->view('common/footer_include'); ?>
    <script>
        function delete_service(service_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?php echo base_url(); ?>customer-delete-service', 'service_id=' + service_id, function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                            $('#sec_forr_'+service_id).remove();
                        } else {
                            Swal.fire(
                                'Opps!',
                                'Please try again.',
                                'error'
                                )
                        }
                    });
                } else {
                    return false;
                }
            });
            return false;
        }
    </script>
</html>