<?php
	global $mobileObj;

	$centers_rows = $view->result;
	foreach ($centers_rows as $id => $row):
		$node = node_load($row->nid);
		$centerObj = new stdClass();
		$centerObj->path = $node->path;
		$centerObj->title = $node->title;
		$centerObj->desc = $node->field_short_desc[0]['value'];
		$centerObj->url = $node->field_url[0]['url'];
		$centerObj->linktitle = $node->field_url[0]['title'];
		$centers_nodes[] = $centerObj;
	endforeach;
	
	//echo '<pre>'.print_r($centers_nodes,true).'</pre>';
	
?>
<div class="simple-list centers-list">
	<?php foreach($centers_nodes as $center): ?>
        <section class="item">
            <div class="entry">
                <h2>
                	<?php if(strlen($center->url) >0): ?>
                    	<a href="<?php echo $center->url; ?>"><?php echo $center->title; ?></a>
                    <?php else: ?>
		                <?php echo $center->title; ?>
                	<?php endif; ?>
                </h2> 
                <p class="more">
					 <?php if(strlen($center->url) >0): ?>
                        <a href="<?php echo $center->url; ?>"><?php echo $center->linktitle; ?></a>
                    <?php endif; ?>
                </p>
                
            </div>
        </section>
    <?php endforeach; ?>
</div>