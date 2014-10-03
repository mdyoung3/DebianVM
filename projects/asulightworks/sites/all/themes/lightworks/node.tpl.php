<div class="content">
<header class="header">
    <h1><?php echo $node->title; ?></h1>
</header>
<?php 
if(strlen($node->content['body']['#value']) > 0): ?>
    <div class="page-entry">
	<?php echo $node->content['body']['#value']; ?>
    </div>
<?php endif; ?>
</div>