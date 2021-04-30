<!DOCTYPE html>
<html>

    <head>
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--    <style>


            .sidebtn{    background: #1df2b5;

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
            .sidebtn h2{    font-size: 16px;
                            padding: 15px;
                            color: #ffffff;
                            line-height: 18px;
                            text-transform: uppercase;
                            font-weight: 600;}
            .sidebtn h2 i{    padding-right: 25px;
                              font-size: 18px;}

            .sidebtn:hover{right:0px;}
            @media(min-width:768px) and (max-width:1024px){
                .sidebtn {
                    top: 15%;
                }
            }
            @media(min-width:1025px) and (max-width:1540px){
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
                    <li ><a>Personal Details</a></li>
                    <li class="active"><a>About Us</a></li>
                    <li><a>Company Details</a></li>
                    <li><a>Work Info </a></li>
                    <li><a>Upload Pictures</a></li>
                    <li><a>Bank Details</a></li>
                </ul>
                <?php }else{ ?>
                    <ul>
                        <li ><a href="<?php echo base_url('professional/updateinfo/personal'); ?>">Personal Details</a></li>
                        <li class="active"><a href="<?php echo base_url('professional/updateinfo/about-us'); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url('professional/updateinfo/company-details'); ?>">Company Details</a></li>
                        <li><a href="<?php echo base_url('professional/updateinfo/work-info'); ?>">Work Info </a></li>
                        <li><a href="<?php echo base_url('professional/updateinfo/upload-pictures'); ?>">Upload Pictures</a></li>
                        <li><a href="<?php echo base_url('professional/updateinfo/bank-details'); ?>">Bank Details</a></li>
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
                    <h3>About Us</h3>
                </div>
                <div class="company-details-form company-about-us">
                    <form action="<?php echo base_url('professional/updateinfo/about-us/success'); ?>" method="post" onsubmit="return form_validation1();">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-4 company-about-us-left">
                                        <label>Year of Experience</label>
                                        <input type="number" class="form-control" name="yr_of_exp" id="yr_of_exp" placeholder="5" value="<?php echo $about_details[0]['yr_of_exp']; ?>">
                                    </div>
                                    <div class="form-group col-md-7 offset-md-1 company-about-us-right">
                                        <label>Enter few word of experience</label>
                                        <input type="text" class="form-control" name="word_of_exp" id="word_of_exp" placeholder="Enter few word of experience" value="<?php echo $about_details[0]['word_of_exp']; ?>">
                                        <span>Max 9 words</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-4 company-about-us-left">
                                        <label>Project Completed</label>
                                        <input type="number" class="form-control" name="no_of_project" id="no_of_project" placeholder="100" value="<?php echo $about_details[0]['no_of_project']; ?>">
                                    </div>
                                    <div class="form-group col-md-7 offset-md-1 company-about-us-right">
                                        <label>Enter few word of project completed</label>
                                        <input type="text" class="form-control" name="word_project" id="word_project" placeholder="Enter few word of project completed" value="<?php echo $about_details[0]['word_project']; ?>">
                                        <span>Max 9 words</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-4 company-about-us-left">
                                        <label>Emergency Services</label>
                                        <input type="number" class="form-control" name="no_emergency_service" id="no_emergency_service" placeholder="100" value="<?php echo $about_details[0]['no_emergency_service']; ?>">
                                    </div>
                                    <div class="form-group col-md-7 offset-md-1 company-about-us-right">
                                        <label>Enter few word of emergency services</label>
                                        <input type="text" class="form-control" id="word_emergency" name="word_emergency" placeholder="Enter few word of emergency services" value="<?php echo $about_details[0]['word_emergency']; ?>">
                                        <span>Max 9 words</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter About us</label>
                                    <textarea class="form-control" name="about_us" id="about_us" placeholder="Enter About us"><?php echo $about_details[0]['about_us']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pb-0 mb-0 text-center">
                            <input type="submit" class="login-btn btn aboutbtn" value="Update Now!">
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
<script>
    function form_validation1() {
        if ($.trim($("#yr_of_exp").val()) == '') {
            $("#yr_of_exp").css("border-color", "red");
            toastr.error("Enter Year of exprience!");
            return false;
        } else {
            $("#yr_of_exp").css("border-color", "");
        }
        if ($.trim($("#word_of_exp").val()) == '') {
            $("#word_of_exp").css("border-color", "red");
            toastr.error("Enter few words of exprience!");
            return false;
        } else {
            $("#word_of_exp").css("border-color", "");
        }
        if ($.trim($("#no_of_project").val()) == '') {
            $("#no_of_project").css("border-color", "red");
            toastr.error("Enter number of projects!");
            return false;
        } else {
            $("#no_of_project").css("border-color", "");
        }
        if ($.trim($("#word_project").val()) == '') {
            $("#word_project").css("border-color", "red");
            toastr.error("Enter few word of project completed!");
            return false;
        } else {
            $("#word_project").css("border-color", "");
        }
        if ($.trim($("#no_emergency_service").val()) == '') {
            $("#no_emergency_service").css("border-color", "red");
            toastr.error("Enter Number of Emergency Services!");
            return false;
        } else {
            $("#no_emergency_service").css("border-color", "");
        }
        if ($.trim($("#word_emergency").val()) == '') {
            $("#word_emergency").css("border-color", "red");
            toastr.error("Enter few word of emergency services!");
            return false;
        } else {
            $("#word_emergency").css("border-color", "");
        }
        if ($.trim($("#about_us").val()) == '') {
            $("#about_us").css("border-color", "red");
            toastr.error("Enter few word of about us!");
            return false;
        } else {
            $("#about_us").css("border-color", "");
        }
    }
</script>