<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/pre-header'); ?>
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
                    <div style="color:red;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('errmsg'); ?></div>
                    <div style="color:green;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('sucmsg'); ?></div>
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
                                <hr/>
                                <form action="<?php echo base_url('add-new-deals-succ'); ?>" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <img src="<?php echo base_url('assets/front/images/350.220.png'); ?>" style="height:130px;width:230px">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Expired Date:</label>
                                        <input type="date" class="form-control" id="expired_date" name="expired_date" min="<?php echo date('Y-m-d') ?>">
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
            <script>
                function form_validation() {
                    if ($.trim($("#image").val()) == '') {
                        $("#image").css("border-color", "red");
                        toastr.error("Select image!");
                        return false;
                    }
                    if ($.trim($("#expired_date").val()) == '') {
                        $("#expired_date").css("border-color", "red");
                        toastr.error("Select Expired date!");
                        return false;
                    }
                }
            </script>
    </body>
</html>