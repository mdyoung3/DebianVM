<?php if($block->bid == 27):  //Spotlight  ?>

    <article class="widget orange widget-<?php echo $block->bid; ?>">
        <header class="header"> 
            <?php if (!empty($block->subject)): ?>
                <h2><?php print $block->subject ?></h2>
            <?php endif;?>
        </header>
        <section class="section">
            <?php print $block->content; ?>
        </section>
    </article> <!-- /.block -->
    
<?php elseif($block->bid == 29):  //Introducing LightWorks ?>

    <article class="widget widget-<?php echo $block->bid; ?> green">
        <header class="header"> 
            <?php if (!empty($block->subject)): ?>
                <h2><?php print $block->subject ?></h2>
            <?php endif;?>
        </header>
        <section class="section">
            <?php print $block->content; ?>
        </section>
    </article> <!-- /.block -->

<?php elseif($block->bid == 33):  //Connect With LightWorks ?>

    <article class="widget widget-<?php echo $block->bid; ?> black">
        <header class="header"> 
            <?php if (!empty($block->subject)): ?>
                <h2><?php print $block->subject ?></h2>
            <?php endif;?>
        </header>
        <section class="section">
            <?php print $block->content; ?>
        </section>
    </article> <!-- /.block -->

<?php elseif($block->bid == 35):  //Contact LightWorks ?>

    <article class="widget widget-<?php echo $block->bid; ?> green">
        <header class="header"> 
            <?php if (!empty($block->subject)): ?>
                <h2><?php print $block->subject ?></h2>
            <?php endif;?>
        </header>
        <section class="section">
            <?php print $block->content; ?>
        </section>
    </article> <!-- /.block -->
    
<?php else: ?>

    <article class="widget widget-<?php echo $block->bid; ?> blue">
        <header class="header"> 
            <?php if (!empty($block->subject)): ?>
                <h2><?php print $block->subject ?></h2>
            <?php endif;?>
        </header>
        <section class="section">
            <?php print $block->content; ?>
        </section>
    </article> <!-- /.block -->
    
<?php endif; ?>