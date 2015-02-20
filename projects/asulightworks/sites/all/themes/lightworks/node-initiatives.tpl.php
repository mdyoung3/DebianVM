<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
<div class="content">
    <header class="header">
        <h1><?php echo $node->title ?><br/>
        <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
        <small><?php echo $node->field_subtitle[0]['value']; ?></small>
        <?php endif; ?>
        </h1>
    </header>
    <section class="initiative">
        <div class="c3of4 c f"><div class="padding">
            <img class="masthead" src="/<?php echo $node->field_image[0]['filepath']; ?>" height="130" width="435" />
            <div class="page-entry">
                <h2>Overview</h2>
                <?php echo $node->body; ?>
            </div>
        </div></div>
        <div class="c1of4 c l"><div class="padding">
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
<?php if($node->field_related_solutions[0]['nid'] != NULL): ?>
<div class="related-solutions">
    <header class="header">
        <h2>Related Energy Solutions</h2>
    </header>
    <div class="section">
        <ul>
            <?php
                foreach($node->field_related_solutions as $item):
                    $initiative = node_load($item['nid']);
            ?>
            <li>
                <div class="thumb">
                    <img src="/<?php echo $initiative->field_thumbnail[0]['filepath']; ?>" height="57" width="80" />
                </div>
                <div class="entry">
                    <h3><?php echo $initiative->title; ?></h3>
                    <p class="desc"><?php echo $initiative->field_short_desc[0]['value']; ?></p>
                    <p class="more"><a href="/<?php echo $initiative->path; ?>">more &raquo;</a></p>
                </div>
                <div class="clear"></div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php if($node->field_related_affiliates[0]['nid'] != NULL): ?>
<div class="related-projects">
    <header class="header">
        <h2>Other Related ASU Projects</h2>
    </header>
    <div class="section">
        <ul>
            <?php
                foreach($node->field_related_affiliates as $item):
                    $project = node_load($item['nid']);
            ?>
            <li>
                <div class="thumb">
                    <img src="/<?php echo $project->field_thumbnail[0]['filepath']; ?>" height="50" width="70" />
                </div>
                <div class="entry">
                    <h3><?php echo $project->title; ?></h3>
                    <p class="more"><a href="<?php echo $project->field_url[0]['url']; ?>"><?php echo $project->field_url[0]['title']; ?></a></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<?php endif; ?>