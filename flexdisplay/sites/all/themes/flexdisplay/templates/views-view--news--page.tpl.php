<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<?php
$result = $view->result;
$feature_stories = array();

print "<div id='news-main'>";


foreach($result as $k => $v) {
/*$path = $v->field_field_featured_story_image[0]['raw']['uri'];
$img_path = str_replace('public://','/sites/default/files/', $path);
$body = $v->field_body[0]['raw']['safe_value'];
$link = $v->field_field_featured_link[0]['raw']['safe_value'];
$title = $v->node_title;
$teaser = $v->field_field_featured_teaser[0]['raw']['safe_value'];*/
$pdf = $v->field_field_news_pdf[0]['raw']['uri'];
$pdf_name = $v-> field_field_news_pdf[0]['raw']['filename'];
$date = $v->field_field_news_date[0]['raw']['value'];
	$partial_date = date('M j, Y', $date);

print $partial_date . "-" . "<a href=$pdf>" . $pdf_name . "</a>";
/*print "<div class='featured_body'>";
print "<img src='" . $img_path . "' alt='slider image' />";
print "<h3><a href='#inline_text$i' target='_blank' class='inline_content featured_title'>" . $title . "</a></h3>";
print "<p class='teasers_featured'>" . $teaser . "</p>";
print "<div style='display:none'>";
print "<div id='inline_text$i' class='featured_text'>";
print "<h3>" . $title . "</h3>";
print "<p class='italic_text'>Updated on " . $partial_date . "</p>";
print $body;
print "<h4 class='border_top'>Image Gallery</h4>";
print "<img src='" . $img_path . "' alt='slider image' />";
print "</div>";
print "</div>";
print "<p class='featured_learn'><a href='#inline_text$i' target='_blank' class='inline_content'>Learn More</a></p>";
print "</div>";*/
print "<pre>";
//print_r($result);
print "</pre>";

print "</div>";
}
?>
