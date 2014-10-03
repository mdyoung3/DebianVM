<div class="content">
    <header class="header">
        <h1><?php echo $node->title; ?></h1>
        <p><?php echo $node->field_short_desc[0]['value']; ?></p>
    </header>
    <?php echo views_embed_view('centers'); ?>
</div>