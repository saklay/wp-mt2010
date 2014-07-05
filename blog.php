			<?php
				$blogpage = false;
				if (is_page('Blog')) {
					$categories = "-3,-7";
					$blogpage = true;
					$content_limit = '25';
				} else if (is_page('Press Releases')) {
					$categories = "3";
					$content_limit = '150';
				} else if (is_page('In The News')) {
					$categories = "7";
					$content_limit = '25';
				} else {
					$categories = "";
					$content_limit = '50';
				}
				
				$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=5&cat='.$categories.'&orderby=date&order=DESC'.'&paged='.$page);
				
				if ($wp_query->have_posts()) {
					while ($wp_query->have_posts()) {
						$wp_query->the_post();
				?>
				
					<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<div><span class="time"><?php the_time('F j, Y') ?></span><?php if ($blogpage) { ?> | <span><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></span><?php } ?></div>
					<p></p>
					<!-- <?php content($content_limit); ?> -->
					<?php
					    if($post->post_excerpt) {
					        the_excerpt();
					?>
					        <p class="readmore"><a href="<? the_permalink()?>">Read More &gt;</a></p>
					<?php
					    } else {
					        content($content_limit);
					    }
					?>
					<p></p>
					<hr />
				
				<?php
					}
				}
				
				if(function_exists('wp_page_numbers')) { wp_page_numbers(); }
				$wp_query = null;
				$wp_query = $temp;
			?>
