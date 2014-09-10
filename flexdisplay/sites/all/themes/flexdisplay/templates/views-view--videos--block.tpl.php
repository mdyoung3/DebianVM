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
$news = array();


print "<h2>Welcome</h2>
<h4>Our Vision:</h4>

Our vision is to evolve and leverage the Flexible Electronics and Display Center’s world-class flexible display capabilities, in concert with other ASU synergistic research, to achieve a leadership position in the emerging flexible electronics industry and establish ASU as a high-value government and industry resource.

<h4>Our Mission:</h4>

Our mission is to advance full-color, video rate, flexible display technology and catalyze development of a vibrant flexible display and flexible electronics industry to produce integrated electronic systems with advanced functionality.  The FDC will collaborate with government, academia and industry to provide comprehensive flexible electronics capabilities that bridge the high risk, resource intensive gap between innovation and product development in an information-secure environment for process, tool, and materials co-development and evaluation.  Integral to our mission is integrating the concept of sustainable microelectronics processing into all FDC activities.";

print "<div id='video-links'>";

print "<h4>Recent Videos and Printable Brochure:</h4>";
foreach($result as $k => $v) {
$title = $v->node_title;
$link = $v->field_field_video_brochure_link[0]['raw']['value'];	

print "<a href=$link>" . $title . "</a> &nbsp;&nbsp;/ &nbsp;&nbsp; ";
/*print "<pre>";
print_r($result);
print "</pre>";*/
}

print "</div>";

print "<div id='brochure_content'>";

print "<a href='/flexdisplay/sites/all/themes/flexdisplay/flexdisplay/FDC_brochure_february_2012.pdf'><img src='/flexdisplay/sites/all/themes/flexdisplay/images/brochure-mini.png' alt='center brochure'/></a> ";

print"</div>";

?>

