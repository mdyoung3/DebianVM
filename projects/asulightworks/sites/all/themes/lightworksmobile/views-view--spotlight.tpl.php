<?php

	$spotlight_rows = $view->result;
	foreach ($spotlight_rows as $id => $row):
		$node = node_load($row->nid);
		$spotlight_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($spotlight_nodes,true).'</pre>';
	
?>

<?php foreach($spotlight_nodes as $item): ?>
	<?php
	
		//echo '<pre>'.print_r($item,true).'</pre>';
		$item_url = (strlen($item->field_url[0]['url']) > 0) ? $item->field_url[0]['url'] : $item->path;
	
	?>
	<article class="article">
        <header><h3><a href="<?php echo $item_url; ?>"><?php echo $item->title; ?></a></h3></header>
        <section>
            <p class="desc"><?php echo $item->field_short_desc[0]['value']; ?></p>
            <p class="more"><a href="<?php echo $item_url; ?>">view here</a></p>
        </section>
    </article>

<?php endforeach; ?>