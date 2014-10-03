<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
<div class="content">
    <header class="header">
        <h1><?php echo $node->title ?><br/>
        <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
        <small><?php echo $node->field_subtitle[0]['value']; ?></small>
        <?php endif; ?>
        </h1>
        <p><?php echo $node->field_short_desc[0]['value']; ?></p>
    </header>
    <section>
		<?php echo views_embed_view('events','block_1'); ?>    
    </section>
</div>
