<!DOCTYPE html>
<html>
    <head>
        <?php include 'common/header_include.php'; ?>

    </head>
    <body>
        <?php include 'common/header_top_nav.php'; ?>

        <?php include 'common/header_middle.php'; ?>

        <?php include 'common/header_navarea.php'; ?>
<section id="inner-menu-list">
        <div class="container-fluid">
            <ul>
                <li><a href="#">Home <span>/</span></a></li>
                <li><a href="#">Delhi <span>/</span></a></li>
                <li><a href="#">Plumbing</a></li>
            </ul>
        </div>
    </section>
    <section id="supplier-pagenav">
        <div class="container">
            <ul>
                <li><a href="#">Personal Details</a></li>
                <li><a href="#">About Us</a></li>
                <li class="active"><a href="#">Company Details</a></li>
                <li><a href="#">Work Info </a></li>
                <li><a href="#">Upload Pictures</a></li>
                <li><a href="#">Bank Details</a></li>
            </ul>
        </div>
    </section>

    <section id="company-details">
        <div class="container">
            <div class="inner-pages-content-heading">
                <h3>Company Details</h3>
            </div>
            <div class="row">
                <div class="company-details-form">
                    <form>
                        <div class="form-group col-md-4">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Lorem ipsum dolor">
                        </div>
                        <div class="form-group col-md-4 form-up-down-details">
                            <label>Company Phone Number</label>
                            <div class="select-area company-ph-selected-area">
                                <select class="custom-select form-control" id="inlineFormCustomSelect">
                                    <option selected>SB +966</option>
                                    <option value="1">SB +966</option>
                                    <option value="2">SB +966</option>
                                    <option value="3">SB +966</option>
                                </select>
                            </div>
                            <div class="inputarea company-ph-inputarea">

                                <input type="number" class="form-control" placeholder="123 456 7890" />
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Company Email</label>
                            <input type="email" class="form-control" placeholder="sahid-ahamed@gmail.com">
                        </div>
                        <div class="company-details-inner">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group col-md-6">
                                        <label>Company Address</label>
                                        <input type="text" class="form-control" placeholder="Lorem ipsum dolor sit amet,piscing">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Company Address Line 2</label>
                                        <input type="text" class="form-control" placeholder="Dolor sit amet,piscing">
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>Country</label>
                                        <select class="custom-select form-control" id="inlineFormCustomSelect">
                                            <option selected>Lorem</option>
                                            <option value="1">Lorem</option>
                                            <option value="2">Lorem</option>
                                            <option value="3">Lorem</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>State</label>
                                        <select class="custom-select form-control" id="inlineFormCustomSelect">
                                            <option selected>Lipsum</option>
                                            <option value="1">Lipsum</option>
                                            <option value="2">Lipsum</option>
                                            <option value="3">Lipsum</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 form-location-details">
                                        <label>City</label>
                                        <select class="custom-select form-control" id="inlineFormCustomSelect">
                                            <option selected>Sed Dues</option>
                                            <option value="1">Sed Dues</option>
                                            <option value="2">Sed Dues</option>
                                            <option value="3">Sed Dues</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Zip</label>
                                        <input type="number" class="form-control" placeholder="123456" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 pb-0 mb-0">
                            <button class="login-btn btn">Update Now!</button>
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
                        <img src="<?php echo base_url('/assets/front/images'); ?>/email.png" />
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
<?php include 'common/footer.php'; ?>

    </body>
    <?php include 'common/footer_include.php'; ?>
</html>