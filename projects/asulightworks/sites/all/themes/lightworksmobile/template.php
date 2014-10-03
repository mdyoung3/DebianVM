<?php


function lightworks_init() {
    global $user, $mobileObj;
	echo 'IN';
    if ($mobileObj->isMobile) {
      //load appropriate theme
      //$user->theme = 'lightworksmobile';
      //init_theme();
	  echo 'MOBILE';
    }else{
	  echo 'NORMAL';
	}
}

function get_node_type($nid) {
	$node = node_load(array('nid' => $nid));
    $type = $node->type;
	return $type;	
}

function lightworks_preprocess_node(&$vars){  
    $vars['template_files'][] = 'node-'. $vars['node']->nid;
}
function lightworks_preprocess_page(&$vars) {
	
	//mobileness
	global $mobileObj;
	include_once('mobile-detect.php');
	$mobileObj = new Mobile_Detect();
	$mobileObj->excludeTablets();
	
    global $user;
	// CSS + JAVASCRIPT
    $css = drupal_add_css();
	$scripts = drupal_add_js();
	
	if($user->uid == 0):
		unset($css['all']['module']['modules/user/user.css']);
		unset($css['all']['module']['modules/node/node.css']);
		unset($css['all']['module']['modules/system/defaults.css']);
		unset($css['all']['module']['modules/system/system.css']);
		unset($css['all']['module']['modules/system/system-menus.css']);
		unset($css['all']['module']['sites/all/modules/views/css/views.css']);
		unset($css['all']['module']['sites/all/modules/cck/theme/content-module.css']);
		unset($css['all']['module']['sites/all/modules/cck/modules/filefield/filefield.css']);
		unset($css['all']['module']['sites/all/modules/date/date.css']);
		//
	    unset($scripts['core']['misc/jquery.js']);
		unset($scripts['module']['sites/all/modules/ajax/ajax.js']);
		unset($scripts['module']['sites/all/modules/ajax/jquery/jquery.a_form.packed.js']);
		//
		$scripts['core']['sites/all/themes/lightworks/js/jquery.min.js'] = 1;
	else:
		$css['all']['theme']['sites/all/themes/lightworks/admin.css'] = 1;
	endif;
    // recreate the tempalate variables
    $vars['styles'] = drupal_get_css($css);
    $vars['scripts'] = drupal_get_js('header', $scripts);
	//CUSTOM PAGE TEMPLATE
	$theme_dir = dirname(__FILE__);
	$template_filename = 'page-'.str_replace('node/','',$_GET['q']);
	if(file_exists($theme_dir.'/'.$template_filename.'.tpl.php')){
		$vars['template_files'][] = $template_filename;
	}
	print_r($vars['template_files']);
}

/**
 * Sets the body-tag class attribute.
 */
function lightworks_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
  // If the first character is not a-z, add 'id' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id' . $string;
  }
  return $string;
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function lightworks_breadcrumb($breadcrumb) {
	if (empty($breadcrumb)) {
		//$breadcrumb[] = '<a href="/">Home</a>'; //If no breadcrumbs use Home by default
	}
	$breadcrumb[] = '<a href="#">'.drupal_get_title().'</a>'; //Add Current Page
	foreach($breadcrumb as $node){
		$output .= '<li>';
		$output .= $node;
		$output .= '</li>';
	}
	return $output;
}
/**
 * Allow themable wrapping of all comments.
 */
function lightworks_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<section id="comments">'. $content .'</section>';
  } else {
    return '<section id="comments"><h2>'. t('Comments') .'</h2>'. $content .'</section>';
  }
}

/**
 * Allow theming of publishing information.
 */
function lightworks_node_submitted($node) {
  return t('Published by !username on !datetime',
    array(
      '!username' => '<span class="author">'. theme('username', $node). '</span>',
      '!datetime' => '<time datetime="!fulldatetime">'. format_date($node->created). '</time>',
      '!fulldatetime' => format_date($node->created, 'custom', 'Y-m-d\TH:i:sZ')
    ));
}

function lightworks_comment_submitted($comment) {
  return t('!username | !datetime',
    array(
      '!username' => '<span class="author">'. theme('username', $comment). '</span>',
      '!datetime' => '<time datetime="!fulldatetime">'. format_date($comment->timestamp). '</time>',
      '!fulldatetime' => format_date($comment->created, 'custom', 'Y-m-d\TH:i:sZ')
    ));
}

function lightworks_menu_local_tasks() {
  $output = '';

  if ($primary = menu_primary_local_tasks()) {
    $output .= "<ul class=\"tabs primary clearfix\">\n" . $primary . "</ul>\n";
  }
  if ($secondary = menu_secondary_local_tasks()) {
    $output .= "<ul class=\"tabs secondary clearfix\">\n" . $secondary . "</ul>\n";
  }

  return $output;
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function lightworks_preprocess_block(&$vars, $hook) {
  $block = $vars['block'];

  // Drupal 7 uses a $content variable instead of $block->content.
  $vars['content'] = $block->content;
  // Drupal 7 should use a $title variable instead of $block->subject.
  $vars['title'] = $block->subject;

  // Special classes for blocks.
  $vars['classes_array'][] = 'block-' . $block->module;
  $vars['classes_array'][] = 'region-' . $vars['block_zebra'];
  $vars['classes_array'][] = $vars['zebra'];
  $vars['classes_array'][] = 'region-count-' . $vars['block_id'];
  $vars['classes_array'][] = 'count-' . $vars['id'];

  // Create the block ID.
  $vars['block_html_id'] = 'block-' . $block->module . '-' . $block->delta;

  $vars['edit_links_array'] = array();
  if (user_access('administer blocks')) {
    include_once './' . drupal_get_path('theme', 'lightworks') . '/template.block-editing.inc';
    lightworks_preprocess_block_editing($vars, $hook);
    $vars['classes_array'][] = 'with-block-editing';
  }
  $vars['edit_links'] = !empty($vars['edit_links_array']) ? '<div class="edit">' . implode(' ', $vars['edit_links_array']) . '</div>' : '';
}

?>