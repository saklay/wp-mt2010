<!DOCTYPE html>
<html lang="en"> 
	<head>
    <script type="text/javascript">
        var _kmq = _kmq || [];
        function _kms(u){
            setTimeout(function(){
                var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
                s.src = u; f.parentNode.insertBefore(s, f);
            }, 1);
        }
        _kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/b68d318adb595bd8c20db7658dd2250f14a5c36c.1.js');
    </script>
    <script src="//d1nu2rn22elx8m.cloudfront.net/performable/pax/6rk6gs.js" type="text/javascript"></script>
		<?php if (is_front_page()) { ?>
		<title>Moontoast, Your Social Commerce Platform</title>
		<?php } else { ?>
		<title><?php bloginfo('name'); ?> <?php wp_title('&#124;', true, 'right'); ?></title>
		<?php } ?>
		<meta charset="utf-8" /> 
		<meta name="copyright" content="&#169; 2009-<?php echo date('Y'); ?> Moontoast, LLC" /> 
		<meta name="rating" content="general" /> 
		<meta name="robots" content="all, index, follow" /> 
		<meta name="google-site-verification" content="ICuVr_tNluU4yEOu_4Wzu7QxFqfvBR6_nuzIBilePhM" /> 
 		<meta name="google-site-verification" content="hp4zBqneAaciXdQZnbGAcQxv4CTiK6C5DqxvpfEUzGc" /> 
		<script type="text/javascript" src="/js/main.js.php?r=20101228"></script>		

		<link rel="alternate" type="application/rss+xml" title="Moontoast Global Feed (All Content)" href="http://feeds.feedburner.com/Moontoast-all" />
		<link rel="alternate" type="application/rss+xml" title="Moontoast Blog" href="http://feeds.feedburner.com/Moontoast-blog" />
		<link rel="alternate" type="application/rss+xml" title="Moontoast Press Releases" href="http://feeds.feedburner.com/Moontoast-press" />
		<link rel="alternate" type="application/rss+xml" title="Moontoast in the News" href="http://feeds.feedburner.com/Moontoast-news" />

		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?r=20101228" type="text/css" media="screen" />
		
		<?php if (is_front_page()) { ?>
		<!-- JQuery Rotator -->
		<script type="text/javascript" src="/js/library/jquery/jquery.js?r=20101228"></script>
		<script type="text/javascript" src="/js/marketing_site/jquery-flow.js"></script>
		<script type="text/javascript">
			$(function() {
				$("div#controller").jFlow({
					slides: "#slides",
					duration: 400,
					interval: 8000,
					width: "880px",
					height: "390px"
				});
			});
		</script>
		<?php } ?>
		
		<?php if (is_page(array('Featured Clients'))) { ?>
		<!-- JQuery Rotator -->
		<script type="text/javascript" src="/js/library/jquery/jquery.js?r=2010122i8"></script>
		<script type="text/javascript" src="/js/marketing_site/jquery-flow.js?r=20101228"></script>
		<script type="text/javascript">
			$(function() {
				$("div#controller").jFlow({
					slides: "#slides",
					duration: 400,
					interval: 8000,
					width: "610px",
					height: "250px"
				});
			});
		</script>
		<?php } ?>
		</script>
		
		<style>
		    @media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {
                ul.nav { margin-top: 0; }
            }
            ul.nav { *margin-left: 40px; }
			iframe.twitter-share-button { display: none; visibility: hidden; }
			.alignright { float: right; }
			.alignleft { float: left; }
			.aligncenter { width: 100%; margin: 0 auto; }
			.wp-caption { padding: 5px 10px; font-size: 11px; }
		</style>
		
	</head>
	
<body>

<?php
	/****** 
		Primary Pages that are published but is not part of the navigation links on header and footer
		Values of the array should be Page Titles
	******/
	$invisiblelinks = array(
		'What is Moontoast?',
		'Contact Us',
		'SXSW'
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
	
	$category = get_the_category();
	if ($category[0]->cat_name) {
		switch ($category[0]->cat_name) {
			case "In The News":
				$the_id = "13";
				break;
			case "Press":
				$the_id = "13";
				break;
			case "Blog":
				$the_id = "70";
				break;
		}
		
		/*******
		Force wp_list_pages to highlight "Company" or "Blog" as current page item
		because this section is not under Pages but falls under Posts
		*******/
		$temp_query = clone $wp_query;
		$wp_query->is_page = 1;
		$wp_query->queried_object_id = $the_id;
	}
?>

<div class="container header">
		<div class="left"><a href="/" title="Moontoast" class="logo">Moontoast</a></div>
		<div class="right">
			
			<!-- Right top most navigation -->
			<div class="static_nav">
				<!-- Social Media links -->
				<div class="right">
					<span class="social_icon"><a href="http://www.facebook.com/Moontoast" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social_facebook.jpg"></a></span>
					<span class="social_icon"><a href="http://twitter.com/Moontoast" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social_twitter.jpg"></a></span>
					<span class="social_icon"><a href="http://feeds.feedburner.com/Moontoast-all" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social_rss.jpg"></a></span>
				</div>
				<div class="right" style="margin-top: 3px;">
					<!--<span><a href="/explore" title="Community">COMMUNITY</a></span> |-->
					<span><a href="/contact" title="Contact">CONTACT</a></span>
					<!--<span><a href="/register" title="Login">LOGIN</a></span>-->
					<span></span>
				</div>
				<div class="clearAll"></div>
			</div>
			<div class="clearAll"></div>
			
			<!-- Main header navigation -->
			<div class="nav">
				<ul class="nav">
				<?php
					$clean_page_list = wp_list_pages('title_li=&depth=1&exclude='.$excludepages);
					$clean_page_list = preg_replace('/title=\"(.*?)\"/','',$clean_page_list);
					echo $clean_page_list;
				?>
				</ul>
			</div>
			
		</div>
		<div class="clearAll"></div>
</div>
