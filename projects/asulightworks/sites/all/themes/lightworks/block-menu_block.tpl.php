<article id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">
	<header class="header"> 
		<?php if (!empty($block->subject)): ?>
            <h2><?php print $block->subject ?></h2>
        <?php endif;?>
    </header>
    <section class="section">
        <?php print $block->content ?>
    </section>
</article> <!-- /.block -->
