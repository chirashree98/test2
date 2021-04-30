<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
    </head>
    <body>
         <?php // $this->load->view('common/header_top_nav'); ?>
         <?php // $this->load->view('common/header_middle'); ?>
         <?php // $this->load->view('common/header_navarea'); ?>
        
      <style>
          .login-inner {
    max-width: 100%;
              width: 100%;
          }
        #register .login-inner-sub {
    max-width: 100%;
            width: 100%;
                padding: 0 !important;
            overflow: hidden;
          }
          .leftarealogin{text-align: left;background: #1df2b5;    width: 100%;
    float: left;    height: 547px;}
          .log{padding: 30px 30px;
    padding-left: 0;}
          .leftarealogin{padding: 30px 25px; padding-bottom: 0;}
          .logintools{    position: absolute;
    bottom: 18px;
    left: 13%;}
          .loginuser{float: right;
    position: absolute;
    right: -25px;
    bottom: 0;}
          #register{padding: 50px 0 !important;}
          .leftarealogin p{font-size: 20px;
    font-weight: normal;
    margin: 10px 0;
    line-height: 22px;}
          .leftarealogin h3{font-size: 34px;
    font-weight: 600;
    color: #19222e;}
          .leftarealogin ul{}
          .leftarealogin ul li{font-size: 16px;
    color: #19222e;
    margin-bottom: 8px;}
          .leftarealogin ul li i{    font-size: 8px;
    float: left;
    line-height: 20px;
    margin-right: 7px;}
          
          @media(min-width:768px) and (max-width:991px){
              .loginuser {
    float: right;
    position: relative;
    margin-right: -65px;
    bottom: 0;
}
              .leftarealogin {
    height: auto;
}
              .logintools {
    left: 7%;
    width: 166px;
}
          } 
          @media(max-width:767px){
              .loginuser {display: none;
    float: right;
    position: relative;
    right: 0;
    bottom: 0;
}
              .logintools {display: none;
    position: relative;
    bottom: 0;
    left: 0;
}
              .leftarealogin {
    height: auto;
                  padding-bottom: 30px;
}
              .log{padding-left: 30px;width: 100%;
    float: left;}
              .leftarealogin h3 {
    font-size: 28px;
              }
              .leftarealogin p {
    font-size: 14px;
              }
          }
          
          
        </style>  
        
        
        
        
        
        
        
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
                            <img src="https://workb4live.com/benasmart/assets/front/images/professional-login-tools3.png" class="logintools">
                             <img src="https://workb4live.com/benasmart/assets/front/images/professional-login-user.png" class="loginuser">
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