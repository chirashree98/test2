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
                <li><a href="#">Home <span>/</span></a></li>
                <li><a href="#">Product List<span>/</span></a></li>
                <li><a href="#">Add Product</a></li>
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
                        <h3 class="innerpagetableheading">Add Products</h3>
                        <div class="innerrightpalenproduct2">
                            <div class="register-professional-main-inner2">
                                <form action="<?php echo base_url('supplier/add-new-product-succ'); ?>" method="POST" enctype="multipart/form-data" enctype="multipart/form-data" onsubmit="return form_validation();">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select class="form-control" id="brand_id" name="brand_id">
                                                    <option value=""> select brand </option>
                                                    <?php foreach($brand_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" id="category_id" name="category_id" onchange="return get_sub_category(this);">
                                                    <option value="">Select Category</option>
                                                    <?php foreach($category_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sub Category</label>
                                                <div id="sub_category_view">
                                                    <select class="form-control" id="sub_category_id" name="sub_category_id">
                                                        <option value="">Select Category first</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="iteam_full_div">
                                            <div id="iteam_div_1">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>About this item</label>
                                                        <div class="row">
                                                            <div class="col-sm-11 mobileview">
                                                                <input class="form-control" name="about_iteam[]" id="about_iteam_1" placeholder="Enter something about the iteam">
                                                            </div>
                                                            <div class="col-sm-1 mobileview2 pl-0">
                                                                <div class="plus-icon icon2">
                                                                    <a onclick="return get_new_about(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="project_name_type_hidden">
                                            <input type="hidden" id="last_iteam_id" value="1">
                                            <input type="hidden" id="iteam_count_1" value="1">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Product Description</label>
                                                <textarea type="text" name="product_des" id="product_des"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Attribute</label>
                                                <select name="skills" multiple="" class="label ui selection fluid dropdown">
                                                    <option value="">All</option>
                                                    <option value="1">Product 1</option>
                                                    <option value="2">Product 2</option>
                                                    <option value="3">Product 3</option>
                                                    <option value="4">Product 4</option>
                                                    <option value="5">Product 5</option>
                                                    <option value="6">Product 6</option>
                                                    <option value="7">Product 7</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Value</label>
                                                <select name="skills" multiple="" class="label ui selection fluid dropdown">
                                                    <option value="">All</option>
                                                    <option value="1">Product 1</option>
                                                    <option value="2">Product 2</option>
                                                    <option value="3">Product 3</option>
                                                    <option value="4">Product 4</option>
                                                    <option value="5">Product 5</option>
                                                    <option value="6">Product 6</option>
                                                    <option value="7">Product 7</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <a href="#" class="addattribute">Create Variations</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 childattri">
                                            <div class="passarea">
                                                <h5><span>Color : Blue</span> </h5>
                                                <a href="#" class="varientcross"><i class="fas fa-times"></i></a>
                                                <div class="">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Stock</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>MRP Price</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Sale Price</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 pb-0 mb-0">
                                            <input type="submit" class="login-btn btn" value="Submit" name="frm_sub">
                                        </div>
                                    </div>
                                </form>
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
<script>
    function form_validation() {
        if ($.trim($("#product_img").val()) == '') {
            $("#product_img").css("border-color", "red");
            toastr.error("Select Image !");
            return false;
        } else {
            $("#product_img").css("border-color", "");
        }
        if ($.trim($("#name").val()) == '') {
            $("#name").css("border-color", "red");
            toastr.error(" Enter product name !");
            return false;
        } else {
            $("#name").css("border-color", "");
        }
        if ($.trim($("#brand_id").val()) == '') {
            $("#brand_id").css("border-color", "red");
            toastr.error(" Select brand name !");
            return false;
        } else {
            $("#brand_id").css("border-color", "");
        }
        if ($.trim($("#category_id").val()) == '') {
            $("#category_id").css("border-color", "red");
            toastr.error(" Select Category name !");
            return false;
        } else {
            $("#category_id").css("border-color", "");
        }
        if ($.trim($("#sub_category_id").val()) == '') {
            $("#sub_category_id").css("border-color", "red");
            toastr.error(" Select Sub Category name !");
            return false;
        } else {
            $("#sub_category_id").css("border-color", "");
        }
        if ($.trim($("#product_des").val()) == '') {
            $("#product_des").css("border-color", "red");
            toastr.error(" Select Product description !");
            return false;
        } else {
            $("#product_des").css("border-color", "");
        }
    }

    function get_new_about(obj) {
        var last_id = $("#last_iteam_id").val();
        var new_id = (parseInt(last_id) + 1);
        $("#last_iteam_id").val(new_id);
        var design = '<div id="iteam_div_' + new_id + '"><div class="col-sm-12"><div class="form-group"><label>About this item</label><div class="row"><div class="col-sm-11 mobileview"><input class="form-control" name="about_iteam[]" id="about_iteam_' + new_id + '" placeholder="Enter something about the iteam"></div><div class="col-sm-1 mobileview2 pl-0"><div class="plus-icon icon2"><a onclick="return del_new_about(' + new_id + ');"><span class="registration-minus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div></div></div></div>';
        $("#iteam_full_div").append(design);
        $("#project_name_type_hidden").append('<input type="hidden" id="iteam_count_' + new_id + '" value="1">');
    }

    function del_new_about(obj) {
        var old_id = parseInt(obj);
        $("#iteam_div_" + old_id).html('');
        $("#iteam_count_" + old_id).val('0');
    }

    function get_sub_category(obj) {
        var category_id = $.trim(obj.value);
        if (category_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax-get-sub-category'); ?>',
                data: 'category_id=' + category_id,
                success: function(html) {
                    $("#sub_category_view").html(html);
                    return false;
                }
            });
        } else {
            toastr.error("Please select valid category!");
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
