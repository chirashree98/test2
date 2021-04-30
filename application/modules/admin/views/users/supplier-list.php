<?php $mail_status = array('NO','YES'); ?>
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
                                    <a href="<?php echo base_url('admin/user_management/add_new_supplier'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add Supplier </a>
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
                                                <th>Name</th>
                                                <th>EmailID</th>
                                                <th>Mobile No.</th>
                                                <th>Email verification Status</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($user_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php echo $val['email']; ?></td>
                                                    <td><?php echo $val['mobile_no']; ?></td>
                                                    <td><?php echo $mail_status[$val['mail_verification']]; ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="<?php echo base_url('admin/user/change-customer-status/' . smart_encode($val['id']).'/3'); ?>" class="btn btn-danger" title="Inactive" > <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/user/change-customer-status/' . smart_encode($val['id']).'/3'); ?>" class="btn btn-success" title="Active"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo date('d-M-Y H:i:s', strtotime($val['created_date'])); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/user/update-professional/'.smart_encode($val['id']).'/2'); ?>" title="Edit" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                        <a href="<?php echo base_url('admin/user/delete-user/'.smart_encode($val['id']).'/3'); ?>" title="Delete" class="btn btn-danger" onclick="return confirm('Want to delete ?');"> <i class="fa fa-trash"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Name</th>
                                                <th>EmailID</th>
                                                <th>Mobile No.</th>
                                                <th>Email verification Status</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
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