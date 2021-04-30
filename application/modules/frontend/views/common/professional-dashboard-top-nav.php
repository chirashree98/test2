<?php
/*$new_status = is_professional_new($this->session->userdata('client_id'));
if ($new_status == 0) {
    ?>
    <ul>
        <li class="active"><a>Personal Details</a></li>
        <li><a>About Us</a></li>
        <li><a>Company Details</a></li>
        <li><a>Work Info </a></li>
        <li><a>Service Details</a></li>
        <li><a>Upload Pictures</a></li>
        <li><a>Bank Details</a></li>
    </ul>
<?php } else { */?>
    <ul>
        <li class="<?php echo $this->uri->segment(3)=='personal'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/personal'); ?>">Personal Details</a></li>
        <li class="<?php echo $this->uri->segment(3)=='about-us'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/about-us'); ?>">About Us</a></li>
        <li class="<?php echo $this->uri->segment(3)=='company-details'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/company-details'); ?>">Company Details</a></li>
        <li class="<?php echo $this->uri->segment(3)=='work-info'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/work-info'); ?>">Work Info </a></li>
        <li class="<?php echo $this->uri->segment(3)=='service-details'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/service-details'); ?>">Service Details</a></li>
        <li class="<?php echo $this->uri->segment(3)=='upload-pictures'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/upload-pictures'); ?>">Upload Pictures</a></li>
        <li class="<?php echo $this->uri->segment(3)=='bank-details'?'active':''; ?>"><a href="<?php echo base_url('professional/updateinfo/bank-details'); ?>">Bank Details</a></li>
    </ul>
<?php // } ?>