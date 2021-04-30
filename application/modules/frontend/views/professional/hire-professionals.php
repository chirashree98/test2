<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>

        <link href="<?php echo base_url(); ?>assets/front/css/select2.min.css?v=<?php echo time(); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/semantic.min.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap-tagsinput.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/jquery.datetimepicker.min.css?v=<?php echo time(); ?>" />
        <style>
            .ui.fluid.dropdown {
                display: block;
                width: 100%; 
                min-width: 100%;
                padding: 10px;
                width: 100%; 
                float: left;
            }
            .ui.dropdown {
                max-width: 800px;
            }
            .ui.multiple.dropdown .dropdown.icon {
                top: 7px;
                font-size: 20px;
                padding-right: 10px;
                color: #949494;
            }
            .ui.multiple.dropdown>.label {
                font-size: 14px !important;
            }
            i.icon.delete:before{font-family: "Font Awesome 5 Pro" !important;
                                 font-weight: 900 !important;
                                 content: "\f00d" !important;}
            select {
                color: #19222e !important;
                font-size: 14px !important;
            }
            @media only screen and (max-width: 767px) {
                .ui.selection.dropdown .menu {
                    /*      max-height: 8.01428571rem; /* + 1.335714285 to 9.349999995rem */
                    /*      max-height: 9.349999995rem; /* Adds a half */
                    max-height: 16.02857142rem;
                    /* Double size */
                }
            }
            @media only screen and (min-width: 768px) {
                .ui.selection.dropdown .menu {
                    /*         max-height: 10.68571429rem; /* + 1.3357142863 to 12.0214285763rem */
                    max-height: 12.0214285763rem;
                }
            }
            @media only screen and (min-width: 992px) {
                .ui.selection.dropdown .menu {
                    max-height: 16.02857143rem;
                    /* + 1.3357142858 to 17.3642857158rem */
                }
            }
            @media only screen and (min-width: 1920px) {
                .ui.selection.dropdown .menu {
                    max-height: 21.37142857rem;
                    /* + 1.3357142856 to 22.7071428556rem */
                }
            }
        </style>
    </head>
    <body>
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>

        <section id="inner-menu-list">
            <div class="container-fluid">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home <span>/</span></a></li>
                    <li><a href="<?php echo base_url(); ?>all-professionals">All Professionals <span>/</span></a></li>
                    <li><a href="javascript:void(0);">Hire Professional</a></li>
                </ul>
            </div>
        </section>


        <section id="plumbing-booking">
            <div class="container">
                <?php if (!$this->session->userdata('sucmsg') || $this->session->userdata('sucmsg') !='') { ?>
                 <?php echo $this->session->userdata('sucmsg'); ?> 
                <?php } ?>
                <?php if (!$this->session->userdata('errmsg') || $this->session->userdata('errmsg') !='') { ?>
                 <?php echo $this->session->userdata('errmsg'); ?> 
                <?php } ?>
                <div class="row">
                   
                    <div class="col-lg-8">
                        <div class="plumbook-left-content">
                            <div class="main-heading2 query-form-heading">
                                <h2>Submit Your Query</h2>
                            </div>
                           
                            <div class="query-form">
                                <form id="hire_prof_form" method="post">
                                    <input type="hidden" name="professional_id" value="<?php echo $get_professional_details->p_user_id; ?>" />
                                    <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('client_id'); ?>" />
                                    <div class="form-group">
                                        <label>Need a professional for?</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Service name</label>
                                        <select class="js-select2" name="serivices[]" multiple="multiple">
                                            <?php foreach ($services->result() as $row) { ?>
                                                <option value="<?php echo $row->id ?>" data-badge=""><?php echo $row->project_name ?> ( $<?php
                                                    if (floatval($row->fess_p_hour) > 0) {
                                                        echo $row->fess_p_hour . '/ Hour';
                                                    } else if ($row->fees_p_s_feet != '') {
                                                        echo $row->fees_p_s_feet . '/ Square Feet';
                                                    }
                                                    ?> )</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Service Type</label>
                                        <select class="js-select2" name="service_types[]" multiple="multiple">
                                            <?php foreach ($service_types->result() as $row) { ?>
                                                <option value="<?php echo $row->id ?>" data-badge=""><?php echo $row->fees_project_name ?> ( $<?php echo $row->project_fees . '/ Project'; ?> )</option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Add ons</label>
                                        <div class="inline field">

                                            <select name="add_ons[]"  multiple="" class="label ui selection fluid dropdown">
                                                <option value="">Select Add ons</option>
                                                <?php foreach ($add_ons->result() as $row) { ?>
                                                    <option value="<?php echo $row->id ?>" data-badge=""><?php echo $row->add_on_task; ?> ( $<?php echo $row->add_on_fees; ?> )</option>
                                                <?php } ?>


                                            </select>
                                        </div>  

                                    </div>
                                    <div class="customrow">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Choose Date</label>
                                                <div class='input-group ' >
                                                    <div class='input-group date' >
                                                        <input required="" type='text' id='datepicker' name="date" class="form-control" placeholder="Choose Date" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon"><img src="<?php echo base_url(); ?>assets/front/images/calender.png" /></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--                                                <div class='input-group date' id='datetimepicker1'>
                                                                                                    <input required="" type='text' name="date" class="form-control" placeholder="DD/MM/YYYY" />
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon"><img src="<?php echo base_url(); ?>assets/front/images/calender.png" /></span>
                                                                                                    </span>
                                                                                                </div>-->
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Choose Time</label>

                                                <div class='input-group date'>

                                                    <div class='input-group date' >
                                                        <input required="" id='timepicker' type='text' name="time" class="form-control" placeholder="Select time slot" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon"><img src="<?php echo base_url(); ?>assets/front/images/clock.png" /></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--                                                <div class='input-group date' id='datetimepicker2'>
                                                                                                    <input required="" type='text' name="time" class="form-control" placeholder="Select time slot" />
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon"><img src="<?php echo base_url(); ?>assets/front/images/clock.png" /></span>
                                                                                                    </span>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label>Any Message</label>
                                        <textarea required="" class="form-control" name="message" placeholder="Enter Messages or any instruction" rows="3"></textarea>
                                    </div>
                                    <div class="form-btn form-group">
                                        <button type="submit" class="hire-plumber-btn query-btn">Submit Now!</button>
                                    </div>
                                </form>
                            </div>
                             <?php if (!$this->session->userdata('client_id') || $this->session->userdata('client_role_id') != '2') { ?>
                            <div class="no_customer_div"> 
                                <h3> Please login as Customer</h3>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="plumberright">
                            <div class="sec1">
                                <h3>You choosen Plumber</h3>
                                <?php // print_r($get_professional_details);   ?>
                                <div class="sec1innwe">
                                    <div class="imgarea">
                                        <img src="<?php echo base_url(); ?><?php echo $get_professional_details->thumnail_image != '' ? $get_professional_details->thumnail_image : 'assets/front/images/210.120.png'; ?>" />
                                    </div>
                                    <div class="textarea">
                                        <h5><?php echo $get_professional_details->company_name; ?></h5>
                                        <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <strong><?php echo $get_professional_details->address1; ?></strong></span>
                                        <?php if ($get_professional_details->address2 != '') { ?>
                                            <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <strong><?php echo $get_professional_details->address2; ?></strong></span>
                                        <?php } ?>
                                        <a href="javascript:void(0);" tabindex="0"><img src="<?php echo base_url(); ?>assets/front/images/black-star.png" /> 4.6 <strong>248 Ratings</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="sec2">
                                <h5>Price calculation (Approx)</h5>
                                <div class="price_calculation_approx">
                                    <!--                                <ul>
                                                                        <li>Overhead Tank Leakages <span>$50.00</span></li>
                                                                        <li>House Pipe Clearing (per/hr.*) <span>$12.00</span></li>
                                                                        <li>Bacin Fittings <span>$22.00</span></li>
                                                                        <li class="mb-0">Tap & Shower Filter Cleaning <span>$18.00</span></li>
                                                                    </ul>-->
                                    <div class="total">
                                        <p>Total minimum price <span>$0.00</span></p>
                                    </div>
                                </div>
                                <p>* Final hourly charges add after work completed</p>
                            </div>
                            <div class="sec3">

                                <div class="sec3-inner">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Atst enim ad minim veniam, quis nostrud exercitation ullamco. </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>










        <section id="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 pr-0">
                        <div class="subscribe-left">
                            <img src="<?php echo base_url(); ?>assets/front/images/email.png" />
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
    <script src="<?php echo base_url(); ?>assets/front/js/select2.min.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/semantic.min.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/bootstrap-tagsinput.min.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.datetimepicker.full.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript">
        $(document).on('change', '#hire_prof_form select[name="serivices[]"] ,#hire_prof_form select[name="service_types[]"] , #hire_prof_form select[name="add_ons[]"]', function () {
            $.post('<?php echo base_url(); ?>frontend/professional_controller/getSmallCartHirePage', $('#hire_prof_form').serialize(), function (data) {
                $(".price_calculation_approx").html(data);
            });
        });
        $(function () {
            $('#datepicker').datetimepicker({
             format:'d/m/Y',
                timepicker: false,
            });
            $('#timepicker').datetimepicker({
            format: 'H:i',
                datepicker: false,
            });
        });
    </script>

    <script>
        $('.label.ui.dropdown')
                .dropdown();

        $('.no.label.ui.dropdown')
                .dropdown({
                    useLabels: false
                });

        $('.ui.button').on('click', function () {
            $('.ui.dropdown')
                    .dropdown('restore defaults')
        })

    </script>

    <script>
        $(".js-select2").select2({
            closeOnSelect: false,
            placeholder: "Overhead Tank Leakage",
            allowHtml: true,
            allowClear: true,
            tags: true // ÑÐ¾Ð·Ð´Ð°ÐµÑ‚ Ð½Ð¾Ð²Ñ‹Ðµ Ð¾Ð¿Ñ†Ð¸Ð¸ Ð½Ð° Ð»ÐµÑ‚Ñƒ
        });

        function iformat(icon, badge, ) {
            var originalOption = icon.element;
            var originalOptionBadge = $(originalOption).data('badge');

            return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
        }

    </script>


</html>
