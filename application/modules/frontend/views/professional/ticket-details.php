<?php 
    $user_array = array();
    foreach($user_list as $val){
        $user_array[$val['id']] = $val['name'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
   <!-- <style>
       

        .leftpanel {
            background: #19222e;
            padding: 25px;
            width: 100%;
            float: left;
            padding-bottom: 0;
            height: 100%;
        }

        .leftpanel ul {
            display: block;
        }

        .leftpanel ul li {
            /*width: 100%; */
            /* float: left; */
            padding-bottom: 15px;
            margin-bottom: 15px;
            font-size: 15px;
            display: block;
            display: flex;
            border-bottom: 1px solid #dddddd24;
        }

        .leftpanel ul li:last-child {
            border-bottom: none;
        }

        .leftpanel ul li a {
            color: #fff;
        }

        .innerpagetableheading {
            color: #fff;
            background: #19222e;
            padding: 12px 20px 10px 20px;
            font-size: 16px;

            margin: 0;
        }

        .innerrightpalenproduct {
            width: 100%;
            float: left;
        }

        .innerrightpalenproduct2 {
            width: 100%;
            float: left;
            padding: 15px;
            background: #f7f7f7;
        }


    </style>-->
</head>

<body>
    <?php // $this->load->view('common/header_top_nav'); ?>
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>


    <section id="inner-menu-list">
        <div class="container-fluid">
            <ul>
                <li><a href="#">Home <span>/</span></a></li>
                <li><a href="#">Product List</a></li>
            </ul>
        </div>
    </section>


    <div class="productkistpage">
        <div class="container">
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
            <div class="row">
                <?php $this->load->view('common/professional_sidebar'); ?>
                <div class="col-sm-9">
                    <div class="innerrightpalenproduct">
<!--                        <a href="<?php echo base_url('supplier/add-new-product'); ?>" class="addpro"><i class="fas fa-plus"></i> Add Product</a>-->
                        <h3 class="innerpagetableheading">Ticket List</h3>
                        <div class="innerrightpalenproduct2">
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
                                    
                                }elseif($val1['reply_role_id'] == 2){
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
            <!--                    <div class="tic-reply tic-reply2">
                                    <h6>Professional</h6>
                                    <span>April 07, 2021, 02:43PM</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                </div>
                                <div class="tic-reply tic-reply3">
                                    <h6>Supplier</h6>
                                    <span>April 07, 2021, 02:43PM</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                </div>-->
                                <?php if($val['status'] == 0){ ?>
                                <div class="form-group">
                                    <form action="<?php echo base_url('professional-reply-ticket'); ?>" method="post" onsubmit="return form_validation_ticket_reply('<?php echo $val['id']; ?>');">
                                        <input type="hidden" class="form-control" name="ticket_id" value="<?php echo $val['id']; ?>">
                                        <input type="hidden" class="form-control" name="return_url" value="<?php echo current_url(); ?>">
                                        <input type="hidden" class="form-control" name="order_id" value="<?php echo $val['order_id']; ?>">
                                        <input type="text" class="form-control" name="reply" id="reply_<?php echo $val['id']; ?>">
                                        <input type="submit" class="replybtn" value="Reply"/>
                                    </form>
                                </div>
                                <?php } ?>
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

        </div>
    </div>
    <?php $this->load->view('common/footer'); ?>
</body>
<?php $this->load->view('common/footer_include'); ?>

</html>