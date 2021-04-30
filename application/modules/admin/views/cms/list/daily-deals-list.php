<?php $status = array('Active','Inactive'); ?>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
                                    <a href="<?php echo base_url('admin/add-new-deals'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add New Deals</a>
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
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Image</th>
                                                <th>Expired On</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><img src="<?php echo base_url($val['image']); ?>" style="height: 50px;width: 50px;"></td>
                                                    <td><?php echo date('Y-m-d',strtotime($val['expired_date'])) ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="<?php echo base_url('admin/cms/change-deal-status/' . smart_encode($val['id'])); ?>" class="btn btn-danger" title="Inactive" > <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/cms/change-deal-status/' . smart_encode($val['id'])); ?>" class="btn btn-success" title="Active"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Image</th>
                                                <th>Expired On</th>
                                                <th>Status</th>
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