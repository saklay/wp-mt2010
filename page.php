<?php get_header(); ?>

<?php
	/* Fetch content for Blog sub block in the sidebar */
	$blog_sub_block = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Blog Sub Block';"));
	
	$current_title = get_the_title($post->post_parent);
	
	if ($current_title == 'Jobs') {
		$excludepages = "391";
	} elseif (!is_page(array('Jobs'))) {
		$excludepages = "135,391";
	} else {
		$excludepages = "391";
	}
	
	if(!$post->post_parent){
		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&exclude=".$excludepages);
	} else {
		if($post->ancestors) {
			/*
			$pages = get_pages();
			$page_children = get_page_children(133, $pages);
			*/
			$ancestors = end($post->ancestors);
			$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&exclude=".$excludepages);
		}
	}
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if (is_front_page()) { ?>
	<?php include( TEMPLATEPATH . '/home.php' ); ?>
<?php } else { ?>

<div class="container content">
	
	<div  style="overflow: hidden;">
	<br /><br />
	
	<div class="left grid_5 border_hack">
		
		<?php if (is_page('Blog')) { ?>
		<div class="sub_header">What is Moontoast?</div>
		<div class="sub_header_content"><?php echo $blog_sub_block; ?></div>
		<?php } ?>
		
		<?php if (!is_page('Blog')) { ?>
		<div class="sub_header"><?php if ($children) echo $current_title; ?></div>
		<?php } ?>
		
		<ul class="sub_nav"> 
			<?php
				if ($children) echo $children;
			?>
		</ul>
		
		<?php if (is_page('Blog')) { ?>
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
		
		<h6><?php the_title(); ?></h6>
		
		<?php if (is_page(array('Featured Clients'))) { ?>
		    <?php include( TEMPLATEPATH . '/rotator.php' ); ?>
		<?php } ?>
		
		<?php if (is_page(array('Press Releases','Blog','In The News'))) { ?>
			<?php include( TEMPLATEPATH . '/blog.php' ); ?>
		<?php } else { ?>
			<?php the_content('<span>...</span>'); ?>
		<?php } ?>
		
	</div>
	<div class="clearAll"></div>
	</div>
	
	<br />
	
</div>

<?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>