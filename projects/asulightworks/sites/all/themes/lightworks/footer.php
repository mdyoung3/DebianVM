 <!--footer-->
                <?php print $footer_message; ?>
                <footer id="footer">
                	<?php include('/afs/asu.edu/www/asuthemes/4.0/includes/footer.shtml'); ?>
                    <p>ASU LightWorks <span>|</span>PO Box 875402<span>|</span>Tempe, AZ 85287-5402<span>|</span>Phone: (480) 727-7434</p>
                </footer>
                <!--footer END-->
                <div class="clear"></div>
            </div>
            <div id="email-pop" style="display:none;"><div class="window">
            	<div id="email-message" style="display:none;"></div>
	            <div id="email-waiting" style="display:none;">Please wait<br /><img src="/sites/all/themes/lightworks/grfx/ajax-loader.gif" title="Loader" alt="Loader" /></div>
			</div></div>
        </div></div>
        <?php print $closure ?> 
        <script type="text/javascript">
			$(document).ready(function(){
				$('#email-submit').click(function() {
					$('#email-pop').show(500);
					$('#email-waiting').show(500);
					$('#email-message').hide(0);
					$.ajax({
						type : 'POST',
						url : 'http://asulightworks.com/sites/all/themes/lightworks/email-signup.php',
						dataType : 'json',
						data: {
							name : $('#email-name').val(),
							email : $('#email-email').val()
						},
						success : function(data){
							$('#email-waiting').hide(500);
							$('#email-message').removeClass().addClass((data.error === true) ? 'error' : 'success')
								.text(data.msg).show(500, function(){
									setTimeout(function(){$('#email-pop').hide(500);},3000);					
								});
						},
						error : function(XMLHttpRequest, textStatus, errorThrown) {
							$('#email-waiting').hide(500);
							$('#email-message').removeClass().addClass('error')
								.text('There was an error.').show(500, function(){
									setTimeout(function(){$('#email-pop').hide(500);},3000);					
								});
						}
					});
			
					return false;
				});
			});
		</script>
        <script type="text/javascript">
			// <![CDATA[
			// Declare the ASUHeader namespace, if it doesn't already exist.
			if (!ASUHeader) {
				var ASUHeader = {};
			}
			ASUHeader.inIFrame = (window.top != window) ? true : false;
			ASUHeader.signin_url = '';
			if (!ASUHeader.signin_callback_url) {
				ASUHeader.signin_callback_url = ''; // set this in your app to use non-automatic callback
			}
			if (!ASUHeader.signout_url) {
				ASUHeader.signout_url = 'https://webapp4.asu.edu/myasu/Signout';
			}
			
			ASUHeader.alterLoginHref = function(url) {
				if (ASUHeader.signin_url) {
					return ASUHeader.signin_url;
				}
				
				if (ASUHeader.signin_callback_url) {
					callApp = ASUHeader.signin_callback_url;
				} else {
					var callApp = window.location.toString();
					if (ASUHeader.inIFrame) {
						try {
							// If we're in an iFrame, force the document domain to be asu.edu
							document.domain = 'asu.edu';
							callApp = window.parent.location.toString();
						} catch(ignore) {}
					}
				}
				
				// Decode the URL
				url = unescape(url);
			
				// Dyanamic Drupal login links
				if (url.match('##w.l.d##') && typeof(Drupal) != 'undefined') {
					var re = /https?:\/\/[^\/]*/i;
					var result = re.exec(window.location.toString());
					callApp = result + Drupal.settings.basePath + 'asuwebauth-login';
					url = url.replace('##w.l.d##', callApp);
				}
				url = url.replace('##w.l##', callApp);
				ASUHeader.signin_url = url;
				return ASUHeader.signin_url;
			}
			
			ASUHeader.checkSSOCookie = function() {
				// try to parse out the username from SSONAME cookie
				var cookies = document.cookie.split(";");
				for(var i = 0; i < cookies.length; i++) {
					if (cookies[i].indexOf('SSONAME') > 0) {
						var sso_name = document.createElement('li');
						if (cookies[i].substring(9) == "") {
							break;
						}
						sso_name.innerHTML = cookies[i].substring(9);
						
						var sso_link = document.createElement('li');
						sso_link.innerHTML = '<a target="_top" href="'+ASUHeader.signout_url+'">SIGN OUT</a>';
						sso_link.className = 'end';
						sso_link.id = 'asu_hdr_sso';
						
						var ul = document.getElementById('asu_login_module');
						while (ul.childNodes[0]) {
							ul.removeChild(ul.childNodes[0]);
						}
						ul.appendChild(sso_name);
						ul.appendChild(sso_link);
						
						break;
					}
				}
				// unhide the links
				document.getElementById('asu_login_module').style.display = 'inline-block';
			}
			
			if (typeof(jQuery) != 'undefined') {
				jQuery(document).ready(function() {
					ASUHeader.checkSSOCookie();
				});
			} else {
				// fall back and use window onload, this will always work
				if (window.addEventListener) {
					window.addEventListener('load', ASUHeader.checkSSOCookie, false);
				} else if (window.attachEvent) {
					window.attachEvent('onload', ASUHeader.checkSSOCookie);
				}
			}
			ASUHeader.default_search_text = "Search ASU";
			ASUHeader.searchSwitch = function(name) {
			var field = document.getElementById('asu_search_box');
			if (field != null) {
				var oldDefault = ASUHeader.default_search_text;
				ASUHeader.default_search_text = "Search "+name;
				if (field.value == oldDefault) {
					field.value = ASUHeader.default_search_text;
				}
			}
			}
			ASUHeader.searchFocus = function(field) {
			if (typeof field != "undefined") {
				if (field.value == ASUHeader.default_search_text) {
					field.value = "";
				}
			}
			}
			ASUHeader.searchBlur = function(field) {
			if (typeof field != "undefined") {
				if (field.value == "") {
					field.value = ASUHeader.default_search_text;
				}
			}
			}
			ASUHeader.searchToggle = function(radio) {
			var google = document.getElementById('asu_search_google');
			if (google != null) {
				if (google.style.display == "none") {
					ASUHeader.default_search_text = "Search ASU";
					google.style.display = "block";
				} else {
					google.style.display = "none";
				}
			}
			var alt = document.getElementById('asu_search_alternate');
			if (alt != null) {
				if (alt.style.display == "none") {
					ASUHeader.default_search_text = "Search ASU";
					alt.style.display = "block";
				} else {
					alt.style.display = "none";
				}
			}
			
			if (typeof radio != "undefined") {
				radio.checked = false;
			}
			}
		// ]]>
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
        
    </body>
</html>