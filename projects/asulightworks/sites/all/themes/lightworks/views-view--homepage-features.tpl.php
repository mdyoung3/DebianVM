<?php

	global $mobileObj;

	$features_rows = $view->result;
	foreach ($features_rows as $id => $row):
		$node = node_load($row->nid);
		$featureObj = new stdClass();
		$featureObj->title = $node->title;
			$basename = strtolower(str_replace(array(' ','?',',','"','\''),array('-','','','',''),$node->title));
		$featureObj->basename = $basename;
		$featureObj->path = $node->field_url[0]['url'];
		if($mobileObj->isMobile()){
			$featureObj->image = 'http://lightworks.esserdesign.net/sites/all/themes/lightworks/image-scale.php?s=480&i=http://lightworks.esserdesign.net/'.$node->field_image[0]['filepath'];
		}else{
			$featureObj->image = '/'.$node->field_image[0]['filepath'];
		}
		$featureObj->desc = $node->field_short_desc[0]['value'];
		$features_nodes[] = $featureObj;
	endforeach;
	
?>
<div class="prev"><</div>
<div class="next">></div>
<div class="children">
    <ul>
    	<?php foreach($features_nodes as $feature): ?>
        <li class="child feature-<?php echo $feature->basename; ?>" style="background:url(<?php echo $feature->image; ?>) 50% 0 no-repeat;"><div class="holder">
        	<?php if(strlen($feature->path) > 0): ?>
            	<div class="overlay"></div>
	            <a class="hit" href="<?php echo $feature->path; ?>" onClick="javascript:pageTracker._trackPageview('/feature/<?php echo $feature->path; ?>');">read more</a>
            <?php endif; ?>
            <header class="header">
                <h1><?php echo $feature->title; ?></h1>
                <?php if(!$mobileObj->isMobile()): ?>
                <h2><?php echo $feature->desc; ?></h2>
                <?php endif; ?>
            </header>
        </div></li>
        <?php endforeach; ?>
    </ul>
</div>