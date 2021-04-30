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
                                <form action="" method="post" onsubmit="return form_validation();">
                                    <input type="hidden" name="role_id" id="role_id" value="<?php echo $role_list[0]['id']; ?>">
<!--                                    <div class="form-group">
                                        <label>User role:</label>
                                        <select class="form-control" name="role_id" id="role_id">
                                            <option value=""> Select user role </option>
                                            <?php foreach ($role_list as $val) { ?>
                                                <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>-->
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>EmailID:</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="EmailID">
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile NO.:</label>
                                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile no.">
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
//                    if ($.trim($("#role_id").val()) == '') {
//                        $("#role_id").css("border-color", "red");
//                        toastr.error("Enter User role !");
//                        return false;
//                    }
                    if ($.trim($("#name").val()) == '') {
                        $("#name").css("border-color", "red");
                        toastr.error("Enter name !");
                        return false;
                    }
                    if ($.trim($("#email").val()) == '') {
                        $("#email").css("border-color", "red");
                        toastr.error("Enter emailID !");
                        return false;
                    }
                    var email = $.trim($("#email").val());
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(regex.test(email) == false){
                        $("#email").css("border-color", "red");
                        toastr.error("Enter valid EmailID!");
                        return false;
                    }
                    if ($.trim($("#password").val()) == '') {
                        $("#password").css("border-color", "red");
                        toastr.error("Enter password !");
                        return false;
                    }
                    var pass = $.trim($("#password").val());
                    if((pass.length) < 6){
                        $("#password").css("border-color", "red");
                        toastr.error("Passwords must be at least 6 characters!");
                        return false;
                    }
                    if ($.trim($("#con_password").val()) == '') {
                        $("#con_password").css("border-color", "red");
                        toastr.error("Enter Confirm password !");
                        return false;
                    }
                    if($.trim($("#password").val()) != $.trim($("#con_password").val())){
                        $("#password").css("border-color", "red");
                        toastr.error("password and confirm password must be same!");
                        return false;
                    }
                    if ($.trim($("#mobile_no").val()) == '') {
                        $("#mobile_no").css("border-color", "red");
                        toastr.error("Enter Mobile No. !");
                        return false;
                    }
                    if(!$.trim($("#mobile_no").val()).match('[0-9]{10}'))  {
                        $("#mobile_no").css("border-color", "red");
                        toastr.error("Enter valid mobile no!");
                        return false;
                    }
                    var mobile=$.trim($("#mobile_no").val());
                    if(mobile.length!=10){
                        $("#mobile_no").css("border-color", "red");
                        toastr.error("Enter valid mobile no!");
                        return false;

                    }
                }
            </script>
    </body>


</html>