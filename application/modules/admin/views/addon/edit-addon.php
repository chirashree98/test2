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
                                <hr/>
                                <form action="" method="post" onsubmit="return form_validation();">
                                    <input type="hidden" name="id" value="<?php echo $query['id'] ?>" />
                                   <div class="form-group">
                                        <label>Add on work Name:</label>
                                        <input type="text" required="" class="form-control" value="<?php echo $query['add_on_task'] ?>" id="add_on_task" name="add_on_task" placeholder="Add on work Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Fees:</label>
                                        <input type="number" required="" class="form-control"  value="<?php echo $query['add_on_fees'] ?>" id="add_on_fees" name="add_on_fees" placeholder="Fees">
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
                  
                   
                }
            </script>
    </body>


</html>