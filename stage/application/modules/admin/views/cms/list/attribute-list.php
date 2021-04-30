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
                                    <a href="<?php echo base_url('admin/cms/add-new-attribute'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add New Attribute</a>
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
                                                <th>Attribute Name</th>
                                                <th>Status</th>
                                                <th>Child Attribute</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($attribute_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Inactive" class="btn btn-danger" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Active" class="btn btn-success" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/cms/child-attribute-list/'.smart_encode($val['id'])); ?>" title="Child List" class="btn btn-success"> <i class="fa fa-eye"></i> </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/cms/edit-attribute/'.smart_encode($val['id'])); ?>" title="Update" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Attribute Name</th>
                                                <th>Status</th>
                                                <th>Child Attribute</th>
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