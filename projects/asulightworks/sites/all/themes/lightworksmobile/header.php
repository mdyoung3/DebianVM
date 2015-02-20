<?php 
	global $user;
	//echo '<pre align="leftz">'.print_r($node,true).'</pre>';
	$adminclass = ($user->uid) ? 'admin' : '';
	if(strpos($_SERVER['REQUEST_URI'],'/user/') !== false || strpos($_SERVER['REQUEST_URI'],'/node/') !== false || strpos($_SERVER['REQUEST_URI'],'/admin/') !== false){
		$editview = 'edit';															
	}else{
		$editview = 'no-edit';
	}
	list($pageclass) = explode('.',$node->path).'-page';
	print_r($css);
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
        <meta http-equiv="imagetoolbar" content="false" /> 
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="no" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <?php print $styles ?>
        <!--[if lte IE 8 ]>
        	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/lightworks/ie.css" />
        <![endif]-->
        <!--[if lte IE 7 ]>
        	<style>.masthead ul{margin-top:52px;} .masthead .arrow{margin-top:52px;}</style>
        <![endif]-->
		<?php print $scripts ?>
        <script>
			var is_admin = <?php echo ($user->uid) ? 'true': 'false'; ?>;
 		</script>
        <script src="http://enhancejs.googlecode.com/svn-history/r148/trunk/tests/visual/js/modernizr.js"></script>
        <?php if($editview != 'edit'): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="/sites/all/themes/lightworks/js/jquery.scrollto.min.js"></script>
		<script src="/sites/all/themes/lightworks/js/jquery.serialScroll-1.2.2.js"></script>
        <script src="/sites/all/themes/lightworks/js/init.js"></script>
        <?php endif; ?>
    </head>
    <body class="<?php echo $pageclass; ?> <?php echo $adminclass; ?> <?php echo $editview; ?>">
    	<div id="background"><div id="container">
        	<!--header-->
            <header id="header">
                <div id="asu_hdr" class=" asu_hdr_white" style="height:60px;overflow:hidden;">
                    <div id="asu_logo">
                        <a target="_top" href="/" title="ASU LightWorks"><img src="/sites/all/themes/lightworks/grfx/logo-w-asu.gif" alt="ASU LightWorks" height="45" width="225" style="margin-top:8px" title="ASU LightWorks" /></a>
                    </div>
                    <div id="asu_nav_wrapper">
                        <h2 class="hidden">Navigation: ASU Universal</h2>
                        <ul id="asu_universal_nav">
                            <li><a target="_top" href="http://www.asu.edu/">ASU Home</a></li>
                            <li><a target="_top" href="https://my.asu.edu/">My ASU</a></li>
                            <li><a target="_top" href="http://www.asu.edu/colleges/">Colleges &amp; Schools</a></li>
                            <li><a target="_top" href="http://www.asu.edu/index/">A-Z Index</a></li>
                            <li><a target="_top" href="http://www.asu.edu/directory/">Directory</a></li>
                            <li><a target="_top" href="http://www.asu.edu/map/">Map</a></li>
                        </ul>
                        <h2 class="hidden">Sign In / Sign Out</h2>
                        <ul id="asu_login_module" class="hidden">
                            <li id="asu_hdr_ssi" class="end">
                            <a target="_top" href="https://weblogin.asu.edu/cgi-bin/login?callapp=##w.l##"
                            onmouseover="this.href = ASUHeader.alterLoginHref(this.href);"
                            onfocus="this.href = ASUHeader.alterLoginHref(this.href);"
                            onclick="this.href = ASUHeader.alterLoginHref(this.href);">SIGN IN</a>
                            </li>
                        </ul>
                    </div>
                    <h2 class="hidden">Search</h2>
                    <div id="asu_search_module">
                        <form target="_top" action="https://search.asu.edu/search" method="get" name="gs">
                            <label class="hidden" for="asu_search_box">Search</label>
                            <input name="site" value="default_collection" type="hidden" />
                            <input type="text" name="q" size="32" value="Search ASU" id="asu_search_box" class="asu_search_box" onFocus="ASUHeader.searchFocus(this)" onBlur="ASUHeader.searchBlur(this)" /> 
                            <input type="submit" value="Search" title="Search" class="asu_search_button" />
                            <input name="sort" value="date:D:L:d1" type="hidden" /> 
                            <input name="output" value="xml_no_dtd" type="hidden" /> 
                            <input name="ie" value="UTF-8" type="hidden" /> 
                            <input name="oe" value="UTF-8" type="hidden" /> 
                            <input name="client" value="asu_frontend" type="hidden" /> 
                            <input name="proxystylesheet" value="asu_frontend" type="hidden" />
                        </form>
                    </div>
                </div>
                <div style="clear:both;"></div>
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
                                    $nodeclass = str_replace(array(' ','&'),array('-','and'),strtolower($mi['link']['link_title']));
                                    echo '<li class="'.$nodeclass.' primary">';
                                    echo '<a class="parent" href="/'.drupal_lookup_path('alias', $mi['link']['href']).'">'.$mi['link']['link_title'].'</a>';
                                    /*
									if(!empty($mi['below'])){
                                        echo '<ul class="subnav">';	
                                            foreach($mi['below'] as $bkey => $bmi){
                                                $nodeclass = str_replace(array(' ','&'),array('-','and'),strtolower($bmi['link']['link_title']));
                                                echo '<li class="'.$nodeclass.'">';
                                                echo '<a href="/'.drupal_lookup_path('alias', $bmi['link']['href']).'">'.$bmi['link']['link_title'].'</a>';		
                                                echo '</li>';
                                            }
                                        echo '</ul>';
                                    }
									*/
                                    echo '</li>';
                                }
                                //echo '<pre>'.print_r($tree,true).'</pre>';
                            }
                            
                        ?>
                    </ul>
                </nav>
                <!--navigation END-->