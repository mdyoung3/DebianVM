<?php
	global $mobileObj;

	$staffs_rows = $view->result;
	foreach ($staffs_rows as $id => $row):
		$node = node_load($row->nid);
		$staffObj = new stdClass();
		$staffObj->path = $node->path;
		$staffObj->title = $node->title;
		$staffObj->jobtitle = $node->field_jobtitle[0]['value'];
		$staffObj->email = $node->field_email[0]['value'];
		$staffs_nodes[] = $staffObj;
	endforeach;
	
	//echo '<pre>'.print_r($staffs_nodes,true).'</pre>';
	
?>
<div class="simple-list staff-list">
	<?php foreach($staffs_nodes as $staff): ?>
    <?php if($staff->email == 'gary.dirks@asu.edu'): ?>
    <section class="item" style="width:100%;float:left;">
            <div class="entry">
                <h2><a href="mailto:<?php echo $staff->email; ?>"><?php echo $staff->title; ?></a><br/><small><em><?php echo $staff->jobtitle; ?></em></small></h2>
                <p class="desc"><a href="mailto:<?php echo $staff->email; ?>"><?php echo $staff->email; ?></a></p>
            </div>
        </section>
    
    
    <?php else: ?>
        <section class="item">
            <div class="entry">
                <h2><a href="mailto:<?php echo $staff->email; ?>"><?php echo $staff->title; ?></a><br/><small><em><?php echo $staff->jobtitle; ?></em></small></h2>
                <p class="desc"><a href="mailto:<?php echo $staff->email; ?>"><?php echo $staff->email; ?></a></p>
            </div>
        </section>
     <?php endif; ?>
    <?php endforeach; ?>
    <div class="clear"></div>
</div>