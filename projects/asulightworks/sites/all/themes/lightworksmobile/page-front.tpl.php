<?php include_once('header.php'); ?>
<!--masthead-->
<?php if($editview != 'edit'): ?>
<div id="masthead">
	<?php echo views_embed_view('homepage_features'); ?>
</div>
<?php endif; ?>
<!--masthead END-->
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
        <?php if($user->uid): ?>
            <?php if (!empty($messages)): print $messages; endif; ?>
            <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
            <a id="main-content"></a>
            <?php if (!empty($help)): print $help; endif; ?>
        <?php endif; ?>
        <?php print $content; ?>
	</div>
	<!--left-col END-->
	<!--right-col-->
	<?php //if ($right && $editview != 'edit'): ?>
        <aside id="aside">
		<?php print $right; ?>
		<div class="clear"></div>
	</aside>
    <?php //endif; ?>
	<!--right-col END-->
</div>
<!--content END-->
<?php include_once('footer.php'); ?>