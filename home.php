<?php
	/* Fetch content for Rotator Slides */
	$rotator_slide1 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 1';"));
	$rotator_slide2 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 2';"));
	$rotator_slide3 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 3';"));
	/* Fetch content for the 3 Content blocks */
	$content_block1 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Home Content Block 1';"));
	$content_block2 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Home Content Block 2';"));
	$content_block3 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Home Content Block 3';"));
	/* Fetch content for the main content block */
	$main_content_block = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Home Main Content Block';"));
?>

<div class="container content">
	
	<div class="rotator">
		
		<!-- Rotator Hidden Slides -->
		<div id="controller" class="hidden">
        <span class="jFlowControl">No 1</span>
        <span class="jFlowControl">No 2</span>
        <span class="jFlowControl">No 3</span>
    </div>
    
    <!-- Rotator Slides -->
    <div id="slides">
    	<div>
				<?php echo $rotator_slide1; ?>
				<div class="clearAll"></div>
			</div>
			<div>
				<?php echo $rotator_slide2; ?>
				<div class="clearAll"></div>
			</div>
			<div>
				<?php echo $rotator_slide3; ?>
				<div class="clearAll"></div>
			</div>
		</div>
		
		<!-- Rotator Buttons -->
		<div id="btprev" class="jFlowPrev"></div>
		<div id="btnext" class="jFlowNext"></div>
		
	</div>
	
	<div class="home_blocks">
		
		<h3>Moontoast: Monetizing Social.</h3>
		<div>
			<div class="left"><img src="<?php bloginfo('template_url'); ?>/images/shortest_distance.jpg"></div>
			<div class="right grid_2">
				<h4><?php echo $main_content_block; ?></h4>
			</div>
			<div class="clearAll"></div>
		</div>
		
		<br /><br />
		
		<div  style="overflow: hidden;">
			
		<!-- Content Block #1 -->
		<div class="left grid_3 block_border border_hack">
			<div class="grid_1">
				<div class="block_branded">
					<a href="/what-we-offer/commerce-community" title="Commerce Community"><h5>COMMERCE COMMUNITY</h5></a>
					<b>Enable social commerce in your community today.</b>
				</div>
				<?php echo $content_block1; ?>
				<p class="learn_more"><a href="/what-we-offer/commerce-community">LEARN MORE &gt;</a></p>
			</div>
		</div>
		
		<!-- Content Block #2 -->
		<div class="left grid_3 block_border border_hack">
			<div class="grid_1">
				<div class="block_embedded">
					<a href="/what-we-offer/distributed-store" title="Distributed Store"><h5>DISTRIBUTED STORE</h5></a>
					<b>The most viral, effective social commerce widget. Period.</b>
				</div>
				<?php echo $content_block2; ?>
				<p class="learn_more"><a href="/what-we-offer/distributed-store">LEARN MORE &gt;</a></p>
			</div>
		</div>
		
		<!-- Content Block #3 -->
		<div class="left grid_3 border_hack">
			<div class="grid_1">
				<div class="block_private">
					<a href="/what-we-offer/moontoast-impulse" title="Moontoast Impulse"><h5>MOONTOAST IMPULSE</h5></a>
					<b>Play, Share and Sell your Music on Facebook.</b>
				</div>
				<?php echo $content_block3; ?>
				<p class="learn_more"><a href="/what-we-offer/moontoast-impulse">LEARN MORE &gt;</a></p>
			</div>
		</div>
		
		<div class="clearAll"></div>
		
		</div>
		
	</div>
	
</div>
