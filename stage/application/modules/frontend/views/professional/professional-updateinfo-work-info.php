<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <!-- <style>
        .sidebtn {
            background: #1df2b5;

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

        .sidebtn h2 {
            font-size: 16px;
            padding: 15px;
            color: #ffffff;
            line-height: 18px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .sidebtn h2 i {
            padding-right: 25px;
            font-size: 18px;
        }

        .sidebtn:hover {
            right: 0px;
        }

        #company-details .login-btn {
            font-size: 16px !important;
        }

        #company-details .login-btn:hover {
            color: #fff !important;
        }

        @media(min-width:768px) and (max-width:1024px) {
            .sidebtn {
                top: 15%;
            }
        }

        @media(min-width:1025px) and (max-width:1540px) {
            .sidebtn {
                top: 15%;
            }
        }

    </style>-->
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
                <li><a>Personal Details</a></li>
                <li><a>About Us</a></li>
                <li><a>Company Details</a></li>
                <li class="active"><a>Work Info </a></li>
                <li><a>Upload Pictures</a></li>
                <li><a>Bank Details</a></li>
            </ul>
            <?php }else{ ?>
            <ul>
                <li><a href="<?php echo base_url('professional/updateinfo/personal'); ?>">Personal Details</a></li>
                <li><a href="<?php echo base_url('professional/updateinfo/about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo base_url('professional/updateinfo/company-details'); ?>">Company Details</a></li>
                <li class="active"><a href="<?php echo base_url('professional/updateinfo/work-info'); ?>">Work Info </a></li>
                <li><a href="<?php echo base_url('professional/updateinfo/upload-pictures'); ?>">Upload Pictures</a></li>
                <li><a href="<?php echo base_url('professional/updateinfo/bank-details'); ?>">Bank Details</a></li>
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
                <h3>Work Info</h3>
            </div>
            <div class="company-details-form p-0 register-professional-main-inner2">
                <form action="<?php echo base_url('professional/updateinfo/work-info/success'); ?>" method="post" onsubmit="return form_validation1();">
                    <div class="company-details-inner register-professional-main-inner2">
                        <div class="row">
                            <div>
                                <div class="form-group col-md-10">
                                    <label>Working Field</label>
                                    <select class="form-control" name="work_field" id="work_field">
                                        <option value="">Select Work Field</option>
                                        <?php foreach($work_list as $val){ ?>
                                        <option value="<?php echo $val['id']; ?>" <?php if($work_filed[0]['work_field'] == $val['id']){ echo 'selected'; } ?>><?php echo $val['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group searchicon">
                                        <label>Add Skills</label>
                                        <ul id="my-tags" class="tag-cloud list-inline">
                                        </ul>
                                        <!--                                        <span><img src="images/search.png" /></span>-->
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="projectinput1">
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
                                        <?php if(count($project_det1) > 0){ 
                                            foreach($project_det1 as $val){
                                        ?>
                                        <tr>
                                            <td><?php echo $val['project_name']; ?></td>
                                            <td class="text-center"><?php if($val['fess_p_hour'] == 0){ echo'--'; }else{ echo $val['fess_p_hour']; } ?></td>
                                            <td class="text-center"><?php if($val['fees_p_s_feet'] == 0){ echo'--'; }else{ echo $val['fees_p_s_feet']; } ?></td>
                                            <td class="text-center">
                                                <ul class="heart-trash">
                                                    <li><a href="<?php echo base_url('delete/professional/project/1/'. smart_encode($val['id'])); ?>" onclick="return confirm('Are you sure to delete ?');"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
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
                        <div class="projectinput">
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
                                        <?php if(count($project_det2) > 0){ 
                                            foreach($project_det2 as $val){
                                        ?>
                                        <tr>
                                            <td><?php echo $val['fees_project_name']; ?></td>
                                            <td class="text-center"><?php echo $val['fees_project_name']; ?></td>

                                            <td class="text-center">
                                                <ul class="heart-trash">
                                                    <li><a href="<?php echo base_url('delete/professional/project/2/'. smart_encode($val['id'])); ?>" onclick="return confirm('Are you sure to delete ?');"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
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
                        <div class="form-group col-md-12 pb-0 mb-0">
                            <input type="submit" class="login-btn btn" name="frm_submit" value="Update Now!">
                        </div>
                    </div>
                </form>
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
<script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
<script>
    function form_validation1() {
        if ($.trim($("#work_field").val()) == '') {
            $("#work_field").css("border-color", "red");
            toastr.error("Select Work Field!");
            return false;
        } else {
            $("#work_field").css("border-color", "");
        }
        var project_count = $.trim($("#last_project_id").val());
        for (i = 1; i <= project_count; i++) {
            if ($.trim($("#project_name_count_" + i).val()) == 1) {
                if ($.trim($("#project_name_" + i).val()) != '') {
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
        }
        var project_type_count = $.trim($("#last_project_type_id").val());
        for (i = 1; i <= project_type_count; i++) {
            if ($.trim($("#project_name_type_count_" + i).val()) == 1) {
                if ($.trim($("#fees_project_name_" + i).val()) != '') {
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

</script>
