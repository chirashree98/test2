<!DOCTYPE html>
<html>

    <head>
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
        <style>
            .imageThumb{
                width: 100px;
            }
        </style>
    </head>

    <body> 
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>
        <section id="supplier-pagenav">
            <div class="container">
                <?php $this->load->view('common/professional-dashboard-top-nav'); ?>      
            </div>
        </section>
        <section id="company-details" class="uplodepicpage">
            <div class="container">
                <div class="inner-pages-content-heading plumbing-uplode-pic-main-heading">
                    <h3>Upload Pictures</h3>
                </div>
                <div class="row"> 
                    <form action="<?php echo base_url('professional/updateinfo/upload-pictures/success'); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_validation1();">
                        <div class="company-details-form">
                            <div class="col-md-6">
                                <div class="addvendor-area">
                                    <div class="upload-pic-inner">
                                        <div class="file-upload">
                                            <label>Add Company Logo (110 * 110) </label>
                                            <div class="image-upload-wrap image-upload-wrap3">
                                                <input class="file-upload-input" type='file' name="thumnail_image" id="thumnail_image" onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <img src="<?php echo base_url('assets/front/'); ?>images/folders.png" />
                                                    <h3>Drag and Drop jpg or png image here or <a class="file-upload-btn" type="button" onclick="$('.file-upload-input3').trigger('click')">Click Here</a> to upload</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content file-upload-content3">
                                                <img class="file-upload-image file-upload-image3" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title image-title3">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload">
                                            <label>Add Banner Picture for Profile page (1600 * 431) </label>
                                            <div class="image-upload-wrap image-upload-wrap1">
                                                <input class="file-upload-input" type='file' name="banner_profile" id="banner_profile" onchange="readURL1(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <img src="<?php echo base_url('assets/front/'); ?>images/folders.png" />
                                                    <h3>Drag and Drop jpg or png image here or <a class="file-upload-btn" type="button" onclick="$('.file-upload-input1').trigger('click')">Click Here</a> to upload</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content file-upload-content1">
                                                <img class="file-upload-image file-upload-image1" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title image-title1">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload">
                                            <label>Project Pictures for Profile page (330 * 234) </label>
                                            <div class="image-upload-wrap image-upload-wrap2">
                                                <!--<input class="file-upload-input" type='file' name="project_pic[]" id="project_pic" onchange="readURL2(this);" accept="image/*" multiple />-->
                                                <input class="file-upload-input" type='file' name="project_pic[]" id="project_pic" accept="image/*" multiple />
                                                <div class="drag-text">
                                                    <img src="<?php echo base_url('assets/front/'); ?>images/folders.png" />
                                                    <h3>Drag and Drop jpg or png image here or <a class="file-upload-btn" type="button" onclick="$('.file-upload-input2').trigger('click')">Click Here</a> to upload</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content file-upload-content2">
                                                <img class="file-upload-image file-upload-image2" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload2()" class="remove-image">Remove <span class="image-title image-title2">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="upload-pic-inner upload-pic-right-inner">
                                    <div class="upload-pic-right-inner-1">
                                        <div class="upload-pic-img">
                                            <img src="<?php
                                            if ($pro_images[0]['thumnail_image']) {
                                                echo base_url($pro_images[0]['thumnail_image']);
                                            } else {
                                                echo base_url('assets/front/images/upload-inner-img.jpg');
                                            }
                                            ?>" alt="">
                                        </div>
                                        <div class="upload-pic-content upload-right-inner1-content">
                                            <h5><img src="<?php echo base_url('assets/front/'); ?>images/upload-img-sign.png" alt=""><span>Company Logo will be shown as 110 * 110</span></h5>
                                        </div>
                                    </div>
                                    <div class="upload-pic-right-inner-2">
                                        <div class="upload-pic-img">
                                            <img class="upload-img" src="<?php
                                            if ($pro_images[0]['banner_profile']) {
                                                echo base_url($pro_images[0]['banner_profile']);
                                            } else {
                                                echo base_url('assets/front/images/upload-img2.jpg');
                                            }
                                            ?>" alt="">
                                        </div>
                                        <div class="upload-pic-content">
                                            <h5><img src="<?php echo base_url('assets/front/'); ?>images/upload-img-sign.png" alt=""><span>Banner Picture will be shown as 1600 * 431</span></h5>
                                        </div>
                                    </div>

                                    <div class="upload-pic-right-inner-3">
                                        <div id="project_images_sec">
                                            <div class="responsive">
                                                <?php
                                                if (count($project_images) > 0) {
                                                    foreach ($project_images as $val) {
                                                        ?>
                                                        <div class="item sec_forr_<?php echo $val['id']; ?>" >
                                                            <img src="<?php echo base_url() . $val['image']; ?>" alt="">
                                                            <a title="Delete" onClick="return deleteIt('<?php echo $val['id']; ?>');" href="javascript:void();" class="upload-img-del-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                
                                                        <?php
                                                    }
                                                    if (count($project_images) < 4) {
                                                        for($i=count($project_images);$i<4;$i++){
                                                        ?>
<!--
                                                        <div class="item img-hide ">
                                                            <img src="<?php echo base_url('assets/front/images/upload-inner-img.jpg'); ?>" alt="">
                                                        </div>
-->
                                                        <?php
                                                        }
                                                    }
                                                }else{
                                                ?>
<!--                                                <div class="item ">
                                                    <img src="<?php echo base_url('assets/front/images/upload-inner-img.jpg'); ?>" alt="">
                                                </div>
                                                <div class="item ">
                                                    <img src="<?php echo base_url('assets/front/images/upload-inner-img.jpg'); ?>" alt="">
                                                </div>
                                                <div class="item ">
                                                    <img src="<?php echo base_url('assets/front/images/upload-inner-img.jpg'); ?>" alt="">
                                                </div>
                                                <div class="item ">
                                                    <img src="<?php echo base_url('assets/front/images/upload-inner-img.jpg'); ?>" alt="">
                                                </div>-->
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 pb-0 mb-0">
                                <button class="login-btn btn">Update Now!</button>
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
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
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
    <script>
        function deleteIt(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?php echo base_url(); ?>ajax-professional-project-pic-delete', 'id=' + id, function (data) {
                        if (data == 'ok') {
                            location.reload();
                            /*
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                             $('.sec_forr_'+id).remove();
                             */
                        } else {
                            Swal.fire(
                                'Opps!',
                                'Please try again.',
                                'error'
                                )
                        }
                    });
                } else {
                    return false;
                }
            });
            return false;
        }
        function form_validation1() {
            var is_new = $.trim($("#is_new").val());
            if (is_new == 1) {
                if ($.trim($("#thumnail_image").val()) == '') {
                    $("#thumnail_image").css("border-color", "red");
                    toastr.error("Select Thumnail Image!");
                    return false;
                } else {
                    $("#thumnail_image").css("border-color", "");
                }
                if ($.trim($("#banner_profile").val()) == '') {
                    $("#banner_profile").css("border-color", "red");
                    toastr.error("Select Banner Image!");
                    return false;
                } else {
                    $("#banner_profile").css("border-color", "");
                }
                if ($.trim($("#project_pic").val()) == '') {
                    $("#project_pic").css("border-color", "red");
                    toastr.error("Select Project Image!");
                    return false;
                } else {
                    $("#project_pic").css("border-color", "");
                }
            }
        }

    </script>
    <script>
//        $("#whitecart").mouseover(function () {
//            this.src = "images/cart-green.png"
//        }).mouseout(function () {
//            this.src = "images/cart.png"
//        });
//        $("#whiteuser").mouseover(function () {
//            this.src = "images/user-green.png"
//        }).mouseout(function () {
//            this.src = "images/user.png"
//        });
//        $("#whiteheart").mouseover(function () {
//            this.src = "images/heart-green.png"
//        }).mouseout(function () {
//            this.src = "images/heart.png"
//        });

    </script>

    <script>
        ////////////// thumnail_image image start ////////////////
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-upload-wrap3').hide();
                    $('.file-upload-image3').attr('src', e.target.result);
                    $('.file-upload-content3').show();
                    $('.image-title3').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input3').replaceWith($('.file-upload-input3').clone());
            $('.file-upload-content3').hide();
            $('.image-upload-wrap3').show();
        }
        $('.image-upload-wrap3').bind('dragover', function () {
            $('.image-upload-wrap3').addClass('image-dropping');
        });
        $('.image-upload-wrap3').bind('dragleave', function () {
            $('.image-upload-wrap3').removeClass('image-dropping');
        });
        ////////////// thumnail_image image end ////////////////

        /////////////    banner image start    ////////////////
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-upload-wrap1').hide();
                    $('.file-upload-image1').attr('src', e.target.result);
                    $('.file-upload-content1').show();
                    $('.image-title1').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload1();
            }
        }
        $('.image-upload-wrap1').bind('dragover', function () {
            $('.image-upload-wrap1').addClass('image-dropping');
        });
        $('.image-upload-wrap1').bind('dragleave', function () {
            $('.image-upload-wrap1').removeClass('image-dropping');
        });

        function removeUpload1() {
            $('.file-upload-input1').replaceWith($('.file-upload-input1').clone());
            $('.file-upload-content1').hide();
            $('.image-upload-wrap1').show();
        }
        /////////// banner image end  /////////////


        $("#project_pic").on("change", function (e) {
            var files = e.target.files,
                    filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    $("<img></img>", {
                        class: "imageThumb",
                        src: e.target.result,
                        title: file.name
                    }).insertAfter("#project_pic");
                });
                fileReader.readAsDataURL(f);
            }
        });


        /////////// Project image view start //////////
//        function readURL2(input) {
//            if (input.files && input.files[0]) {
//                var reader = new FileReader();
//                reader.onload = function (e) {
//                    $('.image-upload-wrap2').hide();
//                    $('.file-upload-image2').attr('src', e.target.result);
//                    $('.file-upload-content2').show();
//                    $('.image-title2').html(input.files[0].name);
//                };
//                reader.readAsDataURL(input.files[0]);
//            } else {
//                removeUpload2();
//            }
//        }
        $('.image-upload-wrap2').bind('dragover', function () {
            $('.image-upload-wrap2').addClass('image-dropping');
        });
        $('.image-upload-wrap2').bind('dragleave', function () {
            $('.image-upload-wrap2').removeClass('image-dropping');
        });

        function removeUpload2() {
            $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
            $('.file-upload-content2').hide();
            $('.image-upload-wrap2').show();
        }
        /////////// Project image view end //////////

    </script>
</html>

