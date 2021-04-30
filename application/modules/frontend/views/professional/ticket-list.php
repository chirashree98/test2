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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Ticket No.</th>
                                            <th>Customer Name</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
<!--                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Status</th>-->
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach($ticket_list as $val){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $val['ticket_no']; ?></td>
                                            <td><?php echo $user_array[$val['customer_id']]; ?></td>
                                            <td><?php echo ($val['status'] == 0) ?  'Active': 'Deactive'; ?></td>
                                            <td><?php echo date('d-M-Y H:i',strtotime($val['created_date'])); ?></td>
                                            <td style="text-align: center;">
                                                <ul>
                                                    <li><a href="<?php echo base_url('ticket-details/'.smart_encode($val['id'])); ?>"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
