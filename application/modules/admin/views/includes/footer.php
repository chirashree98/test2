<div class="overlay toggle-btn-mobile"></div>
<div class="footer">
    <p class="mb-0">BenaSmart @2021 | Developed By : <a href="https://www.inwebinfo.com/" target="_blank">Integrity Web Informatics</a>
    </p>
</div>
<!-- end footer -->
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="<?php echo base_url('assets/admin/js/jquery.min.js'); ?>"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<!--plugins-->
<script src="<?php echo base_url(); ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>-->
<!-- Vector map JavaScript -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/index.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/toaste/toastr.min.js"></script>
<!-- App JS -->
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>

<script src="<?php echo base_url('assets/admin/'); ?>plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="<?php echo base_url('assets/admin/js/sweetalert2.all.min.js'); ?>"></script>
<!--<script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script>-->
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
        $('#fancy-file-upload').FancyFileUpload({
                params: {
                        action: 'fileuploader'
                },
                maxfilesize: 1000000
        });
</script>
<script>
        $(document).ready(function () {
                $('#image-uploadify').imageuploadify();
        })
</script>