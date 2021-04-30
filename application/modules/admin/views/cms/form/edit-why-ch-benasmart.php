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
                                <form action="<?php echo base_url('admin/cms/update-why-benasmart-succ'); ?>" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                    <input type="hidden" name="TRXTR" value="<?php echo $data_list[0]['id']; ?>">
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type="text" class="form-control" id="titile" name="titile" value="<?php echo $data_list[0]['titile']; ?>" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Title:</label>
                                        <input type="text" class="form-control" id="sub_title" value="<?php echo $data_list[0]['sub_title']; ?>" name="sub_title" placeholder="Sub Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Icon:</label>
                                        <img src="<?php echo base_url($data_list[0]['icon']); ?>" style="height:50px;width:80px">
                                    </div>
                                    <div class="form-group">
                                        <label>Icon:</label>
                                        <img src="<?php echo base_url('assets/front/images/50.60.png'); ?>" style="height:150px;width:250px">
                                        <input type="file" class="form-control" id="pic_location" name="pic_location">
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
                    if ($.trim($("#titile").val()) == '') {
                        $("#titile").css("border-color", "red");
                        toastr.error("Enter Title !");
                        return false;
                    }
                    if ($.trim($("#sub_title").val()) == '') {
                        $("#sub_title").css("border-color", "red");
                        toastr.error("Enter Sub title !");
                        return false;
                    }
                }
            </script>
    </body>
</html>