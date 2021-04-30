<?php $tot= floatval('0'); ?>
<ul>
    <?php foreach ($serivices as $row){ ?>
    <li><?php echo $row['project_name']; ?> (<?php if (floatval($row['fess_p_hour'] )>0) { echo 'per/hr';} else if ($row['fees_p_s_feet'] != '') {echo 'per/sf';}?>.*)
        <span>$<?php if (floatval($row['fess_p_hour'] )>0) { echo $row['fess_p_hour'] ;  $tot+= floatval($row['fess_p_hour']);} else if ($row['fees_p_s_feet'] != '') { echo $row['fees_p_s_feet'] ;  $tot+= floatval($row['fees_p_s_feet']);}?></span>
    </li>
    <?php } ?>
    
    <?php foreach ($service_types as $row){ ?> 
    <li><?php echo $row['fees_project_name']; ?> (/Project.*)
        <span>$<?php  echo $row['project_fees'] ;  $tot+= floatval($row['project_fees']);?></span>
    </li>
    <?php } ?>
     
    <?php foreach ($add_ons as $row){ ?>
    <li><?php echo $row['add_on_task']; ?> 
        <span>$<?php echo $row['add_on_fees'] ;  $tot+= floatval($row['add_on_fees']); ?></span>
    </li>
    <?php } ?>
    
    
</ul>
<div class="total">
    <p>Total minimum price <span>$<?php echo $tot; ?></span></p>
</div>