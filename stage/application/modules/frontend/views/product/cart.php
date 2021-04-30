<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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
    <section id="inner-menu-list">
        <div class="container-fluid">
            <ul>
                <li><a href="#">Home <span>/</span></a></li>
                <li><a href="#">Supplier <span>/</span></a></li>
                <li><a href="#">Bathroom Supplier <span>/</span></a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </div>
    </section>
    <section id="cart">
        <div class="cart-banner">
            <h4>Your Shopping Cart (2)</h4>
        </div>
        <div class="container">
            <div class="cart-inner">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?php echo base_url(); ?>assets/front/images/cart-item.jpg" class="cart-item"></td>
                                <td>
                                    <h3>Wash Basin/Glossy Finish/Wall Hung/Wall
                                        Mounted Bathroom Sink</h3>
                                    <span><strong>Brand : </strong> Aura</span>
                                </td>
                                <td>Silver</td>
                                <td>480x370x130mm</td>
                                <td>
                                    <h6>$410.00
                                    </h6>
                                </td>
                                <td class="control">
                                    <ul>
                                        <li><button class="bttn bttn-left" id="minus">
                                                <span>-</span>
                                            </button></li>
                                        <li><input type="number" class="input" id="input"></li>
                                        <li><button class="bttn bttn-right" id="plus">
                                                <span>+</span>
                                            </button></li>
                                    </ul>



                                </td>
                                <td>
                                    <ul class="heart-trash">
                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>

                            </tr>

                            <tr>
                                <td><img src="<?php echo base_url(); ?>assets/front/images/cart-item.jpg" class="cart-item"></td>
                                <td>
                                    <h3>Wash Basin/Glossy Finish/Wall Hung/Wall
                                        Mounted Bathroom Sink</h3>
                                    <span><strong>Brand : </strong> Aura</span>
                                </td>
                                <td>Silver</td>
                                <td>480x370x130mm</td>
                                <td>
                                    <h6>$410.00
                                    </h6>
                                </td>
                                <td class="control">
                                    <ul>
                                        <li><button class="bttn bttn-left" id="minus">
                                                <span>-</span>
                                            </button></li>
                                        <li><input type="number" class="input" id="input"></li>
                                        <li><button class="bttn bttn-right" id="plus">
                                                <span>+</span>
                                            </button></li>
                                    </ul>



                                </td>
                                <td>
                                    <ul class="heart-trash">
                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="cart-payment">
                            <p>You will save $125.00 on this order</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cart-payment2">
                            <h6>Delivery Charges: FREE</h6>
                            <h4>Subtotal (2 items): <span>$820.00</span> </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="cart-coupon">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Coupon Code">
                                    <button class="submitbtn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cart-coupon-btn">
                            <button class="cart-btn">
                                <img src="<?php echo base_url(); ?>assets/front/images/pro-cart-new.png" alt=""><span>Continue Shopping</span>
                            </button>

                            <button onclick="document.location='checkout.html'" class="cart-btn video-btn buy-now-btn">
                                <span>Check Out</span>
                            </button>

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
