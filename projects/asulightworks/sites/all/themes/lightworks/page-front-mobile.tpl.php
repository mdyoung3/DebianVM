<?php include_once('header-mobile.php'); ?>
<!--masthead-->
<?php if($editview != 'edit'): ?>
<div id="masthead">
	<?php echo views_embed_view('homepage_features'); ?>
</div>
<?php endif; ?>
<!--masthead END-->
<!--navigation-->
<nav id="navigation">
    <ul>
        <?php 
            $active_menu = variable_get('menu_primary_links_source', 'primary-links');  
			if ($active_menu != "navigation") {
				$tree = menu_tree_page_data($active_menu);
				
				foreach ($tree as $key => $mi) {
					if($mi['link']['hidden'] != 1):
						$active = ($mi['link']['in_active_trail'] == 1) ? 'active' : '';
						$nodeclass = str_replace(array(' ','&'),array('-','and'),strtolower($mi['link']['link_title']));
						echo '<li class="'.$nodeclass.' primary '.$active.'">';
						echo '<a class="parent" href="/'.drupal_lookup_path('alias', $mi['link']['href']).'">'.$mi['link']['link_title'].'</a>';
						echo '</li>';
					endif;
				}
				//echo '<pre>'.print_r($tree,true).'</pre>';
			}
            
        ?>
        <li class="primary"><a href="/#contact" class="anchor parent">Contact</a></li>
    </ul>
    <div class="clear"></div>
</nav>
<div class="continue"><a href="#content" class="anchor">Continue to Content</a></div>
<!--navigation END-->
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