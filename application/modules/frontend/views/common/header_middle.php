<section id="header-middle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="logoareaindex">
                    <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('assets/front/'); ?>images/logo-white.png" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="categorie-search">
                    <form>
                        <div class="form-group">
                            <select>
                                <option>All Categories</option>
                                <option>Categories 1</option>
                                <option>Categories 2</option>
                                <option>Categories 3</option>
                            </select>
                            <div class="input-btn-area">
                                <input type="text" placeholder="What are you looking for?" />
                                <button class=""><img src="<?php echo base_url('assets/front/'); ?>images/search.png" /></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="header-middle-icon">
                    <ul class="navbar">
                        <li>
                            <a href="javascript:void(0);">
                                <img src="<?php echo base_url(); ?>assets/front/images/heart.png" id="whiteheart" alt="">
                            </a>
                        </li>
                        <li class="userdrop dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>assets/front/images/user.png" id="whiteuser" alt="" class="userpaddding" />
                            </a>
<!--                            <span>3</span>-->
                            <ul class="dropdown-menu">
                                <?php if($this->session->userdata('client_role_id') == 2){ ?>
                                    <li><a href="<?php echo base_url('my-profile'); ?>">My Profile</a></li>
                                <?php }elseif($this->session->userdata('client_role_id') == 3){ ?>
                                    <li><a href="<?php echo base_url('professional-profile'); ?>">My Profile</a></li>
                                <?php }elseif($this->session->userdata('client_role_id') == 4){ ?>
                                    <li><a href="<?php echo base_url('supplier-profile'); ?>">My Profile</a></li>
                                <?php }else{ ?>
                                    <li><a href="#">My Profile</a></li>
                                <?php } ?>
                                <?php if($this->session->userdata('client_role_id') == 2){ ?>
                                    <li><a href="#">Edit Profile</a></li>
                                <?php }elseif($this->session->userdata('client_role_id') == 3){ ?>
                                    <li><a href="<?php echo base_url('professional/updateinfo/personal'); ?>">Edit Profile</a></li>
                                    <li><a href="<?php echo base_url('professional/all-projects'); ?>">My Projects</a></li>
                                    <li><a href="<?php echo base_url('professional/dashboard'); ?>">Dashboard</a></li>
                                <?php }elseif($this->session->userdata('client_role_id') == 4){ ?>
                                    <li><a href="<?php echo base_url('supplier/updateinfo/personal'); ?>">Edit Profile</a></li>
                                <?php }else{ ?>
                                    <li><a href="#">Edit Profile</a></li>
                                <?php } ?>
                                <?php if($this->session->userdata('client_role_id') == 4){ ?>    
                                    <li><a href="<?php echo base_url('my-products'); ?>">My Products</a></li>
                                <?php } ?>
                                <li class="bordernone"><a href="#">Change Password</a></li>
                            </ul>
                        </li>
                        <li class="cartitem"><a href="cart.html"><img src="<?php echo base_url('assets/front/'); ?>images/cart.png" id="whitecart" alt="" /></a>
                            <span>1</span>
                        </li>
                        <?php if($this->session->userdata('client_id')){ ?>
                        <li><a class="signin-btn" href="<?php echo base_url('cli-logout'); ?>">Sign out</a></li>
                        <?php }else{ ?>
                        <li class="signin-dropdown nav-item dropdown">
                            <!-- <button data-toggle="modal" data-target="#myModal" class="signin-btn">Sign in</button>-->
                            <button data-toggle="dropdown" id="dropdown1" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle signin-btn">Sign in</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1">
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal" class="customer-login-modal">Customer</a></li>
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal2" class="customer-login-modal">Professional</a></li>
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal3" class="customer-login-modal">Supplier</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
