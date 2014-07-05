<?php
	add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single.php") ) return TEMPLATEPATH . "/single.php"; } return $t;' ));
	add_theme_support( 'menus' );
	
	function mytheme_nav() {
		if ( function_exists( 'wp_nav_menu' ) )
			wp_nav_menu( 'container_class=pagemenu&fallback_cb=mytheme_nav_fallback' );
		else
			mytheme_nav_fallback();
	}
	
	function mytheme_nav_fallback() {
		wp_page_menu( 'show_home=Start&menu_class=pagemenu' );
	}

	if ( function_exists('register_sidebar') )
	register_sidebar();
	
	function content($num) {
		$link = get_permalink();
		$ending = "...";
		$theContent = get_the_content();
		$output = $theContent;
		/* $output = preg_replace('/<img[^>]+./','', $theContent); */
		$output = preg_replace('/<h[^>]+./','', $output);
		$output = preg_replace('/<img[^>]+./','', $output);
		$output = preg_replace('/<object[^>]+./','', $output);
		$output = preg_replace('/<param[^>]+./','', $output);
		$output = preg_replace('/<embed[^>]+./','', $output);
		$output = preg_replace('/<div[^>]+./','', $output);
		$output = preg_replace('/\[caption[^>]+./','', $output);
		$theContent = $output;
		$limit = $num+1;
		$content = explode(' ', $output, $limit);
		array_pop($content);
		$content = implode(" ",$content).$ending;
		$imgBeg = strpos($theContent, '<img');
		$post = substr($theContent, $imgBeg);
		$imgEnd = strpos($post, '>');
		$postOutput = substr($post, 0, $imgEnd+1);
		$result = preg_match('/width="([0-9]*)" height="([0-9]*)"/', $postOutput, $matches);
		if ($result) {
			$pagestring = $matches[0];
			$postOutput = str_replace($pagestring, "", $postOutput);
		}
		if(stristr($postOutput,'<img src=')) { echo '<a href="'.$link.'">'.$postOutput."</a>".$content; } else {
			echo $content;
		}
		$readmore = '<p class="readmore"><a href="'.$link.'">Read More &gt;</a></p>';
		echo $readmore;
	}

  function remove_comments_rss( $for_comments ) {
    return;
  }
  add_filter('post_comments_feed_link', 'remove_comments_rss');
?>
