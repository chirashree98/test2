<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
        <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/'); ?>css/tagsinput.css">-->
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
    </head>

    <body>
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>
        <section id="supplier-pagenav">
            <div class="container">
                <?php $this->load->view('common/professional-dashboard-top-nav'); ?>      
            </div>
        </section>
        <section id="company-details">
            <div class="container">
                <div class="inner-pages-content-heading">
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
                    <h3>Work Info</h3>
                </div>
                <div class="company-details-form p-0 register-professional-main-inner2">
                    <form action="<?php echo base_url('professional/updateinfo/work-info/success'); ?>" method="post" onsubmit="return form_validation1();">
                        <div class="company-details-inner register-professional-main-inner2">
                            <div class="customrow">
                                <div style="display: contents;">
                                    <div class="">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Working Field</label>
                                                <select class="form-control" name="work_field" id="work_field" onchange="return get_sub_cat(this);">
                                                    <option value="">Select Work Field</option>
                                                    <?php foreach ($work_list as $val) { ?>
                                                        <option value="<?php echo $val['id']; ?>" <?php
                                                        if ($work_filed[0]['work_field'] == $val['id']) {
                                                            echo 'selected';
                                                        }
                                                        ?>><?php echo $val['name']; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="sub_work_field_view">
                                                <?php if (count($sub_cat_list) > 0) { ?>

                                                    <input type="hidden" id="sub_cat_validation" value="1">
                                                    <div class="form-group">
                                                        <label>Sub Working Field</label>
                                                        <select class="form-control" name="sub_work_field" id="sub_work_field">
                                                            <option value="">Select Sub Work Field</option>
                                                            <?php foreach ($sub_cat_list as $val) { ?>
                                                                <option value="<?php echo $val['id']; ?>" <?php
                                                                if ($work_filed[0]['sub_work_field'] == $val['id']) {
                                                                    echo 'selected';
                                                                }
                                                                ?>><?php echo $val['name']; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>  






                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Add Skills</label>
                                                <div class=" pl-0 pr-0 add-skill-text">
                                                    <div id="ajax_skill_view">
                                                        <select name="skills[]" id="skills" multiple class="label ui selection fluid dropdown">
                                                            <option value="">Select skill</option>
                                                            <?php foreach ($skill_list as $val) { ?>
                                                                <option value="<?php echo $val['id']; ?>" <?php
                                                                if (in_array($val['id'], $user_skill_list)) {
                                                                    echo 'selected';
                                                                }
                                                                ?>><?php echo $val['name']; ?></option>
                                                                    <?php } ?>
                                                            <option value="other">Others</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group" id="other_skills_view" style="display:none;">
                                                <label class="addother2">Add Others Skills</label>
                                                <div class="pl-0 pr-0 add-skill-text">
                                                    <select multiple data-role="tagsinput" class="form-control" name="other_skill[]"></select>
                                                </div>
                                            </div> 
                                        </div>
                                        <?php if (count($user_r_skill_list) > 0) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group" id="">
                                                    <label class="addother2">Requested Skills</label>
                                                    <div class="pl-0 pr-0 add-skill-text">
                                                        <?php foreach ($user_r_skill_list as $val) { ?>
                                                            <span class="requested_skill" id="requested_skill_<?php echo $val['id']; ?>">
                                                                <?php echo $val['name']; ?>
                                                                <input type="hidden" name="other_skill[]" value="<?php echo $val['id']; ?>" />
                                                                <a href="javascript:void(0);" class="remove_requested_skill" data-id="<?php echo $val['id']; ?>"><i class="delete icon"></i></a>
                                                            </span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>    

                                    <div class="form-group col-md-12 pb-0 mb-0">
                                        <input type="submit" class="login-btn btn" name="frm_submit" value="Update Now!">
                                    </div>
                                </div>
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
    <script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!--    <script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/tagsinput.js"></script>-->
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

        $(document).on('click', '.remove_requested_skill', function () {
            var skill_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?php echo base_url(); ?>frontend/professional_controller/delete_users_requested_skill', 'skill_id=' + skill_id, function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                    '',
                                    'Deleted.',
                                    'success'
                                    )
                            $('#requested_skill_' + skill_id).remove();
                        } else {
                            Swal.fire(
                                    'Opps!',
                                    'Please try again.',
                                    'error'
                                    )
                        }
                    });
                } else {
                    return false;
                }
            });


        });
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
    $('#my-second-tags').taxonomy_jquery({
        createButton: false,
        hiddenFieldName: 'my-second-tags[]'
    });
    function form_validation1() {
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
                toastr.error("Select sub work Field!");
                return false;
            } else {
                $("#sub_work_field").css("border-color", "");
            }
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
    function get_sub_cat(obj) {
        var cat_id = $.trim(obj.value);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('ajax-get-sub-cat-using-category2'); ?>',
            data: 'cat_id=' + cat_id,
            success: function (html) {
                $("#sub_work_field_view").html(html);
                return false;
            }
        });
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
