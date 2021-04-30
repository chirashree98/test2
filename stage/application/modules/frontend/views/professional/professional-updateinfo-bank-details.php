<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .sidebtn{    background: #1df2b5;

                         position: fixed;
                         top: 38%;
                         z-index: 99;
                         right: -130px;
                         width: 180px;
                         cursor: pointer;
                         -webkit-transition: all 0.25s ease-in-out;
                         -moz-transition: all 0.25s ease-in-out;
                         -o-transition: all 0.25s ease-in-out;
                         transition: all 0.25s ease-in-out;
            }   
            .sidebtn h2{    font-size: 16px;
                            padding: 15px;
                            color: #ffffff;
                            line-height: 18px;
                            text-transform: uppercase;
                            font-weight: 600;}
            .sidebtn h2 i{    padding-right: 25px;
                              font-size: 18px;}

            .sidebtn:hover{right:0px;}
            select{    height: 45px !important;
    font-size: 13px;
    line-height: 28px;
    color: #3a485a;
    font-weight: 400;
    border-radius: 3px;}
            @media(min-width:768px) and (max-width:1024px){
                .sidebtn {
                    top: 15%;
                }
            }
            @media(min-width:1025px) and (max-width:1540px){
                .sidebtn {
                    top: 15%;
                }
            }
        </style>
    </head>
    <body>
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>
        <section id="supplier-pagenav">
        <div class="container">
            <?php $new_status = is_professional_new($this->session->userdata('client_id')); 
            if($new_status == 0){
            ?>
            <ul>
                <li ><a>Personal Details</a></li>
                <li><a>About Us</a></li>
                <li><a>Company Details</a></li>
                <li><a>Work Info </a></li>
                <li><a>Upload Pictures</a></li>
                <li class="active"><a>Bank Details</a></li>
            </ul>
            <?php }else{ ?>
                <ul>
                    <li><a href="<?php echo base_url('professional/updateinfo/personal'); ?>">Personal Details</a></li>
                    <li><a href="<?php echo base_url('professional/updateinfo/about-us'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('professional/updateinfo/company-details'); ?>">Company Details</a></li>
                    <li><a href="<?php echo base_url('professional/updateinfo/work-info'); ?>">Work Info </a></li>
                    <li><a href="<?php echo base_url('professional/updateinfo/upload-pictures'); ?>">Upload Pictures</a></li>
                    <li class="active"><a href="<?php echo base_url('professional/updateinfo/bank-details'); ?>">Bank Details</a></li>
                </ul>
            <?php } ?>
        </div>
    </section>
    
    <section id="company-details">
        <div class="container">
            <div class="inner-pages-content-heading">
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
                <h3>Bank Details</h3>
            </div>
            <div class="row">
                <div class="company-details-form">
                    <form action="<?php echo base_url('professional/updateinfo/bank-details/success'); ?>" method="post" onsubmit="return form_validation1();">
                        <div class="company-details-inner">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group col-md-6 form-location-details">
                                        <label>Bank Location</label>
                                        <select class="custom-select form-control" id="bank_country_id" name="bank_country_id">
                                            <option value="">Select Country</option>
                                            <?php foreach($country_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($bank_det[0]['bank_country_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Account Holder&#8217;s Name</label>
                                        <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" value="<?php echo $bank_det[0]['account_holder_name']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $bank_det[0]['bank_name']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bank Account Number</label>
                                        <input type="text" class="form-control" id="bank_acount_no" name="bank_acount_no" value="<?php echo $bank_det[0]['bank_acount_no']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>IFSC Code</label>
                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo $bank_det[0]['ifsc_code']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>MICR Code</label>
                                        <input type="text" class="form-control" id="micr_code" name="micr_code" value="<?php echo $bank_det[0]['micr_code']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bank Address</label>
                                        <input type="text" class="form-control" id="bank_address" name="bank_address" value="<?php echo $bank_det[0]['bank_address']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bank Address Line 2</label>
                                        <input type="text" class="form-control" id="bank_address2" name="bank_address2" value="<?php echo $bank_det[0]['bank_address2']; ?>">
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>Country</label>
                                        <select class="custom-select form-control" id="country_id" name="country_id" onchange="return get_state_using_country(this);">
                                            <option value="">Select Country</option>
                                            <?php foreach($country_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($bank_det[0]['country_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>State</label>
                                        <div id="state_view">
                                            <select class="form-control" name="state_id" id="state_id" onchange="return get_city_using_state(this);">
                                                <option value="">Select State</option>
                                                <?php foreach($state_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($bank_det[0]['state_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>City</label>
                                        <div id="city_view">
                                            <select class="form-control" name="city_id" id="city_id">
                                                <option value="">Select City</option>
                                                <?php foreach($city_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($bank_det[0]['city_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Zip</label>
                                        <input type="number" class="form-control" name="zipcode" id="zipcode" value="<?php echo $bank_det[0]['zipcode']; ?>"/>
                                    </div>
                                    <div class="form-group col-md-6 form-up-down-details">
                                        <label>Bank Phone</label>
                                        <div class="select-area company-ph-selected-area">
                                            <select class="custom-select form-control" id="std_code" name="std_code">
                                                <option value="">ISD Code</option>
                                                <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($bank_det[0]['std_code'] == $val['id']){ echo'selected'; } ?>><?php echo $val['isd_code']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="inputarea company-ph-inputarea  bank-ph-select-area">
                                            <input type="number" class="form-control" name="bank_mobile_no" id="bank_mobile_no" value="<?php echo $bank_det[0]['bank_mobile_no']; ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Bank Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $bank_det[0]['email']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 pb-0 mb-0">
                            <input type="submit" class="login-btn btn" name="sub_btn" value="Update Now!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pr-0">
                    <div class="subscribe-left">
                        <img src="<?php echo base_url('assets/front/images/email.png'); ?>" />
                        <h4>Subscribe to Bena Smart and get $10 off
                            your next in-store purchase of $100 or more.</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="subscribe-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your email address" />
                            <button class="subscribe-btn">Subscribe</button>
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
<script>
    function form_validation1() {
        if ($.trim($("#bank_country_id").val()) == '') {
            $("#bank_country_id").css("border-color", "red");
            toastr.error("Select bank location!");
            return false;
        } else {
            $("#bank_country_id").css("border-color", "");
        }
        if ($.trim($("#account_holder_name").val()) == '') {
            $("#account_holder_name").css("border-color", "red");
            toastr.error("Enter account holder name!");
            return false;
        } else {
            $("#account_holder_name").css("border-color", "");
        }
        if ($.trim($("#bank_name").val()) == '') {
            $("#bank_name").css("border-color", "red");
            toastr.error("Enter bank name!");
            return false;
        } else {
            $("#bank_name").css("border-color", "");
        }
        if ($.trim($("#bank_acount_no").val()) == '') {
            $("#bank_acount_no").css("border-color", "red");
            toastr.error("enter bank account no.!");
            return false;
        } else {
            $("#bank_acount_no").css("border-color", "");
        }
        if ($.trim($("#ifsc_code").val()) == '') {
            $("#ifsc_code").css("border-color", "red");
            toastr.error("enter IFSC code!");
            return false;
        } else {
            $("#ifsc_code").css("border-color", "");
        }
        if ($.trim($("#micr_code").val()) == '') {
            $("#micr_code").css("border-color", "red");
            toastr.error("Enter MICR Code!");
            return false;
        } else {
            $("#micr_code").css("border-color", "");
        }
        if ($.trim($("#bank_address").val()) == '') {
            $("#bank_address").css("border-color", "red");
            toastr.error("Enter bank address!");
            return false;
        } else {
            $("#bank_address").css("border-color", "");
        }
        if ($.trim($("#bank_address2").val()) == '') {
            $("#bank_address2").css("border-color", "red");
            toastr.error("Enter bank address line 2!");
            return false;
        } else {
            $("#bank_address2").css("border-color", "");
        }
        if ($.trim($("#country_id").val()) == '') {
            $("#country_id").css("border-color", "red");
            toastr.error("Select country!");
            return false;
        } else {
            $("#country_id").css("border-color", "");
        }
        if ($.trim($("#state_id").val()) == '') {
            $("#state_id").css("border-color", "red");
            toastr.error("Select State!");
            return false;
        } else {
            $("#state_id").css("border-color", "");
        }
        if ($.trim($("#city_id").val()) == '') {
            $("#city_id").css("border-color", "red");
            toastr.error("Select City!");
            return false;
        } else {
            $("#city_id").css("border-color", "");
        }
        if ($.trim($("#zipcode").val()) == '') {
            $("#zipcode").css("border-color", "red");
            toastr.error("Enter zipcode!");
            return false;
        } else {
            $("#zipcode").css("border-color", "");
        }
        if ($.trim($("#std_code").val()) == '') {
            $("#std_code").css("border-color", "red");
            toastr.error("Select ISD Code!");
            return false;
        } else {
            $("#std_code").css("border-color", "");
        }
        if ($.trim($("#bank_mobile_no").val()) == '') {
            $("#bank_mobile_no").css("border-color", "red");
            toastr.error("Enter Bank mobile no.!");
            return false;
        } else {
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
        if ($.trim($("#email").val()) == '') {
            $("#email").css("border-color", "red");
            toastr.error("Enter EmailID!");
            return false;
        } else {
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
        
    }
    function get_state_using_country(obj){
        var country_id = $.trim(obj.value);
        if (country_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-state-using-country-front'); ?>',
                data: 'country_id=' + country_id,
                success: function (html) {
                    $("#state_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid country!");
            return false;
        }
    }
    function get_city_using_state(obj){
        var state_id = $.trim(obj.value);
        if (state_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-city-using-state-front'); ?>',
                data: 'state_id=' + state_id,
                success: function (html) {
                    $("#city_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid State!");
            return false;
        }
    }
</script>