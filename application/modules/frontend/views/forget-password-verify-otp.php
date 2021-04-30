<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/front/css/semantic.min.css') ?>">
    </head>
    <body>

        <style>
            .ui.fluid.dropdown {
                display: block;
                width: 100%;
                min-width: 100%;
                padding: 10px;
                width: 100%; float: left;
            }

            .ui.dropdown { 
                max-width: 800px;
            }
            .ui.multiple.dropdown .dropdown.icon {
                top: 7px;
                font-size: 20px;
                padding-right: 10px;
                color: #949494;
            }
            .ui.multiple.dropdown>.label{font-size: 14px !important;}
            /*
            .ui.selection.dropdown {
                border-radius: 0;
            }
            */
            /*
            .ui.selection.dropdown:hover {
                border-color: rgb(0 0 0);
            }
            */
            select{
                color: #19222e !important;
                font-size: 14px !important;
            }
            @media only screen and (max-width: 767px) {
                .ui.selection.dropdown .menu {
                    /*      max-height: 8.01428571rem; /* + 1.335714285 to 9.349999995rem */
                    /*      max-height: 9.349999995rem; /* Adds a half */
                    max-height: 16.02857142rem; /* Double size */
                }
            }
            @media only screen and (min-width: 768px) {
                .ui.selection.dropdown .menu {
                    /*         max-height: 10.68571429rem; /* + 1.3357142863 to 12.0214285763rem */
                    max-height: 12.0214285763rem;
                }
            }
            @media only screen and (min-width: 992px) {
                .ui.selection.dropdown .menu {
                    max-height: 16.02857143rem; /* + 1.3357142858 to 17.3642857158rem */
                }
            }
            @media only screen and (min-width: 1920px) {
                .ui.selection.dropdown .menu {
                    max-height: 21.37142857rem; /* + 1.3357142856 to 22.7071428556rem */
                }
            }
        </style>
        <section id="register">
            <div class="container">
                <div class="login-inner">
                <div class="login-inner-sub registerpage">
                <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo.png" class="logo"/></a>
                <?php if($this->session->userdata('sucmsg')){ ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo $this->session->userdata('sucmsg'); ?></strong>
                </div>
                <?php } ?>
                <?php if($this->session->userdata('errmsg')){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $this->session->userdata('errmsg'); ?></strong>
                </div>
                <?php } ?>
                        <form method="post" action="<?php echo base_url('forget-password-verify-otp-succ'); ?>" onsubmit="return forget_validation();">
                            <input type="hidden" name="TRXTR" value="<?php echo $user_id; ?>">
                            <div class="form-group">
                                <label>OTP</label>
                                <input type="text" class="form-control" name="otp" id="otp"/>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password1" id="password1"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password2" id="password2"/>
                            </div>
                            <input type="submit" class="login-btn" value="Change Password" name="sign_up_btn">
                        </form>
                        <p class="pcolor">We won't share your personal details with anyone</p>
                        <span>If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>
                    </div>
                    <div class="create-acount2">
                </div>
                </div> 
            </div>
        </section>
        <?php $this->load->view('common/footer'); ?>
    </body>
    <?php $this->load->view('common/footer_include'); ?>
    <script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
    <script>
        function forget_validation() {
            if ($.trim($("#otp").val()) == '') {
                $("#otp").css("border-color", "red");
                toastr.error("Enter OTP!");
                return false;
            } else {
                $("#otp").css("border-color", "");
            }
            if ($.trim($("#password1").val()) == '') {
                $("#password1").css("border-color", "red");
                toastr.error("Enter Password!");
                return false;
            } else {
                $("#password1").css("border-color", "");
            }
            var pass = $.trim($("#password1").val());
            if ((pass.length) < 6) {
                $("#password1").css("border-color", "red");
                toastr.error("Passwords Must Be at Least 6 Characters!");
                return false;
            } else {
                $("#password1").css("border-color", "");
            }
            if ($.trim($("#password2").val()) == '') {
                $("#password2").css("border-color", "red");
                toastr.error("Enter Confirm Password!");
                return false;
            } else {
                $("#password2").css("border-color", "");
            }
            if ($.trim($("#password1").val()) != $.trim($("#password2").val())) {
                $("#password2").css("border-color", "red");
                toastr.error("Password and Confirm Password Must Be Same!");
                return false;
            } else {
                $("#password2").css("border-color", "");
            }
        }
    </script>    
</html>
