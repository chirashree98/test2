<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/pre-header'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
          <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/dropzone.css') ?>">
          <script src="<?php echo base_url('/assets/admin/js/dropzone.js') ?>"></script>


    </head>
    <body>
        <style>
        .ui.fluid.dropdown {
    display: block;
    width: 100%;
    min-width: 100%;
    padding: 10px;
              width: 100%; float: left;
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
            .ui.multiple.dropdown>.label{font-size: 14px !important;}
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
    select{
    color: #19222e !important;
    font-size: 14px !important;
}
@media only screen and (max-width: 767px) {
    .ui.selection.dropdown .menu {
/*      max-height: 8.01428571rem; /* + 1.335714285 to 9.349999995rem */
/*      max-height: 9.349999995rem; /* Adds a half */
        max-height: 16.02857142rem; /* Double size */
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
      max-height: 16.02857143rem; /* + 1.3357142858 to 17.3642857158rem */
    }
}
@media only screen and (min-width: 1920px) {
    .ui.selection.dropdown .menu {
        max-height: 21.37142857rem; /* + 1.3357142856 to 22.7071428556rem */
    }
}
.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 30px;
  font-size: 16px;
}
            .dropzone-desc i{font-size: 50px; margin-bottom: 15px;}
            .dropzone-desc p{}
.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
.addattribute{width: 100%;
    float: left;height: 45px;
    padding: 10px !important;
  }
            .form-control {
    border: 1px solid #ddd;
    height: 45px;
}
            .passarea{width: 100%;
    float: left;
    border: 1px solid #dcdcdc;
    position: relative;
    padding-top: 30px;
    margin-top: 50px;
    margin-bottom: 20px;
    border-radius: 4px;}
            .passarea h5{text-align: center;
    margin: 0;
    position: absolute;
    top: -9px;
    width: 100%;}
            .passarea h5 span{    font-size: 14px;
    background: #fff;
    padding: 0 30px;
    color: #777777;}
            .varientcross{position: absolute;
    right: -10px;
    top: -10px;
    background: #e40000;
    color: #fff !important;
    padding: 0 5px;
    border-radius: 50%;
    height: 20px;
    width: 20px;
            }
            .col-sm-4 {
    float: left;
}
            label{width: 100%; float: left;}
            .form-plus-icon{background: #1df2b5;
    width: 33px;
    height: 33px;
    padding: 10px;
    border-radius: 50%;
    float: left;
    margin-left: 0;
    line-height: 14px;
    font-size: 12px;
    font-style: italic;
    font-weight: 600;
    font-family: 'Axiforma';
    color: #19222e;
    margin-top: 6px;}
            @media(max-width:767px){
                .mobileview{width: 75%;}
                .mobileview2{width: 25%;}
                .dropzone-desc {
    width: 90%;
    top: 19px;
}
            }
            .btn{padding: 10px 25px;}
        </style>
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
                                <form action="<?php echo base_url('admin/product/add-new-product-succ'); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_validation();" >
                                    <div class="form-group">
                                        <label> Supplier Name : </label>
                                        <select class="form-control" id="supplier_id" name="supplier_id">
                                            <option value=""> select supplier </option>
                                            <?php foreach($supplier_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Product Name: </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label> Product Image(s): </label>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <div class="preview-zone hidden">
                                                <div class="box box-solid ">
                                                  <div class="box-body ">
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                  <i class="fa fa-upload"></i>
                                                  <p>Choose an image file or drag it here.</p>
                                                </div>
                                                  <input type="file" name="product_img[]" id="product_img" class="dropzone" multiple>
                                              </div>
                                              <ul class="preview_product_images"></ul>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Brand : </label>
                                        <select class="form-control" id="brand_id" name="brand_id">
                                            <option value=""> select brand </option>
                                            <?php foreach($brand_list as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="project_type_full_div">
                                        <div id="project_type_div_1">
                                            <div class="row">
                                                <div class="col-sm-11 form-group mobileview">
                                                    <label>About this iteam:</label>
                                                    <input class="form-control" name="about_iteam[]" id="about_iteam_1" placeholder="Enter something about the iteam">
                                                </div>
                                                <div class="col-sm-1 mobileview2 form-group" id="plus_type_view_1">
                                                    <label>&nbsp;</label>
                                                    <a onclick="return get_new_about(1);"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/plus.png" /></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="project_name_type_hidden">
                                        <input type="hidden" id="last_iteam_id" value="1">
                                        <input type="hidden" id="iteam_count_1" value="1">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Category:</label>
                                            <select class="form-control" id="category_id" name="category_id" onchange="return get_sub_category(this);">
                                                <option value="">Select Category</option>
                                                <?php foreach($category_list as $val){ ?>
                                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Sub Category:</label>
                                            <div id="sub_category_view">
                                                <select class="form-control" id="sub_category_id" name="sub_category_id">
                                                    <option value="">Select Category first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                      <div class="col-sm-5">
                                        <div class="form-group">
                                             <label>Attribute:</label>
                                             
                                            <select name="skills" multiple="" class="label ui selection fluid dropdown">
                                               <option value="">All</option>
                                              <?php foreach($attribute_list as $val){   ?>
                                                 <option value="<?php echo  $val['id'];?>"><?php echo  $val['name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                      </div>
                      
                                      <div class="col-sm-5">
                                          <div class="form-group">
                                            <label>Value:</label>
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
                      
                                      <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <a href="#" class="addattribute btn btn-success">Create Variations</a>
                                          </div>
                                      </div>
                                    </div>
                                <!--
                                    <div id="child_attribute_view">
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label> Select Child Attribute(s):</label><br>
                                            <strong>Please click create variations button</strong>
                                        </div>
                                    </div>
                                    </div>    
                                -->
                                    <div class="row">
                                    <div class="col-sm-12 childattri">
                        <div class="passarea">
                        <h5><span>Color : Blue</span> </h5> 
                             <a href="#" class="varientcross"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <div class="">
                        <div class="col-sm-4">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control">
                    </div>
                        </div>
                        <div class="col-sm-4">
                <div class="form-group">
                    <label>MRP Price</label>
                    <input type="text" class="form-control">
                    </div>
                        </div>
                        <div class="col-sm-4">
                <div class="form-group">
                    <label>Sale Price</label>
                    <input type="text" class="form-control">
                    </div>
                        </div>
                        </div>
                        </div>
                    </div>
                                        </div>
                        
                                    <div class="form-group">
                                        <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->
            <?php $this->load->view('includes/footer'); ?>
            <script>
                function get_child_attribute(){
                    var attribute_arr = [];
                    $('input[name="attribute_id"]:checked').each(function() {
                        attribute_arr.push(this.value);
                    });
                    if(attribute_arr.length > 0){
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url('ajax-get-child-attribute'); ?>',
                            data: 'attribute_arr=' + attribute_arr,
                            success: function(html) {
                                $("#child_attribute_view").html(html);
                                return false;
                            }
                        });
                    }else{
                        toastr.error("Please check atleast one attribute !");
                        return false;
                    }
                }
                function get_new_about(obj) {
                    var last_id = $("#last_iteam_id").val();
                    var new_id = (parseInt(last_id) + 1);
                    $("#last_iteam_id").val(new_id);
                    var design = '<div id="project_type_div_'+new_id+'"><div class="row"><div class="col-sm-11 form-group mobileview"><label>About this iteam:</label><input class="form-control" name="about_iteam[]" id="about_iteam_'+new_id+'" placeholder="Enter something about the iteam"></div><div class="col-sm-1 form-group mobileview2" id="plus_type_view_'+new_id+'"><label>&nbsp;</label><a onclick="return delete_new_about('+new_id+');"><span class="form-plus-icon"><img src="<?php echo base_url('assets/front/'); ?>images/minus.png" /></span></a></div></div></div>';
                    $("#project_type_full_div").append(design);
                    $("#project_name_type_hidden").append('<input type="hidden" id="iteam_count_' + new_id + '" value="1">');
                }
                function delete_new_about(obj){
                    var old_id = parseInt(obj);
                    $("#project_type_div_" + old_id).html('');
                    $("#project_name_type_count_" + old_id).val('0');
                }
                function get_sub_category(obj){
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
                function form_validation() {

                    if ($.trim($("#supplier_id").val()) == '') {
                        $("#supplier_id").css("border-color", "red");
                        toastr.error("Select Supplier !");
                        return false;
                    }else{
                        $("#supplier_id").css("border-color", "");
                    }

                    if ($.trim($("#name").val()) == '') {
                        $("#name").css("border-color", "red");
                        toastr.error("Enter Name !");
                        return false;
                    }else{
                        $("#name").css("border-color", "");
                    }

                    if ($.trim($("#brand_id").val()) == '') {
                        $("#brand_id").css("border-color", "red");
                        toastr.error("Select Supplier !");
                        return false;
                    }else{
                        $("#brand_id").css("border-color", "");
                    }

                    if ($.trim($("#about_iteam_1").val()) == '') {
                        $("#about_iteam_1").css("border-color", "red");
                        toastr.error("Enter About Items !");
                        return false;
                    }else{
                        $("#about_iteam_1").css("border-color", "");
                    }

                    if ($.trim($("#about_iteam_1").val()) == '') {
                        $("#about_iteam_1").css("border-color", "red");
                        toastr.error("Enter About Items !");
                        return false;
                    }else{
                        $("#about_iteam_1").css("border-color", "");
                    }
                   
                }
            </script>
             <script>
/*              
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
*/

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}


$(".dropzone").on("change", function (e) {
   var files = e.target.files,
    filesLength = files.length;
    for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function (e) {

            var file = e.target;
               $("<li class=\"box-body pip\">" +
              "<img class=\"imageThumb\" width=\"100\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</li>").appendTo(".preview_product_images");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
        });
        fileReader.readAsDataURL(f);
    }
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

$('.ui.button').on('click', function () {
  $('.ui.dropdown')
    .dropdown('restore defaults')
})
	  
	  </script>
    </body>
</html>