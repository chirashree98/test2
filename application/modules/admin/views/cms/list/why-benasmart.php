<?php $position_arr = array('LEFT','RIGHT'); ?>
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
                        
                        <!--end breadcrumb-->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
                                </div>

                                <hr/>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Icon</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><img src="<?php echo base_url($val['icon']); ?>" style="height: 40px;width: 40px;"></td>
                                                    <td><?php echo $val['titile']; ?></td>
                                                    <td><?php echo $val['sub_title']; ?></td>
                                                    <td><?php echo $position_arr[$val['position']]; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/edit-why-ch-benasmart/'.smart_encode($val['id'])); ?>" title="Edit" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Icon</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--start overlay-->
            <?php $this->load->view('includes/footer'); ?>
    </body>
</html>