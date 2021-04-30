<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/pre-header'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.min.css">
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
                                <?php if ($this->session->userdata('success')) { ?>
                                    <?php echo $this->session->userdata('success'); ?>
                                <?php } ?>

                                <hr/>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>For</th>
                                                <th>Skill</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($query->result() as $row) {
                                                ?>    
                                                <tr id="sec_for_<?php echo $row->id; ?>">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->skill_for; ?></td>
                                                    <td><?php echo $row->name; ?></td>

                                                    <td> 
                                                        <a title="Delete" onClick="return approveIt('<?php echo $row->id; ?>');" href="javascript:void();" class="btn-sm btn-success rounded-corner btn-share"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Skill</th>
                                                <th>For</th>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.all.min.js"></script>
            <script>


                                                        function approveIt(id) {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: "You won't be able to revert this!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Yes, approve it!'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    $.post('<?php echo base_url(); ?>admin/skill_management/approve_skill', 'id=' + id, function (data) {
                                                                        if (data == 'ok') {
                                                                            Swal.fire(
                                                                                    '',
                                                                                    'Approved.',
                                                                                    'success'
                                                                                    )
                                                                            $('#sec_for_' + id).remove();
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

                                                        function Status(id, val) {
                                                            $.post('<?php echo base_url(); ?>admin/skill_management/change_skill_status', 'id=' + id + '&val=' + val, function (data) {
                                                                $('#statusDiv' + id).html('<i class="fa fa-spinner"></i>');
                                                                if (val == '1') {
                                                                    var val2 = "'0'";
                                                                    var text = '<button type="button" href="javascript: void(0);" class="btn-sm btn-success " data-toggle="tooltip" data-placement="top" title="Active" onclick="Status(' + id + ',' + val2 + ');"><i class="fa fa-check"></i></button></div>';
                                                                    $('#statusDiv' + id).html(text);
                                                                    $("#msgDiv").show("");
                                                                } else {
                                                                    var val2 = "'1'";
                                                                    var text = '<button type="button" href="javascript: void(0);" class=" btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactive" onclick="Status(' + id + ',' + val2 + ');"><i class="fa fa-remove"></i></button></div>';
                                                                    $('#statusDiv' + id).html(text);
                                                                }
                                                            });
                                                        }
            </script>
    </body>
</html>