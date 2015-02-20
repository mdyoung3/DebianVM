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
	$pageclass = $pageclass.'-page';
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
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
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
			var is_admin = <?php echo ($user->uid) ? 'true': 'false'; ?>;
			var is_mobile = <?php echo ($mobileObj->isMobile()) ? 'true' : 'false'; ?>
 		</script>
        <script src="http://enhancejs.googlecode.com/svn-history/r148/trunk/tests/visual/js/modernizr.js"></script>
        <?php if($editview != 'edit'): ?>
		<script src="/sites/all/themes/lightworks/js/jquery-libs.js"></script>
        <script src="/sites/all/themes/lightworks/js/init.js"></script>
        <?php endif; ?>
        <?php if($mobileObj->isIphone()): ?>
        <script>
        setTimeout(function () {
          window.scrollTo(0, 1);
        }, 1000);
		</script>
        <?php endif; ?>
    </head>
    <body class="<?php echo $pageclass; ?> <?php echo $adminclass; ?> <?php echo $editview; ?>">
    	<div id="background"><div id="container">
        	<!--header-->
            <header id="header">
                <div id="asu_hdr" class=" asu_hdr_white">
                    <div id="asu_logo">
                        <a target="_top" href="/" title="ASU LightWorks"><img src="/sites/all/themes/lightworks/grfx/logo-w-asu.gif" alt="ASU LightWorks" height="25" width="125" style="margin-top:8px" title="ASU LightWorks" /></a>
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
                <a href="/" class="gohome">Home</a>
                <div style="clear:both;"></div>
            </header>
            <!--header END-->
            <div id="page">