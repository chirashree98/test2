<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    </head>
    <body>
        <?php // $this->load->view('common/header_top_nav'); ?>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>
        <section id="inner-menu-list">
            <div class="container-fluid">
                <ul>
                    <li><a href="<?php echo base_url(); ?>"> Home <span>/</span></a></li>
                    <li><a href="<?php echo base_url('my-profile'); ?>"> My Profile <span>/</span></a></li>
                    <li><a href="<?php echo current_url(); ?>"> Order Details </a></li>
                </ul>
            </div>
        </section>


        <section id="project-plumbing-details">
            <div class="container">
                <div class="inner-pages-content-heading">
                    <?php if ($this->session->userdata('sucmsg')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->userdata('sucmsg'); ?></strong>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('errmsg')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?php echo $this->session->userdata('errmsg'); ?></strong>
                        </div>
                    <?php } ?>
                    <h3>Company Details</h3>
                </div>
                <h2>Service Details</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left">
                            <h6><b>Service Name:</b>
                                <?php
                                if ($user_service_list[0]['serivices'] != '' || $user_service_list[0]['serivices'] != 'null') {
                                    $service_name = get_service_name(json_decode($user_service_list[0]['serivices']));
                                    $count = count($service_name);
                                    $temp = 1;
                                    foreach ($service_name as $val) {
                                        echo $val;
                                        if ($count > $temp) {
                                            echo ', ';
                                        }
                                        $temp++;
                                    }
                                } else {
                                    echo'---';
                                }
                                ?>
                            </h6>
                            <h6><b>Service Type:</b> 
                                <?php
                                if ($user_service_list[0]['service_types'] != '' || $user_service_list[0]['service_types'] != 'null') {
                                    $service_type = get_service_type(json_decode($user_service_list[0]['service_types']));
                                    $count = count($service_type);
                                    $temp = 1;
                                    foreach ($service_type as $val) {
                                        echo $val;
                                        if ($count > $temp) {
                                            echo ', ';
                                        }
                                        $temp++;
                                    }
                                } else {
                                    echo'---';
                                }
                                ?>
                            </h6>
                            <h6><b>Add-on:</b> 
                                <?php
                                if ($user_service_list[0]['add_ons'] != '' || $user_service_list[0]['add_ons'] != 'null') {
                                    $addons = get_addons(json_decode($user_service_list[0]['add_ons']));
                                    $count = count($addons);
                                    $temp = 1;
                                    foreach ($addons as $val) {
                                        echo $val;
                                        if ($count > $temp) {
                                            echo ', ';
                                        }
                                        $temp++;
                                    }
                                } else {
                                    echo'---';
                                }
                                ?>
                            </h6>
                            <h6><b>Name:</b> <?php echo $user_det[0]['name']; ?></h6>
                            <h6><b>Address:</b> 
                                <?php
                                if ($user_det[0]['address1'] != '' || $user_det[0]['address2'] != '' || $user_det[0]['country_id'] != '' || $user_det[0]['state_id'] != '' || $user_det[0]['city_id'] != '' || $user_det[0]['zipcode'] != '') {
                                    echo $user_det[0]['address1'] . ', ' . $user_det[0]['address2'] . ', ' . $user_det[0]['country_id'] . ', ' . $user_det[0]['state_id'] . ', ' . $user_det[0]['city_id'] . ', ' . $user_det[0]['zipcode'];
                                } else {
                                    echo'---';
                                }
                                ?>
                            </h6>
                            <h6><b>Status:</b>
                                <div class="dropdown dpproject">
                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>
                                            <?php
                                            if ($user_service_list[0]['status'] == 0) {
                                                echo 'Waiting';
                                            } else if ($user_service_list[0]['status'] == 1) {
                                                echo 'Ongoing';
                                            } else if ($user_service_list[0]['status'] == 2) {
                                                echo 'Complete';
                                            } else if ($user_service_list[0]['status'] == 3) {
                                                echo 'Cancel';
                                            }
                                            ?>
                                        </span>
                                    </button>
                                    <?php
                                    if ($user_service_list[0]['status'] == 0) {
                                        ?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:void;" onclick="return complete_order(<?php echo $user_service_list[0]['id']; ?>, '2');">Complete</a>
                                            <a class="dropdown-item" href="javascript:void;" onclick="return complete_order(<?php echo $user_service_list[0]['id']; ?>, '3');">Cancel</a>
                                        </div>
                                        <?php
                                    } else if ($user_service_list[0]['status'] == 1) {
                                        ?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:void;" onclick="return complete_order(<?php echo $user_service_list[0]['id']; ?>, '2');">Complete</a>
                                        </div>
                                <?php
                            }
                            ?>

                                </div>
                            </h6>
                                <?php if ($user_ticket_count < 1) { ?>
                                <div class="delect-accept-btn">
                                    <button class="accept-project" data-toggle="modal" data-target="#myModalticket">Raise a Ticket</button>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right">
                            <div class="pro-plum-details-right-content-inner">
                                <div class="table-responsive">
                                    <table class="table calculate-table">
                                        <thead>
                                            <tr>
                                                <th>item</th>
                                                <th>previous price</th>
                                                <th>post price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            if ($user_service_list[0]['serivices'] != '' || $user_service_list[0]['serivices'] != 'null') {
                                                $service_array = json_decode($user_service_list[0]['serivices']);
                                                if (count($service_array) > 0) {
                                                    foreach ($service_array as $val) {
                                                        $service_det = get_service_details($val, $user_service_list[0]['id']);
                                                        ?>
                                                        <tr>
                                                            <td class="water">
                                                                <h6><?php echo $service_det[0]['project_name']; ?> 
                                                                    <span>
                                                                        ($<?php
                                                            $temp = 0;
                                                            if ($service_det[0]['fess_p_hour'] == 0) {
                                                                echo $service_det[0]['fees_p_s_feet'] . ' per feet';
                                                                $temp = $service_det[0]['fees_p_s_feet'];
                                                            } else {
                                                                echo $service_det[0]['fess_p_hour'] . ' per hour';
                                                                $temp = $service_det[0]['fess_p_hour'];
                                                            }
                                                        ?>)
                                                                    </span></h6>
                                                            </td>
<!--                                                            <td class="water">
                                                                <h5><?php echo $service_det[0]['qty']; ?></h5>
                                                            </td>-->
                                                            <td class="water">
                                                                <h5>$<?php
                                                        echo $temp;
                                                        $total = $total + $temp;
                                                        ?></h5>
                                                            </td>
                                                            <td class="water">
                                                                <h5>---</h5>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                                            <?php
                                                            if ($user_service_list[0]['service_types'] != '' || $user_service_list[0]['service_types'] != 'null') {
                                                                $service_array = json_decode($user_service_list[0]['service_types']);
                                                                if (count($service_array) > 0) {
                                                                    foreach ($service_array as $val) {
                                                                        $service_det = get_service_type_details($val, $user_service_list[0]['id']);
                                                                        ?>
                                                        <tr>
                                                            <td class="water">
                                                                <h6><?php echo $service_det[0]['fees_project_name']; ?> 
                                                                    <span>
                                                                        ($<?php
                                                                        echo $service_det[0]['project_fees'] . ' per service';
                                                                        $temp = $service_det[0]['project_fees'];
                                                                        ?>)
                                                                    </span></h6>
                                                            </td>
<!--                                                            <td class="water">
                                                                <h5><?php echo $service_det[0]['qty']; ?></h5>
                                                            </td>-->
                                                            <td class="water">
                                                                <h5>$<?php echo $temp;
                                            $total = $total + $temp;
                                                                        ?></h5>
                                                            </td>
                                                            <td class="water">
                                                                <h5>---</h5>
                                                            </td>
                                                        </tr>
            <?php
        }
    }
}
?>
<?php
if ($user_service_list[0]['add_ons'] != '' || $user_service_list[0]['add_ons'] != 'null') {
    $service_array = json_decode($user_service_list[0]['add_ons']);
    if (count($service_array) > 0) {
        foreach ($service_array as $val) {
            $service_det = get_addons_details($val, $user_service_list[0]['id']);
            ?>
                                                        <tr>
                                                            <td class="water">
                                                                <h6><?php echo $service_det[0]['add_on_task']; ?> 
                                                                    <span>
                                                                        ($<?php
                                                        echo $service_det[0]['add_on_fees'] . ' per addon';
                                                        $temp = $service_det[0]['add_on_fees'];
                                                        ?>)
                                                                    </span></h6>
                                                            </td>
<!--                                                            <td class="water">
                                                                <h5><?php echo $service_det[0]['qty']; ?></h5>
                                                            </td>-->
                                                            <td class="water">
                                                                <h5>$<?php echo $temp;
                                                        $total = $total + $temp; ?></h5>
                                                            </td>
                                                            <td class="water">
                                                                <h5>---</h5>
                                                            </td>
                                                        </tr>
            <?php
        }
    }
}
?>

                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="calculate-area">
                                    <h6>subtotal<span>$<?php echo $total; ?></span></h6>
                                    <h6>DISCOUNT<span>$0.00</span></h6>
                                    <h6>TOTAL<span>$<?php echo $total; ?></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(count($user_ticket_list) > 0){
                    foreach($user_ticket_list as $val){
                ?>
                <div class="customer-ticket">
                    <div class="tic">
                        <h5>Ticket No : <?php echo $val['ticket_no']; ?></h5>
                        <h6><?php echo date('d-M-Y H:i',strtotime($val['created_date'])); ?></h6>
                        <p><?php echo $val['message']; ?></p>    
                    </div>
                    <?php 
                        $reply_array = get_ticket_reply($val['id']);
                        if(count($reply_array) > 0){
                        foreach($reply_array as $val1){
                    ?>
                    <div class="<?php if($val1['reply_role_id'] == 1){
                                    echo 'tic-reply tic-reply3';
                                    
                                }elseif($val1['reply_role_id'] == 2){
                                    echo 'tic-reply';
                                }else{
                                    echo 'tic-reply tic-reply2';
                                } ?>">
                        <h6><?php echo $val1['name']; ?></h6>
                        <span><?php echo date('d-M-Y H:i',strtotime($val1['created_date'])); ?></span>
                        <p><?php echo $val1['message']; ?></p>
                    </div>
                        <?php }}else{ ?>
                            <div class="tic-reply">
                                <h6>No reply found !</h6>
                                
                            </div>
                        <?php } ?>
<!--                    <div class="tic-reply tic-reply2">
                        <h6>Professional</h6>
                        <span>April 07, 2021, 02:43PM</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                    <div class="tic-reply tic-reply3">
                        <h6>Supplier</h6>
                        <span>April 07, 2021, 02:43PM</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>-->
                    <?php if($val['status'] == 0){ ?>
                    <div class="form-group">
                        <form action="<?php echo base_url('customer-reply-ticket'); ?>" method="post" onsubmit="return form_validation_ticket_reply('<?php echo $val['id']; ?>');">
                            <input type="hidden" class="form-control" name="ticket_id" value="<?php echo $val['id']; ?>">
                            <input type="hidden" class="form-control" name="return_url" value="<?php echo current_url(); ?>">
                            <input type="hidden" class="form-control" name="order_id" value="<?php echo $user_service_list[0]['id']; ?>">
                            <input type="text" class="form-control" name="reply" id="reply_<?php echo $val['id']; ?>">
                            <input type="submit" class="replybtn" value="Reply"/>
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <?php  
                    }}else{
                ?>
                <div class="alert alert-success" role="alert" style="text-align:center;">
                    <strong>No ticket found!</strong>
                </div>
                <?php } ?>









                <h2>Message</h2>
                <div class="project-plumbing-chat">
                    <div class="chat-top">
                        <h5><span></span>Lilia</h5>
                        <p>Last seen 1h ago &nbsp; | &nbsp; Local time Feb 02, 02:43PM</p>
                    </div>
                    <div class="chat-body">
                        <div class="item">
                            <img src="images/customer.jpg"/>
                            <div class="iteminner">
                                <h5>Lilia <span>Feb 02, 2021, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted by the readable</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/me.jpg"/>
                            <div class="iteminner">
                                <h5>Me <span>Feb 02, 2021, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/customer.jpg"/>
                            <div class="iteminner">
                                <h5>Lilia <span>Feb 02, 2021, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted by the readable</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/customer.jpg"/>
                            <div class="iteminner">
                                <h5>Lilia <span>Feb 02, 2021, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted by the readable</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/me.jpg"/>
                            <div class="iteminner">
                                <h5>Me <span>Feb 02, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/customer.jpg"/>
                            <div class="iteminner">
                                <h5>Lilia <span>Feb 02, 2021, 02:43PM</span></h5>
                                <p>It is a long established fact that a reader will be distracted by the readable</p>
                            </div>
                        </div>
                    </div>

                    <div class="chat-footer">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control">
                                <div class="upload-btn-wrapper">
                                    <button class="btn"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
                                    <input type="file" name="myfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="sendbtn"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </section>

        <section id="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 pr-0">
                        <div class="subscribe-left">
                            <img src="<?php echo base_url('assets/front/'); ?>images/email.png" />
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
        <div class="modal" id="myModalticket">
            <div class="modal-dialog login-modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <section id="login">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="login-inner-sub popupnew">
                                <img src="<?php echo base_url('assets/front/'); ?>images/logo.png" />
                                <form action="<?php echo base_url('cistomer-raise-ricket'); ?>" method="post" onsubmit="return form_validation_ticket_raise();">
                                    <input type="hidden" name="order_id" value="<?php echo $user_service_list[0]['id']; ?>">
                                    <input type="hidden" name="return_url" value="<?php echo current_url(); ?>">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" id="message"></textarea>
                                    </div>
                                    <input type="submit" class="login-btn" value="Raise Ticket" name="tickest-login">
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('common/footer'); ?>
    </body>
<?php $this->load->view('common/footer_include'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script>
        function form_validation_ticket_raise() {
            if ($.trim($("#message").val()) == '') {
                $("#message").css("border-color", "red");
                toastr.error("Enter Message!");
                return false;
            } else {
                $("#message").css("border-color", "");
            }
        }
        function form_validation_ticket_reply(id){
            if ($.trim($("#reply_"+id).val()) == '') {
                $("#reply_"+id).css("border-color", "red");
                toastr.error("Enter reply message!");
                return false;
            } else {
                $("#reply_"+id).css("border-color", "");
            }
        }
        function complete_order(order_id, new_status) {
            Swal.fire({
                title: 'Are you sure to change order status ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?php echo base_url(); ?>customer-change-order-status', 'order_id=' + order_id + '&new_status=' + new_status, function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                    'changed!',
                                    'Your order status has been changed.',
                                    'success'
                                    )
                            window.location.href = '<?php echo current_url(); ?>';
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

        $("#whitecart").mouseover(function () {
            this.src = "images/cart-green.png"
        }).mouseout(function () {
            this.src = "images/cart.png"
        });
        $("#whiteuser").mouseover(function () {
            this.src = "images/user-green.png"
        }).mouseout(function () {
            this.src = "images/user.png"
        });
        $("#whiteheart").mouseover(function () {
            this.src = "images/heart-green.png"
        }).mouseout(function () {
            this.src = "images/heart.png"
        });

    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'LT',
                timepicker: false,
            });
        });

    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'LT',
                datepicker: false,
            });
        });

    </script>


    <script>
        $(".js-select2").select2({
            closeOnSelect: false,
            placeholder: "Placeholder",
            allowHtml: true,
            allowClear: true,
            tags: true // �?оздает новые опции на лету
        });

        function iformat(icon, badge, ) {
            var originalOption = icon.element;
            var originalOptionBadge = $(originalOption).data('badge');

            return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
        }

    </script>
</html>