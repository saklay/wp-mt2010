<?php
	/* Fetch content for Client Rotator Slides */
	$client_rotator_slide1 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Client Rotator Slide 1';"));
	$client_rotator_slide2 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Client Rotator Slide 2';"));
	$client_rotator_slide3 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Client Rotator Slide 3';"));
?>

<style>
.rotator2 { height: 250px; color: #4e4e4e; }

.client_logo_rotator { border: 1px solid #c2c2c2; padding: 9px; background-color: #fff; }
.client_logo_rotator:hover { background-color: #d9d9d9; }

.client_left { float: left; width: 286px; margin-right:30px; }
.client_right { float: left; width: 286px; }

#btprev, #btnext {
    width: 25px;
	height: 25px;
	position: relative;
    margin-top: -170px;
    cursor: pointer;
    *cursor: hand;
}

#btprev {
	background: url(http://moontoast-wordpress-dev.s3.amazonaws.com/wp-content/uploads/2011/02/bt_prev_small.png) no-repeat;
    float: left;
    margin-left: -28px;
}

#btnext {
	background: url(http://moontoast-wordpress-dev.s3.amazonaws.com/wp-content/uploads/2011/02/bt_next_small.png) no-repeat;
    float: right;
    margin-right: -10px;
    *margin-left: 610px;
}
</style>

<br /><br />

<div class="rotator2">
    
	<!-- Rotator Hidden Slides -->
	<div id="controller" class="hidden">
        <span class="jFlowControl">No 1</span>
        <span class="jFlowControl">No 2</span>
        <span class="jFlowControl">No 3</span>
    </div>
    
    <!-- Rotator Slides -->
    <div id="slides">

        <div>
            <?php echo $client_rotator_slide1; ?>
            <div class="clearAll"></div>
        </div>
        
        <div>
            <?php echo $client_rotator_slide2; ?>
            <div class="clearAll"></div>
        </div>
        
         <div>
            <?php echo $client_rotator_slide3; ?>
            <div class="clearAll"></div>
        </div>


    </div>
		
	<!-- Rotator Buttons -->
	<div id="btprev" class="jFlowPrev"></div>
	<div id="btnext" class="jFlowNext"></div>
		
</div>

<br /><br /><br />
