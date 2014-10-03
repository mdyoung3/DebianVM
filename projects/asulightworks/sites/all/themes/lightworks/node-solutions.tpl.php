<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
<div class="content">
    <header class="header">
        <h1><?php echo $node->title ?><br/>
        <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
        <small><?php echo $node->field_subtitle[0]['value']; ?></small>
        <?php endif; ?>
        </h1>
    </header>
    <section class="solution">
        <div class="c3of4 c f">
            <img class="masthead" src="/<?php echo $node->field_image[0]['filepath']; ?>" height="130" width="435" />
            <div class="page-entry">
            <?php if(strlen($node->field_overview[0]['value']) > 0): ?>
                <h2>Overview</h2>
                <?php echo $node->field_overview[0]['value']; ?>
            <?php endif; ?>
            <?php if(strlen($node->field_mission[0]['value']) > 0): ?>
                <h2>Mission</h2>
                <?php echo $node->field_mission[0]['value']; ?>
            <?php endif; ?>
            <?php if(strlen($node->field_services[0]['value']) > 0): ?>
                <h2>Services</h2>
                <?php echo $node->field_services[0]['value']; ?>
            <?php endif; ?>
            </div>
            <?php if($node->field_staff[0]['value'] != NULL || $node->field_partners[0]['title'] != NULL): ?>
                <h2 class="nomarginbottom">Staff and Partners</h2>
                <div class="c1of2 c f"><div class="padding">
                <?php if($node->field_staff[0]['value'] != NULL): ?>
                    <h3>Staff</h3>
                    <ul>
                        <?php
                        foreach($node->field_staff as $item):
                            list($name,$job) = explode(',',$item['value']);
                        ?>
                        <li><strong><?php echo $name; ?></strong><br/><em><?php echo $job; ?></em></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                </div></div>
                <div class="c1of2 c l"><div class="padding">
                <?php if($node->field_partners[0]['title'] != NULL): ?>
                    <h3>Partners</h3>
                    <ul>
                        <?php
                        foreach($node->field_partners as $item):
                            
                        ?>
                        <li>
                        <?php if(strlen($item['url']) > 0 ): ?>
                            <a href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['title']; ?></a>
                        <?php else: ?> 
                            <?php echo $item['title']; ?>   
                        <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                </div></div>
            <?php endif; ?>
        </div>
        <div class="c1of4 c l"><div class="padding">
        	<?php if(strlen($node->field_contact[0]['value']) > 0): ?>
            <div class="subwidget contact">
                <h4>Contact</h4>
                <p><?php echo $node->field_contact[0]['value'] ?></p>
            </div>
            <?php endif; ?>
            <?php if(strlen($node->field_resources[0]['title']) > 0): ?>
            <div class="subwidget resources">
            <h4>Resources</h4>
                <ul>
                    
                    <?php
					
                    foreach($node->field_resources as $item):
                        list($doc,$details) = explode('(',$item['title']);
                        $details = str_replace(array('(',')'), array('',''),$details);
						$isFILE = (strpos_array($item['url'],array('pdf','ppt','doc'))) ? true : false;
                    ?>
                    <li>                
                        <?php if(strlen($item['url']) > 0 ): ?>
                        <a href="<?php echo $item['url']; ?>" <?php if($isFILE == true) echo 'target="_blank"'; ?>>
                        <?php endif; ?>
                        <?php echo $doc; ?>
                        <?php if(strlen($item['url']) > 0 ): ?>
                        </a>
                        <?php endif; ?>
                        <?php if(strlen($details) > 0 ): ?>
                        <br/><small>(<?php echo $details; ?>)</small>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <br/>
            <div class="subwidget share">
                <h4>SHARE</h4>
                <ul>
                    <li>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) {return;}
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-like" data-href="<?php echo $node->path; ?>" data-send="false" data-layout="button_count" data-width="200" data-show-faces="true" data-action="like" data-font="arial"></div>
                    </li>
                    <li>
                        <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="asulightworks">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                    </li>
                    <li>
                        <!-- Place this tag where you want the +1 button to render -->
                        <div class="g-plusone" data-size="medium"></div>
                        
                        <!-- Place this render call where appropriate -->
                        <script type="text/javascript">
                          (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                        </script>
                    </li>
                </ul>
                <div class="additional-social">
                    <span  class='st_stumbleupon' ></span><span  class='st_reddit' ></span></span><span  class='st_linkedin' ></span><span  class='st_google_bmarks' ></span><span  class='st_digg' ></span><span  class='st_delicious' ></span>
                    <script type="text/javascript">var switchTo5x=false;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'095680e9-f17e-4179-9942-68e48c6f7176'});</script>
                </div>
            </div>
        </div></div>
        <div class="clear"></div>
    </section>
</div>