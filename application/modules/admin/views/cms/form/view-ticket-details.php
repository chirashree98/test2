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
                                <?php if(count($user_ticket_list) > 0){
                                    foreach($user_ticket_list as $val){
                                ?>
                                <div class="customer-ticket">
                                    <div class="tic">
                                        <h5>Ticket No : <?php echo $val['ticket_no']; ?></h5>
                                        <h6><?php echo date('d-M-Y H:i',strtotime($val['created_date'])); ?></h6>
                                        <p><?php echo $val['message']; ?></p>    
                                    </div>
                                    <?php 
                                        $reply_array = get_ticket_reply($val['id']);
                                        if(count($reply_array) > 0){
                                        foreach($reply_array as $val1){
                                    ?>
                                    <div class="<?php if($val1['reply_role_id'] == 1){
                                    echo 'tic-reply tic-reply3';
                                    
                                }elseif($val['reply_role_id'] == 2){
                                    echo 'tic-reply';
                                }else{
                                    echo 'tic-reply tic-reply2';
                                } ?>">
                                        <h6><?php echo $val1['name']; ?></h6>
                                        <span><?php echo date('d-M-Y H:i',strtotime($val1['created_date'])); ?></span>
                                        <p><?php echo $val1['message']; ?></p>
                                    </div>
                                        <?php }}else{ ?>
                                            <div class="tic-reply">
                                                <h6>No reply found !</h6>

                                            </div>
                                        <?php } ?>
                                    <div class="form-group">
                                        <form action="<?php echo base_url('admin-reply-ticket'); ?>" method="post" onsubmit="return form_validation_ticket_reply('<?php echo $val['id']; ?>');">
                                            <input type="hidden" class="form-control" name="ticket_id" value="<?php echo $val['id']; ?>">
                                            <input type="hidden" class="form-control" name="return_url" value="<?php echo current_url(); ?>">
                                            <input type="hidden" class="form-control" name="order_id" value="<?php echo $val['order_id']; ?>">
                                            <input type="text" class="form-control" name="reply" id="reply_<?php echo $val['id']; ?>">
                                            <input type="submit" class="replybtn btn btn-success submit_btn" value="Reply"/>
                                        </form>
                                    </div>
                                </div>
                                <?php  
                                    }}else{
                                ?>
                                <div class="alert alert-success" role="alert" style="text-align:center;">
                                    <strong>No ticket found!</strong>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->

            <?php $this->load->view('includes/footer'); ?>

            <script>
                function form_validation_ticket_reply(id){
                    if ($.trim($("#reply_"+id).val()) == '') {
                        $("#reply_"+id).css("border-color", "red");
                        toastr.error("Enter reply message!");
                        return false;
                    } else {
                        $("#reply_"+id).css("border-color", "");
                    }
                }
                
            </script>
            
    </body>
</html>