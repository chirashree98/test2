<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
</head>

<body>

  <style>
        .ui.fluid.dropdown {
            display: block;
            width: 100%;
            min-width: 100%;
            padding: 10px;
            width: 100%;
            float: left;
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

        .ui.multiple.dropdown>.label {
            font-size: 14px !important;
        }

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
        /*
        select {
            color: #19222e !important;
            font-size: 14px !important;
        }
*/
        @media only screen and (max-width: 767px) {
            .ui.selection.dropdown .menu {
                /*      max-height: 8.01428571rem; /* + 1.335714285 to 9.349999995rem */
                /*      max-height: 9.349999995rem; /* Adds a half */
                max-height: 16.02857142rem;
                /* Double size */
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
                max-height: 16.02857143rem;
                /* + 1.3357142858 to 17.3642857158rem */
            }
        }

        @media only screen and (min-width: 1920px) {
            .ui.selection.dropdown .menu {
                max-height: 21.37142857rem;
                /* + 1.3357142856 to 22.7071428556rem */
            }
        }
    </style>










    <div class="profesonal-registrationpege">
        <div class="container">
            <section id="register-professional">
                <div class="container">
                    <div class="logoarea mt55">
                        <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo.png" class="logo" /></a>
                    </div>
                    <div class="register-professional-inner">
                        <p class="mrg">Set up your BenaSmart Professional/Supplier Account</p>
                        <?php if ($this->session->userdata('sucmsg')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->userdata('sucmsg'); ?></strong>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('errmsg')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?php echo $this->session->userdata('errmsg'); ?></strong>
                        </div>
                        <?php } ?>
                        <ul class="infoarea nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active lastchild" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <span class="icon-office"></span></a> <span>Company Info</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span class="icon-telephone"></span></a><span>Contact Info</span>
                            </li>
                            <li class="nav-item lastchild">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="icon-bank"></span></a><span>Bank Account</span>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="register-professional-main-inner">
                                    <div class="row col-sm-12">
                                        <div class="register-professional-main-inner2 custompadding d-flex stepone 1stpge">
                                            <div class="col-sm-3 pl-0">

                                                <div class="leftarealogin">
                                                    <h3>Benefits of</h3>
                                                    <h5>Signup for professional</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur dipiscing
                                                        elit sed do eiusmod.</p>
                                                    <ul>
                                                        <li><i class="fa fa-circle" aria-hidden="true"></i> Sed ut perspiciatis unde omnis iste</li>
                                                        <li><i class="fa fa-circle" aria-hidden="true"></i> Natus error sit voluptatem accusantium</li>
                                                        <li><i class="fa fa-circle" aria-hidden="true"></i> Doloremque laudantium, totam rem</li>
                                                        <li><i class="fa fa-circle" aria-hidden="true"></i> Aperiam, eaque ipsa quae ab illo</li>
                                                    </ul>
                                                   <div class="sup-pro-img">
                                                    <img src="https://workb4live.com/benasmart/assets/front/images/supplier-login-user.png" class="loginuser">
                                                    <img src="https://workb4live.com/benasmart/assets/front/images/supplier-login-tool5.png" class="logintools">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-9 pr-0">
                                               <div class="totalform">
                                                <form action="<?php echo base_url('professional-registration-succ'); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_validation1();">
                                                    <!--
                                <div class="form-group">
                                    <label>Are You Professional or Supplier?</label>
                                    <select class="form-control" name="role_id" id="role_id" onchange="return get_work_field(this);">
                                        <option value=""> Select User Type </option>
                                        <?php foreach ($role_list as $val) { ?>
                                            <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
-->
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input class="form-control" name="company_name" id="company_name" />
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input class="form-control" name="address1" id="address1" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Address Line2</label>
                                                                <input class="form-control" name="address2" id="address2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <select class="form-control" name="country_id" id="country_id" onchange="return get_state_using_country(this);">
                                                                            <option value="">Select Country</option>
                                                                            <?php foreach ($country_list as $val) { ?>
                                                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <div id="city_view">
                                                                            <select class="form-control" name="city_id" id="city_id">
                                                                                <option value="">Select state first</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>State</label>
                                                                        <div id="state_view">
                                                                            <select class="form-control" name="state_id" id="state_id">
                                                                                <option value="">Select country first</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>Zip</label>
                                                                        <input class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zip Code" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3 class="h3-heading">Work Info and Skill</h3>
                                                    <div class="form-group">
                                                        <label>Working Field</label>
                                                        <div id="work_field_view">
                                                            <select class="form-control" name="work_field" id="work_field">
                                                                <option value="">Please select user type first</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="add_skill_view">
                                                        <div class="">
                                                            <label>Add Skills</label>
                                                            <div class="col-sm-12 pl-0 pr-0 add-skill-text">
                                                                <div id="ajax_skill_view">
                                                                    <select name="skills" id="skills" multiple class="label ui selection fluid dropdown">
                                                                        <option value="">Select user type first</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <ul id="my-skill" class="tag-cloud list-inline">

                                                                </ul>
                                                                <!--                                        <span id="my-tag1"><img src="<?php echo base_url('assets/front/'); ?>images/search.png" /></span>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="projectinput1" id="projectinput1">
                                                        <div id="project_det_1">
                                                            <div class="projectinput-total">
                                                                <div class="projectname">
                                                                    <div class="form-group">
                                                                        <label>Project Name</label>
                                                                        <input class="form-control" name="project_name[]" id="project_name_1" placeholder="Enter specific project name">
                                                                    </div>
                                                                </div>
                                                                <div class="fees">
                                                                    <div class="form-group">
                                                                        <label>Fees per hour</label>
                                                                        <input class="form-control" name="fess_p_hour[]" id="fess_p_hour_1" placeholder="Enter fee for per hour">
                                                                    </div>
                                                                </div>
                                                                <div class="or">
                                                                    <div class="form-group">
                                                                        <label>&nbsp;</label>
                                                                        <span>or</span></div>
                                                                </div>
                                                                <div class="fees">
                                                                    <div class="form-group">
                                                                        <label>Fees per Square Feet</label>
                                                                        <input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_1" placeholder="Enter fee">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="plus-icon">
                                                                <div class="form-group">
                                                                    <label>&nbsp;</label>
                                                                    <a onclick="return get_new_project(1);"><span><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="project_name_hidden">
                                                        <input type="hidden" id="last_project_id" value="1">
                                                        <input type="hidden" id="project_name_count_1" value="1">
                                                    </div>
                                                    <div id="project_type_full_div">
                                                        <div id="project_type_div_1">
                                                            <div class="projectinput">
                                                                <div class="projectinput-total">
                                                                    <div class="projectname2">
                                                                        <div class="form-group">
                                                                            <label>Fees Project Type</label>
                                                                            <input class="form-control" name="fees_project_name[]" id="fees_project_name_1" placeholder="Enter specific project name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fees">
                                                                        <div class="form-group">
                                                                            <label>Fees per project</label>
                                                                            <input class="form-control" name="project_fees[]" id="project_fees_1" placeholder="Enter fee">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="plus-icon">
                                                                    <div class="form-group">
                                                                        <label>&nbsp;</label>
                                                                        <a onclick="return get_project_fees(1);"><span><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="project_name_type_hidden">
                                                        <input type="hidden" id="last_project_type_id" value="1">
                                                        <input type="hidden" id="project_name_type_count_1" value="1">
                                                    </div>
                                                    <div class="mt12">
                                                        <div class="rowcustom">
                                                            <div class="col-sm-6">
                                                                <div class="form-group logo-uplode">
                                                                    <label class="custom-file-upload">
                                                                        <input type="file" name="company_logo" id="company_logo" />
                                                                        Upload Company Logo
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn info" value="Continue with Contact Info" name="pro_reg_1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







                                                    <p class="pcolor">We won't share your personal details with anyone</p>
                                                    <span class="terms-privacy">If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions <br /> and Privacy Policy</a></span>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>






                            <div class="tab-pane fade cstab2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row col-sm-12">
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
                                                <p class="pcolor">We won't share your personal details with anyone</p>
                                                <span class="terms-privacy">If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions <br /> and Privacy Policy</a></span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade cstab3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row col-sm-12">
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
                                                <p class="pcolor">We won't share your personal details with anyone</p>
                                                <span class="terms-privacy">If you continue, you are accepting <a href="#">BenaSmart Terms and Conditions <br /> and Privacy Policy</a></span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>










                    </div>
                    <div class="create-acount2">
                        <p>Already have an account?<button data-toggle="modal" data-target="#myModal" class="regi-modal">Sign in</button></p>
                    </div>
                </div>
            </section>
        </div>
    </div>






    <?php $this->load->view('common/footer'); ?>
</body>
<?php $this->load->view('common/footer_include'); ?>
<script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script>
    $('.label.ui.dropdown')
        .dropdown();

    $('.no.label.ui.dropdown')
        .dropdown({
            useLabels: false
        });

    $('.ui.button').on('click', function() {
        $('.ui.dropdown')
            .dropdown('restore defaults')
    })

</script>
<script>
    //        $('#my-skill').taxonomy_jquery({
    //            createButton: true,
    //        });

    //    $(document).on('click', '#my-tag1', function({
    //        $("#my-tags").trigger("click");
    //    });

    $('#my-second-tags').taxonomy_jquery({
        createButton: false,
        hiddenFieldName: 'my-second-tags[]'
    });

    function form_validation1() {
        if ($.trim($("#role_id").val()) == '') {
            $("#role_id").css("border-color", "red");
            toastr.error("Select Usertype!");
            return false;
        } else {
            $("#role_id").css("border-color", "");
        }
        if ($.trim($("#company_name").val()) == '') {
            $("#company_name").css("border-color", "red");
            toastr.error("Enter company name!");
            return false;
        } else {
            $("#company_name").css("border-color", "");
        }

        if ($.trim($("#address1").val()) == '') {
            $("#address1").css("border-color", "red");
            toastr.error("Enter Address!");
            return false;
        } else {
            $("#address1").css("border-color", "");
        }
        if ($.trim($("#address2").val()) == '') {
            $("#address2").css("border-color", "red");
            toastr.error("Select Address Line 2!");
            return false;
        } else {
            $("#address2").css("border-color", "");
        }
        if ($.trim($("#country_id").val()) == '') {
            $("#country_id").css("border-color", "red");
            toastr.error("Select Country!");
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
            toastr.error("Enter Zipcode!");
            return false;
        } else {
            $("#zipcode").css("border-color", "");
        }
        if ($.trim($("#work_field").val()) == '') {
            $("#work_field").css("border-color", "red");
            toastr.error("Select work Field!");
            return false;
        } else {
            $("#work_field").css("border-color", "");
        }
        var usertype = $.trim($("#role_id").val());
        if (usertype == 3) {
            var project_count = $.trim($("#last_project_id").val());
            for (i = 1; i <= project_count; i++) {
                if ($.trim($("#project_name_count_" + i).val()) == 1) {
                    if ($.trim($("#project_name_" + i).val()) == '') {
                        $("#project_name_" + i).css("border-color", "red");
                        toastr.error("Enter Project Name!");
                        return false;
                    } else {
                        $("#project_name_" + i).css("border-color", "");
                    }
                    if ($.trim($("#fees_p_s_feet_" + i).val()) == '') {
                        if ($.trim($("#fess_p_hour_" + i).val()) == '') {
                            $("#fees_p_s_feet_" + i).css("border-color", "red");
                            $("#fess_p_hour_" + i).css("border-color", "red");
                            toastr.error("Enter Fees per hour or Fees per Square Feet!");
                            return false;
                        } else {
                            $("#fees_p_s_feet_" + i).css("border-color", "");
                            $("#fess_p_hour_" + i).css("border-color", "");
                        }
                    } else {
                        if ($.trim($("#fess_p_hour_" + i).val()) != '') {
                            $("#fees_p_s_feet_" + i).css("border-color", "red");
                            $("#fess_p_hour_" + i).css("border-color", "red");
                            toastr.error("Enter Fees per hour or Fees per Square Feet!");
                            return false;
                        } else {
                            $("#fees_p_s_feet_" + i).css("border-color", "");
                            $("#fess_p_hour_" + i).css("border-color", "");
                        }
                    }
                }
            }
            var project_type_count = $.trim($("#last_project_type_id").val());
            for (i = 1; i <= project_type_count; i++) {
                if ($.trim($("#project_name_type_count_" + i).val()) == 1) {
                    if ($.trim($("#fees_project_name_" + i).val()) == '') {
                        $("#fees_project_name_" + i).css("border-color", "red");
                        toastr.error("Enter fees Project Type!");
                        return false;
                    } else {
                        $("#fees_project_name_" + i).css("border-color", "");
                    }
                    if ($.trim($("#project_fees_" + i).val()) == '') {
                        $("#project_fees_" + i).css("border-color", "red");
                        toastr.error("Enter Fees per project!");
                        return false;
                    } else {
                        $("#project_fees_" + i).css("border-color", "");
                    }
                }
            }
        }
        if ($.trim($("#company_logo").val()) == '') {
            $("#company_logo").css("border-color", "red");
            toastr.error("Select Company Logo!");
            return false;
        } else {
            $("#company_logo").css("border-color", "");
        }

    }

    function get_state_using_country(obj) {
        var country_id = $.trim(obj.value);
        if (country_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-state-using-country-front'); ?>',
                data: 'country_id=' + country_id,
                success: function(html) {
                    $("#state_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid country!");
            return false;
        }
    }

    function get_city_using_state(obj) {
        var state_id = $.trim(obj.value);
        if (state_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-city-using-state-front'); ?>',
                data: 'state_id=' + state_id,
                success: function(html) {
                    $("#city_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid State!");
            return false;
        }
    }

    function get_new_project(obj) {
        var last_id = $("#last_project_id").val();
        var new_id = (parseInt(last_id) + 1);
        $("#last_project_id").val(new_id);
        var design = '<div id="project_det_' + new_id + '"><div class="projectinput-total"><div class="projectname"><div class="form-group"><label>Project Name</label><input class="form-control" name="project_name[]" id="project_name_' + new_id + '" placeholder="Enter specific project name"></div></div><div class="fees"><div class="form-group"><label>Fees per hour</label><input class="form-control" name="fess_p_hour[]" id="fess_p_hour_' + new_id + '" placeholder="Enter fee for per hour"></div></div><div class="or"><div class="form-group"><label>&nbsp;</label><span>or</span></div></div><div class="fees"><div class="form-group"><label>Fees per Square Feet</label><input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_' + new_id + '" placeholder="Enter fee"></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_new_project(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
        $(".projectinput1").append(design);
        $("#project_name_hidden").append('<input type="hidden" id="project_name_count_' + new_id + '" value="1">');
    }

    function remove_new_project(obj) {
        var new_id = parseInt(obj);
        $("#project_det_" + new_id).html('');
        $("#project_name_count_" + new_id).val('0');
    }

    function get_project_fees(obj) {
        var last_id = $("#last_project_type_id").val();
        var new_id = (parseInt(last_id) + 1);
        $("#last_project_type_id").val(new_id);
        var design = '<div id="project_type_div_' + new_id + '"><div class="projectinput"><div class="projectinput-total"><div class="projectname2"><div class="form-group"><label>Fees Project Type</label><input class="form-control" name="fees_project_name[]" id="fees_project_name_' + new_id + '" placeholder="Enter specific project name"></div></div><div class="fees"><div class="form-group"><label>Fees per project</label><input class="form-control" name="project_fees[]" id="project_fees_' + new_id + '" placeholder="Enter fee"></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_project_fees(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div></div>';
        $("#project_type_full_div").append(design);
        $("#project_name_type_hidden").append('<input type="hidden" id="project_name_type_count_' + new_id + '" value="1">');
    }

    function remove_project_fees(obj) {
        var old_id = parseInt(obj);
        $("#project_type_div_" + old_id).html('');
        $("#project_name_type_count_" + old_id).val('0');
    }

    function get_work_field(obj) {
        var usertype = $.trim(obj.value);
        if (usertype != '') {
            if (usertype == 4) {
                $("#add_skill_view").hide();
                $("#projectinput1").hide();
                $("#project_type_div_1").hide();
            } else {
                $("#add_skill_view").show();
                $("#projectinput1").show();
                $("#project_type_div_1").show();
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-work-field-using-usertype'); ?>',
                data: 'usertype=' + usertype,
                success: function(html) {
                    $("#work_field_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid State!");
            return false;
        }
    }
    $('#role_id').on('change', function() {
        var usertype = $.trim(obj.value);
        if (usertype == 4) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-skill'); ?>',
                data: 'usertype=' + usertype,
                success: function(html) {
                    $("#ajax_skill_view").html(html);
                    return false;
                }
            });
        } else {
            return false;
        }
    });

</script>

</html>
