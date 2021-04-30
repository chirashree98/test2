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
    <section id="supplier-pagenav" class="servicedetailspage">
        <div class="container">
            <?php $this->load->view('common/professional-dashboard-top-nav'); ?>      
        </div>
    </section>
    <section id="company-details" class="servicedetailspage">
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
                <h3>Service Details</h3>
            </div>
            <div class="company-details-form p-0 register-professional-main-inner2">
                <form action="<?php echo base_url('professional/updateinfo/service-details/success'); ?>" method="post" onsubmit="return form_validation1();" enctype="multipart/form-data">
                    <div class="company-details-inner register-professional-main-inner2 workdetails">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="projectinput1">
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
                                                        <label>Fees per hour ($)</label>
                                                        <input type="number" class="form-control" name="fess_p_hour[]" id="fess_p_hour_1" placeholder="Enter fee for per hour">
                                                    </div>
                                                </div>
                                                <div class="or">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <span>or</span></div>
                                                </div>
                                                <div class="fees">
                                                    <div class="form-group">
                                                        <label>Fees per Square Feet ($)</label>
                                                        <input type="number" class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_1" placeholder="Enter fee per square feet">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-sm-12">    
                                                <div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" name="description[]" id="description_1" placeholder="Enter description"></textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-6">
                                                <div>
                                                    <div class="form-group">
                                                        <label>Picture</label>
                                                       <label class="uplodepicture"><input type="file" multiple name="picture_1[]" id="picture_1" placeholder="Enter description">
                                                           <span>Upload Picture</span></label> 
                                                    </div>
                                                </div>
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
                                    <div class="plumbing-work-info-table">
                                        <div class="table-responsive">
                                            <table class="table" border="0">
                                                <thead>
                                                    <tr>
                                                        <th>Service Name</th>
                                                        <th class="text-center">Fees</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(count($project_det1) > 0){ 
                                                        foreach($project_det1 as $val){
                                                            $project_img = get_project_det_img($val['id']);
                                                    ?>
                                                    <tr id="sec_forr_<?php echo $val['id']; ?>">
                                                        <td><?php echo $val['project_name']; ?></td>
                                                        <td class="text-center"><?php if($val['fess_p_hour'] == 0){
                                                                echo '$'.$val['fees_p_s_feet'].' Per square feet';
                                                            }else{
                                                                echo '$'.$val['fess_p_hour'].' Per hour';
                                                            }
                                                        ?></td>
                                                        <td class="text-center"><?php echo $val['description']; ?></td>
                                                        <td class="text-center">
                                                            <ul class="heart-trash">
                                                                <li><a href="<?php echo base_url('professional/update/service-details/'.smart_encode($val['id'])); ?>"><i class="fas fa-eye" aria-hidden="true"></i></a></li> | 
                                                                <li><a title="Delete" onClick="return deleteIt('<?php echo $val['id']; ?>');" href="javascript:void();"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                        }else{ ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center"><strong>No Service Found!</strong></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                            <label>Fees per service ($)</label>
                                                            <input type="number" class="form-control" name="project_fees[]" id="project_fees_1" placeholder="Enter fee">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-sm-12">    
                                                    <div>
                                                        <div class="form-group"> 
                                                            <label>Description</label>
                                                            <textarea class="form-control" name="descriptiont[]" id="descriptiont_1" placeholder="Enter description"></textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <div>
                                                        <div class="form-group">
                                                            <label>Picture</label>
                                                           <label class="uplodepicture"><input type="file" multiple name="picturet_1[]" id="picturet_1" placeholder="Enter description">
                                                               <span>Upload Picture</span></label> 
                                                        </div>
                                                    </div>
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
                                    <div class="plumbing-work-info-table">
                                        <div class="table-responsive">
                                            <table class="table" border="0">
                                                <thead>
                                                    <tr>
                                                        <th>Service Type Name</th>
                                                        <th class="text-center">Fees</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(count($project_det2) > 0){ 
                                                        foreach($project_det2 as $val){
                                                    ?>
                                                    <tr id="sec_forr_<?php echo $val['id']; ?>">
                                                        <td><?php echo $val['fees_project_name']; ?></td>
                                                        <td class="text-center">
                                                        $<?php echo $val['project_fees'].' Per Project'; ?></td>
                                                        <td class="text-center"><?php echo $val['description']; ?></td>
                                                        <td class="text-center"> 
                                                            <ul class="heart-trash">
                                                                <li><a href="<?php echo base_url('professional/update/service-details2/'.smart_encode($val['id'])); ?>"><i class="fas fa-eye" aria-hidden="true"></i></a></li> | 
                                                                <li><a title="Delete" onClick="return deleteIt2('<?php echo $val['id']; ?>');" href="javascript:void();"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                        }else{ ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center"><strong>No Service Found!</strong></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
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
    <script>
    (function($) {
  $('input[type="file"]').bind('change', function() {
    $("#img_text").html($('input[type="file"]').val());
  });
})(jQuery)
    </script>
<?php } ?>
<?php if ($this->session->userdata('sucmsg') && $this->session->userdata('sucmsg') != '') { ?>
<script>
    toastr.success("<?php echo $this->session->userdata('sucmsg'); ?>");

</script>
<?php } ?>
<script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
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
     $('#my-second-tags').taxonomy_jquery({
            createButton: false,
            hiddenFieldName: 'my-second-tags[]'
        });
    function deleteIt(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('<?php echo base_url(); ?>delete/professional/project2', 'id=' + id+'&position=1', function (data) {
                    //console.log(data);return false;
                    if (data == 'ok') {
                        window.location = "<?php echo base_url('professional/updateinfo/service-details'); ?>";
                        return false;
                        //$('#sec_forr_'+id).remove;
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
        return false;
    }
    function deleteIt2(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('<?php echo base_url(); ?>delete/professional/project2', 'id=' + id+'&position=2', function (data) {
                    //console.log(data);return false;
                    if (data == 'ok') {
                        window.location = "<?php echo base_url('professional/updateinfo/service-details'); ?>";
                        return false;
                        //$('#sec_forr_'+id).remove;
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
        return false;
    }
    function form_validation1() {
        
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
                    if ($.trim($("#description_" + i).val()) == '') {
                        $("#description_" + i).css("border-color", "red");
                        toastr.error("Enter description!");
                        return false;
                    } else {
                        $("#description_" + i).css("border-color", "");
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
        var design = '<div id="project_det_'+new_id+'"><div class="projectinput-total"><div class="projectname"><div class="form-group"><label>Service Name</label><input class="form-control" name="project_name[]" id="project_name_'+new_id+'" placeholder="Enter specific service name"></div></div><div class="fees"><div class="form-group"><label>Fees per hour</label><input class="form-control" name="fess_p_hour[]" id="fess_p_hour_'+new_id+'" placeholder="Enter fee for per hour"></div></div><div class="or"><div class="form-group"><label>&nbsp;</label><span>or</span></div></div><div class="fees"><div class="form-group"><label>Fees per Square Feet</label><input class="form-control" name="fees_p_s_feet[]" id="fees_p_s_feet_'+new_id+'" placeholder="Enter fee"></div></div><div class="row"><div class="col-sm-12"><div><div class="form-group"><label>Description</label><textarea class="form-control" name="description[]" id="description_'+new_id+'" placeholder="Enter description"></textarea></div></div></div><div class="col-sm-6"><div><div class="form-group"><label>Picture</label><label class="uplodepicture"><input type="file" multiple class="form-control" name="picture_'+new_id+'[]" id="picture_'+new_id+'"><span>Upload Picture</span></label></div></div></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_new_project('+new_id+');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
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
        var design = '<div id="project_type_div_' + new_id + '"><div class="projectinput"><div class="projectinput-total"><div class="projectname2"><div class="form-group"><label>Service Type</label><input class="form-control" name="fees_project_name[]" id="fees_project_name_' + new_id + '" placeholder="Enter specific service type name"></div></div><div class="fees"><div class="form-group"><label>Fees per project</label><input class="form-control" name="project_fees[]" id="project_fees_' + new_id + '" placeholder="Enter fee"></div></div><div class="row"><div class="col-sm-12"><div><div class="form-group"><label>Description</label><textarea class="form-control" name="descriptiont[]" id="descriptiont_' + new_id + '" placeholder="Enter description"></textarea></div></div></div><div class="col-sm-6"><div><div class="form-group"><label>Picture</label><label class="uplodepicture"><input type="file" multiple name="picturet_1[]" id="picturet_' + new_id + '" placeholder="Enter description"><span>Upload Picture</span></label></div></div></div></div></div><div class="plus-icon"><div class="form-group"><label>&nbsp;</label><a onclick="return remove_project_fees(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div></div>';
        $("#project_type_full_div").append(design);
        $("#project_name_type_hidden").append('<input type="hidden" id="project_name_type_count_' + new_id + '" value="1">');
    }

    function remove_project_fees(obj) {
        var old_id = parseInt(obj);
        $("#project_type_div_" + old_id).html('');
        $("#project_name_type_count_" + old_id).val('0');
    }

</script>
</html>
