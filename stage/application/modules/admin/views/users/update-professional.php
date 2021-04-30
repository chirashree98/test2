<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('includes/pre-header'); ?>
    <style>
        #project_full_div span,
        #project_type_full_div span,
        #project_name_hidden span {
            background: #e8f0fe;
            width: 33px;
            height: 33px;
            padding: 10px;
            border-radius: 50%;
            float: left;
            margin-left: 12px;
            line-height: 14px;
            font-style: italic;
            font-weight: 600;
            color: #000;
            margin-top: 45px;
        }
        #project_full_div .row label,
        #project_name_hidden .row label,
        #project_type_full_div .row label {
            margin-top: 1rem;
        }
        @media(max-width: 767px) {

            #project_full_div span,
            #project_type_full_div span,
            #project_name_hidden span {
                margin-left: 0;
                margin: 0 auto;
                float: none;
                display: block;
                margin-top: -26px;
            }
        }

        @media(min-width:768px) and (max-width:1024px) {
            #project_full_div .col-sm-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            #project_full_div .col-sm-2 {
                flex: 0 0 28%;
                max-width: 28%;

            }

            #project_full_div .col-sm-1 {
                flex: 0 0 16%;
                max-width: 16%;
            }
        }

        @media(min-width:1280px) and (max-width:1366px) {
            .card form label {
                font-size: 13px;
            }

            #project_full_div span,
            #project_type_full_div span,
            #project_name_hidden span {
                font-size: 13px;
            }
        }

    </style>
</head>
<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <?php $this->load->view('includes/sidebar'); ?>
        <!--end sidebar-wrapper-->
        <!--header-->
        <?php $this->load->view('includes/header'); ?>
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    </div>
                    <!--end breadcrumb-->
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0"><?php echo $title; ?></h4>
                            </div>
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
                            <hr />
                            <form action="<?php echo base_url('admin/user/update-new-professional-succ'); ?>" method="post" onsubmit="return form_validation();" enctype='multipart/form-data'>
                                <input type="hidden" name="TRXTR" value="<?php echo $pro_id; ?>">
                                <input type="hidden" name="TRXTR1" value="<?php echo $redirect_position; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>User role:</label>
                                            <select class="form-control" name="role_id" id="role_id">
                                                <option value=""> Select user role </option>
                                                <?php foreach ($role_list as $val) { ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($user_detail[0]['role_id'] == $val['id']){ echo'selected'; } ?>> <?php echo $val['name']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Company Name:</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $user_prof_det[0]['company_name']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" class="form-control" id="address1" name="address1" placeholder="Address" value="<?php echo $user_prof_det[0]['address1']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address Line2:</label>
                                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line2" value="<?php echo $user_prof_det[0]['address2']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country Name:</label>
                                            <select class="form-control" name="country_id" id="country_id" onchange="return get_state_using_country(this);">
                                                <option value=""> Select Country </option>
                                                <?php foreach ($country_list as $val) { ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($user_prof_det[0]['country_id'] == $val['id']){ echo'selected'; } ?>> <?php echo $val['name']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>State Name:</label>
                                            <div id="state_view">
                                                <select class="form-control" name="state_id" id="state_id">
                                                    <option value=""> Select state </option>
                                                    <?php foreach($user_state_list as $val){ ?>
                                                        <option value="<?php echo $val['id']; ?>" <?php if($user_prof_det[0]['state_id'] == $val['id']){ echo'selected'; } ?>> <?php echo $val['name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>City Name:</label>
                                            <div id="city_view">
                                                <select class="form-control" name="city_id" id="city_id">
                                                    <option value=""> Select city </option>
                                                    <?php foreach($user_city_list as $val){ ?>
                                                        <option value="<?php echo $val['id']; ?>" <?php if($user_prof_det[0]['city_id'] == $val['id']){ echo'selected'; } ?>> <?php echo $val['name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Zip code:</label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" value="<?php echo $user_prof_det[0]['zipcode']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Working Field:</label>
                                    <select class="form-control" name="work_field" id="work_field">
                                        <option value=""> Select Work Field </option>
                                        <?php foreach($subrole as $val){ ?>
                                        <option value="<?php echo $val['id']; ?>" <?php if($user_prof_det[0]['work_field'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Add Skills:</label>
                                    <ul id="my-tags" class="tag-cloud list-inline">
                                    </ul>
                                </div>
                                <div id="project_full_div">
                                    <div id="project_div_1">
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>Project Name:</label>
                                                <input class="form-control" name="project_name[]" id="project_name_1" placeholder="Enter specific project name">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Fees per hour</label>
                                                <input class="form-control" name="fess_p_hour[]" id="fess_p_hour_1" placeholder="Enter fee for per hour">
                                            </div>
                                            <div class="col-sm-1 form-group">
                                                <label>&nbsp;</label>
                                                <span class="form-or">or</span></div>
                                            <div class="col-sm-2 form-group">
                                                <label>Fees per Square Feet</label>
                                                <input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_1" placeholder="Enter fee">
                                            </div>
                                            <div class="col-sm-2 form-group" id="plus_view_1">
                                                <label>&nbsp;</label>
                                                <a onclick="return get_new_project(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="plumbing-work-info-table">
                                <div class="table-responsive">
                                    <table class="table" border="0">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th class="text-center">Fees per hour</th>
                                                <th class="text-center">Fees per suare feet</th>
                                                <th class="text-center">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($project_details) > 0){ 
                                                foreach($project_details as $val){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['project_name']; ?></td>
                                                <td class="text-center"><?php if($val['fess_p_hour'] == 0){ echo'--'; }else{ echo $val['fess_p_hour']; } ?></td>
                                                <td class="text-center"><?php if($val['fees_p_s_feet'] == 0){ echo'--'; }else{ echo $val['fees_p_s_feet']; } ?></td>
                                                <td class="text-center">
                                                    <ul class="heart-trash">
                                                        <li><a href="<?php echo base_url('admin/delete/professional/project/1/'. smart_encode($val['id']).'/'.smart_encode($pro_id)); ?>" onclick="return confirm('Are you sure to delete ?');"><i class="fas fa-trash-alt" aria-hidden="true">Delete</i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                                }else{ ?>
                                                <tr>
                                                    <td colspan="4">No Project Found!</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <div id="project_name_hidden">
                                    <input type="hidden" id="last_project_id" value="1">
                                    <input type="hidden" id="project_name_count_1" value="1">
                                </div>

                                <div id="project_type_full_div">
                                    <div id="project_type_div_1">
                                        <div class="row">
                                            <div class="col-sm-7 form-group">
                                                <label>Fees Project Type:</label>
                                                <input class="form-control" name="fees_project_name[]" id="fees_project_name_1" placeholder="Enter specific project name">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label>Fees per project</label>
                                                <input class="form-control" name="project_fees[]" id="project_fees_1" placeholder="Enter fee">
                                            </div>

                                            <div class="col-sm-2 form-group" id="plus_type_view_1">
                                                <label>&nbsp;</label>
                                                <a onclick="return get_new_type_project(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="project_name_type_hidden">
                                    <input type="hidden" id="last_project_type_id" value="1">
                                    <input type="hidden" id="project_name_type_count_1" value="1">
                                </div>
                                <div class="table-responsive">
                                <div class="plumbing-work-info-table">
                                    <table class="table" border="0">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th class="text-center">Fees per project</th>
                                                <th class="text-center">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($project_details2) > 0){ 
                                                foreach($project_details2 as $val){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['fees_project_name']; ?></td>
                                                <td class="text-center"><?php echo $val['fees_project_name']; ?></td>

                                                <td class="text-center">
                                                    <ul class="heart-trash">
                                                        <li><a href="<?php echo base_url('admin/delete/professional/project/2/'. smart_encode($val['id']).'/'.smart_encode($pro_id)); ?>" onclick="return confirm('Are you sure to delete ?');"><i class="fas fa-trash-alt" aria-hidden="true">delete</i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                            }else{
                                            ?>
                                                <tr>
                                                    <td colspan="3">No Project Found !</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <div class="row company-logo">
                                    <div class="col-sm-6 form-group">
                                        <label>Company Logo:</label>
                                        <input type="file" name="company_logo" id="company_logo" />
                                        <img src="<?php echo base_url($user_prof_det[0]['company_logo']); ?>">
                                        <br>
                                        <span id="company_logo_err" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>User Name:</label>
                                        <input class="form-control" name="name" id="name" value="<?php echo $user_detail[0]['name']; ?>" />
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Your Email</label>
                                        <input class="form-control" name="email" id="email" value="<?php echo $user_detail[0]['email']; ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="At least 6 characters." value="<?php echo $user_detail[0]['password']; ?>">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Re-Enter Password</label>
                                        <input type="password" name="password2" id="password2" class="form-control" value="<?php echo $user_detail[0]['password']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Bank Location</label>
                                        <select class="form-control" name="bank_country_id" id="bank_country_id">
                                            <option value="">Select Country</option>
                                            <?php foreach($country_list as $val){ ?>
                                            <option value="<?php echo $val['id']; ?>" <?php if($user_prof_bank_det[0]['bank_country_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Account Holder&#x27;s Name</label>
                                        <input class="form-control" name="account_holder_name" id="account_holder_name" value="<?php echo $user_prof_bank_det[0]['account_holder_name']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Bank Name</label>
                                        <input class="form-control" name="bank_name" id="bank_name" value="<?php echo $user_prof_bank_det[0]['bank_name']; ?>">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Bank Account Number</label>
                                        <input class="form-control" name="bank_acount_no" id="bank_acount_no" value="<?php echo $user_prof_bank_det[0]['bank_acount_no']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>IFSC Code</label>
                                        <input class="form-control" name="ifsc_code" id="ifsc_code" value="<?php echo $user_prof_bank_det[0]['ifsc_code']; ?>">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>MICR Code</label>
                                        <input class="form-control" name="micr_code" id="micr_code" value="<?php echo $user_prof_bank_det[0]['micr_code']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bank Address</label>
                                    <input class="form-control" name="bank_address" id="bank_address" value="<?php echo $user_prof_bank_det[0]['bank_address']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>ISD Code</label>
                                        <select class="custom-select form-control" id="std_code" name="std_code">
                                            <option value="">ISD Code</option>
                                            <?php foreach($country_list as $val){ ?>
                                            <option value="<?php echo $val['id']; ?>" <?php if($user_prof_bank_det[0]['std_code'] == $val['id']){ echo 'selected'; } ?>><?php echo $val['isd_code']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Mobile Number</label>
                                        <input type="number" class="form-control" id="bank_mobile_no" name="bank_mobile_no" placeholder="Mobile number" value="<?php echo $user_prof_bank_det[0]['bank_mobile_no']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <?php $this->load->view('includes/footer'); ?>
        <script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
        <script>
            function form_validation() {
                if ($.trim($("#role_id").val()) == '') {
                    $("#role_id").css("border-color", "red");
                    toastr.error("Select Usertype!");
                    return false;
                }
                if ($.trim($("#company_name").val()) == '') {
                    $("#company_name").css("border-color", "red");
                    toastr.error("Enter Company Name!");
                    return false;
                }
                if ($.trim($("#address1").val()) == '') {
                    $("#address1").css("border-color", "red");
                    toastr.error("Enter Address!");
                    return false;
                }
                if ($.trim($("#address2").val()) == '') {
                    $("#address2").css("border-color", "red");
                    toastr.error("Enter Address Line 2!");
                    return false;
                }
                if ($.trim($("#country_id").val()) == '') {
                    $("#country_id").css("border-color", "red");
                    toastr.error("Select Country!");
                    return false;
                }
                if ($.trim($("#state_id").val()) == '') {
                    $("#state_id").css("border-color", "red");
                    toastr.error("Select State Name!");
                    return false;
                }
                if ($.trim($("#city_id").val()) == '') {
                    $("#city_id").css("border-color", "red");
                    toastr.error("Select City!");
                    return false;
                }
                if ($.trim($("#zipcode").val()) == '') {
                    $("#zipcode").css("border-color", "red");
                    toastr.error("Enter Zipcode!");
                    return false;
                }
                if ($.trim($("#work_field").val()) == '') {
                    $("#work_field").css("border-color", "red");
                    toastr.error("Select Working Field!");
                    return false;
                }
                var project_count = $.trim($("#last_project_id").val());
                for (i = 1; i <= project_count; i++) {
                    if($.trim($("#project_name_count_"+i).val()) == 1){
                        if ($.trim($("#project_name_"+i).val()) != '') {
                            if ($.trim($("#fees_p_s_feet_"+i).val()) == '') {
                                if ($.trim($("#fess_p_hour_"+i).val()) == '') {
                                    $("#fees_p_s_feet_"+i).css("border-color", "red");
                                    $("#fess_p_hour_"+i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;
                                }else{
                                    $("#fees_p_s_feet_"+i).css("border-color", "");
                                    $("#fess_p_hour_"+i).css("border-color", "");
                                }
                            }else{
                                if ($.trim($("#fess_p_hour_"+i).val()) != '') {
                                    $("#fees_p_s_feet_"+i).css("border-color", "red");
                                    $("#fess_p_hour_"+i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;
                                }else{
                                    $("#fees_p_s_feet_"+i).css("border-color", "");
                                    $("#fess_p_hour_"+i).css("border-color", "");
                                }
                            }
                        }
                    }
                }
                var project_type_count = $.trim($("#last_project_type_id").val());
                for (i = 1; i <= project_type_count; i++) {
                    if($.trim($("#project_name_type_count_"+i).val()) == 1){
                        if ($.trim($("#fees_project_name_"+i).val()) != '') {
                            if ($.trim($("#project_fees_"+i).val()) == '') {
                                $("#project_fees_"+i).css("border-color", "red");
                                toastr.error("Enter Fees per project!");
                                return false;
                            }else{
                                $("#project_fees_"+i).css("border-color", "");
                            }
                        }
                    }
                }
                if ($.trim($("#name").val()) == '') {
                    $("#name").css("border-color", "red");
                    toastr.error("Enter Username!");
                    return false;
                }
                if ($.trim($("#email").val()) == '') {
                    $("#email").css("border-color", "red");
                    toastr.error("Enter Email!");
                    return false;
                }
                var email = $.trim($("#email").val());
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (regex.test(email) == false) {
                    $("#email").css("border-color", "red");
                    toastr.error("Enter valid EmailID!");
                    return false;
                }
                if ($.trim($("#password1").val()) == '') {
                    $("#password1").css("border-color", "red");
                    toastr.error("Enter Password!");
                    return false;
                }
                var pass = $.trim($("#password1").val());
                if ((pass.length) < 6) {
                    $("#password1").css("border-color", "red");
                    toastr.error("Passwords must be at least 6 characters!");
                    return false;
                }
                if ($.trim($("#password2").val()) == '') {
                    $("#password2").css("border-color", "red");
                    toastr.error("Enter Confirm Password!");
                    return false;
                }
                if ($.trim($("#password1").val()) != $.trim($("#password2").val())) {
                    $("#password1").css("border-color", "red");
                    toastr.error("Password and confirm password must be same.!");
                    return false;
                }
                if ($.trim($("#bank_country_id").val()) == '') {
                    $("#bank_country_id").css("border-color", "red");
                    toastr.error("Select Bank Location!");
                    return false;
                }
                if ($.trim($("#account_holder_name").val()) == '') {
                    $("#account_holder_name").css("border-color", "red");
                    toastr.error("Enter account holder name!");
                    return false;
                }
                if ($.trim($("#bank_name").val()) == '') {
                    $("#bank_name").css("border-color", "red");
                    toastr.error("Enter Bank Name!");
                    return false;
                }
                if ($.trim($("#bank_acount_no").val()) == '') {
                    $("#bank_acount_no").css("border-color", "red");
                    toastr.error("Enter Bank Account No.!");
                    return false;
                }
                if ($.trim($("#ifsc_code").val()) == '') {
                    $("#ifsc_code").css("border-color", "red");
                    toastr.error("Enter IFSC Code!");
                    return false;
                }
                if ($.trim($("#micr_code").val()) == '') {
                    $("#micr_code").css("border-color", "red");
                    toastr.error("Enter MICR Code!");
                    return false;
                }
                if ($.trim($("#bank_address").val()) == '') {
                    $("#bank_address").css("border-color", "red");
                    toastr.error("Enter Bank Address!");
                    return false;
                }
                if ($.trim($("#std_code").val()) == '') {
                    $("#std_code").css("border-color", "red");
                    toastr.error("Enter ISD Code!");
                    return false;
                }
                if ($.trim($("#bank_mobile_no").val()) == '') {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter Mobile No.!");
                    return false;
                }
                if (!$.trim($("#bank_mobile_no").val()).match('[0-9]{10}')) {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;
                }
                var mobile = $.trim($("#bank_mobile_no").val());
                if (mobile.length != 10) {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;

                }
            }

            function get_state_using_country(obj) {
                var country_id = $.trim(obj.value);
                if (country_id != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-state-using-country-admin'); ?>',
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
                        url: '<?php echo base_url('ajax-get-city-using-state-admin'); ?>',
                        data: 'state_id=' + state_id,
                        success: function(html) {
                            $("#city_view").html(html);
                            return false;
                        }
                    });
                } else {
                    toastr.error("Please select valid state!");
                    return false;
                }
            }
            $('#my-tags').taxonomy_jquery();
            $('#my-second-tags').taxonomy_jquery({
                createButton: false,
                hiddenFieldName: 'my-second-tags[]'
            });

            function get_new_project(obj) {
                var last_id = $("#last_project_id").val();
                var new_id = (parseInt(last_id) + 1);
                $("#last_project_id").val(new_id);
                var design = '<div id="project_div_' + new_id + '"><div class="row"><div class="col-sm-4"><label>Project Name:</label><input class="form-control" name="project_name[]" id="project_name_' + new_id + '" placeholder="Enter specific project name"></div><div class="col-sm-2"><label>Fees per hour</label><input class="form-control" name="fess_p_hour[]" id="fess_p_hour_' + new_id + '" placeholder="Enter fee for per hour"></div><div class="col-sm-1"><label>&nbsp;</label><span>or</span></div><div class="col-sm-2"><label>Fees per Square Feet</label><input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_' + new_id + '" placeholder="Enter fee"></div><div class="col-sm-2" id="plus_view_' + new_id + '"><label>&nbsp;</label><a onclick="return del_new_project(' + new_id + ');"><span><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
                $("#project_full_div").append(design);
                $("#project_name_hidden").append('<input type="hidden" id="project_name_count_' + new_id + '" value="1">');
            }

            function del_new_project(obj) {
                var old_id = parseInt(obj);
                $("#project_div_" + old_id).html('');
                $("#project_name_count_" + old_id).val('0');
            }

            function get_new_type_project(obj) {
                var last_id = $("#last_project_type_id").val();
                var new_id = (parseInt(last_id) + 1);
                $("#last_project_type_id").val(new_id);
                var design = '<div id="project_type_div_' + new_id + '"><div class="row"><div class="col-sm-7"><label>Fees Project Type:</label><input class="form-control" name="fees_project_name[]" id="fees_project_name_' + new_id + '" placeholder="Enter specific project name"></div><div class="col-sm-3"><label>Fees per project</label><input class="form-control" name="project_fees[]" id="project_fees_' + new_id + '" placeholder="Enter fee"></div><div class="col-sm-2" id="plus_type_view_' + new_id + '"><label>&nbsp;</label><a onclick="return del_new_project_type(' + new_id + ');"><span><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
                $("#project_type_full_div").append(design);
                $("#project_name_type_hidden").append('<input type="hidden" id="project_name_type_count_' + new_id + '" value="1">');
            }

            function del_new_project_type(obj) {
                var old_id = parseInt(obj);
                $("#project_type_div_" + old_id).html('');
                $("#project_name_type_count_" + old_id).val('0');
            }

        </script>
</body>
</html>