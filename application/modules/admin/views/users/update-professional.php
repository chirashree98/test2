<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php $this->load->view('includes/pre-header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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


    <?php  
        /* user  Details data  */
        foreach($user_detail as $val){ 
            $user_id = $val['id'];
            $role_id = $val['role_id'];
            $user_name = $val['name'];
            $user_email = $val['email'];
            $user_std_code = $val['std_code'];
            $user_mobile_no = $val['mobile_no'];
        }

        /* user Bank Details data  */
        foreach($user_prof_bank_det as $val){ 
            $user_bank_det_id = $val['id'];
            $user_bank_det_location_id     = $val['bank_country_id'];
            $user_bank_det_account_holder_name = $val['account_holder_name'];
            $user_bank_det_bank_name           = $val['bank_name'];
            $user_bank_det_bank_acount_no      = $val['bank_acount_no'];
            $user_bank_det_ifsc_code           = $val['ifsc_code'];
            $user_bank_det_micr_code           = $val['micr_code'];
            $user_bank_det_bank_address        = $val['bank_address'];
            $user_bank_det_bank_address2        = $val['bank_address2'];
            $user_bank_det_std_code            = $val['std_code'];
            $user_bank_det_bank_mobile_no = $val['bank_mobile_no'];
            $user_bank_det_bank_email = $val['email'];
            $user_bank_det_bank_country_id = $val['country_id'];
            $user_bank_det_bank_state_id = $val['state_id'];
            $user_bank_det_bank_city_id = $val['city_id'];
            $user_bank_det_bank_zipcode = $val['zipcode'];
        }

        /* user Profile Details data  */
        foreach($user_prof_det as $val){ 
            $user_prof_det_id = $val['id'];
            $company_name = $val['company_name'];
            $address1 = $val['address1'];
            $address2 = $val['address2'];
            $country_id = $val['country_id'];
            $city_id = $val['city_id'];
            $state_id = $val['state_id'];
            $zipcode = $val['zipcode'];
            $work_field = $val['work_field'];
            $sub_work_field = $val['sub_work_field'];
            $company_logo = $val['company_logo'];
            $thumnail_image = $val['thumnail_image'];
            $banner_profile = $val['banner_profile'];
        }

        /* user Profile Company Details data  */
        if(count($user_prof_company_det) > 0){
            foreach($user_prof_company_det as $val){ 
                $user_prof_company_det_id = $val['id'];
                $isd_code = $val['isd_code'];
                $user_prof_company_mobile_no = $val['mobile_no'];
                $user_prof_company_email = $val['email'];
                $user_prof_company_address1 = $val['address1'];
                $user_prof_company_address2 = $val['address2'];
                $user_prof_company_country_id = $val['country_id'];
                $user_prof_company_state_id = $val['state_id'];
                $user_prof_company_city_id = $val['city_id'];
                $user_prof_company_zipcode = $val['zipcode'];
            }
        }else{
                $user_prof_company_det_id = '';
                $isd_code = '';
                $user_prof_company_mobile_no = '';
                $user_prof_company_email = '';
                $user_prof_company_address1 = '';
                $user_prof_company_address2 = '';
                $user_prof_company_country_id = '';
                $user_prof_company_state_id = '';
                $user_prof_company_city_id = '';
                $user_prof_company_zipcode = '';
        }
        
        /* user Smart Professional About Us Data */
        if(count($user_prof_company_det) > 0){
            foreach($smart_professional_about_us as $val){ 
                $smart_prof_about_us_id = $val['id'];
                $yr_of_exp = $val['yr_of_exp'];
                $word_of_exp = $val['word_of_exp'];
                $no_of_project = $val['no_of_project'];
                $word_project = $val['word_project'];
                $no_emergency_service = $val['no_emergency_service'];
                $registration_no = $val['registration_no'];
                $registration_date = $val['registration_date'];
                $registration_exp_date = $val['registration_exp_date'];
                $national_id_no = $val['national_id_no'];
                $residential_no = $val['residential_no'];
                $commercial_no = $val['commercial_no'];
                $insurance_certification = $val['insurance_certification'];
                $about_us = $val['about_us'];
            }
        }else{
                $user_prof_company_det_id = '';
                $smart_prof_about_us_id = '';
                $yr_of_exp = '';
                $word_of_exp = '';
                $no_of_project = '';
                $word_project = '';
                $no_emergency_service = '';
                $word_emergency = '';
                $about_us = '';
        }

            
    ?>

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
                                <input type="hidden" name="role_id" id="role_id" value="3">
                               
                                <!-- company-details-section -->
                                <div class="company-details-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">Company Details</span>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label> Company Name:</label>
                                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label> Company ISD Code:</label>
                                                <select class="custom-select form-control" id="company_isd_code" name="company_isd_code">
                                                    <option value="">ISD Code</option>
                                                    <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($isd_code ==$val['id']){echo "selected";} ?>><?php echo $val['isd_code']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label> Company Phone Number:</label>
                                                <input type="number" min="1" class="form-control" id="company_phone_no" name="company_phone_no" value="<?php echo $user_prof_company_mobile_no; ?>" placeholder="Enter company phone no.">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label> Company Email:</label>
                                                <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Enter company emailid" value="<?php echo $user_prof_company_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Company Address:</label>
                                                <input type="text" class="form-control" id="company_address1" name="company_address1" placeholder="Address" value="<?php echo $user_prof_company_address1; ?>">
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Company Address Line2:</label>
                                                <input type="text" class="form-control" id="company_address2" name="company_address2" placeholder="Address Line2" value="<?php echo $user_prof_company_address2; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Company Country Name:</label>
                                                <select class="form-control" name="company_country_id" id="company_country_id" onchange="return get_com_state_using_country(this);">
                                                    <option value=""> Select Country </option>
                                                    <?php foreach ($country_list as $val) { ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($user_prof_company_country_id == $val['id']){echo "selected";} ?>> <?php echo $val['name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Company State Name:</label>
                                                <div id="company_state_view">
                                                    <select class="form-control" name="company_state_id" id="company_state_id">
                                                        <?php foreach ($state_list as $val) { 
                                                        if($user_prof_company_state_id == $val['id']){
                                                        ?>
                                                        <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Company City Name:</label>
                                                <div id="company_city_view">
                                                    <select class="form-control" name="company_city_id" id="company_city_id">
                                                    <?php foreach ($city_list as $val) { 
                                                        if($user_prof_company_city_id  == $val['id']){
                                                    ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                    <?php } }?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Company Zip code:</label>
                                                <input type="text" class="form-control" id="company_zipcode" name="company_zipcode" value="<?php echo $user_prof_company_zipcode; ?>" placeholder="Enter Company Zipcode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- company-details-section -->
                                
                               
                               <!-- work-info-section -->
                                    <div class="work-info-section upd-prof-details-section">
                                        <span class="prof-details-title-sec">Work Info</span>
                                    <div class="form-group">
                                        <label>Working Field:</label>
                                        <div id="work_field_view">
                                        <select class="form-control" name="work_field" id="work_field" onchange="return get_sub_working_field(this);">
                                            <option value=""> Select working field </option>
                                            <?php foreach($working_fields as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" 
                                                    <?php if($work_field == $val['id']){echo "selected";} ?> > <?php echo $val['name']; ?> </option>
                                            <?php } ?>
                                        </select>
                                        </div>    
                                    </div>

                                    <div id="sub_work_field_view">
                                        <div class="form-group">
                                            <label>Sub Working Field:</label>
                                            <div id="work_field_view">
                                            <select class="form-control" name="sub_work_field" id="sub_work_field">
                                                <?php foreach($sub_working_fields as $val){ 
                                                    if($val['id'] == $sub_work_field){
                                                ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                <?php }} ?>
                                            </select>
                                            </div>    
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Add Skills:</label>
                                        <div class=" pl-0 pr-0 add-skill-text">
                                            <div id="ajax_skill_view">
                                            <select name="skills[]" id="skills" multiple class="label ui selection fluid dropdown">
                                                <option value="">Select skill</option>
                                                <?php foreach($skill_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php  if(in_array($val['id'], $user_skill_list)) {echo "selected";} ?> ><?php echo $val['name']; ?></option>
                                                <?php } ?>
                                                <option value="other">Others</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group" id="other_skills_view" style="display:none;">
                                        <label class="addother2">Add Others Skills</label>
                                        <div class="pl-0 pr-0 add-skill-text">
                                            <select multiple data-role="tagsinput" class="form-control" name="other_skill[]"></select>
                                        </div>
                                    </div>

                                    <?php if(count($user_request_skill)>0){ ?>
                                        <div class="form-group" id="">
                                                <label class="addother2">Requested Skills</label>
                                                <div class="pl-0 pr-0 add-skill-text">
                                                    <?php foreach ($user_request_skill as $val) { ?>
                                                        <span class="requested_skill" id="requested_skill_<?php echo $val['id']; ?>">
                                                            <?php echo $val['name']; ?>
                                                            <input type="hidden" name="other_skill[]" value="<?php echo $val['id']; ?>" />
                                                            <a href="javascript:void(0);" class="remove_requested_skill" data-id="<?php echo $val['id']; ?>">X</a>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                               <!-- work-info-section -->
                               
                               

                                <!-- Service Details -->
                                <div class="service-details-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">Service By Name </span>

                                    <div id="project_full_div">
                                       
                                        <div id="project_div">
                                            <?php foreach ($project_details as $key => $value){ ?>
                                            <div class="service-details-div row project_details_div<?php echo $value['id'] ;?>">
                                                <div class="col-sm-4 form-group">
                                                    <label>Service Name:</label>
                                                    <input class="form-control" name="project_name_<?php echo $key+1; ?>" id="project_name_<?php echo $key+1; ?>" placeholder="Enter specific service name" value="<?php echo $value['project_name'] ;?>">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Fees per hour</label>
                                                    <input class="form-control" name="fess_p_hour_<?php echo $key+1; ?>" id="fess_p_hour_<?php echo $key+1; ?>" placeholder="Enter fee for per hour" value="<?php echo $value['fess_p_hour'] == 0 ? '' : $value['fess_p_hour']; ;?>">
                                                </div>
                                                <div class="col-sm-1 form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="form-or">or</span></div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Fees per Square Feet</label>
                                                    <input class="form-control" name="fees_p_s_feet_<?php echo $key+1; ?>" id="fees_p_s_feet_<?php echo $key+1; ?>" placeholder="Enter fee" value="<?php echo $value['fees_p_s_feet'] == 0 ? '' : $value['fees_p_s_feet']; ;?>">
                                                </div>
                                                
                                                <div class="col-sm-1 form-group" id="plus_view_<?php echo $key+1; ?>">
                                                    <?php if($key == 0){ ?>
                                                    <label>&nbsp;</label>
                                                    <a onclick="return get_new_project(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                    <?php }else{ ?>
                                                        <label>&nbsp;</label>
                                                    <a onclick="return del_project_details(<?php echo $value['id'] ;?>);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a>
                                                    <?php } ?>

                                                </div>
                                                
                                            
                                                <div class="col-sm-6 form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description_<?php echo $key+1; ?>" id="description_<?php echo $key+1; ?>" placeholder="Enter description"><?php echo $value['description'];?></textarea>
                                                </div>
                                                <!-- project details multiple image view -->
                                               
                                                <div class="col-sm-6 form-group">
                                                    <label>Picture</label>
                                                    <input type="file" multiple name="details_picture_<?php echo $key+1; ?>[]" id="picture_<?php echo $key+1; ?>">
                                                    <ul class="upd_prof_multiple_image_view">

                                                    <?php foreach ($value['image'] as $_key => $val) { ?>
                                                        <li class="project_details_multiple_img project_details_image_div_<?php echo $val['id']?>">
                                                            <img src="<?php echo base_url('/'.$val['image']) ?>" style="width:150px">
                                                            <span onclick="rmv_project_details_image('<?php echo $val['image'] ?>',<?php echo $val['id']?>)"> X</span>
                                                        
                                                        </li>
                                                   
                                                    <?php  } ?>
                                                    </ul>
                                                </div>
                                                <!-- project details multiple image view -->
                                                <input type="hidden" name="project_details_id_<?php echo $key+1; ?>" 
                                                value="<?php echo $value['id'] ?>">
                                            </div>
                                            <?php } ?>
                                                 <input type="hidden" id="total_project_details" name="total_project_details" value="<?php echo count($project_details); ?>">

                                        </div>
                                    </div>
                                   
                                    <div id="project_name_hidden">
                                        <input type="hidden" id="last_project_id" value="0">
                                        <input type="hidden" id="project_name_count_1" value="1">
                                    </div>
                                </div>
                                <!-- Service Details -->


                               
                                <!-- Service Type -->
                                <div class="service-type-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">Service By Type </span>

                                    <div id="project_type_full_div">
                                        <div id="project_type_div">
                                             <?php 
                                                foreach ($project_details2 as $key=>$value) { 
                                            ?>
                                            <div class="service-type-details row project_detail_2_div<?php echo $value['id'] ;?>">
                                                <div class="col-sm-7 form-group">
                                                    <label>Service Type:</label>
                                                    <input class="form-control" name="fees_project_name_<?php echo $key+1; ?>" id="fees_project_name_<?php echo $key+1; ?>" placeholder="Enter specific service type name" value="<?php echo $value['fees_project_name'] ;?>">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Fees per service</label>
                                                    <input class="form-control" name="project_fees_<?php echo $key+1; ?>" id="project_fees_<?php echo $key+1; ?>" placeholder="Enter fee"value="<?php echo $value['project_fees'] ;?>">
                                                </div>

                                                <div class="col-sm-1 form-group" id="plus_type_view_1">
                                                    <label>&nbsp;</label>
                                                     <?php if($key == 0){ ?>
                                                    <a onclick="return get_new_type_project(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                    <?php }else{ ?>
                                                        <a onclick="return del_project_detail_2(<?php echo $value['id'] ;?>);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a>
                                                        <?php } ?>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="descriptiont_<?php echo $key+1; ?>" id="descriptiont_<?php echo $key+1; ?>" placeholder="Enter description"><?php echo $value['description'] ;?></textarea>
                                                </div>

                                                <!-- project details multiple image view -->
                                                


                                                <div class="col-sm-12 form-group">
                                                    <label>Picture</label>
                                                    <input type="file" multiple name="picturet_<?php echo $key+1; ?>[]" id="picturet_<?php echo $key+1; ?>">
                                                     <ul class="upd_prof_multiple_image_view">

                                                    <?php foreach ($value['image'] as $_key => $val) { ?>
                                                        <li class="project_details_2_multiple_img project_details_2_image_div_<?php echo $val['id']?>">
                                                            <img src="<?php echo base_url('/'.$val['image']) ?>" style="width:150px">
                                                            <span onclick="rmv_project_details_2_image('<?php echo $val['image'] ?>',<?php echo $val['id']?>)"> X</span>
                                                        </li>
                                                   
                                                <?php  } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                             <input type="hidden" name="project_details_2_id_<?php echo $key+1; ?>" 
                                                value="<?php echo $value['id'] ?>">
                                        <?php }?>
                                        <input type="hidden" name="total_project_details2" id="total_project_details2" value="<?php echo count($project_details2); ?>">
                                        </div>
                                    </div>
                                    <div id="project_name_type_hidden">
                                        <input type="hidden" id="last_project_type_id" value="0">
                                        <input type="hidden" id="project_name_type_count_1" value="1">
                                    </div>
                                </div>
                                <!-- Service Type -->


                               
                                <!-- Upload Pictures -->
                                 <div class="upload-picture-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">Picture Upload Section</span>
                                    <div class="row company-logo">
                                        <div class="col-sm-6 form-group">
                                            <label>Add Company Logo (110 * 110):</label>
                                            <input type="file" name="thumnail_image" id="thumnail_image" />
                                            <input type="hidden" name="old_thumnail_image" id="old_thumnail_image" value="<?php echo $thumnail_image; ?>" />
                                            <br>
                                            <span id="company_logo_err" style="color:red;"></span>
                                            <div class="upd_professional_company_logo">
                                             <img src="<?php echo base_url('/'.$thumnail_image) ?>" style="width:150px" >
                                             </div>
                                        </div>
                                        
                                        <div class="col-sm-6 form-group">
                                            <label>Add Banner Picture for Profile page (1600 * 431):</label>
                                            <input type="file" name="banner_profile" id="banner_profile" />
                                             <input type="hidden" name="old_banner_profile" id="old_banner_profile" value="<?php echo $banner_profile; ?>" />
                                            <div class="upd_professional_profile_banner">
                                                <img src="<?php echo base_url('/'.$banner_profile) ?>" style="width:150px">
                                            </div>
                                        </div>
                                         
                                        <div class="col-sm-12 form-group">
                                            <label>Project Picture for Profile page (330 * 234):</label>
                                            <input type="file" name="project_pic[]" id="project_pic" multiple/>
                                            <ul class="upd_prof_multiple_image_view project_picture_remove">
                                               <?php foreach ($project_image as $key => $value) {?>
                                                    <li class="project_details_2_multiple_img remove_project_image<?php echo $value['id']?>">
                                                    <img src="<?php echo base_url('/'.$value['image']) ?>" style="width:150px" >
                                                    <span onclick="rmv_project_image('<?php echo $value['image'] ?>',<?php echo $value['id']?>)"> X</span>
                                                    </li>
                                               <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- multiple Project Picture  -->
                                    </div>
                                </div>

                                <!-- Upload Pictures -->



                                <!-- User Details section -->
                                <div class="user-details-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">User Details section</span>
                                    

                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Name:</label>
                                            <input class="form-control" name="name" id="name"  value="<?php echo $user_name;?>" />
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo $user_email;?>"  />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>ISD Code</label>
                                            <select class="custom-select form-control" id="std_code_personal" name="std_code_personal">
                                                <option value="">ISD Code</option>
                                                <?php foreach($country_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($user_std_code == $val['id']){echo "selected";} ?> > <?php echo $val['isd_code']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile number" value="<?php echo $user_mobile_no; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password1" id="password1" placeholder="At least 6 characters.">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Re-Enter Password</label>
                                            <input type="password" name="password2" id="password2" class="form-control">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address:</label>
                                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Address" value="<?php echo $address1; ?>">
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address Line2:</label>
                                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line2" value="<?php echo $address2;?>">
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
                                                    <option value="<?php echo $val['id']; ?>" <?php if($country_id == $val['id']){echo "selected";}?> ><?php echo $val['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>State Name:</label>
                                                <div id="state_view">
                                                    <select class="form-control" name="state_id" id="state_id">
                                                        <?php foreach ($state_list as $val) { 
                                                          if($state_id  == $val['id']){
                                                        ?>
                                                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                        <?php } }?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>City Name:</label>
                                                <div id="city_view">
                                                    <select class="form-control" name="city_id" id="city_id">
                                                        <?php foreach ($city_list as $val) { 
                                                          if($city_id  == $val['id']){
                                                        ?>
                                                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                        <?php } }?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Zip code:</label>
                                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" value="<?php echo $zipcode;?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- User Details section -->

                                <!-- User Bank Details section -->
                                    <div class="bank-details-section upd-prof-details-section">
                                        <span class="prof-details-title-sec">Bank Details section</span>
                                        
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Bank Location</label>
                                                <select class="form-control" name="bank_location_id" id="bank_location_id">
                                                    <option value="">Select Country</option>
                                                    <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" 
                                                        <?php if($user_bank_det_location_id == $val['id']){echo "selected";} ?>><?php echo $val['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Account Holder&#x27;s Name</label>
                                                <input class="form-control" name="account_holder_name" id="account_holder_name" value="<?php echo $user_bank_det_account_holder_name;?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Bank Name</label>
                                                <input class="form-control" name="bank_name" id="bank_name" value="<?php echo $user_bank_det_bank_name;?>">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Bank Account Number</label>
                                                <input class="form-control" name="bank_acount_no" id="bank_acount_no" value="<?php echo $user_bank_det_bank_acount_no;?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>IFSC Code</label>
                                                <input class="form-control" name="ifsc_code" id="ifsc_code" value="<?php echo $user_bank_det_ifsc_code;?>">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>MICR Code</label>
                                                <input class="form-control" name="micr_code" id="micr_code" value="<?php echo $user_bank_det_micr_code;?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Bank Address</label>
                                                <input class="form-control" name="bank_address" id="bank_address" value="<?php echo $user_bank_det_bank_address;?>">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Bank Address Line 2</label>
                                                <input class="form-control" name="bank_address2" id="bank_address2" value="<?php echo $user_bank_det_bank_address2;?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bank Country Name:</label>
                                                    <select class="form-control" name="bank_country_id" id="bank_country_id" onchange="return get_bank_state_using_country(this);">
                                                        <option value=""> Select Country </option>
                                                        <?php foreach ($country_list as $val) { ?>
                                                        <option value="<?php echo $val['id']; ?>" <?php if($user_bank_det_bank_country_id == $val['id']){echo "selected";}?>> <?php echo $val['name']; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bank State Name:</label>
                                                    <div id="bank_state_view">
                                                        <select class="form-control" name="bank_state_id" id="bank_state_id">
                                                        <?php foreach ($state_list as $val) { 
                                                        if($user_bank_det_bank_state_id == $val['id']){
                                                        ?>
                                                        <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                                        <?php }} ?>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bank City Name:</label>
                                                    <div id="bank_city_view">
                                                        <select class="form-control" name="bank_city_id" id="bank_city_id">
                                                        <?php foreach ($city_list as $val) { 
                                                        if($user_bank_det_bank_city_id == $val['id']){
                                                        ?>
                                                        <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                                        <?php }} ?>

                                                            <!-- <option value=""> Select State First </option> -->
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bank Zip code:</label>
                                                    <input type="text" class="form-control" id="bank_zipcode" name="bank_zipcode" placeholder="Enter Bank Zipcode" value="<?php echo $user_bank_det_bank_zipcode; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 form-group">
                                                <label>Bank ISD Code</label>
                                                <select class="custom-select form-control" id="bank_std_code" name="bank_std_code">
                                                    <option value="">ISD Code</option>
                                                    <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($user_bank_det_std_code == $val['id']){echo "selected";} ?> > <?php echo $val['isd_code']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-5 form-group">
                                                <label>Bank Mobile Number</label>
                                                <input type="number" class="form-control" id="bank_mobile_no" name="bank_mobile_no" placeholder="Mobile number"  value="<?php echo $user_bank_det_bank_mobile_no;?>">
                                            </div>
                                            <div class="col-sm-5 form-group">
                                                <label>Bank Email ID</label>
                                                <input type="text" class="form-control" id="bank_email" name="bank_email" placeholder="Enter Bank EmailID" value="<?php echo $user_bank_det_bank_email;?>">
                                            </div>
                                        </div>
                                    </div>
                                <!-- User Bank Details section -->
                                
                                <!-- User About US section -->
                                <div class="about-us-section upd-prof-details-section">
                                    <span class="prof-details-title-sec">About us section</span>

                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Year of Experience</label>
                                            <input type="number" class="form-control" id="yr_of_exp" name="yr_of_exp" placeholder="5" value="<?php echo $yr_of_exp;?>">
                                        </div>
                                        <div class="col-sm-9 form-group">
                                            <label>Few word of experience</label>
                                            <input type="text" class="form-control" id="word_of_exp" name="word_of_exp" placeholder="Enter Few word of experience" value="<?php echo $word_of_exp;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Project Completed</label>
                                            <input type="number" class="form-control" id="no_of_project" name="no_of_project" placeholder="10" value="<?php echo $no_of_project;?>">
                                        </div>
                                        <div class="col-sm-9 form-group">
                                            <label>Few word of project completed</label>
                                            <input type="text" class="form-control" id="word_project" name="word_project" placeholder="Enter Few word of project completed" value="<?php echo $word_project;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Emergency Services</label>
                                            <input type="number" class="form-control" id="no_emergency_service" name="no_emergency_service" placeholder="5" value="<?php echo $no_emergency_service;?>">
                                        </div>
                                        <div class="col-sm-9 form-group">
                                            <label>Few word of emergency services</label>
                                            <input type="text" class="form-control" id="word_emergency" name="word_emergency" placeholder="Enter Few word of emergency services" value="<?php echo $word_emergency;?>">
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="company_reg_sec">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Registration No.</label>
                                                        <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No." value="<?php echo $registration_no; ?>">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Insurance Certification </label>
                                                        <input type="file" class="form-control" id="insurance_certification" name="insurance_certification" >
                                                         <a href="<?php echo base_url(); ?><?php echo $insurance_certification; ?>" download> Download Certificate </a>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Registration Date</label>
                                                        <input type="text" class="form-control" id="registration_date" name="registration_date" placeholder="Registration date" value="<?php echo $registration_date; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Registration Expiry Date</label>
                                                        <input type="text" class="form-control" id="registration_exp_date" name="registration_exp_date" placeholder="Registration expiry date" value="<?php echo $registration_exp_date; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>National Id No.</label>
                                                        <input type="text" class="form-control" id="national_id_no" name="national_id_no" placeholder="National id No." value="<?php echo $national_id_no; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Residential No.</label>
                                                        <input type="text" class="form-control" id="residential_no" name="residential_no" placeholder="Residential No" value="<?php echo $residential_no; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Commercial No. </label>
                                                        <input type="text" class="form-control" id="commercial_no" name="commercial_no" placeholder="Commercial No. " value="<?php echo $commercial_no; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>About Us</label>
                                            <textarea class="form-control" id="about_us" name="about_us" placeholder="Enter About us"><?php echo $about_us;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- User About US section -->



                                <div class="form-group">
                                    <input type="submit" name="frm_sub" value="submit" class="btn btn-success submit_btn">
                                </div>
                                <input type="hidden" name="pro_id" value="<?php echo smart_encode($pro_id); ?>">
                                <input type="hidden" name="redirect_position" value="1">
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
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
        <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>


        
        <script>
            $('#my-second-tags').taxonomy_jquery({
                createButton: false,
                hiddenFieldName: 'my-second-tags[]'
            });
            
            $(document).on('click', '#ajax_skill_view .menu.transition.visible .item, i.delete.icon ', function () {
                // console.log($('#skills').val());
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
            function form_validation() {
                if ($.trim($("#role_id").val()) == '') {
                    $("#role_id").css("border-color", "red");
                    toastr.error("Select Usertype!");
                    return false;
                }else{
                    $("#role_id").css("border-color", "");
                }
                if ($.trim($("#company_name").val()) == '') {
                    $("#company_name").css("border-color", "red");
                    toastr.error("Enter Company Name!");
                    return false;
                }else{
                    $("#company_name").css("border-color", "");
                }
                if ($.trim($("#company_phone_no").val()) != '') {
                    if (!$.trim($("#company_phone_no").val()).match('[0-9]{10}')) {
                        $("#company_phone_no").css("border-color", "red");
                        toastr.error("Enter valid company mobile no!");
                        return false;
                    }else{
                        $("#company_phone_no").css("border-color", "");
                    }
                    var mobile = $.trim($("#company_phone_no").val());
                    if (mobile.length != 10) {
                        $("#company_phone_no").css("border-color", "red");
                        toastr.error("Enter valid company mobile no!");
                        return false;
                    }else{
                        $("#company_phone_no").css("border-color", "");
                    }
                }else{
                    $("#company_phone_no").css("border-color", "");
                }
                if ($.trim($("#company_email").val()) != '') {
                    var email = $.trim($("#company_email").val());
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (regex.test(email) == false) {
                        $("#company_email").css("border-color", "red");
                        toastr.error("Enter valid company EmailID!");
                        return false;
                    }else{
                        $("#company_email").css("border-color", "");
                    }
                }else{
                    $("#company_email").css("border-color", "");
                }
                if ($.trim($("#company_address1").val()) == '') {
                    $("#company_address1").css("border-color", "red");
                    toastr.error("Enter Company Address!");
                    return false;
                }else{
                    $("#company_address1").css("border-color", "");
                }
                if ($.trim($("#company_address2").val()) == '') {
                    $("#company_address2").css("border-color", "red");
                    toastr.error("Enter Company Address Line 2!");
                    return false;
                }else{
                    $("#company_address2").css("border-color", "");
                }
                if ($.trim($("#company_country_id").val()) == '') {
                    $("#company_country_id").css("border-color", "red");
                    toastr.error("Select Company Country!");
                    return false;
                }else{
                    $("#company_country_id").css("border-color", "");
                }
                if ($.trim($("#company_state_id").val()) == '') {
                    $("#company_state_id").css("border-color", "red");
                    toastr.error("Select Company State Name!");
                    return false;
                }else{
                    $("#company_state_id").css("border-color", "");
                }
                if ($.trim($("#company_city_id").val()) == '') {
                    $("#company_city_id").css("border-color", "red");
                    toastr.error("Select Company City!");
                    return false;
                }else{
                    $("#company_city_id").css("border-color", "");
                }
                if ($.trim($("#company_zipcode").val()) == '') {
                    $("#company_zipcode").css("border-color", "red");
                    toastr.error("Enter Company Zipcode!");
                    return false;
                }else{
                    $("#company_zipcode").css("border-color", "");
                }
                if ($.trim($("#address1").val()) == '') {
                    $("#address1").css("border-color", "red");
                    toastr.error("Enter Address!");
                    return false;
                }else{
                    $("#address1").css("border-color", "");
                }
                if ($.trim($("#address2").val()) == '') {
                    $("#address2").css("border-color", "red");
                    toastr.error("Enter Address Line 2!");
                    return false;
                }else{
                    $("#address2").css("border-color", "");
                }
                if ($.trim($("#country_id").val()) == '') {
                    $("#country_id").css("border-color", "red");
                    toastr.error("Select Country!");
                    return false;
                }else{
                    $("#country_id").css("border-color", "");
                }
                if ($.trim($("#state_id").val()) == '') {
                    $("#state_id").css("border-color", "red");
                    toastr.error("Select State Name!");
                    return false;
                }else{
                    $("#state_id").css("border-color", "");
                }
                if ($.trim($("#city_id").val()) == '') {
                    $("#city_id").css("border-color", "red");
                    toastr.error("Select City!");
                    return false;
                }else{
                    $("#city_id").css("border-color", "");
                }
                if ($.trim($("#zipcode").val()) == '') {
                    $("#zipcode").css("border-color", "red");
                    toastr.error("Enter Zipcode!");
                    return false;
                }else{
                    $("#zipcode").css("border-color", "");
                }
                if ($.trim($("#work_field").val()) == '') {
                    $("#work_field").css("border-color", "red");
                    toastr.error("Select Working Field!");
                    return false;
                }else{
                    $("#work_field").css("border-color", "");
                }
                if ($.trim($("#sub_cat_validation").val()) == '1') {
                    if ($.trim($("#sub_work_field").val()) == '') {
                        $("#sub_work_field").css("border-color", "red");
                        toastr.error("Select Sub Working Field!");
                        return false;
                    }else{
                        $("#sub_work_field").css("border-color", "");
                    }
                }
                var usertype = $.trim($("#role_id").val());
                if(usertype == 3){

                        //project_details validaction
                            var total_project_details = $("#total_project_details").val();
                            for (i = 1; i <=total_project_details; i++) {
                                if ($.trim($("#project_name_" + i).val()) == '') {
                                    $("#project_name_" + i).css("border-color", "red");
                                    toastr.error("Enter Service  Name!");
                                    return false;
                                }else{
                                    $("#project_name_" + i).css("border-color", "");
                                }
                                if ($.trim($("#fess_p_hour_" + i).val()) == ''  && $.trim($("#fees_p_s_feet_"+i).val()) == '') {
                                    $("#fess_p_hour_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees Per Hours!");
                                    return false;
                                }else{
                                    $("#fess_p_hour_" + i).css("border-color", "");
                                }
                                if ($.trim($("#fess_p_hour_" + i).val()) != '' && $.trim($("#fees_p_s_feet_"+i).val()) != ''){
                                    $("#fess_p_hour_" + i).css("border-color", "red");
                                    $("#fees_p_s_feet_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;

                                }else{
                                    $("#fess_p_hour_" + i).css("border-color", "");
                                    $("#fees_p_s_feet_" + i).css("border-color", "");
                                }
                                if ($.trim($("#description_" + i).val()) == '') {
                                    $("#description_" + i).css("border-color", "red");
                                    toastr.error("Enter description Name!");
                                    return false;
                                }else{
                                    $("#description_" + i).css("border-color", "");
                                }
                            }

                            // new project details validaction
                            var new_project_details_count = $.trim($("#last_project_id").val());// project details 1
                            for (i = 1; i <=new_project_details_count; i++) {
                                if ($.trim($("#new_project_name_" + i).val()) == '') {
                                    $("#new_project_name_" + i).css("border-color", "red");
                                    toastr.error("Enter Service Name!");
                                    return false;
                                }else{
                                    $("#new_project_name_" + i).css("border-color", "");
                                }
                                if ($.trim($("#new_fess_p_hour_" + i).val()) == '' && $.trim($("#new_fees_p_s_feet_"+i).val()) == '') {
                                    $("#new_fess_p_hour_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per Hours!");
                                    return false;
                                }else{
                                    $("#new_fess_p_hour_" + i).css("border-color", "");
                                }
                                if ($.trim($("#new_fess_p_hour_" + i).val()) != '' && $.trim($("#new_fees_p_s_feet_"+i).val()) != ''){
                                    $("#new_fess_p_hour_" + i).css("border-color", "red");
                                    $("#new_fees_p_s_feet_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;

                                }else{
                                    $("#new_fess_p_hour_" + i).css("border-color", "");
                                    $("#new_fees_p_s_feet_" + i).css("border-color", "");
                                }
                                if ($.trim($("#new_description_" + i).val()) == '') {
                                    $("#new_description_" + i).css("border-color", "red");
                                    toastr.error("Enter description Name!");
                                    return false;
                                }else{
                                    $("#new_description_" + i).css("border-color", "");
                                }
                            }
                            // new project details validaction
                        //project_details validaction

                        //project_details 2 validaction
                            var total_project_details2 = $("#total_project_details2").val();
                            for (i = 1; i <=total_project_details2; i++) {
                                if ($.trim($("#fees_project_name_" + i).val()) == '') {
                                    $("#fees_project_name_" + i).css("border-color", "red");
                                    toastr.error("Enter Service Type Name!");
                                    return false;
                                }else{
                                    $("#fees_project_name_" + i).css("border-color", "");
                                }
                                if ($.trim($("#project_fees_" + i).val()) == '') {
                                    $("#project_fees_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per service!");
                                    return false;
                                }else{
                                    $("#project_fees_" + i).css("border-color", "");
                                }
                                if ($.trim($("#descriptiont_" + i).val()) == '') {
                                    $("#descriptiont_" + i).css("border-color", "red");
                                    toastr.error("Enter description Name!");
                                    return false;
                                }else{
                                    $("#descriptiont_" + i).css("border-color", "");
                                }
                            }
                            // new project details validaction
                            var last_project_type_id = $.trim($("#last_project_type_id").val());// project details 1
                            for (i = 1; i <=last_project_type_id; i++) {
                                if ($.trim($("#new_fees_project_name_" + i).val()) == '') {
                                    $("#new_fees_project_name_" + i).css("border-color", "red");
                                    toastr.error("Enter Service Type Name!");
                                    return false;
                                }else{
                                    $("#new_fees_project_name_" + i).css("border-color", "");
                                }
                                if ($.trim($("#new_project_fees_" + i).val()) == '') {
                                    $("#new_project_fees_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per service!");
                                    return false;
                                }else{
                                    $("#new_project_fees_" + i).css("border-color", "");
                                }
                                
                                if ($.trim($("#new_descriptiont_" + i).val()) == '') {
                                    $("#new_descriptiont_" + i).css("border-color", "red");
                                    toastr.error("Enter description Name!");
                                    return false;
                                }else{
                                    $("#new_descriptiont_" + i).css("border-color", "");
                                }
                            }

                            
                        //project_details 2 validaction
                       
                    
                    /*
                        var project_count = $.trim($("#last_project_id").val());
                        for (i = 1; i <= project_count; i++) {
                        if ($.trim($("#project_name_count_" + i).val()) == 1) {
                            if ($.trim($("#project_name_" + i).val()) == '') {
                                $("#project_name_" + i).css("border-color", "red");
                                toastr.error("Enter Service Name!");
                                return false;
                            }else{
                                $("#project_name_" + i).css("border-color", "");
                            }
                            if ($.trim($("#fees_p_s_feet_" + i).val()) == '') {
                                if ($.trim($("#fess_p_hour_" + i).val()) == '') {
                                    $("#fees_p_s_feet_" + i).css("border-color", "red");
                                    $("#fess_p_hour_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;
                                }else{
                                    $("#fees_p_s_feet_" + i).css("border-color", "");
                                    $("#fess_p_hour_" + i).css("border-color", "");
                                }
                            } 
                            
                            else {
                                if ($.trim($("#fess_p_hour_" + i).val()) != '') {
                                    $("#fees_p_s_feet_" + i).css("border-color", "red");
                                    $("#fess_p_hour_" + i).css("border-color", "red");
                                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                                    return false;
                                }else{
                                    $("#fees_p_s_feet_" + i).css("border-color", "");
                                    $("#fess_p_hour_" + i).css("border-color", "");
                                }
                            }
                            
                            if ($.trim($("#description_" + i).val()) == '') {
                                $("#description_" + i).css("border-color", "red");
                                toastr.error("Enter description Name!");
                                return false;
                            }else{
                                $("#description_" + i).css("border-color", "");
                            }
                            
                            if ($.trim($("#picture_" + i).val()) == '') {
                                $("#picture_" + i).css("border-color", "red");
                                toastr.error("Select service picture!");
                                return false;
                            }else{
                                $("#picture_" + i).css("border-color", "");
                            }
                            
                        }
                    }
                    
                    var project_type_count = $.trim($("#last_project_type_id").val());
                    for (i = 1; i <= project_type_count; i++) {
                        if ($.trim($("#project_name_type_count_" + i).val()) == 1) {
                            if ($.trim($("#fees_project_name_" + i).val()) == '') {
                                $("#fees_project_name_" + i).css("border-color", "red");
                                toastr.error("Enter Service Type Name!");
                                return false;
                            }else{
                                $("#fees_project_name_" + i).css("border-color", "");
                            }
                            if ($.trim($("#project_fees_" + i).val()) == '') {
                                $("#project_fees_" + i).css("border-color", "red");
                                toastr.error("Enter Fees per service!");
                                return false;
                            }else{
                                $("#project_fees_" + i).css("border-color", "");
                            }
                            if ($.trim($("#descriptiont_" + i).val()) == '') {
                                $("#descriptiont_" + i).css("border-color", "red");
                                toastr.error("Enter service type description!");
                                return false;
                            }else{
                                $("#descriptiont_" + i).css("border-color", "");
                            }
                            if ($.trim($("#picturet_" + i).val()) == '') {
                                $("#picturet_" + i).css("border-color", "red");
                                toastr.error("Select service type picture!");
                                return false;
                            }else{
                                $("#picturet_" + i).css("border-color", "");
                            }
                        }
                    }
                    */
                }
                /*
                if ($.trim($("#thumnail_image").val()) == '') {
                    $("#thumnail_image").css("border-color", "red");
                    $("#company_logo_err").html('Select Company Logo!');
                    toastr.error("Select Company Logo!");
                    return false;
                }else{
                    $("#thumnail_image").css("border-color", "");
                    $("#company_logo_err").html('');
                }
                */
                if ($.trim($("#name").val()) == '') {
                    $("#name").css("border-color", "red");
                    toastr.error("Enter Name!");
                    return false;
                }

                if ($.trim($("#email").val()) == '') {
                    $("#email").css("border-color", "red");
                    toastr.error("Enter Email!");
                    return false;
                }else{
                    $("#email").css("border-color", "");
                }
                var email = $.trim($("#email").val());
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (regex.test(email) == false) {
                    $("#email").css("border-color", "red");
                    toastr.error("Enter valid EmailID!");
                    return false;
                }else{
                    $("#email").css("border-color", "");
                }
                if ($.trim($("#std_code_personal").val()) == '') {
                    $("#std_code_personal").css("border-color", "red");
                    toastr.error("Select ISD Code!");
                    return false;
                }else{
                    $("#std_code_personal").css("border-color", "");
                }
                if ($.trim($("#mobile_no").val()) == '') {
                    $("#mobile_no").css("border-color", "red");
                    toastr.error("Enter Mobile No.!");
                    return false;
                }else{
                    $("#mobile_no").css("border-color", "");
                }
                if (!$.trim($("#mobile_no").val()).match('[0-9]{10}')) {
                    $("#mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;
                }else{
                    $("#mobile_no").css("border-color", "");
                }
                var mobile = $.trim($("#mobile_no").val());
                if (mobile.length != 10) {
                    $("#mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;

                }else{
                    $("#mobile_no").css("border-color", "");
                }
                /*
                if ($.trim($("#password1").val()) == '') {
                    $("#password1").css("border-color", "red");
                    toastr.error("Enter Password!");
                    return false;
                }else{
                    $("#password1").css("border-color", "");
                }
                var pass = $.trim($("#password1").val());
                if ((pass.length) < 6) {
                    $("#password1").css("border-color", "red");
                    toastr.error("Passwords must be at least 6 characters!");
                    return false;
                }else{
                    $("#password1").css("border-color", "");
                }
                if ($.trim($("#password2").val()) == '') {
                    $("#password2").css("border-color", "red");
                    toastr.error("Enter Confirm Password!");
                    return false;
                }else{
                    $("#password2").css("border-color", "");
                }
                if ($.trim($("#password1").val()) != $.trim($("#password2").val())) {
                    $("#password1").css("border-color", "red");
                    toastr.error("Password and confirm password must be same.!");
                    return false;
                }else{
                    $("#password1").css("border-color", "");
                }
                */
                //sourav add code

                if ($.trim($("#password1").val()) != '' || $.trim($("#password2").val()) != '' ) {
                    if ($.trim($("#password1").val()) != $.trim($("#password2").val())) {
                        $("#password1").css("border-color", "red");
                        $("#password2").css("border-color", "red");
                        toastr.error("Password and confirm password must be same.!");
                        return false;

                        
                    }
                    else{
                        $("#password1").css("border-color", "");
                        $("#password2").css("border-color", "");
                    }


                }
                //sourav add code
                if ($.trim($("#bank_country_id").val()) == '') {
                    $("#bank_country_id").css("border-color", "red");
                    toastr.error("Select Bank Location!");
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
                    toastr.error("Enter Bank Account No.!");
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
                if ($.trim($("#bank_std_code").val()) == '') {
                    $("#bank_std_code").css("border-color", "red");
                    toastr.error("Select ISD Code!");
                    return false;
                }else{
                    $("#bank_std_code").css("border-color", "");
                }
                if ($.trim($("#bank_mobile_no").val()) == '') {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter Mobile No.!");
                    return false;
                }else{
                    $("#bank_mobile_no").css("border-color", "");
                }
                if (!$.trim($("#bank_mobile_no").val()).match('[0-9]{10}')) {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;
                }else{
                    $("#bank_mobile_no").css("border-color", "");
                }
                var mobile = $.trim($("#bank_mobile_no").val());
                if (mobile.length != 10) {
                    $("#bank_mobile_no").css("border-color", "red");
                    toastr.error("Enter valid mobile no!");
                    return false;
                }else{
                    $("#bank_mobile_no").css("border-color", "");
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
            function get_com_state_using_country(obj) {
                var country_id = $.trim(obj.value);
                if (country_id != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-com-state-using-country-admin'); ?>',
                        data: 'country_id=' + country_id,
                        success: function(html) {
                            $("#company_state_view").html(html);
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
            function get_com_city_using_state(obj) {
                var state_id = $.trim(obj.value);
                if (state_id != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-com-city-using-state-admin'); ?>',
                        data: 'state_id=' + state_id,
                        success: function(html) {
                            $("#company_city_view").html(html);
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
                var design = '<div id="project_div_' + new_id + '"><div class="row service-details-div"><div class="col-sm-4"><label>Service Name:</label><input class="form-control" name="new_project_name[]" id="new_project_name_' + new_id + '" placeholder="Enter specific service name"></div><div class="col-sm-3"><label>Fees per hour</label><input class="form-control" name="new_fess_p_hour[]" id="new_fess_p_hour_' + new_id + '" placeholder="Enter fee for per hour"></div><div class="col-sm-1"><label>&nbsp;</label><span>or</span></div><div class="col-sm-3"><label>Fees per Square Feet</label><input class="form-control" name="new_fees_p_s_feet[]" id="new_fees_p_s_feet_' + new_id + '" placeholder="Enter fee"></div><div class="col-sm-1" id="new_plus_view_' + new_id + '"><label>&nbsp;</label><a onclick="return del_new_project(' + new_id + ');"><span><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div><div class="col-sm-12 form-group"><label>Description</label><textarea class="form-control" name="new_description[]" id="new_description_' + new_id + '" placeholder="Enter description"></textarea></div><div class="col-sm-12 form-group"><label>Picture</label><input type="file" multiple name="new_picture_' + new_id + '[]" id="new_picture_' + new_id + '"></div></div></div>';
                $("#project_full_div").append(design);
                $("#project_name_hidden").append('<input type="hidden" id="project_name_count_' + new_id + '" value="1">');
            }

            function del_new_project(obj) {
                var old_id = parseInt(obj);
                $("#project_div_" + old_id).html('');
                $("#project_name_count_" + old_id).val('0');
            }
            
            if($("#total_project_details2").val() == 0){
                get_new_type_project();
            }

            function get_new_type_project(obj) {
                var last_id = $("#last_project_type_id").val();
                var new_id = (parseInt(last_id) + 1);
                $("#last_project_type_id").val(new_id);
                var design = '<div id="project_type_div_' + new_id + '"><div class="row service-type-details"><div class="col-sm-7"><label>Fees Service Type:</label><input class="form-control" name="new_fees_project_name[]" id="new_fees_project_name_' + new_id + '" placeholder="Enter specific service type name"></div><div class="col-sm-4"><label>Fees per service</label><input class="form-control" name="new_project_fees[]" id="new_project_fees_' + new_id + '" placeholder="Enter fee"></div><div class="col-sm-1" id="new_plus_type_view_' + new_id + '"><label>&nbsp;</label><a onclick="return del_new_project_type(' + new_id + ');"><span><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div><div class="col-sm-12 form-group"><label>Description</label><textarea class="form-control" name="new_descriptiont[]" id="new_descriptiont_' + new_id + '" placeholder="Enter description"></textarea></div><div class="col-sm-12 form-group"><label>Picture</label><input type="file" multiple name="new_picturet_' + new_id + '[]" id="new_picturet_' + new_id + '"></div></div></div>';
                $("#project_type_full_div").append(design);
                $("#project_name_type_hidden").append('<input type="hidden" id="project_name_type_count_' + new_id + '" value="1">');
            }

            function del_new_project_type(obj) {
                var old_id = parseInt(obj);
                $("#project_type_div_" + old_id).html('');
                $("#project_name_type_count_" + old_id).val('0');
            }
            function get_work_field(obj){
                var usertype = $.trim(obj.value);
                if (usertype != '') {
                    if(usertype == 4){
                        $("#add_skill_view").hide();
                        $("#project_full_div").hide();
                        $("#project_type_full_div").hide();
                    }else{
                        $("#add_skill_view").show();
                        $("#project_full_div").show();
                        $("#project_type_full_div").show();
                    }
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-work-field-using-usertype-admin'); ?>',
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
            function get_sub_working_field(obj){
                var cat_id = $.trim(obj.value);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('ajax-get-sub-cat-using-category3'); ?>',
                    data: 'cat_id=' + cat_id,
                    success: function (html) {
                        $("#sub_work_field_view").html(html);
                        return false;
                    }
                });
            } 

            /* sourav add function 5_04_2021 */
            // remove package image  Project Picture for Profile page
            function rmv_project_image(img_nm,img_id){ 
                    Swal.fire({
                        title: 'Are you sure to delete project picture ?',
                        text: "You won't be able to revert this.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                  url: '<?php echo base_url('ajax-project-image-delete');?>',
                                  type:"POST",
                                  data:{img_nm:img_nm,img_id:img_id},
                                  success: function(response) {
                                    
                                    if (response == 1) {
                                        $(".remove_project_image"+img_id).css("display", "none");
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        );
                                    } 
                                    else {
                                        Swal.fire(
                                            'Opps!',
                                            'Please try again.',
                                            'error'
                                        );
                                    }
                                    
                                  }
                                });
                         
                           
                        } else {
                            return false;
                        }
                    });
                    return false;
            }


            // remove project details image
            function rmv_project_details_image(img_nm,img_id){ 
                    Swal.fire({
                        title: 'Are you sure to delete entire service image ?',
                        text: "You won't be able to revert this.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                  url: '<?php echo base_url('ajax-project-details-image-delete');?>',
                                  type:"POST",
                                  data:{img_nm:img_nm,img_id:img_id},
                                  success: function(response) {
                                    
                                    if (response == 1) {
                                        $(".project_details_image_div_"+img_id).css("display", "none");
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        );
                                    } 
                                    else {
                                        Swal.fire(
                                            'Opps!',
                                            'Please try again.',
                                            'error'
                                        );
                                    }
                                    
                                  }
                                });
                         
                           
                        } else {
                            return false;
                        }
                    });
                    return false;
            }

            // remove project details
            function del_project_details(id){ 
                    Swal.fire({
                        title: 'Are you sure to delete entire service ?',
                        text: "You won't be able to revert this.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                  url: '<?php echo base_url('ajax-project-details-delete');?>',
                                  type:"POST",
                                  data:{id:id},
                                  success: function(response) {
                                    
                                    if (response == 1) {
                                        $(".project_details_div"+id).css("display", "none");
                                        Swal.fire(
                                            'Deleted!',
                                            'Your project details has been deleted.',
                                            'success'
                                        );
                                    } 
                                    else {
                                        Swal.fire(
                                            'Opps!',
                                            'Please try again.',
                                            'error'
                                        );
                                    }
                                    
                                  }
                                });
                         
                           
                        } else {
                            return false;
                        }
                    });
                    return false;
            }

             // remove project details image 2
            function rmv_project_details_2_image(img_nm,img_id){ 
                    Swal.fire({
                        title: 'Are you sure!',
                        text: "Are you sure to delete image?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                  url: '<?php echo base_url('ajax-project-details-2-image-delete');?>',
                                  type:"POST",
                                  data:{img_nm:img_nm,img_id:img_id},
                                  success: function(response) {
                                    
                                    if (response == 1) {
                                        $(".project_details_2_image_div_"+img_id).css("display", "none");
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        );
                                    } 
                                    else {
                                        Swal.fire(
                                            'Opps!',
                                            'Please try again.',
                                            'error'
                                        );
                                    }
                                    
                                  }
                                });
                         
                           
                        } else {
                            return false;
                        }
                    });
                    return false;
            }

            // remove project details
            function del_project_detail_2(id){ 
                    Swal.fire({
                        title: 'Are you sure!',
                        text: "Are you sure to delete entire service type details?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                  url: '<?php echo base_url('ajax-project-details-2-delete');?>',
                                  type:"POST",
                                  data:{id:id},
                                  success: function(response) {
                                    
                                    if (response == 1) {
                                        $(".project_detail_2_div"+id).css("display", "none");
                                        Swal.fire(
                                            'Deleted!',
                                            'Your project details has been deleted.',
                                            'success'
                                        );
                                    } 
                                    else {
                                        Swal.fire(
                                            'Opps!',
                                            'Please try again.',
                                            'error'
                                        );
                                    }
                                    
                                  }
                                });
                         
                           
                        } else {
                            return false;
                        }
                    });
                    return false;
            }

            //email id validaction
            $("#email").on('change', function() {
                 var email  = $("input[name=email]").val();
                 if(email !=''){
                 var pro_id  = $("input[name=pro_id]").val();
                  $.ajax({
                    url: '<?php echo base_url('ajax-check-professional-email');?>',
                    type:"POST",
                    data:{email:email,pro_id:pro_id},
                    success: function(response) {
                        // console.log(response);
                      if(response == 0){

                        Swal.fire(
                            'Opps!',
                            'already exists email id',
                            'error'
                        );
                        $('.submit_btn').attr('disabled','disabled');
                      }
                      else{
                        
                        $('.submit_btn').removeAttr('disabled');
                        // console.log("already exists email id");
                      }
                    }
                  });
              }
            });

            //email id validaction
            $("#mobile_no").on('change', function() {
                 var mobile_no  = $("input[name=mobile_no]").val();
                 if(mobile_no !=''){
                 var pro_id  = $("input[name=pro_id]").val();
                  $.ajax({
                    url: '<?php echo base_url('ajax-check-professional-mobile-number');?>',
                    type:"POST",
                    data:{mobile_no:mobile_no,pro_id:pro_id},
                    success: function(response) {
                        // console.log(response);
                      if(response == 0){

                        Swal.fire(
                            'Opps!',
                            'already exists Mobile Number',
                            'error'
                        );
                        // console.log("already exists Mobile Number");
                        
                         $('.submit_btn').attr('disabled','disabled');
                      }
                      if(response == 1){
                       
                        $('.submit_btn').removeAttr('disabled');

                      }
                    }
                  });
              }
            });



            $(document).on('click', '.remove_requested_skill', function () {
                  var skill_id = $(this).attr('data-id');
                    Swal.fire({
                        title: 'Are you sure!',
                        text: "Are you sure to delete Rquested Skill?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: '<?php echo base_url('delete_users_requested_skill');?>',
                            type:"POST",
                            data:{skill_id:skill_id},
                            success: function(response){
                                console.log(response);
                                if (response == 'ok'){
                                    Swal.fire(
                                    '',
                                    'Deleted.',
                                    'success'
                                    )
                                $("#requested_skill_"+skill_id).css("display", "none");

                                }else{
                                    Swal.fire(
                                    'Opps!',
                                    'Please try again.',
                                    'error'
                                    )
                                }
                            }

                            });
                        } else {
                            return false;
                        }
                    });
                    return false;
            });

             function get_bank_state_using_country(obj) {
                var country_id = $.trim(obj.value);
                if (country_id != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-bank-state-using-country-admin'); ?>',
                        data: 'country_id=' + country_id,
                        success: function(html) {
                            $("#bank_state_view").html(html);
                            return false;
                        }
                    });
                } else {
                    toastr.error("Please select valid country!");
                    return false;
                }
            }
             function get_bank_city_using_state(obj) {
                var state_id = $.trim(obj.value);
                if (state_id != '') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('ajax-get-bank-city-using-state-admin'); ?>',
                        data: 'state_id=' + state_id,
                        success: function(html) {
                            $("#bank_city_view").html(html);
                            return false;
                        }
                    });
                } else {
                    toastr.error("Please select valid state!");
                    return false;
                }
            }

       </script>
</body>

</html>
