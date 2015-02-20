<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
<div class="content event">
    <header class="header">
        <h1><?php echo $node->title ?><br/>
        <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
        <small><?php echo $node->field_subtitle[0]['value']; ?></small>
        <?php endif; ?>
        </h1>
    </header>
    <section>
    	<p class="date"><?php echo $node->field_simple_date[0]['value']; ?></p>
    	<div class="desc"><?php echo $node->body; ?></div>
        <?php if(strlen($node->field_url[0]['url']) >0): ?>
        <p class="more"><a href="<?php echo $node->field_url[0]['url']; ?>"><?php echo $node->field_url[0]['title']; ?> &raquo;</a></p>
        <?php endif; ?>
    </section>
</div>