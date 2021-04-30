<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
    </head>
    <body>
        <section id="register-professional" class="professional-bank">
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
                    <li><a ><img src="<?php echo base_url('assets/front/'); ?>images/company-info.png" /></a> <span>Company Info</span></li>
                    <li><a ><img src="<?php echo base_url('assets/front/'); ?>images/contact-info-color.png" /></a> <span>Contact Info</span></li>
                    <li class="lastchild"><a ><img src="<?php echo base_url('assets/front/'); ?>images/bank-account-color.png" /></a> <span>Bank Account</span></li>
                </ul>
                <div class="register-professional-main-inner">
                    <div class="register-professional-main-inner2">
                        <form action="<?php echo base_url('professional-registration-complete'); ?>" method="post" onsubmit="return form_validation1();">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Bank Location</label>
                                            <select class="form-control" name="bank_country_id" id="bank_country_id">
                                                <option value="">Select Country</option>
                                                <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Account Holder&#x27;s Name</label>
                                        <input class="form-control" name="account_holder_name" id="account_holder_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input class="form-control" name="bank_name" id="bank_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bank Account Number</label>
                                        <input class="form-control" name="bank_acount_no" id="bank_acount_no">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>IFSC Code</label>
                                        <input class="form-control" name="ifsc_code" id="ifsc_code">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>MICR Code</label>
                                        <input class="form-control" name="micr_code" id="micr_code">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bank Address</label>
                                        <input class="form-control" name="bank_address" id="bank_address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <div class="select-area">
                                            <select class="custom-select form-control" id="std_code" name="std_code">
                                                <option value="">ISD Code</option>
                                                <?php foreach($std_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['isd_code']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="inputarea">
                                            <input type="number" class="form-control" id="bank_mobile_no" name="bank_mobile_no" placeholder="Mobile number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="r-con-area">
                                <input type="submit" name="bank_pro_submit" value="Register Now!" class="btn">
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
        if ($.trim($("#bank_country_id").val()) == '') {
            $("#bank_country_id").css("border-color", "red");
            toastr.error("Enter Country Name!");
            return false;
        }else{
            $("#bank_country_id").css("border-color", "");
        }
        if ($.trim($("#account_holder_name").val()) == '') {
            $("#account_holder_name").css("border-color", "red");
            toastr.error("Enter account holder name!");
            return false;
        }else{
            $("#account_holder_name").css("border-color", "");
        }
        if ($.trim($("#bank_name").val()) == '') {
            $("#bank_name").css("border-color", "red");
            toastr.error("Enter Bank Name!");
            return false;
        }else{
            $("#bank_name").css("border-color", "");
        }
        if ($.trim($("#bank_acount_no").val()) == '') {
            $("#bank_acount_no").css("border-color", "red");
            toastr.error("Enter Bank Account Number!");
            return false;
        }else{
            $("#bank_acount_no").css("border-color", "");
        }
        if ($.trim($("#ifsc_code").val()) == '') {
            $("#ifsc_code").css("border-color", "red");
            toastr.error("Enter IFSC Code!");
            return false;
        }else{
            $("#ifsc_code").css("border-color", "");
        }
        if ($.trim($("#micr_code").val()) == '') {
            $("#micr_code").css("border-color", "red");
            toastr.error("Enter MICR Code!");
            return false;
        }else{
            $("#micr_code").css("border-color", "");
        }
        if ($.trim($("#bank_address").val()) == '') {
            $("#bank_address").css("border-color", "red");
            toastr.error("Enter Bank Address!");
            return false;
        }else{
            $("#bank_address").css("border-color", "");
        }
        if ($.trim($("#std_code").val()) == '') {
            $("#std_code").css("border-color", "red");
            toastr.error("Enter STD Code!");
            return false;
        }else{
            $("#std_code").css("border-color", "");
        }
        if ($.trim($("#bank_mobile_no").val()) == '') {
            $("#bank_mobile_no").css("border-color", "red");
            toastr.error("Enter Mobile No.!");
            return false;
        }else{
            $("#bank_mobile_no").css("border-color", "");
        }
        if(!$.trim($("#bank_mobile_no").val()).match('[0-9]{10}'))  {
            $("#bank_mobile_no").css("border-color", "red");
            toastr.error("Enter valid mobile no!");
            return false;
        }else{
            $("#bank_mobile_no").css("border-color", "");
        }
        var mobile=$.trim($("#bank_mobile_no").val());
        if(mobile.length!=10){
            $("#bank_mobile_no").css("border-color", "red");
            toastr.error("Enter valid mobile no!");
            return false;
        }else{
            $("#bank_mobile_no").css("border-color", "");
        }
    }
</script>