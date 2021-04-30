<section id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-st">
                <div class="col-sm-6">
                    <div class="footer-logo">
                        <img src="<?php echo base_url('assets/front/'); ?>images/logo.png" />
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-nd">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-inner">
                        <h3>Contact Us</h3>
                        <ul class="address">
                            <li>1203 Town Center Drive FL 33458 USA</li>
                            <li><i class="fas fa-phone-volume"></i> +841 123 456 78</li>
                            <li><i class="far fa-envelope"></i> <a href="#">info@benasmart.com</a></li>
                        </ul>
                        <div class="doenlodeapp">
                            <h4>Download BenaSmart App</h4>
                            <a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/g-play.png" /></a>
                            <a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/app-store.png" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-inner">
                        <h3>BenaSmart</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Advertisment / Daily Deals</a></li>
                            <li><a href="#">Services Near You</a></li>
                            <li><a href="#">Recently Viewed & More</a></li>
                            <li><a href="#">New Stores</a></li>
                            <li><a href="#">Browse Online Stores</a></li>
                            <li><a href="#">Recommended for You</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-inner">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Recalls & Product Safety</a></li>
                            <li><a href="#">Shop by Brand</a></li>
                            <li><a href="#">ECO products</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-inner">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="#">Search Terms</a></li>
                            <li><a href="#">Advanced Search</a></li>
                            <li><a href="#">Help & FAQs</a></li>
                            <li><a href="#">Store Locations</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Deliveries</a></li>
                            <li><a href="#">My Addresses</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="row">
                <div class="col-sm-4">
                    <div class="copy-inner">
                        <ul>
                            <li><a href="#"><i class="fas fa-briefcase"></i> Sell on BenaSmart</a></li>
                            <li><a href="#"><i class="far fa-star"></i> Advertise</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="copy-inner">
                        <p>Copyright &#xA9; 2020 BenaSmart &#xA9; All rights reserved.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="pay">
                        <a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/pay.png" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal" id="myModal">
    <div class="modal-dialog login-modal">
        <div class="modal-content">

            <div class="modal-body">
                <section id="login">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="login-inner-sub popupnew">
                        <img src="<?php echo base_url('assets/front/'); ?>images/logo.png" />
                        <form action="<?php echo base_url('client-login-suc'); ?>" method="post" onsubmit="return form_validation_for_login();">
                            <!--<input type="hidden" name="return_url" value="<?php echo $this->uri->segment(1); ?>">-->
                            <input type="hidden" name="return_url" value="<?php echo current_url(); ?>">
                            <div class="form-group">
                                <label>Email or Mobile Number</label>
                                <input type="text" class="form-control" name="email" id="email1" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password1" />
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url('forget-password'); ?>">Forget Password?</a>
                            </div>
                            <input type="submit" class="login-btn" value="Sign in now!" name="client-login">
                        </form>
                        <p>or connect using</p>
                        <ul class="login-social">
                            <li><a href="<?php echo base_url('facebook-sign-up'); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/f.png" /></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/t.png" /></a></li>
                            <li><a href="<?php echo base_url('google-sign-up'); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/g.png" /></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/m.png" /></a></li>
                        </ul>
                        <span>By continuing, you agree to <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>
                        <div class="create-acount">
                            <p>Create BenaSmart Account. <a href="<?php echo base_url('signup'); ?>">Sign up</a></p>
                        </div>
                        <div class="loginwithsupp-pro">
                            <h6>Sign in as &nbsp;
                                <!--<a href="#" onclick="return open_professional_login();">Professional</a>-->
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Professional</a>
                                &nbsp;|&nbsp;
                                <!--<a href="#" onclick="return open_supplier_login();">Supplier</a>--> 
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3" data-dismiss="modal">Supplier</a> 
                            </h6>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="modal profe-supp" id="myModal2">
    <div class="modal-dialog login-modal">
        <div class="modal-content">
            <div class="modal-body">
                <section id="register">
                    <div class="">
                        <div class="login-inner">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="login-inner-sub registerpage popupnew">
                                <div class="row">

                                    <div class="col-sm-7">
                                        <div class="leftarealogin">
                                            <h3>Benefits of Joining as Professional</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur dipiscing
                                                elit sed do eiusmod.</p>
                                            <ul>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Sed ut perspiciatis unde omnis iste</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Natus error sit voluptatem accusantium</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Doloremque laudantium, totam rem</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Aperiam, eaque ipsa quae ab illo</li>
                                            </ul>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/professional-login-tools3.png" class="logintools">
                                            <img src="<?php echo base_url('assets/front/'); ?>images/professional-login-user.png" class="loginuser">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="log">
                                            <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo.png" class="logo" /></a>
                                            <form method="post" action="<?php echo base_url('professional-login-success'); ?>" onsubmit="return form_validation12();">
                                                <input type="hidden" name="return_url" value="<?php echo $this->uri->segment(1); ?>">
                                                <div class="form-group">
                                                    <label>Email or Mobile Number</label>
                                                    <input type="text" class="form-control" name="email" id="email112" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" id="password12" />
                                                </div>
                                                <div class="form-group">
                                                    <a href="<?php echo base_url('forget-password'); ?>">Forget Password?</a>
                                                </div>
                                                <input type="submit" class="login-btn" value="Sign in now!" name="pro-login">
                                            </form>
                                            <div class="res">
                                                <p class="pcolor">We won't share your personal details with anyone</p>
                                                <span>If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>
                                                <div class="create-acount2">
                                                    <span>Create BenaSmart Professional Account?<a class="regi-modal" href="<?php echo base_url('professional-registration'); ?>">Sign up</a></span>
                                                </div>
                                                <div class="loginwithsupp-pro">
                                                    <h6>Sign in as &nbsp;
                                                        <!--<a href="#" onclick="return open_customer_login();">Customer</a>-->
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Customer</a>
                                                        &nbsp;|&nbsp;
                                                        <!--<a href="#" onclick="return open_supplier_login();">Supplier</a>-->
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3" data-dismiss="modal">Supplier</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="modal profe-supp" id="myModal3">
    <div class="modal-dialog login-modal">
        <div class="modal-content">
            <div class="modal-body">
                <section id="register">
                    <div class="">
                        <div class="login-inner">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="login-inner-sub registerpage popupnew">
                                <div class="row">

                                    <div class="col-sm-7">
                                        <div class="leftarealogin">
                                            <h3>Benefits of Joining as Supplier</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur dipiscing
                                                elit sed do eiusmod.</p>
                                            <ul>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Sed ut perspiciatis unde omnis iste</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Natus error sit voluptatem accusantium</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Doloremque laudantium, totam rem</li>
                                                <li><i class="fas fa-circle" aria-hidden="true"></i> Aperiam, eaque ipsa quae ab illo</li>
                                            </ul>
                                            <img src="<?php echo base_url('assets/front/'); ?>images/supplier-login-tool5.png" class="logintools">
                                            <img src="<?php echo base_url('assets/front/'); ?>/images/supplier-login-user.png" class="loginuser">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="log">
                                            <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo.png" class="logo" /></a>
                                            <form method="post" action="<?php echo base_url('professional-login-success'); ?>" onsubmit="return form_validation13();">
                                                <input type="hidden" name="return_url" value="<?php echo $this->uri->segment(1); ?>">
                                                <div class="form-group">
                                                    <label>Email or Mobile Number</label>
                                                    <input type="text" class="form-control" name="email" id="email13" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" id="password13" />
                                                </div>
                                                <div class="form-group">
                                                    <a href="<?php echo base_url('forget-password'); ?>">Forget Password?</a>
                                                </div>
                                                <input type="submit" class="login-btn" value="Sign in now!" name="pro-login">
                                            </form>
                                            <div class="res">
                                                <p class="pcolor">We won't share your personal details with anyone</p>
                                                <span>If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>
                                                <div class="create-acount2">
                                                    <span>Create BenaSmart Supplier Account?<a class="regi-modal" href="<?php echo base_url('supplier-registration'); ?>">Sign up</a></span>
                                                </div>
                                                <div class="loginwithsupp-pro">
                                                    <h6>Sign in as &nbsp;
                                                        <!--<a href="#" onclick="return open_customer_login();">Customer</a>-->
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Customer</a>
                                                        &nbsp;|&nbsp;
                                                        <!--<a href="#" onclick="return open_professional_login();">Professional</a>--> 
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Professional</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
    function form_validation_for_login() {
        if ($.trim($("#email1").val()) == '') {
            $("#email1").css("border-color", "red");
            toastr.error("Enter Emailid!");
            return false;
        } else {
            $("#email1").css("border-color", "");
        }
        if ($.trim($("#password1").val()) == '') {
            $("#password1").css("border-color", "red");
            toastr.error("Enter Password!");
            return false;
        } else {
            $("#password1").css("border-color", "");
        }
    }

    function form_validation12() {
        if ($.trim($("#email112").val()) == '') {
            $("#email112").css("border-color", "red");
            toastr.error("Enter Emailid!");
            return false;
        } else {
            $("#email112").css("border-color", "");
        }
        if ($.trim($("#password12").val()) == '') {
            $("#password12").css("border-color", "red");
            toastr.error("Enter Password!");
            return false;
        } else {
            $("#password12").css("border-color", "");
        }
    }

    function form_validation13() {
        if ($.trim($("#email13").val()) == '') {
            $("#email13").css("border-color", "red");
            toastr.error("Enter Emailid!");
            return false;
        } else {
            $("#email13").css("border-color", "");
        }
        if ($.trim($("#password13").val()) == '') {
            $("#password13").css("border-color", "red");
            toastr.error("Enter Password!");
            return false;
        } else {
            $("#password13").css("border-color", "");
        }
    }

    function open_professional_login() {
        $('#myModal').modal('hide');
        $('#myModal3').modal('hide');
        $('#myModal2').modal('show');
    }

    function open_customer_login() {
        $('#myModal2').modal('hide');
        $('#myModal3').modal('hide');
        $('#myModal').modal('show');
    }

    function open_supplier_login() {
        $('#myModal').modal('hide');
        $('#myModal2').modal('hide');
        $('#myModal3').modal('show');
    }

</script>
