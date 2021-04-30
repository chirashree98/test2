<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 08:24:45 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Benasmart Admin</title>
        <!--favicon-->
<!--        <link rel="icon" href="<?php echo base_url(); ?>assets/admin/images/favicon-32x32.png" type="image/png" />-->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
        
        <link href="<?php echo base_url(); ?>assets/admin/toaste/toastr.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/admin/toaste/toastr.min.js"></script>
        <!-- loader-->
        <link href="<?php echo base_url(); ?>assets/admin/css/pace.min.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/admin/js/pace.min.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" />
        <!-- Icons CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/icons.css" />
        <!-- App CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/app.css" />
    </head>
    <body class="bg-login">
        <!-- wrapper -->
        <div class="wrapper">
            <div class="section-authentication-login d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card radius-15">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5">
                                        <form action="<?php echo base_url('smart-login-success'); ?>" method="post" onsubmit="return form_validation();">
                                        <div class="text-center">
                                            <img src="<?php echo base_url('assets/front/images/logo.png'); ?>" width="80" alt="">
                                            <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                        </div>
                                        <div class="input-group shadow-sm rounded mt-5">
<!--                                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="assets/images/icons/search.svg" alt="" width="16"></span>
                                            </div>-->
<!--                                            <input type="button" class="form-control  border-0" value="Log in with google">-->
                                        </div>
                                        <div style="color:red;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('errmsg'); ?></div>
                                        <div class="login-separater text-center"> <span> LOGIN WITH EMAIL</span>
                                            <hr/>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Enter your email address" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" />
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
<!--                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                                    <label class="custom-control-label" for="customSwitch1">Remember Me</label>
                                                </div>-->
                                            </div>
                                            <div class="form-group col text-right"> <a href="#"><i class='bx bxs-key mr-2'></i>Forget Password?</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <input type="submit" class="btn btn-primary btn-block" name="admin_login" value="Log In">
                                        </div>
                                        <hr>
<!--                                        <div class="text-center">
                                            <p class="mb-0">Don't have an account? <a href="#">Sign up</a>
                                            </p>
                                        </div>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="<?php echo base_url(); ?>assets/admin/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrapper -->
    </body>
    <!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 08:24:46 GMT -->
</html>
<script>
    function form_validation(){
        if ($.trim($("#email_id").val()) == '') {
            $("#email_id").css("border-color", "red");
            toastr.error("Enter MailID!");
            return false;
        }
        if ($.trim($("#password").val()) == '') {
            $("#password").css("border-color", "red");
            toastr.error("Enter Password!");
            return false;
        }
    }
</script>