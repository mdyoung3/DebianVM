<div class="content">
    <header class="header">
        <h1><?php echo $node->title; ?></h1>
        <?php echo $node->body; ?>
    </header>
    <?php echo views_embed_view('overview'); ?>
</div>