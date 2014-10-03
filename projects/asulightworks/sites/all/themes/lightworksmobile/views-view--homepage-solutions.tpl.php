<?php

	$solutions_rows = $view->result;
	foreach ($solutions_rows as $id => $row):
		$node = node_load($row->nid);
		$solutionObj = new stdClass();
		$solutionObj->title = $node->title;
			list($pre,$pageurl) = explode('/',$node->path);
			list($basename) = explode('.',$pageurl);
		$solutionObj->basename = $basename;
		$solutionObj->path = $node->path;
		$solutionObj->thumb = $node->field_thumbnail[0]['filepath'];
		$solutionObj->desc = $node->field_short_desc[0]['value'];
		$solutions_nodes[] = $solutionObj;
	endforeach;
	
	//echo '<pre>'.print_r($solutions_nodes,true).'</pre>';
	
?>
<article class="content solutions-widget">
    <header class="header"><h1>Energy Solutions</h1></header>
	<?php foreach($solutions_nodes as $solution): ?>
        <section class="solution">
            <div class="thumb">
                <a href="<?php echo $solution->path; ?>"><img src="/<?php echo $solution->thumb; ?>" height="100" width="140" /></a>
            </div>
            <div class="entry">
                <h2><a href="<?php echo $solution->path; ?>"><?php echo $solution->title; ?></a></h2>
                <p class="desc"><?php echo $solution->desc; ?></p>
                <p class="more"><a href="<?php echo $solution->path; ?>">Learn More</a></p>
            </div>
        </section>
    <?php endforeach; ?>
</article>