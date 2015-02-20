<?php 

	global $mobileObj;

	$mastheads_rows = $view->result;
	foreach ($mastheads_rows as $id => $row):
		$node = node_load($row->nid);
		$mastheadObj = new stdClass();
		$mastheadObj->title = $node->title;
		if($mobileObj->isMobile()){
			$mastheadObj->image = 'http://'.$_SERVER['SERVER_NAME'].'/sites/all/themes/lightworks/image-scale.php?s=480&i=http://'.$_SERVER['SERVER_NAME'].'/'.$node->field_image[0]['filepath'];
		}else{
			$mastheadObj->image = '/'.$node->field_image[0]['filepath'];
		}
		$mastheadObj->desc = $node->field_short_desc[0]['value'];
		$mastheads_nodes[] = $mastheadObj;
	endforeach;
	
?>
<div class="children">
    <ul>
    	<?php foreach($mastheads_nodes as $masthead): ?>
        <li class="child" style="background:url(<?php echo $masthead->image; ?>) 50% 0 no-repeat;"><div class="holder">
            <header class="header">
                <h1><?php echo $masthead->title; ?></h1>
                <?php if(!$mobileObj->isMobile()): ?>
                <h2><?php echo $masthead->desc; ?></h2>
                <?php endif; ?>
            </header>
        </div></li>
        <?php endforeach; ?>
    </ul>
</div>