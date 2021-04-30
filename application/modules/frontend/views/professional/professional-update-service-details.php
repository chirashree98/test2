<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
        <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/'); ?>css/tagsinput.css">-->

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
                    <h3>Update service details</h3>
                </div>
                <div class="company-details-form p-0 register-professional-main-inner2">
                    <form action="<?php echo base_url('professional-update-service-details-succ'); ?>" method="post" onsubmit="return form_validation1();" enctype="multipart/form-data">
                        <input type="hidden" name="TRXTR" value="<?php echo $service_details[0]['id']; ?>">
                        <input type="hidden" name="TRXTR1" value="<?php echo smart_encode($service_details[0]['id']); ?>">
                        <div class="company-details-inner register-professional-main-inner2 workdetails">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="projectinput1">
                                            <div id="project_det_1">
                                                <div class="projectinput-total new-projectinput-total">
                                                    <div class="projectname">
                                                        <div class="form-group">
                                                            <label>Service Name</label>
                                                            <input class="form-control" name="project_name" id="project_name" value="<?php echo $service_details[0]['project_name']; ?>" placeholder="Enter specific service name">
                                                        </div>
                                                    </div>
                                                    <div class="fees">
                                                        <div class="form-group">
                                                            <label>Fees per hour ($)</label>
                                                            <input class="form-control" name="fess_p_hour" id="fess_p_hour" value="<?php if ($service_details[0]['fess_p_hour'] != 0) {
                        echo $service_details[0]['fess_p_hour'];
                    } ?>" placeholder="Enter fee for per hour">
                                                        </div>
                                                    </div>
                                                    <div class="or or-new">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <span>or</span></div>
                                                    </div>
                                                    <div class="fees">
                                                        <div class="form-group">
                                                            <label>Fees per Square Feet ($)</label>
                                                            <input class="form-control" name="fees_p_s_feet" id="fees_p_s_feet" value="<?php if ($service_details[0]['fees_p_s_feet'] != 0) {
                        echo $service_details[0]['fees_p_s_feet'];
                    } ?>" placeholder="Enter fee">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="servicedetailspage">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description" placeholder="Enter description"><?php echo $service_details[0]['description']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Picture</label>
                                    <label class="uplodepicture"><input type="file" multiple name="picture[]" id="picture" placeholder="Enter description">
                                        <span>Upload Picture</span></label> 
                                </div>

                                <ul class="tabletham">
<?php
$project_img = get_project_det_img($service_details[0]['id']);
foreach ($project_img as $val) {
    ?>
                                        <li id="sec_for_<?php echo $val['id']; ?>"><img src="<?php echo base_url($val['image']); ?>" class="img-thumbnail">
                                            <a title="Delete" onClick="return deleteIt('<?php echo $val['id']; ?>');" href="javascript:void();" class="upload-img-del-btn" tabindex="0">
                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                        </li>
<?php } ?>
                                </ul>
                            </div>
                            <div class="row professional-update-service-details-btn">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn" name="frm_submit" value="Update Now!">
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url('professional/updateinfo/service-details'); ?>" class="btn">Back to service list</a>  
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
            (function ($) {
                $('input[type="file"]').bind('change', function () {
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

</html>
<script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
<script>
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
                    $.post('<?php echo base_url(); ?>ajax-delete-project-pic', 'id=' + id, function (data) {
                        //console.log(data);return false;
                        if (data == 'ok') {
                            Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            $('#sec_for_' + id).remove();
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
            if ($.trim($("#project_name").val()) == '') {
                $("#project_name").css("border-color", "red");
                toastr.error("Enter service name!");
                return false;
            } else {
                $("#project_name").css("border-color", "");
            }
            if ($.trim($("#fees_p_s_feet").val()) == '') {
                if ($.trim($("#fess_p_hour").val()) == '') {
                    $("#fees_p_s_feet").css("border-color", "red");
                    $("#fess_p_hour").css("border-color", "red");
                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                    return false;
                } else {
                    $("#fees_p_s_feet").css("border-color", "");
                    $("#fess_p_hour").css("border-color", "");
                }
            } else {
                if ($.trim($("#fess_p_hour").val()) != '') {
                    $("#fees_p_s_feet").css("border-color", "red");
                    $("#fess_p_hour").css("border-color", "red");
                    toastr.error("Enter Fees per hour or Fees per Square Feet!");
                    return false;
                } else {
                    $("#fees_p_s_feet").css("border-color", "");
                    $("#fess_p_hour").css("border-color", "");
                }
            }
            if ($.trim($("#description").val()) == '') {
                $("#description").css("border-color", "red");
                toastr.error("Enter description!");
                return false;
            } else {
                $("#description").css("border-color", "");
            }
        }
</script>