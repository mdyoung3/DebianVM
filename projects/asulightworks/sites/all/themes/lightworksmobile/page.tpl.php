<?php include_once('header.php'); ?>
<!--masthead-->
<?php if($editview != 'edit'): ?>
<div id="masthead">
	<?php print $view; ?>
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
		<article class="content">
			<?php if($user->uid): ?>
			<?php if (!empty($messages)): print $messages; endif; ?>
			<?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
			<a id="main-content"></a>
			<?php if (!empty($tabs)): ?><div class="tabs-wrapper clearfix"><?php print $tabs; ?></div><?php endif; ?>
			<?php if (!empty($help)): print $help; endif; ?>
			<?php endif; ?>
			<?php print $content; ?>
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