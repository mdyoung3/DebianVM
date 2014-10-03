<?php

	$events_rows = $view->result;
	foreach ($events_rows as $id => $row):
		$node = node_load($row->nid);
		$events_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($events_nodes,true).'</pre>';
	
?>

<?php foreach($events_nodes as $item): ?>
	<?php
	
		//echo '<pre>'.print_r($item,true).'</pre>';
		$item_url = (strlen($item->field_url[0]['url']) > 0) ? $item->field_url[0]['url'] : '/'.$item->path;
	
	?>
	<article class="article">
        <header>
        	<h3><a href="<?php echo $item_url; ?>"><?php echo $item->title; ?></a></h3>
            <p class="date"><?php echo $item->field_simple_date[0]['value']; ?></p>
        </header>
        <section>
            <p class="desc"><?php echo $item->field_short_desc[0]['value']; ?></p>
            <p class="more"><a href="<?php echo $item_url; ?>">learn more &raquo;</a></p>
        </section>
    </article>

<?php endforeach; ?>