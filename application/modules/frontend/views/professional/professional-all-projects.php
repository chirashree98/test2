<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <?php $this->load->view('common/header_include'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php $this->load->view('common/header_middle'); ?>
        <?php $this->load->view('common/header_navarea'); ?>
        <section id="project-booking">
            <div class="container">
                <h2>Project Ongoing</h2>
                <div class="cart-inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Project Type</th>
                                    <th>Date & Time <i class="fa fa-sort"></i></th>
                                    <th>Address</th>
                                    <th>Status <i class="fa fa-sort"></i></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($ongoing_projects->result()) > 0) {
                                    foreach ($ongoing_projects->result() as $row) {
                                        ;
                                        ?>
                                        <tr id="sec_forr_<?php echo $val->id; ?>">
                                            <td>
                                                <p>
                                                    <?php
                                                    $service_name = isset($row->serivices) ? json_decode($row->serivices) : array();
                                                    if (is_array($service_name) && count($service_name) > 0) {
                                                        $service = get_all_service_type_Details($service_name);
                                                        echo implode(',', $service);
                                                    } else {
                                                        echo'---';
                                                    }
                                                    ?>

                                                </p>
                                                <h6>Add-on: 
                                                    <?php
                                                    $add_ons = isset($row->add_ons) ? json_decode($row->add_ons) : array();
                                                    if (is_array($add_ons) && count($add_ons) > 0) {
                                                        $addons = get_all_add_ons_Details($add_ons);
                                                        echo implode(',', $addons);
                                                    } else {
                                                        echo'---';
                                                    }
                                                    ?>

                                                </h6>
                                            </td>
                                            <td>
                                                 <?php
                                                    $service_types = isset($row->service_types) ? json_decode($row->service_types) : array();
                                                    if (is_array($service_types) && count($service_types) > 0) {
                                                        $service_type = get_all_service_types_Details($service_types);
                                                        echo implode(',', $service_type);
                                                    } else {
                                                        echo'---';
                                                    }
                                                    ?>
                                               
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y', strtotime(str_replace('/', '-', $row->date))) ; ?> - <?php echo date('H:i', strtotime($row->time)); ?></td>
                                            <td>
                                                Hellat Ammar, P.O.Box: 50, Tabuk
                                            </td>
                                            <td>
                                                <?php if ($row->status == 0) { ?>
                                                    <span class="ongoing">Waiting</span>
                                                <?php } else if ($row->status == 1) { ?>
                                                    <span class="ongoing">Ongoing</span>
                                                <?php } ?>   
                                            </td>
                                            <td>
                                                <ul class="heart-trash">

                                                    <li><a href="<?php echo base_url('professional-service-details/' . smart_encode($row->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return delete_service('<?php echo $row->id; ?>');"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            No service booking found!
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pastproject">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <h2>Past Project</h2>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search project" />
                                    <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/front/images/search.png"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="cart-inner project2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Project Type</th>
                                    <th>Date & Time <i class="fa fa-sort"></i></th>
                                    <th>Address</th>
                                    <th>Status <i class="fa fa-sort"></i></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        <p>Water Leakages</p>
                                        <h6>Add-on: Tap and Shower Filter, Drill and Hole</h6>
                                    </td>
                                    <td>Basin & Sink</td>
                                    <td>18 Dec 2020 - 01:30pm</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="completed">Completed</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Pipe/Tap Fitting <span>1</span></p>
                                        <h6>Add-on: Sink Hose</h6>
                                    </td>
                                    <td>Washbasin Repair</td>
                                    <td>17 Dec 2020 - 10:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="working">Working</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>
                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>16 Dec 2020 - 06:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="completed">Completed</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Water Leakages <span>1</span></p>
                                        <h6>Add-on: Tap and Shower Filter, Drill and Hole</h6>
                                    </td>
                                    <td>Basin & Sink</td>
                                    <td>18 Dec 2020 - 01:30pm</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="completed">Completed</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Pipe/Tap Fitting <span>1</span></p>
                                        <h6>Add-on: Sink Hose</h6>
                                    </td>
                                    <td>Washbasin Repair</td>
                                    <td>17 Dec 2020 - 10:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="working">Working</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Repairs & Fixes</p>
                                        <h6>Add-on: Bath Fitting, Shower Installation</h6>
                                    </td>
                                    <td>Overhead Tank</td>
                                    <td>16 Dec 2020 - 06:00am</td>
                                    <td>Hellat Ammar, P.O.Box: 50, Tabuk</td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li>
                                                <div class="dropdown dpproject">
                                                    <button class="btn-secondary dropdown-toggle eyebtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="completed">Completed</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0);">Packed</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delivered</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="heart-trash">
                                            <li><a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="product-pagination">
                    <div class="page-num">
                        Page 1 of 58
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item d-none pagination-btn">
                                <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span>Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                            <li class="page-item pagination-btn">
                                <a class="" href="javascript:void(0);" aria-label="Next">
                                    <span>Next</span>
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
</html>