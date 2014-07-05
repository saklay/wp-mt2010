<?php get_header(); ?>

<?php
	if($post->post_parent) $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	else $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
?>

<div class="container content">
	
	<div  style="overflow: hidden;">
	<br /><br />
	
	<div class="left grid_5 border_hack">
		<div class="sub_header"><?php if ($children) echo $current_title; ?></div>
		<ul class="sub_nav"> 
			<?php if ($children) echo $children; ?>
		</ul>
		<div class="sub_buttons">
			<a href="/contact"><div class="sub_contact"></div></a>
			<a href="/contact/request-a-demo"><div class="sub_request"></div></a>
			<div class="clearAll"></div>
		</div>
	</div>
	
	<div class="left grid_7 sub_content border_hack">
		
		<h6><?php the_title(); ?></h6>
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="entry" id="post_<?php the_ID(); ?>">
				<?php the_content(); ?>
				</div>
			<?php endwhile; endif ?>

	</div>
	<div class="clearAll"></div>
	</div>
	
	<br />
	
</div>

<?php get_footer(); ?>