<?php 

	global $user,$mobileObj;
	//echo '<pre align="leftz">'.print_r($node,true).'</pre>';
	$adminclass = ($user->uid) ? 'admin' : '';
	if(strpos($_SERVER['REQUEST_URI'],'/user/') !== false || strpos($_SERVER['REQUEST_URI'],'/node/') !== false || strpos($_SERVER['REQUEST_URI'],'/admin/') !== false){
		$editview = 'edit';															
	}else{
		$editview = 'no-edit';
	}
	list($pageclass) = explode('.',$node->path);
	$pageclass = str_replace(array('/'),array('-page '),$pageclass).'-page';
	//print_r($mobileObj);
	$path = drupal_get_path_alias($_GET['q']);
    $pieces = explode("/",$path);
?>
<!doctype html public>
    <!--[if lt IE 7 ]> <html lang="en-us" dir="ltr" class="no-js ie6"> <![endif]-->
    <!--[if IE 7 ]>    <html lang="en-us" dir="ltr" class="no-js ie7"> <![endif]-->
    <!--[if IE 8 ]>    <html lang="en-us" dir="ltr" class="no-js ie8"> <![endif]-->
    <!--[if IE 9 ]>    <html lang="en-us" dir="ltr" class="no-js ie9"> <![endif]-->   
    <!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-us" dir="ltr" class="no-js"> <!--<![endif]-->
    <head>
        <?php print $head ?>
        <title><?php print $head_title ?></title>
        <meta name="description" content="
		<?php 
			if($node->field_short_desc){
				echo $node->field_short_desc[0]['value'];
			}else{
				echo substr($node->content['body']['#value'],0,100).'...';
			}
		?>
        " />
        <meta http-equiv="imagetoolbar" content="false" /> 
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="no" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <?php if($mobileObj->isMobile()): ?>
        <meta name="viewport" content="user-scalable=no, width=device-width, minimum-scale=1.0, maximum-scale=1.0" /> 
        <?php endif; ?>
        <?php print $styles ?>
        <!--[if lte IE 8 ]>
        	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/lightworks/ie.css" />
        <![endif]-->
        <!--[if lte IE 7 ]>
        	<style>.masthead ul{margin-top:52px;} .masthead .arrow{margin-top:52px;}</style>
        <![endif]-->
        <!--[if lt IE 7 ]>
        	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/lightworks/ie6.css" />
        <![endif]-->
		<?php print $scripts ?>
        <script>
			var is_mobile = <?php echo ($mobileObj->isMobile()) ? 'true' : 'false'; ?>;
			var is_admin = <?php echo ($user->uid) ? 'true': 'false'; ?>;
 		</script>
        <script src="http://enhancejs.googlecode.com/svn-history/r148/trunk/tests/visual/js/modernizr.js"></script>
        <?php if($editview != 'edit'): ?>
        <script src="/sites/all/themes/lightworks/js/jquery-libs.js"></script>
        <script src="/sites/all/themes/lightworks/js/init.js"></script>
        <?php endif; ?>
        <?php include('/afs/asu.edu/www/asuthemes/4.0/heads/lightworks.shtml'); ?>
    </head>
    
    <body class="<?php echo $pageclass; ?> <?php echo $adminclass; ?> <?php echo $editview; ?> <?php print 'section-' . $pieces[0]; ?>">
    <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-4670354-8");
pageTracker._trackPageview();
} catch(err) {}

var pageTracker2 = _gat._getTracker("UA-4670354-3");
pageTracker2._setDomainName(".asu.edu");
pageTracker2._setAllowLinker(true);
pageTracker2._trackPageview();  

</script>
<script type="text/javascript">
	var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4670354-25']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
    	<div id="background"><div id="container">
        	<!--header-->
            <header id="header">
              <div id="header-inner">
                <?php include('/afs/asu.edu/www/asuthemes/4.0/headers/lightworks.shtml'); ?>
                </div>
            </header>
            <!--header END-->
            <div id="page">
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
										if($mi['link']['expanded'] == 1):
											if(!empty($mi['below'])):
												echo '<ul class="subnav">';	
													foreach($mi['below'] as $bkey => $bmi){
														if($bmi['link']['hidden'] != 1):
															$active = ($bmi['link']['in_active_trail'] == 1) ? 'subnav-active' : '';
															$nodeclass = str_replace(array(' ','&'),array('-','and'),strtolower($bmi['link']['link_title']));
															echo '<li class="'.$nodeclass.' secondary '.$active.'">';
															if(strpos($bmi['link']['href'],'node') !== false){
																echo '<a class="child" href="/'.drupal_lookup_path('alias', $bmi['link']['href']).'">'.$bmi['link']['link_title'].'</a>';		
															}else{
																echo '<a class="child" href="'.$bmi['link']['href'].'">'.$bmi['link']['link_title'].'</a>';		
															}
															echo '</li>';
														endif;
													}
												echo '</ul>';
											endif;
										endif;
										echo '</li>';
									endif;
                                }
                                //echo '<pre>'.print_r($tree,true).'</pre>';
                            }
                            
                        ?>
                    </ul>
                    <div class="clear"></div>
                </nav>
                <!--navigation END-->