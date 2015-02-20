<?php
	global $mobileObj;

	$initiatives_rows = $view->result;
	foreach ($initiatives_rows as $id => $row):
		$node = node_load($row->nid);
		$initiativeObj = new stdClass();
		$initiativeObj->title = $node->title;
			list($pre,$pageurl) = explode('/',$node->path);
			list($basename) = explode('.',$pageurl);
		$initiativeObj->basename = $basename;
		if(strlen($node->field_url[0]['url']) > 0){
			$initiativeObj->path = $node->field_url[0]['url'];
		}else{
			$initiativeObj->path = '/'.$node->path;
		}
		$initiativeObj->image = $node->field_image[0]['filepath'];
		$initiativeObj->thumb = $node->field_thumbnail[0]['filepath'];
		$initiativeObj->desc = $node->field_short_desc[0]['value'];
		$initiatives_nodes[] = $initiativeObj;
	endforeach;
	
	//echo '<pre>'.print_r($initiatives_nodes,true).'</pre>';
	
?>
<div class="initiatives-list">
	<?php if($mobileObj->isMobile()): ?>
    <?php foreach($initiatives_nodes as $initiative): ?>
        <section class="initiative">
            <div class="thumb">
                <a href="<?php echo $initiative->path; ?>"><img src="/<?php echo $initiative->image; ?>" height="130" width="435" /></a>
            </div>
            <div class="entry">
                <h2><a href="<?php echo $initiative->path; ?>"><?php echo $initiative->title; ?></a></h2>
                <p class="desc"><?php echo $initiative->desc; ?></p>
                <p class="more"><a href="<?php echo $initiative->path; ?>">Learn More</a></p>
            </div>
        </section>
    <?php endforeach; ?>
<?php else: ?>
	<?php foreach($initiatives_nodes as $initiative): ?>
        <section class="initiative">
            <div class="thumb">
                <a href="<?php echo $initiative->path; ?>"><img src="/<?php echo $initiative->thumb; ?>" height="100" width="140" /></a>
            </div>
            <div class="entry">
                <h2><a href="<?php echo $initiative->path; ?>"><?php echo $initiative->title; ?></a></h2>
                <p class="desc"><?php echo $initiative->desc; ?></p>
                <p class="more"><a href="<?php echo $initiative->path; ?>">Learn More</a></p>
            </div>
            <div class="clear"></div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
	<div class="clear"></div>
</div>