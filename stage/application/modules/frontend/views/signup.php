<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
    </head>
    <body>
         <?php // $this->load->view('common/header_top_nav'); ?>
         <?php // $this->load->view('common/header_middle'); ?>
         <?php // $this->load->view('common/header_navarea'); ?>
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
                        <form method="post" action="<?php echo base_url('reg-form-succ'); ?>" onsubmit="return form_validation1();">
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <div class="select-area">
                                    <select class="form-control" id="std_code" name="std_code">
                                        <option value="">ISD Code</option>
                                        <?php foreach($std_list as $val){ ?>
                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['isd_code']; ?></option>
                                        <?php } ?>
                                      </select>
                                </div>
                                <div class="inputarea">
                                    <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="At least 6 characters."/>
                            </div>
                            <div class="form-group">
                                <span><img src="<?php echo base_url('assets/front/'); ?>images/i.png" /> Passwords must be at least 6 characters.</span>
                            </div>
                            <input type="submit" class="login-btn" value="Sign up now!" name="sign_up_btn">
                        </form>
                        <p>or connect using</p>
                        <ul class="login-social">
                            <li><a href="<?php echo base_url('facebook-sign-up'); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/f.png" /></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/t.png" /></a></li>
                            <li><a href="<?php echo base_url('google-sign-up'); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/g.png" /></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/m.png" /></a></li>
                        </ul>
                        <p class="pcolor">We won't share your personal details with anyone</p>
                        <span>If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>


                    </div>
                    <div class="create-acount2">
                    <p>Already have an account?<button data-toggle="modal" data-target="#myModal" class="regi-modal">Sign in</button></p>
                </div>
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
            toastr.error("Enter Name!");
            return false;
        }else{
            $("#name").css("border-color", "");
        }
        if ($.trim($("#std_code").val()) == '') {
            $("#std_code").css("border-color", "red");
            toastr.error("Select std code!");
            return false;
        }else{
            $("#std_code").css("border-color", "");
        }
        if ($.trim($("#mobile_no").val()) == '') {
            $("#mobile_no").css("border-color", "red");
            toastr.error("Enter mobile no!");
            return false;
        }else{
            $("#mobile_no").css("border-color", "");
        }
        if(!$.trim($("#mobile_no").val()).match('[0-9]{10}'))  {
            $("#mobile_no").css("border-color", "red");
            toastr.error("Enter valid mobile no!");
            return false;
        }else{
            $("#mobile_no").css("border-color", "");
        }
        var mobile=$.trim($("#mobile_no").val());
        if(mobile.length!=10){
            $("#mobile_no").css("border-color", "red");
            toastr.error("Enter valid mobile no!");
            return false;
        }else{
            $("#mobile_no").css("border-color", "");
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
        if ($.trim($("#password").val()) == '') {
            $("#password").css("border-color", "red");
            toastr.error("Enter password!");
            return false;
        }else{
            $("#password").css("border-color", "");
        }
        var pass = $.trim($("#password").val());
        if((pass.length) < 6){
            $("#password").css("border-color", "red");
            toastr.error("Passwords must be at least 6 characters!");
            return false;
        }else{
            $("#password").css("border-color", "");
        }
    }
</script>