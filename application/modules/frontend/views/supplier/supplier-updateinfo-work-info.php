<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- <style>
        .sidebtn {
            background: #1df2b5;

            position: fixed;
            top: 38%;
            z-index: 99;
            right: -130px;
            width: 180px;
            cursor: pointer;
            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
            -o-transition: all 0.25s ease-in-out;
            transition: all 0.25s ease-in-out;
        }

        .sidebtn h2 {
            font-size: 16px;
            padding: 15px;
            color: #ffffff;
            line-height: 18px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .sidebtn h2 i {
            padding-right: 25px;
            font-size: 18px;
        }

        .sidebtn:hover {
            right: 0px;
        }

        #company-details .login-btn {
            font-size: 16px !important;
        }

        #company-details .login-btn:hover {
            color: #fff !important;
        }

        @media(min-width:768px) and (max-width:1024px) {
            .sidebtn {
                top: 15%;
            }
        }

        @media(min-width:1025px) and (max-width:1540px) {
            .sidebtn {
                top: 15%;
            }
        }

    </style>-->
</head>

<body>
    <?php // $this->load->view('common/header_top_nav'); ?>
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>
    <section id="supplier-pagenav">
        <div class="container">
            <?php $new_status = is_professional_new($this->session->userdata('client_id')); 
            if($new_status == 0){
            ?>
            <ul>
                <li><a>Personal Details</a></li>
                <li><a>About Us</a></li>
                <li><a>Company Details</a></li>
                <li class="active"><a>Work Info </a></li>
                <li><a>Upload Pictures</a></li>
                <li><a>Bank Details</a></li>
            </ul>
            <?php }else{ ?>
            <ul>
                <li><a href="<?php echo base_url('supplier/updateinfo/personal'); ?>">Personal Details</a></li>
                <li><a href="<?php echo base_url('supplier/updateinfo/about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo base_url('supplier/updateinfo/company-details'); ?>">Company Details</a></li>
                <li class="active"><a href="<?php echo base_url('supplier/updateinfo/work-info'); ?>">Work Info </a></li>
                <li><a href="<?php echo base_url('supplier/updateinfo/upload-pictures'); ?>">Upload Pictures</a></li>
                <li><a href="<?php echo base_url('supplier/updateinfo/bank-details'); ?>">Bank Details</a></li>
            </ul>
            <?php } ?>
        </div>
    </section>
    <section id="company-details">
        <div class="container">
            <div class="inner-pages-content-heading">
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
                <h3>Work Info</h3>
            </div>
            <div class="company-details-form p-0 register-professional-main-inner2">
                <form action="<?php echo base_url('supplier/updateinfo/work-info/success'); ?>" method="post" onsubmit="return form_validation1();">
                    <div class="company-details-inner register-professional-main-inner2">
                        <!--                        <div class="row">-->
                        <div>
                            <div class="form-group col-md-12">
                                <label>Working Field</label>
                                <select class="form-control" name="work_field" id="work_field">
                                    <option value="">Select Work Field</option>
                                    <?php foreach($work_list as $val){ ?>
                                    <option value="<?php echo $val['id']; ?>" <?php if($work_filed[0]['work_field'] == $val['id']){ echo 'selected'; } ?>><?php echo $val['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!--                        </div>-->
                        <div class="form-group col-md-12 pb-0 mb-0">
                            <input type="submit" class="login-btn btn" name="frm_submit" value="Update Now!">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pr-0">
                    <div class="subscribe-left">
                        <img src="<?php echo base_url('assets/front/images/email.png'); ?>" />
                        <h4>Subscribe to Bena Smart and get $10 off
                            your next in-store purchase of $100 or more.</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="subscribe-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your email address" />
                            <button class="subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('common/footer'); ?>
</body>
<?php $this->load->view('common/footer_include'); ?>
<?php if ($this->session->userdata('errmsg') && $this->session->userdata('errmsg') != '') { ?>
<script>
    toastr.error("<?php echo $this->session->userdata('errmsg'); ?>");

</script>
<?php } ?>
<?php if ($this->session->userdata('sucmsg') && $this->session->userdata('sucmsg') != '') { ?>
<script>
    toastr.success("<?php echo $this->session->userdata('sucmsg'); ?>");

</script>
<?php } ?>

</html>
<script src="<?php echo base_url('assets/front/js/taxonomy.min.js'); ?>"></script>
<script>
    function form_validation1() {
        if ($.trim($("#work_field").val()) == '') {
            $("#work_field").css("border-color", "red");
            toastr.error("Select Work Field!");
            return false;
        } else {
            $("#work_field").css("border-color", "");
        }
    }
    $('#my-tags').taxonomy_jquery();
    $('#my-second-tags').taxonomy_jquery({
        createButton: false,
        hiddenFieldName: 'my-second-tags[]'
    });

</script>
