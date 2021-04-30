<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap2.min.css'); ?>">
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/front/css/semantic.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap2-tagsinput.css') ?>">
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
            select {
                color: #19222e !important;
                font-size: 14px !important;
            }
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
                            <p class="mrg">Set up your BenaSmart Professional Account</p>
                            <ul class="infoarea nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item tab1">
                                    <a class="nav-link active not-active lastchild" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="icon-office"></span></a> <span>Company Info</span>
                                </li>
                                <li class="nav-item tab2">
                                    <a class="nav-link not-active " id="profile-tab" data-toggle="tab" role="tab" href="#profile" aria-controls="profile" aria-selected="false"><span class="icon-telephone"></span></a><span>Contact Info</span>
                                </li>
                                <li class="nav-item tab3">
                                    <a class="nav-link not-active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="icon-bank"></span></a><span>Bank Account</span>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="register-professional-main-inner">
                                        <div class="row col-sm-12">
                                            <div class="register-professional-main-inner2 custompadding stepone d-flex">
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
                                                            <img src="<?php echo base_url(); ?>assets/front/images/professional-login-user.png" class="loginuser">
                                                            <img src="<?php echo base_url(); ?>assets/front/images/professional-login-tools3.png" class="logintools">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 pr-0">
                                                    <div class="totalform">
                                                        <form action="#" method="post" enctype="multipart/form-data" id="professional_reg_form1">
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
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>State</label>
                                                                        <div id="state_view">
                                                                            <select class="form-control" name="state_id" id="state_id">
                                                                                <option value="">Select country first</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <div id="city_view">
                                                                            <select class="form-control" name="city_id" id="city_id">
                                                                                <option value="">Select state first</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Zip</label>
                                                                        <input class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zip Code" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="h3-heading">Work Info and Skill</h3>
                                                            <div class="form-group">
                                                                <label>Working Field</label>
                                                                <div id="work_field_view">
                                                                    <select class="form-control" name="work_field" id="work_field" onchange="return get_sub_cat(this);">
                                                                        <option value=""> Select Working Field</option>
                                                                        <?php foreach ($work_list as $val) { ?>
                                                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div id="sub_work_field_view">
                                                            </div>
                                                            <div class="form-group customformgroup" id="add_skill_view">
                                                                <div class="">
                                                                    <label>Add Skills</label>
                                                                    <div class="col-sm-12 pl-0 pr-0 add-skill-text">
                                                                        <div id="ajax_skill_view">
                                                                            <select name="skills[]" id="skills" multiple class="label ui selection fluid dropdown">
                                                                                <option value="">Select skill</option>
                                                                                <?php foreach ($skill_list as $val) { ?>
                                                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                                                <?php } ?>
                                                                                <option value="other">Others</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="other_skills_view" style="display:none;">
                                                                    <label class="addother">Add Others Skills</label>
                                                                    <div class="col-sm-12 pl-0 pr-0 add-skill-text">
                                                                        <select multiple data-role="tagsinput" class="form-control" name="other_skill[]"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="projectinput1" id="projectinput1">
                                                                <div id="project_det_1">
                                                                    <div class="projectinput-total">
                                                                        <div class="projectname">
                                                                            <div class="form-group">
                                                                                <label>Service Name</label>
                                                                                <input class="form-control" name="project_name[]" id="project_name_1" placeholder="Enter specific service name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fees">
                                                                            <div class="form-group">
     <label>Fees per hour ($) <i class="fas fa-info-circle" data-toggle="tooltip" title="Price will be dependent on the complexity of work."></i></label>
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
                                                                                <label>Fees per Square Feet ($) <i class="fas fa-info-circle" data-toggle="tooltip" title="Price will be dependent on the complexity of work."></i></label>
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
                                                                                    <label>Service Type</label>
                                                                                    <input class="form-control" name="fees_project_name[]" id="fees_project_name_1" placeholder="Enter specific service type name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="fees">
                                                                                <div class="form-group">
                                                                                    <label>Fees per service ($) <i class="fas fa-info-circle" data-toggle="tooltip" title="Price will be dependent on the complexity of work."></i></label>
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

                                                                                <span id="company_logo_name"> Upload Company Logo</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="submit" class="btn info" value="Continue with Company Info" name="pro_reg_1">
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
                                                <form action="#" method="post" enctype="multipart/form-data" id="professional_reg_form2">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control" name="fname" id="fname" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control" name="lname" id="lname" />
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
                                                                <label>Mobile Number</label>
                                                                <div class="select-area">
                                                                    <select class="custom-select form-control" id="std_code" name="std_code">
                                                                        <option value="">ISD Code</option>
                                                                        <?php foreach ($std_list as $val) { ?>
                                                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['isd_code']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="inputarea">
                                                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile number">
                                                                </div>
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
                                                        <!--                                                        <a href="#" class="btn" name="pro_reg_contact" id="pro_reg_contact"></a>-->
                                                        <input type="submit" class="btn" value="Continue with Contact Info" name="pro_reg_2">
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
                                                <form method="post" id="professional_reg_form3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label>Bank Location</label>
                                                                    <select class="form-control" name="bank_country_id" id="bank_country_id">
                                                                        <option value="">Select Country</option>
                                                                        <?php foreach ($country_list as $val) { ?>
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
                                                                <label>Bank Phone</label>
                                                                <div class="select-area">
                                                                    <select class="custom-select form-control" id="std_code" name="std_code">
                                                                        <option value="">ISD Code</option>
                                                                        <?php foreach ($std_list as $val) { ?>
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
                            <!--<p>Already have an account?<button data-toggle="modal" data-target="#myModal2" class="regi-modal">Sign in</button></p>-->
                            <p>Already have an account?<button data-toggle="modal" data-target="#myModal2" data-dismiss="modal" class="regi-modal">Sign in</button></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
    </body>
    <?php $this->load->view('common/footer_include'); ?>
    <script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/front/js/'); ?>semantic.min.js"></script>

    <script>

        $(document).on('click', '#ajax_skill_view .menu.transition.visible .item, i.delete.icon ', function () {
//            console.log($('#skills').val());
            if ($.inArray('other', $('#skills').val()) != -1)
            {
                $('#other_skills_view').show();
            } else {
                $('#other_skills_view').hide();
            }
        });
        $('.label.ui.dropdown').dropdown();
        $('.no.label.ui.dropdown').dropdown({
            useLabels: false
        });
        $('.ui.button').on('click', function () {
            $('.ui.dropdown').dropdown('restore defaults')
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


        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log(input.files[0].name);
                $("#company_logo_name").html(' ' + input.files[0].name + ' ');
            }
        }

        $("#company_logo").change(function () {
            readURL(this);
        });


        $("#professional_reg_form1").submit(function (e) {
            if ($.trim($("#company_name").val()) == '') {
                $("#company_name").css("border-color", "red");
                toastr.error("Enter Company Name!");
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
                toastr.error("Select Work Field!");
                return false;
            } else {
                $("#work_field").css("border-color", "");
            }
            if ($.trim($("#sub_cat_validation").val()) == '1') {
                if ($.trim($("#sub_work_field").val()) == '') {
                    $("#sub_work_field").css("border-color", "red");
                    toastr.error("Select Sub Work Field!");
                    return false;
                } else {
                    $("#sub_work_field").css("border-color", "");
                }
            }
            var project_count = $.trim($("#last_project_id").val());
            for (i = 1; i <= project_count; i++) {
                if ($.trim($("#project_name_count_" + i).val()) == 1) {
                    if ($.trim($("#project_name_" + i).val()) == '') {
                        $("#project_name_" + i).css("border-color", "red");
                        toastr.error("Enter Service Name!");
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
                        toastr.error("Enter Fees Service Type!");
                        return false;
                    } else {
                        $("#fees_project_name_" + i).css("border-color", "");
                    }
                    if ($.trim($("#project_fees_" + i).val()) == '') {
                        $("#project_fees_" + i).css("border-color", "red");
                        toastr.error("Enter Fees per Service!");
                        return false;
                    } else {
                        $("#project_fees_" + i).css("border-color", "");
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
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url('professional-registration-succ'); ?>',
                type: 'POST',
                data: formData,
                success: function (data) {
                    var res = jQuery.parseJSON(data);
                    if (parseInt(res.status) == 1) {
                        // form1 successfully submit
                        document.getElementById("profile-tab").click();
                        $('.tab2').addClass('active');
                        $('.tab1 a').addClass('active');
                        $('.tab1 a').removeClass('not-active');
                        $('.tab2 a').removeClass('not-active');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    } else {
                        toastr.error(res.message);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
        $("#professional_reg_form2").submit(function (e) {
            if ($.trim($("#fname").val()) == '') {
                $("#fname").css("border-color", "red");
                toastr.error("Enter First Name!");
                return false;
            } else {
                $("#fname").css("border-color", "");
            }
            if ($.trim($("#lname").val()) == '') {
                $("#lname").css("border-color", "red");
                toastr.error("Enter Last Name!");
                return false;
            } else {
                $("#fname").css("border-color", "");
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
            if (regex.test(email) == false) {
                $("#email").css("border-color", "red");
                toastr.error("Enter Valid EmailID!");
                return false;
            } else {
                $("#email").css("border-color", "");
            }
            if ($.trim($("#std_code").val()) == '') {
                $("#std_code").css("border-color", "red");
                toastr.error("Enter STD Code!");
                return false;
            } else {
                $("#std_code").css("border-color", "");
            }
            if ($.trim($("#mobile_no").val()) == '') {
                $("#mobile_no").css("border-color", "red");
                toastr.error("Enter Mobile No.!");
                return false;
            } else {
                $("#mobile_no").css("border-color", "");
            }
            if (!$.trim($("#mobile_no").val()).match('[0-9]{10}')) {
                $("#mobile_no").css("border-color", "red");
                toastr.error("Enter Valid Mobile No. !");
                return false;
            } else {
                $("#mobile_no").css("border-color", "");
            }
            var mobile = $.trim($("#mobile_no").val());
            if (mobile.length != 10) {
                $("#mobile_no").css("border-color", "red");
                toastr.error("Enter Valid Mobile No. !");
                return false;
            } else {
                $("#mobile_no").css("border-color", "");
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
                toastr.error("Passwords Must Be At Least 6 Characters!");
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
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url('professional-registration-contact-succ'); ?>',
                type: 'POST',
                data: formData,
                success: function (data) {
                    var res = jQuery.parseJSON(data);
                    if (parseInt(res.status) == 1) {
                        // form2 successfully submit
                        document.getElementById("contact-tab").click();

                        $('.tab3').addClass('active');
                        $('.tab1 a').addClass('active');
                        $('.tab2 a').addClass('active');
                        $('.tab2 a').removeClass('not-active');
                        $('.tab3 a').removeClass('not-active');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    } else {
                        toastr.error(res.message);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
//        $("#pro_reg_contact").click(function (e) {
//            if ($.trim($("#name").val()) == '') {
//                $("#name").css("border-color", "red");
//                toastr.error("Select Name!");
//                return false;
//            } else {
//                $("#name").css("border-color", "");
//            }
//            if ($.trim($("#email").val()) == '') {
//                $("#email").css("border-color", "red");
//                toastr.error("Enter EmailID!");
//                return false;
//            } else {
//                $("#email").css("border-color", "");
//            }
//            var email = $.trim($("#email").val());
//            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//            if (regex.test(email) == false) {
//                $("#email").css("border-color", "red");
//                toastr.error("Enter valid EmailID!");
//                return false;
//            } else {
//                $("#email").css("border-color", "");
//            }
//            if ($.trim($("#std_code").val()) == '') {
//                $("#std_code").css("border-color", "red");
//                toastr.error("Enter STD Code!");
//                return false;
//            } else {
//                $("#std_code").css("border-color", "");
//            }
//            if ($.trim($("#bank_mobile_no").val()) == '') {
//                $("#bank_mobile_no").css("border-color", "red");
//                toastr.error("Enter Mobile No.!");
//                return false;
//            } else {
//                $("#bank_mobile_no").css("border-color", "");
//            }
//            if (!$.trim($("#bank_mobile_no").val()).match('[0-9]{10}')) {
//                $("#bank_mobile_no").css("border-color", "red");
//                toastr.error("Enter valid mobile no!");
//                return false;
//            } else {
//                $("#bank_mobile_no").css("border-color", "");
//            }
//            var mobile = $.trim($("#bank_mobile_no").val());
//            if (mobile.length != 10) {
//                $("#bank_mobile_no").css("border-color", "red");
//                toastr.error("Enter valid mobile no!");
//                return false;
//            } else {
//                $("#bank_mobile_no").css("border-color", "");
//            }
//            if ($.trim($("#password1").val()) == '') {
//                $("#password1").css("border-color", "red");
//                toastr.error("enter Password!");
//                return false;
//            } else {
//                $("#password1").css("border-color", "");
//            }
//            var pass = $.trim($("#password1").val());
//            if ((pass.length) < 6) {
//                $("#password1").css("border-color", "red");
//                toastr.error("Passwords must be at least 6 characters!");
//                return false;
//            } else {
//                $("#password1").css("border-color", "");
//            }
//            if ($.trim($("#password2").val()) == '') {
//                $("#password2").css("border-color", "red");
//                toastr.error("enter Confirm password!");
//                return false;
//            } else {
//                $("#password2").css("border-color", "");
//            }
//            if ($.trim($("#password1").val()) != $.trim($("#password2").val())) {
//                $("#password2").css("border-color", "red");
//                toastr.error("password and confirm password must be same!");
//                return false;
//            } else {
//                $("#password2").css("border-color", "");
//            }
//            var frm = $('#professional_reg_form2');
//            //console.log(frm.serialize());return false;
//            $.ajax({
//                url: '<?php echo base_url('professional-registration-contact-succ'); ?>',
//                type: 'POST',
//                data: frm.serialize(),
//                success: function (data) {
//                    document.getElementById("contact-tab").click();
//                    var res = jQuery.parseJSON(data);
//                    console.log(res);
//                    return false;
//                    if (parseInt(res.status) == 1) {
//                        // form2 successfully submit
//                        toastr.error(res.message);
//                        return false;
//                        document.getElementById("profile-tab").click();
//                    } else {
//                        toastr.error(res.message);
//                    }
//                },
//                cache: false,
//                contentType: false,
//                processData: false
//            });
//            return false;
//        });
        $("#professional_reg_form3").submit(function (e) {
            if ($.trim($("#bank_country_id").val()) == '') {
                $("#bank_country_id").css("border-color", "red");
                toastr.error("Enter Country Name!");
                return false;
            } else {
                $("#bank_country_id").css("border-color", "");
            }
            if ($.trim($("#account_holder_name").val()) == '') {
                $("#account_holder_name").css("border-color", "red");
                toastr.error("Enter Account Holder Name!");
                return false;
            } else {
                $("#account_holder_name").css("border-color", "");
            }
            if ($.trim($("#bank_name").val()) == '') {
                $("#bank_name").css("border-color", "red");
                toastr.error("Enter Bank Name!");
                return false;
            } else {
                $("#bank_name").css("border-color", "");
            }
            if ($.trim($("#bank_acount_no").val()) == '') {
                $("#bank_acount_no").css("border-color", "red");
                toastr.error("Enter Bank Account Number!");
                return false;
            } else {
                $("#bank_acount_no").css("border-color", "");
            }
            if ($.trim($("#ifsc_code").val()) == '') {
                $("#ifsc_code").css("border-color", "red");
                toastr.error("Enter IFSC Code!");
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
                toastr.error("Enter Bank Address!");
                return false;
            } else {
                $("#bank_address").css("border-color", "");
            }
            if ($.trim($("#std_code").val()) == '') {
                $("#std_code").css("border-color", "red");
                toastr.error("Enter STD Code!");
                return false;
            } else {
                $("#std_code").css("border-color", "");
            }
            if ($.trim($("#bank_mobile_no").val()) == '') {
                $("#bank_mobile_no").css("border-color", "red");
                toastr.error("Enter Mobile No.!");
                return false;
            } else {
                $("#bank_mobile_no").css("border-color", "");
            }
            if (!$.trim($("#bank_mobile_no").val()).match('[0-9]{10}')) {
                $("#bank_mobile_no").css("border-color", "red");
                toastr.error("Enter valid Mobile No. !");
                return false;
            } else {
                $("#bank_mobile_no").css("border-color", "");
            }
            var mobile = $.trim($("#bank_mobile_no").val());
            if (mobile.length != 10) {
                $("#bank_mobile_no").css("border-color", "red");
                toastr.error("Enter Valid Mobile No. !");
                return false;
            } else {
                $("#bank_mobile_no").css("border-color", "");
            }
//            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url('professional-registration-complete'); ?>',
                type: 'POST',
                data: formData,
                success: function (data) {
                    var res = jQuery.parseJSON(data);
                    //console.log(res);return false;
                    if (parseInt(res.status) == 1) {
                        // form1 successfully submit
                        window.location.href = '<?php echo base_url(); ?>';
                    } else {
                        toastr.error(res.message);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
        function get_state_using_country(obj) {
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
                toastr.error("Please Select Valid Country!");
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
                    success: function (html) {
                        $("#city_view").html(html);
                        return false;
                    }
                });
            } else {
                toastr.error("Please Select Valid State!");
                return false;
            }
        }
        function get_new_project(obj) {
            var last_id = $("#last_project_id").val();
            var new_id = (parseInt(last_id) + 1);
            $("#last_project_id").val(new_id);
            var design = '<div id="project_det_' + new_id + '"><div class="projectinput-total"><div class="projectname"><div class="form-group"><label>Service Name</label><input class="form-control" name="project_name[]" id="project_name_' + new_id + '" placeholder="Enter specific service name"></div></div><div class="fees"><div class="form-group"><label>Fees per hour </label><input class="form-control" name="fess_p_hour[]" id="fess_p_hour_' + new_id + '" placeholder="Enter fee for per hour"></div></div><div class="or"><div class="form-group"><label>&nbsp;</label><span>or</span></div></div><div class="fees"><div class="form-group"><label>Fees per Square Feet</label><input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_' + new_id + '" placeholder="Enter fee"></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_new_project(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
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
            var design = '<div id="project_type_div_' + new_id + '"><div class="projectinput"><div class="projectinput-total"><div class="projectname2"><div class="form-group"><label>Service Type</label><input class="form-control" name="fees_project_name[]" id="fees_project_name_' + new_id + '" placeholder="Enter specific service type name"></div></div><div class="fees"><div class="form-group"><label>Fees per project</label><input class="form-control" name="project_fees[]" id="project_fees_' + new_id + '" placeholder="Enter fee"></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_project_fees(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div></div>';
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
                    success: function (html) {
                        $("#work_field_view").html(html);
                        return false;
                    }
                });
            } else {
                toastr.error("Please select valid State!");
                return false;
            }
        }
        function get_sub_cat(obj) {
            var cat_id = $.trim(obj.value);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-sub-cat-using-category'); ?>',
                data: 'cat_id=' + cat_id,
                success: function (html) {
                    $("#sub_work_field_view").html(html);
                    return false;
                }
            });
        }
        $('#role_id').on('change', function () {
            var usertype = $.trim(obj.value);
            if (usertype == 4) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('ajax-get-skill'); ?>',
                    data: 'usertype=' + usertype,
                    success: function (html) {
                        $("#ajax_skill_view").html(html);
                        return false;
                    }
                });
            } else {
                return false;
            }
        });
    </script>
    <script src="<?php echo base_url('assets/front/js/bootstrap2-tagsinput.min.js'); ?>"></script>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</html>