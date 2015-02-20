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
		$initiativeObj->medimg = $node->field_homepage_image[0]['filepath'];
		$initiativeObj->image = $node->field_image[0]['filepath'];
		$initiativeObj->desc = $node->field_short_desc[0]['value'];
		$initiatives_nodes[] = $initiativeObj;
	endforeach;
	
	//echo '<pre>'.print_r($initiatives_nodes,true).'</pre>';
	
?>
<?php if($mobileObj->isMobile()): ?>
<article class="content initiatives-list">
	<header class="header"><h1>LightWorks Initiatives</h1></header>
    <?php if(count($initiatives_nodes) > 0): ?>
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
	<?php endif; ?>
</article>
<?php else: ?>
<article class="initiatives-widget">
    <nav class="nav">
        <header class="header"><h1>LightWorks Initiatives</h1></header>
        <ul>
        	<?php foreach($initiatives_nodes as $initiative): ?>
	            <li><a href="#<?php echo $initiative->basename; ?>"><?php echo $initiative->title; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php if(count($initiatives_nodes) > 0): ?>
		<?php foreach($initiatives_nodes as $initiative): ?>
            <section class="initiative" id="<?php echo $initiative->basename; ?>">
                <header class="header"><h2><?php echo $initiative->title; ?></h2></header>
                <section>
                    <img src="/<?php echo $initiative->medimg; ?>" height="160" width="340" />
                    <p class="desc"><?php echo $initiative->desc; ?></p>
                    <p class="more"><a class="btn" href="<?php echo $initiative->path; ?>">More about <?php echo $initiative->title; ?><span>&raquo;</span></a></p>
                </section>
            </section>
		<?php endforeach; ?>
	<?php endif; ?>
</article>
<?php endif; ?>