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
                    <div class="row">
                       
                    <div class="col-sm-7">
                        <div class="leftarealogin">
                        <h3>Benefits of Joining</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur dipiscing
elit sed do eiusmod.</p>
                            <ul>
                            <li><i class="fa fa-circle" aria-hidden="true"></i> Sed ut perspiciatis unde omnis iste</li>
<li><i class="fa fa-circle" aria-hidden="true"></i> Natus error sit voluptatem accusantium</li>
<li><i class="fa fa-circle" aria-hidden="true"></i> Doloremque laudantium, totam rem</li>
<li><i class="fa fa-circle" aria-hidden="true"></i> Aperiam, eaque ipsa quae ab illo</li>
                            </ul>
                            <img src="https://workb4live.com/benasmart/assets/front/images/supplier-login-tool5.png" class="logintools">
                             <img src="https://workb4live.com/benasmart/assets/front/images/supplier-login-user.png" class="loginuser">
                        </div>
                        </div>
                        <div class="col-sm-5">
                         <div class="log">
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
                        <form method="post" action="<?php echo base_url('professional-login-success'); ?>" onsubmit="return form_validation1();">
                            <div class="form-group">
                                <label>Email or Mobile Number</label>
                                <input type="text" class="form-control" name="email" id="email1"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password1"/>
                            </div>
                            <div class="form-group">
                                <a href="#">Forget Password?</a>
                            </div>
                            <input type="submit" class="login-btn" value="Sign in now!" name="pro-login">
                        </form>
                        <p class="pcolor">We won't share your personal details with anyone</p>
                        <span>If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions and Privacy Policy</a></span>
</div>
                        </div>
                    </div>
               </div>
                    <div class="create-acount2">
                        <p>Create BenaSmart professional/supplier Account?<a class="regi-modal" href="<?php echo base_url('professional-registration'); ?>">Sign up</a></p>
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
        if ($.trim($("#email1").val()) == '') {
            $("#email1").css("border-color", "red");
            toastr.error("Enter emailid or phone no.!");
            return false;
        }else{
            $("#email1").css("border-color", "");
        }
        if ($.trim($("#password1").val()) == '') {
            $("#password1").css("border-color", "red");
            toastr.error("Enter password!");
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
    }
</script>