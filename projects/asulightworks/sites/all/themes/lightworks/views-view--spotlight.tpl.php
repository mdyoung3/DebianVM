<?php

	$spotlight_rows = $view->result;
	foreach ($spotlight_rows as $id => $row):
		$node = node_load($row->nid);
		$spotlight_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($spotlight_nodes,true).'</pre>';
	
?>

<?php foreach($spotlight_nodes as $item): ?>
	<article class="article">
        <header>
        	<h3>
           	<?php if(strlen($item->field_spotlight_link[0]['url']) > 0) : ?>
            	<a href="<?php echo $item->field_spotlight_link[0]['url']; ?>" target="_blank"><?php echo $item->title; ?></a>
            <?php else: ?>
            	<a href="<?php echo $item->path; ?>"><?php echo $item->title; ?></a>
            <?php endif; ?>
        		
            </h3>
        </header>
        <section>
            <p class="desc"><?php echo $item->field_short_desc[0]['value']; ?></p>
            <?php if(strlen($item->field_spotlight_link[0]['url']) > 0) : ?>
            	<p class="more"><a href="<?php echo $item->field_spotlight_link[0]['url']; ?>" target="_blank">view here</a></p>
            <?php else: ?>
            <p class="more"><a href="<?php echo $item->path; ?>">view here</a></p>
            <?php endif; ?>
        </section>
    </article>

<?php endforeach; ?>