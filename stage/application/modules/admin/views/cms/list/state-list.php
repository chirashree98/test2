<?php
$country_arr = get_array_dynamic('country_list');
$status_arr = array('Active','Inactive');
?>
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
                        <!--end breadcrumb-->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
                                    <a href="<?php echo base_url('admin/address/add-new-state'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add New State</a>
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
                                                <th>Country Name</th>
                                                <th>State Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($state_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $country_arr[$val['country_id']]; ?></td>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                        <a href="<?php echo base_url('admin/address/change-state-status/'.smart_encode($val['id'])); ?>" title="Inactive" class="btn btn-danger" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/address/change-state-status/'.smart_encode($val['id'])); ?>" title="Active" class="btn btn-success" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/address/edit-state/'.smart_encode($val['id'])); ?>" title="Edit" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Country Name</th>
                                                <th>State Name</th>
                                                <th>Status</th>
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