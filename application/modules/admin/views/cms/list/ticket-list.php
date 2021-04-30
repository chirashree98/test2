<?php
$user_array = array();
foreach($user_list as $val){
    $user_array[$val['id']] = $val['name'];
}
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
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
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
                                                <th>Ticket No.</th>
                                                <th>Customer Name</th>
                                                <th>Professional Name</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($ticket_list as $val) {
                                                ?>    
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $val['ticket_no']; ?></td>
                                                    <td><?php echo $user_array[$val['customer_id']]; ?></td>
                                                    <td><?php echo $user_array[$val['professional_id']]; ?></td>
                                                    <td><?php echo date('d-M-Y H:i',strtotime($val['created_date'])); ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="javascript:void(0);" title="Inactive" class="btn btn-danger" onclick="return deleteIt('<?php echo $val['id']; ?>');"> <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="javascript:void(0);" title="Active" class="btn btn-success" onclick="return deleteIt('<?php echo $val['id']; ?>');"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/cms/view-ticket-details/'.smart_encode($val['id'])); ?>" title="View details" class="btn btn-success"> <i class="fa fa-eye"></i> </a>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Ticket No.</th>
                                                <th>Customer Name</th>
                                                <th>Professional Name</th>
                                                <th>Created Date</th>
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
<script>
    function deleteIt(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?php echo base_url(); ?>admin/cms/change-ticket-status', 'id=' + id, function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                    'Changed!',
                                    'Your status has been changed.',
                                    'success'
                                    )
                            window.location.href = '<?php echo current_url(); ?>';
                        } else {
                            Swal.fire(
                                    'Opps!',
                                    'Please try again.',
                                    'error'
                                    )
                        }
                    });
                } else {
                    return false;
                }
            });
            return false;
        }
</script>