<head>
    <style>
        .signin-dropdown .dropdown-menu {
            position: absolute;
            top: 52px;
            background: #fff;
            border-radius: 0;
            border: none;
            font-size: 15px;
            padding: 0;
            border-bottom: 1px solid #999999 !important;
            box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
            width: 150px;
            border-radius: 6px !important;
            left: 0;
        }

        .signin-dropdown .dropdown-item {
            text-align: left;
            float: left;
            width: 100%;
            padding: 0;
            border-radius: 6px;
        }

        .signin-dropdown .dropdown-item a:hover,
        .customer-login-modal:hover {
            background: #19222e;
            color: #1df2b5;
            border-radius: 5px;
        }

        .customer-login-modal {
            font-size: 15px;
            color: #19222e;
            padding: 12px 22px;
            transition-duration: 0.5s;
            float: left;
            width: 100%;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
              background: #fff;
        }

        .signin-dropdown .dropdown-item a {
            font-size: 15px;
            color: #19222e;
            padding: 12px 22px;
            cursor: pointer;

            transition-duration: 0.5s;
            float: left;
            width: 100%;
            border: 0;
        }
/*
.cartitem span {
    line-height: 19px;
}
        .userdrop span {
    line-height: 19px;
}
*/
        @media(min-width:768px) and (max-width:991px) {
            .signin-dropdown .dropdown-menu {
                left: -98px;
            }
        }

        @media(min-width:992px) and (max-width:1280px) {
            .signin-dropdown .dropdown-menu {
                left: -58px;
            }
        }

        @media(max-width:767px) {
            .signin-dropdown .dropdown-menu {
                left: -23px;
                top: 57px;
            }
        }

    </style>
</head>

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
                        <li><a href="#"><img src="<?php echo base_url('assets/front/'); ?>images/heart.png" id="whiteheart" alt=""></a></li>
                        <li class="userdrop dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/front/'); ?>images/user.png" id="whiteuser" alt="" class="userpaddding" /></a>
                            <span>3</span>
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
                                <?php }elseif($this->session->userdata('client_role_id') == 4){ ?>
                                    <li><a href="<?php echo base_url('supplier/updateinfo/personal'); ?>">Edit Profile</a></li>
                                <?php }else{ ?>
                                    <li><a href="#">Edit Profile</a></li>
                                <?php } ?>
                                <li><a href="<?php echo base_url('my-products'); ?>">My Products</a></li>
                                <li class="bordernone"><a href="#">Change Password</a></li>
                            </ul>
                        </li>
                        <li class="cartitem"><a href="cart.html"><img src="<?php echo base_url('assets/front/'); ?>images/cart.png" id="whitecart" alt="" /></a>
                            <span>1</span>
                        </li>
                        <?php if($this->session->userdata('client_id')){ ?>
                        <li><a class="signin-btn" href="<?php echo base_url('cli-logout'); ?>">Logout</a></li>
                        <?php }else{ ?>
                        <li class="signin-dropdown nav-item dropdown">
                            <!-- <button data-toggle="modal" data-target="#myModal" class="signin-btn">Sign in</button>-->
                            <button data-toggle="dropdown" id="dropdown1" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle signin-btn">Sign in</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1">
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal" class="customer-login-modal">Customer login</a></li>
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal2" class="customer-login-modal">Professional login</a></li>
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#myModal3" class="customer-login-modal">Supplier login</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
