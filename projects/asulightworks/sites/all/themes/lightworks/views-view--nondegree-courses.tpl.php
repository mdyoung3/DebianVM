<?php
	global $mobileObj;
	
	$educations_rows = $view->result;
	foreach ($educations_rows as $id => $row):
		$node = node_load($row->nid);
		if(!empty($node->taxonomy[3])){
			$educationObj = new stdClass();
			$educationObj->title = $node->title;
			$educationObj->isparent = $node->field_parent_course[0]['value'];
			$educationObj->path = $node->path;
			$educationObj->body = $node->body;
			$educations_nodes[] = $educationObj;
		}
	endforeach;
	
	
?>
<div class="course-list">
	<?php foreach($educations_nodes as $education): ?>
        <section class="item <?php echo ($education->isparent == 'Yes') ? '' : 'indent'; ?>">
            <div class="entry">
            	<?php if($education->isparent == 'Yes'): ?>
                <h2><?php echo $education->title; ?></h2>
                <?php else: ?>
                <h3><?php echo $education->title; ?></h3>
                <?php endif; ?>
                <div class="desc"><?php echo $education->body; ?></div>
                <?php /* <p class="more"><a href="<?php echo $education->path; ?>">Learn More</a></p> */ ?>
            </div>
        </section>
    <?php endforeach; ?>
</div>