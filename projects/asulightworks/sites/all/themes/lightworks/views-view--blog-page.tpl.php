<?php
// $Id: views-view.tpl.php,v 1.13 2009/06/02 19:30:44 merlinofchaos Exp $
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $css_name: A css-safe version of the view name.
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
?>
<?php global $user; ?>

<?php

	$news_rows = $view->result;
	foreach ($news_rows as $id => $row):
		$node = node_load($row->nid);
		$news_nodes[] = $node;
	endforeach;
	
	//echo '<pre>'.print_r($news_nodes,true).'</pre>';
	
?>
<?php foreach($news_nodes as $item): ?>
	<article class="article">
        <header><h2><a href="/<?php echo $item->path; ?>"><?php echo $item->title; ?></a></h2></header>
        <section>
        <?php echo "<span class='pub'>published " . date("F j, Y, g:i a",$item->created) . "</span>"; ?>
            <?php echo $item->body; ?>
            <?php if($user->uid): ?>
            <span><a href="/node/<?php echo $item->nid; ?>/edit">Edit</a></span>
            <?php endif; ?>
        </section>
    </article>

<?php endforeach; ?>
<?php if ($pager): ?>
<?php print $pager; ?>
<?php endif; ?>
