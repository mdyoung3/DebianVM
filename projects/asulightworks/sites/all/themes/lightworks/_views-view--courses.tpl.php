<?php
	global $mobileObj;

	$educations_rows = $view->result;
	foreach ($educations_rows as $id => $row):
		$node = node_load($row->nid);
		$educationObj = new stdClass();
		$educationObj->title = $node->title;
		$educationObj->path = $node->path;
		$educations_nodes[] = $educationObj;
	endforeach;
	
	//echo '<pre>'.print_r($educations_nodes,true).'</pre>';
	
?>
<div class="simple-list">
	<?php foreach($educations_nodes as $education): ?>
        <section class="item">
            <div class="entry">
                <h2><a href="<?php echo $education->path; ?>"><?php echo $education->title; ?></a></h2>
                <p class="desc"><?php echo $education->body; ?></p>
                <p class="more"><a href="<?php echo $education->path; ?>">Learn More</a></p>
            </div>
        </section>
    <?php endforeach; ?>
</div>