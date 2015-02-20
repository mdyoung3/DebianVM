<?php if($node->type == 'primary'): ?>
    <div class="intro row" id="node-<?php echo $node->nid; ?>">
        <div class="masthead">
            <h1 class="title"><a href="#!/intro" class="main"><?php echo $node->field_category_label[0]['value']; ?></a></h1>
        </div>
        <div class="children">
            <ul>
                <li class="child"><img src="/sites/all/themes/tcilh/images/headers/<?php echo strtolower($node->field_category_label[0]['value']); ?>.jpg" height="536" width="976"/></li>
            </ul>
        </div>
    </div>
<?php endif;  ?>

<?php if($node->type == 'primary'):
	
	$active_menu = variable_get('menu_primary_links_source', 'primary-links');  
	if ($active_menu != "navigation") {
		$tree = menu_tree_page_data($active_menu);
		//echo '<pre>'.print_r($tree,true).'</pre>';
		
		foreach ($tree as $key => $mi) {
			if($mi['link']['link_title'] == $node->title && !empty($mi['below'])){
				
				foreach($mi['below'] as $bkey => $bmi){
					$nid = substr($bmi['link']['link_path'],5);
					$node = node_load(array('nid' => $nid));
					$base = str_replace(' ','-',strtolower($node->title));
					$ntype = get_node_type($node->nid);
					$ctype = $node->field_contenttype[0]['value'];
					?>
                	<div class="section row" id="<?php echo $base; ?>">
                        <div class="masthead">
                        	<h1 class="title"><a href="/<?php echo drupal_lookup_path('alias', $bmi['link']['href']); ?>"><?php echo trim($node->field_category_label[0]['value']); ?></a></h1>
                        </div>
                        <?php echo views_embed_view($ctype); ?>
                        <div class="clear"></div>
                    </div>
                <?php
				}
			}
		}
	}
?>
<?php elseif($node->type == 'secondary'): ?>
	<?php
		$ntype = get_node_type($node->nid);
		$ctype = $node->field_contenttype[0]['value'];
	?>
	<div class="section row" id="<?php echo $ctype; ?>">
        <div class="masthead">
            <h1 class="title"><?php echo $node->title; ?></h1>
        </div>
        <?php echo views_embed_view($ctype); ?>
    </div>
<?php endif; ?>