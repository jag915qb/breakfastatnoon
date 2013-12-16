<?php
function eo_get_cons($v = null,$s = null) {
		$eo_const = get_option('eo_const');
		if( is_array($eo_const) ) {
			if (!isset ($v) ) {
				return $eo_const;
			}
			else if(array_key_exists($v,$eo_const) && !isset($s)) {
				return $eo_const[$v];
			}
			else if (isset($s) && is_array($eo_const[$v]) && array_key_exists($s,$eo_const[$v]) )  {
				return  $eo_const[$v][$s];
			}
			else {
				return false;
			};
		}
}

// Check Option function where option framework has not yet initiated
function eo_check_of_opt($optc = '',$optset = '') {
	global $theme_opt_slug;
	//var_dump($theme_opt_slug);
	$optionsframework_settings = get_option('optionsframework' );
	($theme_opt_slug) ? $the_opt_set = $theme_opt_slug : $the_opt_set = $optionsframework_settings['id'];
	($optset) ? $optm = $optset : $optm = $theme_opt_slug;
		// Option Set to check
	$opts = get_option( $optm );
	return ($optc || $optc != "all") ?  $opts[$optc] : $opts;	
}

// _eo-review: maybe a better way to detect child themes ?
function eo_get_template_part( $slug, $name = null ) {
	$eo_theme = '/child/default/';
	$file = get_template_directory().$eo_theme.$slug.'.php';
	if(file_exists($file)) {
		$slug = $eo_theme.$slug;
		//inc/carousel
	}
	do_action( 'get_template_part_' . $slug, $slug, $name );
	$templates = array();
	if ( isset( $name ) ) $templates[] = $slug . '-' . $name . '.php';
	$templates[] = $slug . '.php';
	locate_template($templates, true, false);
}

function eo_sanitize_id($att) {
	return	strtolower(str_replace(" ","_", esc_attr($att) ) );
}

if( of_get_option( 'custom_nav_markup') == "1" ) {
	require_once(get_template_directory().'/inc/core/menu_nav_walker.php'); // _custom nav walker
	require_once(get_template_directory().'/inc/core/menu_page_walker.php'); // _custom page walker
	
	function eo_main_nav() {
		wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
			'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
			'menu_class' => 'top-nav clearfix',         // adding custom nav class
			'theme_location' => 'main-nav',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
			'walker' => new eo_Walker_Nav_Menu(),
		//	'show_home' => true,
			'fallback_cb' => 'eo_main_nav_fallback'      // fallback function
		));
	}
}


function eo_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	
	echo '<nav class="pagination">';
	
		$pag_links = paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
		echo str_replace("page-numbers","page-numbers pagination",$pag_links);

	
	echo '</nav>';
}
function eo_snippet( $str, $wcnt = 2, $excl ='' ) {
	(isset($excl) ) ? $qta = array("'",",","&#8217;",$excl) : $qta = array("'",",","&#8217;") ;
	$str = str_replace($qta,"",$str);
  return implode( 
    '', 
    array_slice( 
      preg_split(
        '/([\s,\.;\?\!]+)/', 
        $str, 
        $wcnt*2+1, 
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wcnt*2-1
    )
  );
}
function eo_get_gen_clss($id = null) {
	// Return requested / all generated class
	if( get_option('eo_gen_opt_cl') ) $gen_opt_clss = get_option('eo_gen_opt_cl');
	return (isset($id)) ? $gen_opt_clss[$id] : $gen_opt_clss;
}
function eo_alert($msg,$typ = 'Note', $cpb = 'edit_theme_options') {
	if ( current_user_can( $cpb ) ) {
		$cpb_txt = ucwords(str_replace("_"," ",$cpb));
		if(isset($typ)) $type = $typ;
		$themsg = ucwords($type.' : '.$msg);
		echo '<div class="alert alert-'.$type.'">
	  <strong>'.$themsg.'</strong> <span class="warn_adm_note">Dont worry, this is only shown to those who can <em>'.$cpb_txt.'</em></span>
	</div>';
		}
}
function eo_xcrpt( $l ) {
	$excerpt = get_the_excerpt();
	
	(isset($l)) ? $limit = $l : $limit = 20;
	
	 if (str_word_count($excerpt, 0) > $limit) {
          $words = str_word_count($excerpt, 2);
          $pos = array_keys($words);
          $excerpt = substr($excerpt, 0, $pos[$limit]) . '...';
     }
	echo $excerpt;
}

if ( ! function_exists( 'eo_infinite_scroll_js' ) ) {
	function eo_infinite_scroll_js() {
		global $eo_options;
	    if ( ( $eo_options['inf_scroll'] == '1' ) && ( is_home() || is_archive() ) ) { ?>
	    <script>
	    if ( ! navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
		    var infinite_scroll = {
		        loading: {
		            img: "<?php echo get_template_directory_uri(); ?>/panel/rsc/img/loading.gif",
		            msgText: "<?php _e( 'Loading the next set of posts...', 'eo_theme' ); ?>",
		            finishedMsg: "<?php _e( 'All posts loaded.', 'eo_theme' ); ?>"
		        },
		        "nextSelector":".pagination a.next",
		        "navSelector":".pagination",
		        "itemSelector":"#main .post",
		        "contentSelector":"#main .postshold"
		    };
		    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
		}
	    </script>
	    <?php
	    }
	}
}
add_action( 'wp_footer', 'eo_infinite_scroll_js',100 );

function eo_add_class_attachment($html){
	global $eo_options;
	// Add lightbox
    $postid = get_the_ID();
	if( strpos($html,"attachment_id") === false && $eo_options["use_lightbox"] == 1 ) $html = str_replace('class="thumbnail','class="thumbnail cboxElement',$html);
    return $html;
}
add_filter('wp_get_attachment_link','eo_add_class_attachment',99,1);
?>
