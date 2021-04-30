<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div style="color:red;text-align:center;font-weight:bold;"><?php echo $this->session->userdata('errmsg'); ?></div>
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                
<!--                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                        </ol>
                    </nav>
                </div>-->
                
            </div>
            <!--end breadcrumb-->
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0"><?php echo $title; ?></h4>
                    </div>
                    <hr/>
                    <form action="<?php echo base_url('add-user-success'); ?>" method="post" onsubmit="return form_validation();">
                        <div class="form-group">
                            <label>User role:</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value=""> Select user role </option>
                                <?php foreach($role_list as $val){ ?>
                                    <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
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
<script>
    function form_validation(){
        if ($.trim($("#role_id").val()) == '') {
            $("#role_id").css("border-color", "red");
            toastr.error("Enter User role !");
            return false;
        }
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
        if ($.trim($("#password").val()) == '') {
            $("#password").css("border-color", "red");
            toastr.error("Enter password !");
            return false;
        }
        if ($.trim($("#mobile_no").val()) == '') {
            $("#mobile_no").css("border-color", "red");
            toastr.error("Enter Password !");
            return false;
        }
    }
</script>