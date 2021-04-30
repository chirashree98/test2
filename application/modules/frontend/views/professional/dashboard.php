<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/header_include'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
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

        /*
            .ui.selection.dropdown {
                border-radius: 0;
            }
            */
        /*
            .ui.selection.dropdown:hover {
                border-color: rgb(0 0 0);
            }
            */

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
    <?php $this->load->view('common/header_middle'); ?>
    <?php $this->load->view('common/header_navarea'); ?>
    <section id="inner-menu-list">
        <div class="container-fluid">
            <ul>
                <li><a href="<?php echo base_url(); ?>">Home <span>/</span></a></li>
                <li><a href="<?php echo base_url('my-profile'); ?>">My Profile<span>/</span></a></li>
                <li><a href="<?php echo base_url('edit-profile'); ?>">Edit Profile</a></li>
            </ul>
        </div>
    </section>

    <div class="addproductarea">
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
                        <h3 class="innerpagetableheading">Dashboard</h3>
<!--                        <div class="innerrightpalenproduct2">
                            <div class="register-professional-main-inner2">
                                <form action="<?php echo base_url('customer/edit-profile-succ'); ?>" method="POST" enctype="multipart/form-data" onsubmit="return form_validation();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="preview-zone hidden">
                                                    <div class="box box-solid">
                                                        <div class="box-body"></div>
                                                    </div>
                                                </div>
                                                <div class="dropzone-wrapper">
                                                    <div class="dropzone-desc">
                                                        <i class="fas fa-upload"></i>

                                                        <p>Choose an image file or drag it here.</p>
                                                    </div>
                                                    <input type="file" name="product_img[]" id="product_img" class="dropzone" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $user_det[0]['name']; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control"  value="<?php echo $user_det[0]['email']; ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>ISD Code</label>
                                                <select class="form-control" disabled>
                                                    <option value="">ISD Code</option>
                                                    <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $user_det[0]['std_code']){ echo'selected'; } ?>><?php echo $val['isd_code']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="<?php echo $user_det[0]['mobile_no']; ?>" readonly />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" id="country_id" name="country_id" onchange="return get_state_using_country(this);">
                                                    <option value="">Select Country</option>
                                                    <?php foreach($country_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $user_det[0]['country_id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <div id="state_view">
                                                <select class="form-control" id="state_id" name="state_id">
                                                    <option value="">Select State</option>
                                                    <?php foreach($state_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $user_det[0]['state_id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <div id="city_view">
                                                <select class="form-control" id="city_id" name="city_id" >
                                                    <option value="">Select City</option>
                                                    <?php foreach($city_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $user_det[0]['city_id']){ echo'selected'; } ?>><?php echo $val['name']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Zipcode</label>
                                                <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Enter your zipcode" value="<?php echo $user_det[0]['zipcode']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 pb-0 mb-0">
                                            <input type="submit" class="login-btn btn" value="Submit" name="frm_sub">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('common/footer'); ?>
</body>
<?php $this->load->view('common/footer_include'); ?>
<script>
    function form_validation() {
        if ($.trim($("#name").val()) == '') {
            $("#name").css("border-color", "red");
            toastr.error(" Enter your name !");
            return false;
        } else {
            $("#name").css("border-color", "");
        }
        if ($.trim($("#country_id").val()) == '') {
            $("#country_id").css("border-color", "red");
            toastr.error(" Select country !");
            return false;
        } else {
            $("#country_id").css("border-color", "");
        }
        if ($.trim($("#state_id").val()) == '') {
            $("#state_id").css("border-color", "red");
            toastr.error(" Select State !");
            return false;
        } else {
            $("#state_id").css("border-color", "");
        }
        if ($.trim($("#city_id").val()) == '') {
            $("#city_id").css("border-color", "red");
            toastr.error(" Select city !");
            return false;
        } else {
            $("#city_id").css("border-color", "");
        }
        if ($.trim($("#zipcode").val()) == '') {
            $("#zipcode").css("border-color", "red");
            toastr.error(" Enter zipcode !");
            return false;
        } else {
            $("#zipcode").css("border-color", "");
        }
    }

    function get_state_using_country(obj) {
        var country_id = $.trim(obj.value);
        if (country_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-state-using-country-front'); ?>',
                data: 'country_id=' + country_id,
                success: function (html) {
                    $("#state_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please Select Valid Country!");
            return false;
        }
    }
    function get_city_using_state(obj) {
        var state_id = $.trim(obj.value);
        if (state_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-city-using-state-front'); ?>',
                data: 'state_id=' + state_id,
                success: function (html) {
                    $("#city_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please Select Valid State!");
            return false;
        }
    }

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var htmlPreview =
                    '<img width="200" src="' + e.target.result + '" />' +
                    '<p>' + input.files[0].name + '</p>';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
    }

    $(".dropzone").change(function() {
        readFile(this);
    });

    $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });

    $('.remove-preview').on('click', function() {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script>
    $('.label.ui.dropdown')
        .dropdown();

    $('.no.label.ui.dropdown')
        .dropdown({
            useLabels: false
        });

    $('.ui.button').on('click', function() {
        $('.ui.dropdown')
            .dropdown('restore defaults')
    })

</script>

</html>