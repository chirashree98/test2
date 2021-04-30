<?php
$city_arr = get_array_dynamic('city_list');
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
                    <div style="color:red;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('errmsg'); ?></div>
                    <div style="color:green;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('sucmsg'); ?></div>
                    <div class="page-content">
                        <!--breadcrumb-->
                        <!--            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                                        
                                        <div class="pl-3">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb mb-0 p-0">
                                                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>-->
                        <!--end breadcrumb-->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
                                    <a href="<?php echo base_url('admin/cms/add-new-service'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add New Service</a>
                                </div>

                                <hr/>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Country</th>
                                                <th>Zipcode</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data_details as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php echo $val['type']; ?></td>
                                                    <td><?php echo $val['address']; ?></td>
                                                    <td><?php echo $city_arr[$val['city_id']]; ?></td>
                                                    <td><?php echo $country_arr[$val['country_id']]; ?></td>
                                                    <td><?php echo $val['zipcode']; ?></td>
                                                    <td><?php echo $status_arr[$val['status']]; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/cms/edit-service/'.smart_encode($val['id'])); ?>" class="btn btn-success" > Edit </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Country</th>
                                                <th>Zipcode</th>
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