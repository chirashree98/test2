<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/toaste/toastr.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/tagsinput.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/slick.min.js"></script>
<script src="<?php echo base_url('assets/admin/js/sweetalert2.all.min.js'); ?>"></script>

<!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<script src="<?php echo base_url('assets/front/'); ?>js/main.js"></script>

<script>
    $("#whitecart").mouseover(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/cart-green.png"
    }).mouseout(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/cart.png"
    });
    $("#whiteuser").mouseover(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/user-green.png"
    }).mouseout(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/user.png"
    });
    $("#whiteheart").mouseover(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/heart-green.png"
    }).mouseout(function () {
        this.src = "<?php echo base_url('assets/front/'); ?>images/heart.png"
    });

</script>
<script>
    $('.responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: false,
//  focusOnSelect: true,
//    autoplay:true,
//  autoplaySpeed:3000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>
<script>
    $(() => {
        var createSlick = () => {
            let slider = $(".slider");

            slider.not('.slick-initialized').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                dots: false,
                slidesToShow: 5,
                slidesToScroll: 5,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            adaptiveHeight: true,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        },
                    },
                ],
            });
        }
        createSlick();
        $(window).on('resize orientationchange', createSlick);
    })
</script>
<script type="text/javascript">
    jQuery(function ($) {
        new WOW().init();
    });
</script>
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
