<?php
	global $mobileObj;

	$overviews_rows = $view->result;
	foreach ($overviews_rows as $id => $row):
		$node = node_load($row->nid);
		$overviewObj = new stdClass();
		$overviewObj->title = $node->title;
			list($pre,$pageurl) = explode('/',$node->path);
			list($basename) = explode('.',$pageurl);
		$overviewObj->basename = $basename;
		$overviewObj->path = $node->path;
		$overviewObj->desc = $node->field_short_desc[0]['value'];
		$overviews_nodes[] = $overviewObj;
	endforeach;
	
	//echo '<pre>'.print_r($overviews_nodes,true).'</pre>';
	
?>
<div class="simple-list">
	<?php foreach($overviews_nodes as $overview): ?>
        <section class="item">
            <div class="entry">
                <h2><a href="<?php echo $overview->path; ?>"><?php echo $overview->title; ?></a></h2>
                <p class="desc"><?php echo $overview->desc; ?></p>
                <p class="more"><a href="<?php echo $overview->path; ?>">Learn More</a></p>
            </div>
        </section>
    <?php endforeach; ?>
</div>