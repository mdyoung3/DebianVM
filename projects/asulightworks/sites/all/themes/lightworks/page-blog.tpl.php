<?php include_once('header.php'); ?>

<!--content-->
<div id="content">
	<!--left-col-->
	<div id="main">
		<?php if($editview != 'edit'): ?>
		<nav id="breadcrumbs">
			<ul>
				<?php print_r($breadcrumb); ?>
			</ul>
			<div class="sharepoint"><a href="">SharePoint</a></div>
		</nav>
        <?php endif; ?>
		<article >
			<?php if($user->uid): ?>
			<?php if (!empty($messages)): print $messages; endif; ?>
			<?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
			<a id="main-content"></a>
			<?php if (!empty($tabs)): ?><div class="tabs-wrapper clearfix"><?php print $tabs; ?></div><?php endif; ?>
			<?php if (!empty($help)): print $help; endif; ?>
			<?php endif; ?>
            <div class="content">
                <header class="header">
                    <h1>LightWorks Blog</h1>
                </header>
                <?php print $content; ?>
			</div>
		</article>
	</div>
	<!--left-col END-->
	<!--right-col-->
    <?php if ($right && $editview != 'edit'): ?>
    <aside id="aside">
		<?php print $right; ?>
		<div class="clear"></div>
	</aside>
    <?php endif; ?>
	<!--right-col END-->
    <div class="clear"></div>
</div>
<!--content END-->
<?php include_once('footer.php'); ?>