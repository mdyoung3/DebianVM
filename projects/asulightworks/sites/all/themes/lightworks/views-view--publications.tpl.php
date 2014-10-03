<?php

	$publications_rows = $view->result;
	foreach ($publications_rows as $id => $row):
		$node = node_load($row->nid);
		$publications_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($publications_nodes,true).'</pre>';
	
?>

<?php foreach($publications_nodes as $item): ?>
	<?php
	
		//echo '<pre>'.print_r($item,true).'</pre>';
		$item_url = (strlen($item->field_url[0]['url']) > 0) ? $item->field_url[0]['url'] : $item->path;
	
	?>
	<article class="article">
        <header><h3><a href="/<?php echo $item->field_file[0]['filepath']; ?>" target="_blank"><?php echo $item->title; ?></a></h3></header>
        <section>
        	<div class="thumb">
            	<a href="/<?php echo $item->field_file[0]['filepath']; ?>" target="_blank"><img src="/<?php echo $item->field_thumbnail[0]['filepath']; ?>" /></a>
            </div>
            <div class="entry">
            	<p class="desc"><?php echo $item->field_short_desc[0]['value']; ?></p>
	            <p class="more"><a href="/<?php echo $item->field_file[0]['filepath']; ?>" target="_blank">download here &raquo;</a></p>
			</div>
            <div class="clear"></div>
        </section>
    </article>

<?php endforeach; ?>