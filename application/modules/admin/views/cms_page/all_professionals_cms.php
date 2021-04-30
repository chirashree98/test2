<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/pre-header'); ?>
        <style>
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

    </head>
    <body>
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
                                <hr/>
                                <?php if ($section == 'banner') { ?>
                                    <form action="" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $query['id'] ?>" />
                                        <input type="hidden" name="type" value="<?php echo $section ?>" />
                                        <div class="form-group">
                                            <label>Banner Image:</label>
                                            <input type="file" id="banner_image" name="image"/>
                                            <input type="hidden" id="banner_image_old" value="<?php echo $query['image'] ?>" name="image"/>
                                            <p>Size preferable 1600 X 431</p>
                                            <img src="<?php echo $query['image'] != '' ? base_url() . $query['image'] : '' ?>" height="100px">
                                        </div>
                                        <div class="form-group">
                                            <label>Banner Heading:</label>
                                            <input type="text" class="form-control" id="heading" value="<?php echo $query['heading'] ?>" name="heading" placeholder="Banner Heading">
                                        </div>
                                        <div class="form-group">
                                            <label>Banner Content:</label>
                                            <input type="text" class="form-control" id="content" value="<?php echo $query['content'] ?>" name="content" placeholder="Banner Content">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                        </div>
                                    </form>
                                <?php } ?>


                                <?php if ($section == 'section_two') { ?>
                                    <form action="" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                        <input type="hidden" name="type" value="<?php echo $section ?>" />
                                        <?php foreach ($query->result() as $row) { ?>
                                            <input type="hidden" name="id[]" value="<?php echo $row->id ?>" />
                                            <div class="form-group">
                                                <label>Icon:</label>
                                                <input type="file" id="image" name="image[<?php echo $row->id ?>]"/>
                                                <p>Size preferable 64 X 64</p>
                                                <img src="<?php echo $row->image != '' ? base_url() . $row->image : '' ?>" height="100px">
                                            </div>
                                            <div class="form-group">
                                                <label> Heading:</label>
                                                <input type="text" class="form-control" id="heading" value="<?php echo $row->heading ?>" name="heading[<?php echo $row->id ?>]" placeholder=" Heading">
                                            </div>
                                            <div class="form-group">
                                                <label> Content:</label>
                                                <input type="text" class="form-control" id="content" value="<?php echo $row->content; ?>" name="content[<?php echo $row->id ?>]" placeholder=" Content">
                                            </div>
                                            <hr/>
                                        <?php } ?>
                                        <div class="form-group">
                                            <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                        </div>
                                    </form>
                                <?php } ?>


                                <?php if ($section == 'section_three') { ?>
                                    <form action="" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                        <input type="hidden" name="type" value="<?php echo $section ?>" />
                                        <?php foreach ($query->result() as $row) { ?>
                                            <input type="hidden" name="id[]" value="<?php echo $row->id ?>" />
                                            <div class="form-group">
                                                <label>Icon:</label>
                                                <input type="file" id="image" name="image[<?php echo $row->id ?>]"/>
                                                <p>Size preferable 122 X 82</p>
                                                <img src="<?php echo $row->image != '' ? base_url() . $row->image : '' ?>" height="100px">
                                            </div>
                                            <div class="form-group">
                                                <label> Heading:</label>
                                                <input type="text" class="form-control" id="heading" value="<?php echo $row->heading ?>" name="heading[<?php echo $row->id ?>]" placeholder=" Heading">
                                            </div>
                                            <div class="form-group">
                                                <label> Content:</label>
                                                <input type="text" class="form-control" id="content" value="<?php echo $row->content; ?>" name="content[<?php echo $row->id ?>]" placeholder=" Content">
                                            </div>
                                            <div class="form-group">
                                                <label> Button Text:</label>
                                                <input type="text" class="form-control" id="btn_text" value="<?php echo $row->btn_text; ?>" name="btn_text[<?php echo $row->id ?>]" placeholder="Button Text">
                                            </div>
                                            <div class="form-group">
                                                <label> Button URL :</label>
                                                <input type="text" class="form-control" id="btn_url" value="<?php echo $row->btn_url; ?>" name="btn_url[<?php echo $row->id ?>]" placeholder=" Button URL">
                                            </div>
                                            <hr/>
                                        <?php } ?>
                                        <div class="form-group">
                                            <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                        </div>
                                    </form>
                                <?php } ?>


                                <?php if ($section == 'faq') { ?>
                                    <form action="" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                        <input type="hidden" name="type" value="<?php echo $section ?>" />
                                        <input type="hidden" name="mode" value="new_faq" />

                                        <div class="col-sm-12 ">
                                            <div class="passarea">
                                                <h5><span>Add More FAQ</span> </h5> 
                                                <div class="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Faq Question:</label>
                                                            <input type="text" class="form-control" id="heading" value="" name="heading" placeholder=" Faq Question">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Faq Answer:</label>
                                                            <input type="text" class="form-control" id="content" value="" name="content" placeholder=" Faq Answer">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="submit" name="frm_sub" value="Add FAQ" class="btn btn-success">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>



                                    </form>
                                    <?php foreach ($query->result() as $row) { ?>
                                        <form action="" method="post" onsubmit="return form_validation();" enctype="multipart/form-data">
                                            <input type="hidden" name="type" value="<?php echo $section ?>" />
                                            <input type="hidden" name="id[]" value="<?php echo $row->id ?>" />

                                            <!--                                            <div class="form-group">
                                                                                                    <label> Faq Question:</label>
                                                                                                    <input type="text" class="form-control" id="heading" value="<?php echo $row->heading ?>" name="heading[<?php echo $row->id ?>]" placeholder=" Faq Question">
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label> Faq Answer:</label>
                                                                                                    <input type="text" class="form-control" id="content" value="<?php echo $row->content; ?>" name="content[<?php echo $row->id ?>]" placeholder=" Faq Answer">
                                                                                                </div>
                                                    
                                                                                                <hr/>-->

                                            <div class="col-sm-12 ">
                                                <div class="passarea" id="sec_for_<?php echo $row->id ?>">
                                                    <!--<h5><span>Faq</span> </h5>--> 
                                                    <a onClick="return deleteFaq('<?php echo $row->id; ?>');" href="javascript:void();" class="varientcross"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    <div class="">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Faq Question:</label>
                                                                <input type="text" class="form-control" id="heading" value="<?php echo $row->heading ?>" name="heading[<?php echo $row->id ?>]" placeholder=" Faq Question">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Faq Answer:</label>
                                                                <input type="text" class="form-control" id="content" value="<?php echo $row->content; ?>" name="content[<?php echo $row->id ?>]" placeholder=" Faq Answer">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <input type="submit" name="frm_sub" value="Update FAQ" class="btn btn-success">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->

            <?php $this->load->view('includes/footer'); ?>

            <script>

                function deleteFaq(id) {
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
                            $.post('<?php echo base_url(); ?>admin/cms_page_management/delete_faq', 'id=' + id, function (data) {
                                if (data == 'ok') {
                                    Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                            )
                                    $('#sec_for_' + id).remove();
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
            </script>
    </body>


</html>