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
                                <hr/>
                                <form action="<?php echo base_url('admin/cms/edit-category1/success'); ?>" method="post" onsubmit="return form_validation();">
                                    <input type="hidden" name="TRXTR" value="<?php echo $category_details[0]['id']; ?>">
                                    <input type="hidden" name="cat_type" value="<?php echo $cat_type; ?>">
                                    <div class="form-group">
                                        <label>Category Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $category_details[0]['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="frm_sub" value="Update" class="btn btn-success">
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
                    if ($.trim($("#name").val()) == '') {
                        $("#name").css("border-color", "red");
                        toastr.error("Enter Name !");
                        return false;
                    }else{
                        $("#name").css("border-color", "");
                    }
                }
            </script>
    </body>
</html>