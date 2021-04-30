<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/pre-header'); ?>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 style="display: inline-block;"><?php echo $title; ?></h4>
                                    <!-- <a href="<?php //echo base_url('admin/cms/add-new-attribute'); ?>" class="btn btn-success" style="float: right;padding: 10px 18px;"> Add New Attribute</a> -->
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_attribute_model" style="float: right;padding: 10px 18px;">Add New Attribute</button>

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
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Attribute </th>
                                                <th>Clild Attribute</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($attribute_list as $key=>$val) {
                                                if($val['p_id'] >0){
                                                ?>    
                                            <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    <td>
                                                        <?php  echo $val['attr_name'][0]['name']; ?>
                                                            
                                                    </td>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Inactive" class="btn btn-danger" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Active" class="btn btn-success" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                   <td>
                                                    <button onClick="edit_attribute(<?php echo $val['id'];?>);" title="Update" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
                                                    <!--
                                                        <a href="<?php //echo base_url('admin/cms/edit-attribute/'.smart_encode($val['id'])); ?>" title="Update" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                    -->
                                                    </td>
                                                
                                                </tr>
                                            <?php }else{ 
                                                if($val['total_attr'] > 0){continue;}    
                                             ?>
                                                    <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td></td>
                                                    <td><?php if($val['status'] == 0){ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Inactive" class="btn btn-danger" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-times"></i> </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/cms/edit-attribute-status/'.smart_encode($val['id'])); ?>" title="Active" class="btn btn-success" onclick="return confirm('Are you sure to change status ?');"> <i class="fa fa-check"></i> </a>
                                                        <?php } ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <button onClick="edit_attribute(<?php echo $val['id'];?>)" title="Update" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
                                                        <!--
                                                        <a href="<?php //echo base_url('admin/cms/edit-attribute/'.smart_encode($val['id'])); ?>" title="Update" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                                    -->
                                                    </td>
                                                </tr>

                                           
                                            <?php } } ?>    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Attribute Name</th>
                                                <th>Clild Attribute</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--start overlay-->
            <?php $this->load->view('includes/footer'); ?>


            <!-- ADD/EDIT ATTRIBUTE  -->
                <div class="modal fade" id="add_attribute_model" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                             <h4 class="modal-title">Attribute </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/cms/add-new-attribute'); ?>"
                             method="post"  id="action_attribute">
                                <!-- onsubmit="return form_validation();" -->
                                
                                <div class="form-group">
                                  <label for="sel1">Select Attribute:(if you not select then parent attribute)</label>
                                  <select class="form-control" name="parent_attribute">
                                    <option value="">Select Attribute:</option>
                                    <?php foreach ($attribute_list as $key => $value) {
                                        if($value['p_id'] == 0){
                                            echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
                                        }
                                       
                                    } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label>Attribute Name:</label>
                                    <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="frm_sub" value="submit" class="btn btn-success">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
                  
                  <script type="text/javascript">
                    $(document).ready(function (e) {
                        $('#action_attribute').on('submit',(function(e) {

                            if ($.trim($("input[name=attribute_name]").val()) == '') {
                                $("input[name=attribute_name]").css("border-color", "red");
                                toastr.error("Enter Attribute Name !");
                                return false;
                            }else{
                                $("input[name=attribute_name]").css("border-color", "");
                            }

                            e.preventDefault();
                            var formData = new FormData(this);
                            $.ajax({
                                type:'POST',
                                url: $(this).attr('action'),
                                data:formData,
                                cache:false,
                                contentType: false,
                                processData: false,
                                success:function(data){
                                    alert("SuccessFully Submited");
                                    window.location.reload();
                                    console.log(data);
                                    $('#add_attribute_model').modal('hide');
                                },
                                error: function(data){
                                    alert("Please Try Again");
                                    console.log(data);
                                    $('#myModal').modal('hide')
                                }
                            });
                        }));

                       
                    });
                     function edit_attribute(id) {
                            //alert(id);
                            $.ajax({
                              type:'POST',
                              // dataType: "json",
                              url:"<?php echo base_url('admin/cms/fetch-attribute-list'); ?>",
                              data:{id:id},
                              success:function(data){
                                console.log(data);
                                // $('.modal-body').html(data); 
                                // $('#myModal').modal('show');
                              },
                              error: function(data){
                                alert("Please Try Again");
                                //console.log(data);
                                $('#myModal').modal('hide')
                              }
                            });
                        }
                  </script>

            <!-- ADD/EDIT ATTRIBUTE  -->
    </body>
</html>