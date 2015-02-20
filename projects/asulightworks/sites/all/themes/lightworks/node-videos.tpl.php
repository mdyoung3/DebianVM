<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
QQQQQQQ
<div class="content">
    <header class="header">
        <h1><?php echo $node->title ?><br/>
        <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
        <small><?php echo $node->field_subtitle[0]['value']; ?></small>
        <?php endif; ?>
        </h1>
    </header>
    <section>
    	<iframe src="http://player.vimeo.com/video/<?php echo $node->field_vimeo_url[0]['value']; ?>?title=0&amp;byline=0&amp;portrait=0" width="600" height="450" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
    </section>
</div>
<?php echo views_embed_view('videos','block'); ?>