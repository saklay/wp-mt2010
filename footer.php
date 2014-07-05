<?php
	/****** 
		Pages that are published but is not part of the navigation links on header and footer
		Values of the array should be Page Titles
	******/
	$invisiblelinks = array(
		'What is Moontoast?',
		'Contact Us'
	);
	
	$excludepages = '';
	$result = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'page'");
	
	if ($result){
		foreach ($result as $row) {
			if (in_array($row->post_title, $invisiblelinks)) {
				$excludepages .= $row->ID.',';
			}
		}
		substr_replace($excludepages ,'',-1);
	}
?>

<div class="container">
	<div class="footer">
		
		<div class="left grid_3 block_margin">
			<h2>Call us: 1.888.223.7724</h2>
			<h2>Send us an <a href="/contact">Email</a></h2>
		</div>
		<div class="left grid_3 block_margin">
			<h2>Schedule a <a href="/contact/request-a-demo">Demo</a></h2>
			<h2>Read our <a href="/blog">Blog</a></h2>
		</div>
		<div class="left grid_3">
			<!-- Newsletter signup -->
			<div><b>Sign up for our newsletter:</b></div>
			<form target="_new" method="post" id="e2ma_signup" onsubmit="return signupFormObj.checkForm(this)" action="https://app.e2ma.net/app/view:Join/acctId:25088/signupId:1417319">
			<input type="hidden" name="private_set" value="1">
			<input type="hidden" name="groups[]" value="208219572">
			<div class="footer_form">
				<div class="left"><input type="text" onblur="if(this.value==''){this.value='name@address.com'}" onfocus="if(this.value=='name@address.com'){this.value=''}" value="name@address.com" name="emma_member_email"></div>
				<div class="left"><input type="image" src="<?php bloginfo('template_url'); ?>/images/bt_submit.png"></div>
				<div class="clearAll"></div>
			</div>
			</form>
		</div>
		<div class="clearAll"></div>
		
		<div style="height:20px;"></div>
		
		<!-- Footer navigation -->
		<div class="left">
			<ul class="nav"> 
				<?php
					$clean_page_list = wp_list_pages('title_li=&depth=1&exclude='.$excludepages);
					$clean_page_list = preg_replace('/title=\"(.*?)\"/','',$clean_page_list);
					echo $clean_page_list;
				?>
				<!--<li><a href="/explore" title="Community">Community</a></li>-->
				<li><a href="/contact" title="Contact">Contact</a></li>
				<!--<li><a href="/register" title="Login">Login</a></li>-->
				<!--<li><a href="#" title="Sitemap">Sitemap</a></li>-->
			</ul>
		</div>
		
		<div class="right">
			<!-- Mini footer links -->
			<div class="nav_mini">
				<span><a href="/legal/Terms" title="Terms of Use">Terms of Use</a></span> |
				<span><a href="/legal/PrivacyPolicy" title="Privacy Policy">Privacy Policy</a></span>
			</div>
			<div class="copyright">&copy; 2010 Moontoast, LLC.  All Rights Reserved.</div>
		</div>
		<div class="clearAll"></div>
		
	</div>
</div>

<script type="text/javascript"> 
//<![CDATA[
var gaJsHost=(("https:"==document.location.protocol)?"https://ssl.":"http://www.");
document.write(unescape("%3Cscript src='"+gaJsHost+"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script> 
<script type="text/javascript"> 
//<![CDATA[
var pageTracker=_gat._getTracker("UA-8973162-10");
pageTracker._initData();
pageTracker._trackPageview();
//]]>
</script> 
</body> 
</html>
