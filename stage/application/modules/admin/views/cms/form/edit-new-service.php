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
                                <form action="<?php echo base_url('admin/cms/edit-new-service-succ'); ?>" method="post" onsubmit="return form_validation();">
                                    <input type="hidden" id="TRXTR" name="TRXTR" value="<?php echo $service_det[0]['id']; ?>">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $service_det[0]['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Type:</label>
                                        <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="<?php echo $service_det[0]['type']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $service_det[0]['address']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>City:</label>
                                        <select class="form-control" id="city_id" name="city_id">
                                            <option value="">Select City</option>
                                            <?php foreach($city_list as $val){ ?>
                                                <option value="<?php echo $val['id'] ;?>" <?php if($service_det[0]['city_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name'] ;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select class="form-control" id="country_id" name="country_id">
                                            <option value="">Select Country</option>
                                            <?php foreach($country_list as $val){ ?>
                                                <option value="<?php echo $val['id'] ;?>" <?php if($service_det[0]['country_id'] == $val['id']){ echo'selected'; } ?>><?php echo $val['name'] ;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Zipcode:</label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="zipcode" value="<?php echo $service_det[0]['zipcode']; ?>">
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
                    if ($.trim($("#name").val()) == '') {
                        $("#name").css("border-color", "red");
                        toastr.error("Enter name !");
                        return false;
                    }
                    if ($.trim($("#type").val()) == '') {
                        $("#type").css("border-color", "red");
                        toastr.error("Enter Type !");
                        return false;
                    }
                    if ($.trim($("#address").val()) == '') {
                        $("#address").css("border-color", "red");
                        toastr.error("Enter Address !");
                        return false;
                    }
                    if ($.trim($("#city_id").val()) == '') {
                        $("#city_id").css("border-color", "red");
                        toastr.error("Select City !");
                        return false;
                    }
                    if ($.trim($("#country_id").val()) == '') {
                        $("#country_id").css("border-color", "red");
                        toastr.error("Select Country!");
                        return false;
                    }
                    if ($.trim($("#zipcode").val()) == '') {
                        $("#zipcode").css("border-color", "red");
                        toastr.error("Enter Zipcode!");
                        return false;
                    }
                }
            </script>
            
    </body>
</html>