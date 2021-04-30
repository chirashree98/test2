<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
    </head>
    <body>
        <section id="register-professional" class="professional-contact">
        <div class="container">
            <div class="logoarea mt55">
                <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo.png" /></a>
            </div>
            <div class="register-professional-inner">
                <p class="mrg">Set up your BenaSmart Professional/Supplier Account</p>
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
                <ul class="infoarea">
                    <li><a><img src="<?php echo base_url('assets/front/'); ?>images/company-info.png" /></a> <span>Company Info</span></li>
                    <li><a><img src="<?php echo base_url('assets/front/'); ?>images/contact-info-color.png" /></a> <span>Contact Info</span></li>
                    <li class="lastchild"><a><img src="<?php echo base_url('assets/front/'); ?>images/bank-account.png" /></a> <span>Bank Account</span></li>
                </ul>
                <div class="register-professional-main-inner">
                    <div class="register-professional-main-inner2">
                        <form action="<?php echo base_url('professional-registration-contact-succ'); ?>" method="post" onsubmit="return form_validation1();">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input class="form-control" name="name" id="name" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input class="form-control" name="email" id="email" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="At least 6 characters.">
                                    </div>
                                    <div class="form-group fl">
                                        <span><img src="<?php echo base_url('assets/front/'); ?>images/i.png"> Passwords must be at least 6 characters.</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Re-Enter Password</label>
                                        <input type="password" name="password2" id="password2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="r-con-area contactbtn">
                                <input type="submit" class="btn" name="pro_reg_contact" value="Continue with Bank Account">
                            </div>
                            <p class="pcolor mt0">We won't share your personal details with anyone</p>
                            <span class="terms-privacy">If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions <br /> and Privacy Policy</a></span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="create-acount2">
                <p>Already have an account?<button data-toggle="modal" data-target="#myModal" class="regi-modal">Sign in</button></p>
            </div>
        </div>
    </section>
         <?php  $this->load->view('common/footer'); ?>
    </body>
         <?php  $this->load->view('common/footer_include'); ?>
</html>
<script>
    function form_validation1(){
        if ($.trim($("#name").val()) == '') {
            $("#name").css("border-color", "red");
            toastr.error("Select Name!");
            return false;
        }else{
            $("#name").css("border-color", "");
        }
        if ($.trim($("#email").val()) == '') {
            $("#email").css("border-color", "red");
            toastr.error("Enter EmailID!");
            return false;
        }else{
            $("#email").css("border-color", "");
        }
        var email = $.trim($("#email").val());
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(regex.test(email) == false){
            $("#email").css("border-color", "red");
            toastr.error("Enter valid EmailID!");
            return false;
        }else{
            $("#email").css("border-color", "");
        }
        if ($.trim($("#password1").val()) == '') {
            $("#password1").css("border-color", "red");
            toastr.error("enter Password!");
            return false;
        }else{
            $("#password1").css("border-color", "");
        }
        var pass = $.trim($("#password1").val());
        if((pass.length) < 6){
            $("#password1").css("border-color", "red");
            toastr.error("Passwords must be at least 6 characters!");
            return false;
        }else{
            $("#password1").css("border-color", "");
        }
        if ($.trim($("#password2").val()) == '') {
            $("#password2").css("border-color", "red");
            toastr.error("enter Confirm password!");
            return false;
        }else{
            $("#password2").css("border-color", "");
        }
        if($.trim($("#password1").val()) != $.trim($("#password2").val())){
            $("#password2").css("border-color", "red");
            toastr.error("password and confirm password must be same!");
            return false;
        }else{
            $("#password2").css("border-color", "");
        }
    }
</script>