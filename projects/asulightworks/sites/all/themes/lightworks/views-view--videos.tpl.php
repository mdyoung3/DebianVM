<?php

	$videos_rows = $view->result;
	foreach ($videos_rows as $id => $row):
		$node = node_load($row->nid);
		$videos_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($videos_nodes,true).'</pre>';
	
?>

<?php foreach($videos_nodes as $item): ?>
	<?php
	
		//echo '<pre>'.print_r($item,true).'</pre>';
		$item_url = (strlen($item->field_url[0]['url']) > 0) ? $item->field_url[0]['url'] : $item->path;
	
	?>
	<article class="article">
        <section>
        	<div class="thumb">
                    <a href="/<?php echo $item->path; ?>"><img src="/<?php echo $item->field_thumbnail[0]['filepath']; ?>" height="75" width="100" /></a>
            </div>
            <div class="entry">
            	<h3><a href=/"<?php echo $item->path; ?>"><?php echo $item->title; ?></a></h3>
                <p class="more"><a href="/<?php echo $item->path; ?>">Watch Video</a></p>
            </div>
        </section>
    </article>

<?php endforeach; ?>