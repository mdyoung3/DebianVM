<?php
    global $mobileObj;
	$videos_rows = $view->result;
?>
<div class="related-projects">
    <header class="header">
        <h2>Other ASU LightWorks Videos</h2>
    </header>
    <div class="section">
        <ul>
            <?php
                foreach ($videos_rows as $id => $item):
				$video = node_load($item->nid);
            ?>
            <li>
                <div class="thumb">
                    <a href="/<?php echo $video->path; ?>"><img src="/<?php echo $video->field_thumbnail[0]['filepath']; ?>" height="50" width="70" /></a>
                </div>
                <div class="entry">
                    <h3><a href="/<?php echo $video->path; ?>"><?php echo $video->title; ?></a></h3>
                    <p class="more"><a href="/<?php echo $video->path; ?>">watch video &raquo;</a></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>