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
                    <form action="<?php echo base_url('professional-update-service-details-succ2'); ?>" method="post" onsubmit="return form_validation1();" enctype="multipart/form-data">
                        <input type="hidden" name="TRXTR" value="<?php echo $service_details[0]['id']; ?>">
                        <input type="hidden" name="TRXTR1" value="<?php echo smart_encode($service_details[0]['id']); ?>">
                        <div class="company-details-inner register-professional-main-inner2 workdetails">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div id="project_type_full_div">
                                            <div id="project_type_div_1">
                                                <div class="projectinput">
                                                    <div class="projectinput-total projectinput-total2">
                                                        <div class="projectname2">
                                                            <div class="form-group">
                                                                <label>Service Type</label>
                                                                <input class="form-control" name="fees_project_name" id="fees_project_name_1" value="<?php echo $service_details[0]['fees_project_name']; ?>" placeholder="Enter specific service type name">
                                                            </div>
                                                        </div>
                                                        <div class="fees">
                                                            <div class="form-group">
                                                                <label>Fees per service ($)</label>
                                                                <input class="form-control" name="project_fees" id="project_fees_1" value="<?php echo $service_details[0]['project_fees']; ?>" placeholder="Enter fee">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">    
                                                                <div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" name="descriptiont" id="descriptiont_1" placeholder="Enter description"><?php echo $service_details[0]['description']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="servicedetailspage">
                                <ul class="tabletham">
                                    <?php
                                    $project_img = get_project_det_img2($service_details[0]['id']);
                                    foreach ($project_img as $val) {
                                        ?>
                                        <li id="sec_for_<?php echo $val['id']; ?>"><img src="<?php echo base_url($val['image']); ?>" class="img-thumbnail">
                                            <a title="Delete" onClick="return deleteIt('<?php echo $val['id']; ?>');" href="javascript:void();" class="upload-img-del-btn" tabindex="0">
                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="row professional-update-service-details-btn">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn" name="frm_submit" value="Update Now!">
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="<?php echo base_url('professional/updateinfo/service-details'); ?>" class="btn">Back to service list</a>  
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
                    $.post('<?php echo base_url(); ?>ajax-delete-project-pic2', 'id=' + id, function (data) {
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
            if ($.trim($("#fees_project_name_1").val()) == '') {
                $("#fees_project_name_1").css("border-color", "red");
                toastr.error("Enter service name!");
                return false;
            } else {
                $("#fees_project_name_1").css("border-color", "");
            }
            if ($.trim($("#project_fees_1").val()) == '') {
                $("#project_fees_1").css("border-color", "red");
                toastr.error("Enter fees!");
                return false;
            } else {
                $("#project_fees_1").css("border-color", "");
            }
            if ($.trim($("#descriptiont_1").val()) == '') {
                $("#descriptiont_1").css("border-color", "red");
                toastr.error("Enter description!");
                return false;
            } else {
                $("#descriptiont_1").css("border-color", "");
            }
        }
</script>