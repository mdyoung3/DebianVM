<?php
// $Id: views-view-row-rss.tpl.php,v 1.1 2008/12/02 22:17:42 merlinofchaos Exp $
/**
 * @file views-view-row-rss.tpl.php
 * Default view template to display a item in an RSS feed.
 *
 * @ingroup views_templates
 */
?>
  <item>
    <title><?php print $title; ?></title>
    <link><?php print $link; ?></link>
    <description><![CDATA[<?php print $node->field_short_desc[0]['value'] . " <a href='" . $node->field_spotlight_link[0]['url'] . "'>view here</a>"; ?>]]></description>
    <?php print $item_elements; ?>
  </item>
