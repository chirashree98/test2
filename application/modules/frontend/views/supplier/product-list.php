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
                <div class="col-sm-3">
                    <div class="leftpanel">
                        <ul>
                            <li><a href="#">All Products</a></li>
                            <li><a href="#">Order History</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="innerrightpalenproduct">
                        <a href="<?php echo base_url('supplier/add-new-product'); ?>" class="addpro"><i class="fas fa-plus"></i> Add Product</a>
                        <h3 class="innerpagetableheading">All Products</h3>
                        <div class="innerrightpalenproduct2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>product name</th>
                                            <th>Model</th>
                                            <th>Price</th>
                                            <th style="text-align: center;">Quantity</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="https://workb4live.com/benasmart/assets/front/images/pro1.jpg"></td>
                                            <td>Tabletop Ceremic Bathroom</td>
                                            <td>XYZ1234DYT56</td>
                                            <td>€95.00</td>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">€95.00</td>
                                            <td style="text-align: center;">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-check"></i></a></li>
                                                </ul>
                                            </td>
                                            <td style="text-align: center;">
                                                <ul>
                                                    <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><img src="https://workb4live.com/benasmart/assets/front/images/pro1.jpg"></td>
                                            <td>Tabletop Ceremic Bathroom</td>
                                            <td>XYZ1234DYT56</td>
                                            <td>€95.00</td>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">€95.00</td>
                                            <td style="text-align: center;">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-times"></i></a></li>
                                                </ul>
                                            </td>
                                            <td style="text-align: center;">
                                                <ul>
                                                    <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>

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
