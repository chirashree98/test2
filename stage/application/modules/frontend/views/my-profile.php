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
                    <li><a href="#">Home <span>/</span></a></li>
                    <li><a href="#">Delhi <span>/</span></a></li>
                    <li><a href="#">Atif Aslam </a></li>

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

                                    <h6> <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Al Madinah Harra Sharqiya, Harra Sharqiya,
                                                Al Al Munawarah, Madinah, Saudi Arabia</span></a></h6>
                                    <h6><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span><?php if($user_det[0]['mobile_no']){echo $user_det[0]['mobile_no'];}else{ echo '---'; } ?></span></a></h6>
                                    <h6><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span> <?php echo $user_det[0]['email']; ?></span></a></h6>
                                    <button class="atif-btn">Edit Profile</button>
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
                                            <h3>10</h3>
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
                                            <h3>15</h3>
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
                    <div class="col-sm-6 col-lg-6">
                        <h2>Project Booking</h2>
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
                        <table class="table custom-pro-table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Project Type</th>
                                    <th>Date & Time <i class="fa fa-sort"></i></th>
                                    <th>Address</th>
                                    <th>Status <i class="fa fa-sort"></i></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Water Leakages <span>3</span></p>
                                        <h6>Add-on: Tap and Shower Filter, Drill and Hole</h6>

                                    </td>
                                    <td>Basin & Sink</td>
                                    <td>18 Dec 2020 - 01:30pm</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="ongoing">Ongoing</span>
                                    </td>

                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <p>Pipe/Tap Fitting <span>1</span></p>
                                        <h6>Add-on: Sink Hose</h6>

                                    </td>
                                    <td>Washbasin Repair</td>
                                    <td>17 Dec 2020 - 10:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="waiting">Waiting</span>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>

                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>16 Dec 2020 - 06:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="completed">Completed</span>
                                    </td>

                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>

                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>18 Dec 2020 - 01:30pm</td>

                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="canceled">Canceled</span>
                                    </td>

                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>

                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>17 Dec 2020 - 10:00am</td>

                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="completed">Completed</span>
                                    </td>

                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>

                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>16 Dec 2020 - 06:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <span class="completed">Completed</span>
                                    </td>

                                    <td>
                                        <ul class="heart-trash">

                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>

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

                                    <span aria-hidden="true">«</span>
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

                                        <span aria-hidden="true">«</span>
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
</html>