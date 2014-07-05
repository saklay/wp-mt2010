<?php get_header(); ?>

<style>
	iframe.twitter-share-button { display: block; visibility: visible; float: left; margin: 0 0 0 10px; }
	.fb_edge_widget_with_comment { float:left; margin: 2px 0 0 0; }
    .commentwrapper { margin-top: 0; }
    .post_facebook { float: right; margin: 0 60px 0 0; }
</style>

<?php
	/* Get current category */
	$category = get_the_category();
	
	if ($category[0]->cat_name != "Blog") {
		$current_title = 'Company';
		switch ($category[0]->cat_name) {
			case "In The News":
				$the_id = "195";
				break;
			case "Press":
				$the_id = "18";
				break;
		}
		
		/*******
		Force wp_list_pages to highlight "In The News" or "Press" as current page item
		because this section is not under Pages but falls under Posts
		*******/
		$temp_query = clone $wp_query;
		$wp_query->is_page = 1;
		$wp_query->queried_object_id = $the_id;
	} else {
		/* Fetch content for Blog sub block in the sidebar */
		$blog_sub_block = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Blog Sub Block';"));
	}
?>

	<div class="container content">
		
		<div  style="overflow: hidden;">
		<br /><br />
		<div class="left grid_5 border_hack">
			
			<?php if ($category[0]->cat_name != "Blog") { ?>
			<div class="sub_header"><?php echo $current_title; ?></div>
			<ul class="sub_nav"> 
				<?php
					wp_list_pages("title_li=&child_of=13&exclude=135,391");
					/* wp_list_categories('exclude=3,7&title_li='); */
				?>
			</ul>
			<?php } ?>
			
			<?php if ($category[0]->cat_name == "Blog") { ?>
			<div class="sub_header">What is Moontoast?</div>
			<div class="sub_header_content"><?php echo $blog_sub_block; ?></div>
			
			<div class="sub_header font_normal">Subscribe via email</div>
				<div class="sub_subscribe">
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Moontoast-all', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input type="hidden" value="Moontoast-all" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
				<div class="left"><input type="text" onblur="if(this.value==''){this.value='name@address.com'}" onfocus="if(this.value=='name@address.com'){this.value=''}" value="name@address.com" name="email" ></div>
				<div class="left"><input type="image" src="<?php bloginfo('template_url'); ?>/images/bt_submit.png"></div>
				<div class="clearAll"></div>
				</form>
			</div>
			<?php } ?>
		
			<div class="sub_buttons">
				<a href="/contact"><div class="sub_contact"></div></a>
				<a href="/contact/request-a-demo"><div class="sub_request"></div></a>
				<div class="clearAll"></div>
			</div>
		</div>
		
		<div class="left grid_7 sub_content border_hack">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h6><?php the_title(); ?></h6>
			<div><span class="time"><?php the_time('F j, Y') ?></span> <?php if ($category[0]->cat_name == "Blog") { ?>| <span><?php the_author_firstname(); ?> <?php the_author_lastname(); ?><?php } ?></div>
			<?php the_content(); ?>
			<div style="float:left; margin: 2px 0 0 0;"><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="right"></script></div>
			<div class="clearAll"></div>
			<div class="commentwrapper"><?php comments_template(); ?></div>
			<?php endwhile; endif ?>

	</div>
	<div class="clearAll"></div>
	</div>
	
	<br />
	
</div>

<?php get_footer(); ?>