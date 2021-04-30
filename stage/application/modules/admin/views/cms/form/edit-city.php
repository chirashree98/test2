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
                                <form action="<?php echo base_url('admin/edit-new-city-succ'); ?>" method="post" onsubmit="return form_validation();">
                                    <input type="hidden" name="TRXTR" value="<?php echo $data_list[0]['id']; ?>">
                                    <div class="form-group">
                                        <label>Country Name:</label>
                                        <select class="form-control" id="country_id" name="country_id" onchange="return get_state_using_country(this);">
                                            <option value="">Select Country</option>
                                            <?php foreach($country_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($data_list[0]['country_id'] == $val['id']){ echo 'selected';} ?>><?php echo $val['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="state_view">
                                    <div class="form-group">
                                        <label>State Name:</label>
                                        <select class="form-control" id="state_id" name="state_id">
                                            <option value="">Select State</option>
                                            <?php foreach($state_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($data_list[0]['state_id'] == $val['id']){ echo 'selected';} ?>><?php echo $val['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $data_list[0]['name']; ?>">
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
                    if ($.trim($("#country_id").val()) == '') {
                        $("#country_id").css("border-color", "red");
                        toastr.error("Select Country !");
                        return false;
                    }
                    if ($.trim($("#state_id").val()) == '') {
                        $("#state_id").css("border-color", "red");
                        toastr.error("Select State !");
                        return false;
                    }
                    if ($.trim($("#name").val()) == '') {
                        $("#name").css("border-color", "red");
                        toastr.error("Enter name !");
                        return false;
                    }
                }
                function get_state_using_country(obj){
                    var country_id = $.trim(obj.value);
                    if (country_id != '') {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url('ajax-get-state-using-country'); ?>',
                            data: 'country_id=' + country_id,
                            success: function (html) {
                                $("#state_view").html(html);
                                return false;
                            }
                        });
                    } else {
                        toastr.error("Please select valid country!");
                        return false;
                    }
                }
            </script>
    </body>
</html>