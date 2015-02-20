<?php

	$news_rows = $view->result;
	foreach ($news_rows as $id => $row):
		$node = node_load($row->nid);
		$news_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($news_nodes,true).'</pre>';
	
?>

<?php foreach($news_nodes as $item): ?>
	<?php
	
		//echo '<pre>'.print_r($item,true).'</pre>';
		$item_url = (strlen($item->field_spotlight_link[0]['url']) > 0) ? $item->field_spotlight_link[0]['url'] : $item->path;
	
	?>
	<article class="article">
        <header><h3><a href="<?php echo $item_url; ?>" target="_blank"><?php echo $item->title; ?></a></h3></header>
        <section>
            <p class="desc"><?php echo $item->short_desc[0]['value']; ?></p>
            <p class="more"><a href="<?php echo $item_url; ?>" target="_blank">view here</a></p>
        </section>
    </article>

<?php endforeach; ?>