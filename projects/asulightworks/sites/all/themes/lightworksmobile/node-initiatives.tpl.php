<?php //echo '<pre>'.print_r($node,true).'</pre>'; ?>
<header class="header">
    <h1><?php echo $node->title ?><br/>
    <?php if(strlen($node->field_subtitle[0]['value']) > 0): ?>
    <small><?php echo $node->field_subtitle[0]['value']; ?></small>
    <?php endif; ?>
    </h1>
</header>
<section class="initiative">
    <div class="c3of4 c f"><div class="padding">
        <img class="masthead" src="/lib/img/solutions/mastheads/azcati-435x130.jpg" height="130" width="435" />
        <h2>Overview</h2>
        <?php echo $node->field_overview[0]['value']; ?>
        <h2 class="nomarginbottom">Staff and Partners</h2>
        <div class="c1of2 c f"><div class="padding">
            <h3>Staff</h3>
            <ul>
                <?php foreach($node->field_staff as $item): ?>
                <li><strong>Milton Sommerfeld,</strong><br/><em>co-director</em></li>
                <?php endforeach; ?>
            </ul>
        </div></div>
        <div class="c1of2 c l"><div class="padding">
            <h3>Partners</h3>
            <ul>
                <?php foreach($node->field_partners as $item): ?>
                <li><a href="<?php echo $item[0]['url']; ?>" target="_blank"><?php echo $item[0]['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div></div>
        
    </div></div>
    <div class="c1of4 c l"><div class="padding">
        <div class="subwidget contact">
            <h4>Contact</h4>
            <p>7417 East Unity Avenue,<br/>
            ISTB-3 Room 103<br/>
            Mesa, Arizona 85212<br/>
            (480) 727-1410</p>
        </div>
        <div class="subwidget resources">
        <h4>Resources</h4>
            <ul>
                <li><a href="/pdf/azcati-brochure.pdf" target="_blank">AzCATI brochure<br/><small>(PDF 2.2MB)</small></a></li>
                <li>Video<br/><small>(in production)</small></li>
            </ul>
        </div>
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
                    <div class="fb-like" data-href="http://www.facebook.com/asulightworks" data-send="false" data-layout="button_count" data-width="200" data-show-faces="true" data-action="like" data-font="arial"></div>
                </li>
                <li>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="asulightworks">Tweet</a><script type="text/javascript" src="/lib//platform.twitter.com/widgets.js"></script>
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
                <script type="text/javascript">var switchTo5x=false;</script><script type="text/javascript" src="/libhttp://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'095680e9-f17e-4179-9942-68e48c6f7176'});</script>
            </div>
        </div>
    </div></div>
    <div class="clear"></div>
</section>