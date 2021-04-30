<?php 
$role_arr = array();
foreach($role_list as $val){
    $role_arr[$val['id']] = $val['name'];
}
?>
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
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0"><?php echo $title; ?></h4>
                        <a href="<?php echo base_url('add-new-user'); ?>" class="btn btn-success" style="margin-left: 900px;"> Add user </a>
                    </div>
                    
                    <hr/>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>User Role</th>
                                    <th>EmailID</th>
                                    <th>Mobile No.</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach($user_list as $val){ ?>    
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $val['name']; ?></td>
                                    <td><?php echo $role_arr[$val['role_id']]; ?></td>
                                    <td><?php echo $val['email']; ?></td>
                                    <td><?php echo $val['mobile_no']; ?></td>
                                    <td><?php echo date('d-M-Y H:i:s',strtotime($val['created_date'])); ?></td>
                                </tr>
                            <?php } ?>    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>User Role</th>
                                    <th>EmailID</th>
                                    <th>Mobile No.</th>
                                    <th>Created Date</th>
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
<!--end page-wrapper-->