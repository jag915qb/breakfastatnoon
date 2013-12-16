<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Global + Admin Inits
require_once('inc/_init_setup.php');            // global initial setup (don't remove)
require_once('inc/_admin-init.php');            // global initial setup (don't remove)

//Front end inits
require_once('inc/eo/theme-functions.php');            // Front end functions

/* * * * * * DO NOT USE THIS FILE TO ADD YOUR CUSTOM FUNCTIONS in order not to lose your changes with future updates * * * * * * /

You are advised to create a seperate custom-functions.php and use get_template_part('custom-functions'); for your custom functions  in order not to lose your changes with future updates

/* * * * * * YOU HAVE BEEN WARNED * * * * * */

//require_once('library/shortcodes.php'); Shortcodes are disabled since they fall into 'plugin territory'
//require_once('library/plugins.php');          // plugins & extra functions (optional)
// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;
/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 *
 * @return string Filtered title.
 *
 * @note may be called from http://example.com/wp-activate.php?key=xxx where the plugins are not loaded.
 */
function bones_filter_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'bonestheme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'bones_filter_title', 10, 2 );


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'eo-featurette', 350, 290, true );
add_image_size( 'eo-highlight', 140, 140, true);
add_image_size( 'eo-carousel', 970, 360, true);

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer 1',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer2',
      'name' => 'Footer 2',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer3',
      'name' => 'Footer 3',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard row clearfix media">
                  <a class="pull-left" href="<?php echo comment_author_url(); ?>">
					<?php echo get_avatar( $comment, $size='75' ); ?>
                  </a>
				<div class="comment-text media-body">
                
					<?php printf('<h4 class="media-heading">%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','bonestheme'),'<span class="edit-comment btn btn-small btn-info"><i class="glyphicon glyphicon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.','bonestheme') ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    <?php 
					$args["login_text"] = '<span class="glyphicon glyphicon-log-in"></span> Login';
					$args["reply_text"] = '<span class="glyphicon glyphicon-comment"></span> Reply';
					$args["before"] = '<div class="comm_a_wrap btn btn-default">';
					$args["after"] = '</div>';
					
					 ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="glyphicon glyphicon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
	    $comments_by_type = separate_comments(get_comments('status=approve&post_id=' . $id));
	    return count($comments_by_type['comment']);
	} else {
	    return $count;
	}
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="form-inline" action="' . home_url( '/' ) . '" >
  <div class="form-group">
  <label style="display: none" class="label label-default screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="Search the Site..." />
  </div>
  <div class="form-group">
  <input type="submit" id="searchsubmit" class="btn btn-default" value="'. esc_attr__('Search','bonestheme') .'" />
  </div>
  </form>';
  return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'bonestheme') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'bonestheme') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'bonestheme' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag cloud output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
    $term_slug = "(get_tag($2) ? get_tag($2)->slug : get_category($2)->slug)";

        foreach( $tags as $tag ) {
        	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.$term_slug.'$3')", $tag );
        }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
	    add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> aaa
              <th><label class="label label-default" for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input class="form-control" type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea class="form-control" name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
function first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
        return $content;
    else
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter( 'the_content', 'first_paragraph' );

add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}

// enqueue styles
function eo_theme_head() {
	global $eo_options; 
	if( of_get_option( 'use_less') === "1" ) {
	// Have resources can be loaded less but chose regular css way
		// Less sources
		$less_rsrcs = of_get_option( 'use_less_for');
		if( !empty($less_rsrcs) & is_array($less_rsrcs) ) {
			$less_rsrcs_arr = array();
			foreach ( $less_rsrcs as $less_rsrc => $v) {
				if($v == "1")	$less_rsrcs_arr[] = $less_rsrc;
			}
			//var_dump($less_rsrcs_arr);
		}
		if(in_array("bootstrap",$less_rsrcs_arr) ) echo '<link rel="stylesheet/less" type="text/css" href="'.get_template_directory_uri() . '/lib/bootstrap/less/bootstrap.less">';
		if(in_array("fontawesome",$less_rsrcs_arr) ) echo '<link rel="stylesheet/less" type="text/css" href="'.get_template_directory_uri() . '/lib/font-awesome/less/font-awesome.less">';
		
	
	/*
	array (size=4)
  'bootstrap' => string '1' (length=1)
  'fontawesome' => string '1' (length=1)
  'example' => string '0' (length=1)
  'some_other' => string '0' (length=1)*/
	
		wp_register_script( 'less_js',  get_template_directory_uri() . '/lib/js/less.min.js', array(), '1.5.0', false );
		wp_enqueue_script('less_js');	
		
	}
	else {
			//var_dump(of_get_option( 'load_bs_fe') );

	//	if( of_get_option( 'load_bs_fe') == "1" ) {
					( of_get_option('use_bs_min_fe') == "1" ) ? $min = ".min" : $min = '' ;
					wp_register_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap'.$min.'.css', array(), '3.0.1', 'all' );
					wp_enqueue_style( 'bootstrap' );
	//	}
		
	}
	$use_bsw_theme = of_get_option( 'use_bsw_themes' );
	$bsw_theme = of_get_option( 'bsw_theme' );

	if( of_get_option( 'use_fontawesome') == "1" ) {
	//	( of_get_option('use_bs_min_css') == "1") ? $min = ".min" : $min = '' ;
		wp_register_style( 'fontawesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'fontawesome' );
	}
	if( of_get_option( 'use_lightbox') == "1" ) {
	//( of_get_option('use_bs_min_css') == "1") ? $min = ".min" : $min = '' ;
		wp_register_style( 'colorbox', get_template_directory_uri() . '/lib/colorbox/colorbox.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'colorbox' );
	}
	wp_register_style( 'bootstrap-ultimate', get_stylesheet_uri(), array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap-ultimate');
	if( $use_bsw_theme )	{
		wp_register_style( 'bsw_theme', get_template_directory_uri() . '/panel/of/themes/' . $bsw_theme . '.css', array("bootstrap"), '1.0', 'all' );
		wp_enqueue_style( 'bsw_theme' );
		// Glyphicons get lost when using Bootswatch theme, you need to redefine them, not sure which is better for this fix: another http request or a few lines of ugly inline <style> ?
	//	wp_register_style( 'missing_glyphs', get_template_directory_uri() . '/rsc/css/missing-glyphicons.css', array("bsw_theme"), '3.0.1', 'all' );
	//	wp_enqueue_style( 'missing_glyphs' );
	}
	else {
		wp_register_style( 'default_theme', get_template_directory_uri() . '/child/default/styles.css', array("bootstrap"), '1.0', 'all' );
		wp_enqueue_style( 'default_theme' );
	}
	/*
	Moved to directly before </head> just in case.
	if( of_get_option( 'override_css') == "1"  )	{
		wp_register_style( 'overrides', get_template_directory_uri() . '/lib/css/override.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'overrides');
	}*/
}
add_action( 'wp_enqueue_scripts', 'eo_theme_head' );

function eo_load_bs_less() { 

}



add_action( 'wp_enqueue_scripts', 'load_holder',-99999 );
add_action( 'wp_enqueue_scripts', 'theme_js' );

 function load_holder(){
	  if(of_get_option( 'use_placeholder') == "1" ) 	 {
	 	wp_register_script( 'placeholder',  get_template_directory_uri() . '/rsc/js/holder.js', array(), '2.0', false );	  
 		wp_enqueue_script('placeholder');
 	 }
 }

// enqueue javascript
if( !function_exists( "theme_js" ) ) {  
 function theme_js(){
	 
	 if(of_get_option( 'load_bs_fe') == "1" ) 	 {
		( of_get_option('use_bs_min_fe') == "1" ) ? $min = ".min" : $min = '' ;
		wp_register_script( 'bootstrap',  get_template_directory_uri() . '/lib/bootstrap/js/bootstrap'.$min.'.js', array(), '3.0.1', true );
		wp_enqueue_script('bootstrap');	  
	 }
	 
	  if(of_get_option( 'inf_scroll') == "1" ) 	 {
		wp_register_script( 'infinite-scroll',  get_template_directory_uri() . '/rsc/js/jquery.infinitescroll.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script('infinite-scroll');	  
	 }
	 
	if( of_get_option( 'bs_js_seperate') ) {
		$seperate_bs_jses = of_get_option('bs_js_seperate');
		if( !empty($seperate_bs_jses) && is_array($seperate_bs_jses) && of_get_option( 'load_bs_fe') != "1" ) {
			$sp_bsjs_arr = array();
			foreach ( $seperate_bs_jses as $seperate_bs_js => $v) {
				if($v == "1")	$sp_bsjs_arr[] = $seperate_bs_js;
			}
			foreach( $sp_bsjs_arr as $sp_bsjs ) {
				wp_register_script( $sp_bsjs,  get_template_directory_uri() . '/lib/bootstrap/js/'.$sp_bsjs.'.js', array(), '3.0.1', true );
				wp_enqueue_script($sp_bsjs);	
			}
		}
	}

	 if(of_get_option( 'use_lightbox') == "1" ) 	 {
	 	wp_register_script( 'colorbox',  get_template_directory_uri() . '/lib/colorbox/jquery.colorbox.js', array('jquery'), '1.4.33', true );	  
 		wp_enqueue_script('colorbox');
 	 }
    wp_register_script(  'modernizr', get_template_directory_uri() . '/rsc/js/modernizr.min.js',  array('jquery'),'2.6.3' );
	 wp_enqueue_script('modernizr');
	 
  
    wp_register_script( 'eo-scripts', get_template_directory_uri() . '/rsc/js/scripts.js', array('jquery'), '1.0', true );
    wp_enqueue_script('eo-scripts');
 }
}

function eo_inline_css_per_post(){
	global $post;
	$post_inline_css = get_post_meta($post->ID,'_eo_cust_post_css',true);
	if ( $post_inline_css) echo '<style>'  . $post_inline_css . ' </style>';
}
function eo_inline_js_per_post(){
	global $post;
	$post_inline_js = get_post_meta($post->ID,'_eo_cust_post_js',true);
	if ( $post_inline_js && is_singular() ) {
		 echo '<script type="text/javascript">'
        . $post_inline_js . '
        </script>';
	}
}
add_action('wp_footer','eo_inline_js_per_post');

// Get theme options
function inline_css_fe(){
	global $eo_options;
	
 $gl_u = get_template_directory_uri().'/lib/bootstrap/fonts/';
 $theme_options_styles = '';
 if ( $eo_options["sticky_footer"] == "1") {
	 $theme_options_styles .= 'html,body {  height: 100%;}
#wrap.stickyf {  min-height: 100%;  height: auto !important;  height: 100%;   margin: 0 auto -60px; padding: 0 0 60px;}
#footer {  height: 60px;  background-color: #f5f5f5;}';
	 
 }

 if(of_get_option('show_slider') == "1") $theme_options_styles .= '.navbar {margin-bottom: 0}';
 if(of_get_option('use_bsw_themes') == "1") {
	 /* bsw missing glyphicon fix */
	 $theme_options_styles .= '@font-face {
	  font-family: "Glyphicons Halflings";
	  src: url("'.$gl_u.'glyphicons-halflings-regular.eot");
	  src: url("'.$gl_u.'glyphicons-halflings-regular.eot?#iefix") format("embedded-opentype"), url("'.$gl_u.'glyphicons-halflings-regular.woff") format("woff"), url("'.$gl_u.'glyphicons-halflings-regular.ttf") format("truetype"), url("'.$gl_u.'glyphicons-halflings-regular.svg#glyphicons-halflingsregular") format("svg");
	}';
 }
       if ( isset($eo_options['eo_typo_body']) ) {
		  $typo_body = $eo_options['eo_typo_body'];
        $theme_options_styles .= '
        body{ 
         font-family: ' .str_replace("+"," ",$typo_body['face'] ). ';';
		 if ( $typo_body["source"] == "gwf_font" ) {
			  $vrnt = $typo_body['variant'];
			  ( preg_match('#[0-9]#',$vrnt) ) ? $fwe = preg_replace("/[^0-9]/", "",$vrnt) :  $fwe = 'normal';
			 if ( strpos( $vrnt,"italic") !== false ) $theme_options_styles .= 'font-style: italic;'; 
			  $theme_options_styles .= 'font-weight: ' . $fwe. ';'; 
		 }
		 if ( $typo_body["source"] == "os_font" ) $theme_options_styles .= 'font-weight: ' . $typo_body['style'] . ';'; 
         if( ! empty($typo_body['color']) ) $theme_options_styles .= 'color: ' . $typo_body['color'] . ';';
		 if( ! empty($typo_body['size']) ) $theme_options_styles .= 'font-size: ' . $typo_body['size'] . ';';
        $theme_options_styles .= '}';
      }
      if ( isset($eo_options['eo_typo_heading']) ) {
		  $typo_head = $eo_options['eo_typo_heading'];
        $theme_options_styles .= '
        h1, h2, h3, h4, h5, h6{		
          font-family: ' . str_replace("+"," ",$typo_head['face'] ). ';';
		  if ( $typo_head["source"] == "gwf_font" ) {
			  $vrnt = $typo_head['variant'];
			  ( preg_match('#[0-9]#',$vrnt) ) ? $fwe = preg_replace("/[^0-9]/", "",$vrnt) :  $fwe = 'normal';
			 if ( strpos( $vrnt,"italic") !== false ) $theme_options_styles .= 'font-style: italic;'; 
			  $theme_options_styles .= 'font-weight: ' . $fwe. ';'; 
		  }
		  if ( $typo_head["source"] == "os_font" ) $theme_options_styles .= 'font-weight: ' . $typo_head['style'] . ';'; 
       if( ! empty($typo_head['color']) )   $theme_options_styles .= 'color: ' . $typo_head['color'] . ';';
	//   if( ! empty($typo_head['size']) ) $theme_options_styles .= 'font-size: ' . $typo_head['size'] . ';';
       $theme_options_styles .= '}';
      }
	  if ( isset($eo_options['eo_typo_nav']) ) {
		  $typo_nav = $eo_options['eo_typo_nav'];
        $theme_options_styles .= '
       .navbar, .navbar-default .navbar-nav > li > a, .navbar-inverse .navbar-nav > li > a, .dropdown-menu > li > a{		
          font-family: ' . str_replace("+"," ",$typo_nav['face'] ). ';';
		 if ( $typo_nav["source"] == "gwf_font" ) {
			  $vrnt = $typo_nav['variant'];
			  ( preg_match('#[0-9]#',$vrnt) ) ? $fwe = preg_replace("/[^0-9]/", "",$vrnt) :  $fwe = 'normal';
			 if ( strpos( $vrnt,"italic") !== false ) $theme_options_styles .= 'font-style: italic;'; 
			  $theme_options_styles .= 'font-weight: ' . $fwe. ';'; 
		 }
		 if ( $typo_nav["source"] == "os_font" ) $theme_options_styles .= 'font-weight: ' . $typo_nav['style'] . ';'; 
         if( ! empty($typo_nav['color']) ) $theme_options_styles .= 'color: ' . $typo_nav['color'] . ';';
        $theme_options_styles .= '}';
      }
		//	 if ( $typo_body["source"] == "gwf_font" ) $theme_options_styles .= 'font-family: ' . $heading_typography['face'] . '; 
        
      
      $link_color = of_get_option( 'link_color' );
      if ($link_color) {
        $theme_options_styles .= '
        a{ 
          color: ' . $link_color . '; 
        }';
      }
      
      $link_hover_color = of_get_option( 'link_hover_color' );
      if ($link_hover_color) {
        $theme_options_styles .= '
        a:hover{ 
          color: ' . $link_hover_color . '; 
        }';
      }
	  $caru_of_prevent = of_get_option( 'caru_of_prevent' );
	  $caru_of_prevent_h = of_get_option( 'caru_of_prevent_h' );
      if ($caru_of_prevent) {
        $theme_options_styles .= '
        .carousel { 
			overflow: hidden;
			max-height: ' . $caru_of_prevent_h . '; 
          color: ' . $link_hover_color . '; 
        }';
      }
      
      $link_active_color = of_get_option( 'link_active_color' );
      if ($link_active_color) {
        $theme_options_styles .= '
        a:active{ 
          color: ' . $link_active_color . '; 
        }';
      }
      
      $topbar_position = of_get_option( 'nav_position' );
      if ($topbar_position == 'scroll') {
        $theme_options_styles .= '
        .navbar{ 
          position: static; 
        }
        body{
          padding-top: 0;
        }
        #content {
          padding-top: 27px;
        }
        ' 
        ;
      }
      
      $topbar_bg_color = of_get_option( 'top_nav_bg_color' );
      $use_gradient = of_get_option( 'showhidden_gradient' );

      if ( $topbar_bg_color && !$use_gradient ) {
        $theme_options_styles .= '
        .navbar-inner, .navbar .fill { 
          background-color: '. $topbar_bg_color . ';
          background-image: none;
        }' . $topbar_bg_color;
      }
      
      if ( $use_gradient ) {
        $topbar_bottom_gradient_color = of_get_option( 'top_nav_bottom_gradient_color' );
      
        $theme_options_styles .= '
        .navbar-inner, .navbar .fill {
          background-image: -khtml-gradient(linear, left top, left bottom, from(' . $topbar_bg_color . '), to('. $topbar_bottom_gradient_color . '));
          background-image: -moz-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: -ms-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ' . $topbar_bg_color . '), color-stop(100%, '. $topbar_bottom_gradient_color . '));
          background-image: -webkit-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . '2);
          background-image: -o-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'' . $topbar_bg_color . '\', endColorstr=\''. $topbar_bottom_gradient_color . '2\', GradientType=0);
        }';
      }
      else{
      } 
      
      $topbar_link_color = of_get_option( 'top_nav_link_color' );
      if ( $topbar_link_color ) {
        $theme_options_styles .= '
        .navbar .nav li a { 
          color: '. $topbar_link_color . ';
        }';
      }
      
      $topbar_link_hover_color = of_get_option( 'top_nav_link_hover_color' );
      if ( $topbar_link_hover_color ) {
        $theme_options_styles .= '
        .navbar .nav li a:hover { 
          color: '. $topbar_link_hover_color . ';
        }';
      }
      
      $topbar_dropdown_hover_bg_color = of_get_option( 'top_nav_dropdown_hover_bg' );
      if ( $topbar_dropdown_hover_bg_color ) {
        $theme_options_styles .= '
          .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover {
            background-color: ' . $topbar_dropdown_hover_bg_color . ';
          }
        ';
      }
      
      $topbar_dropdown_item_color = of_get_option( 'top_nav_dropdown_item' );
      if ( $topbar_dropdown_item_color ){
        $theme_options_styles .= '
          .dropdown-menu a{
            color: ' . $topbar_dropdown_item_color . ' !important;
          }
        ';
      }
      
      $jumbo_unit_bg_color = of_get_option( 'jumbo_bg_color' );
      if ( $jumbo_unit_bg_color ) {
        $theme_options_styles .= '
        .jumbotron { 
          background-color: '. $jumbo_unit_bg_color . ';
        }';
      }
      
      $suppress_comments_message = of_get_option( 'suppress_comments_message' );
      if ( $suppress_comments_message ){
    /*    $theme_options_styles .= '
        #main article {
          border-bottom: none;
        }';
		_eo-check: what does this have to do with anything ?*/
      }
      
      $additional_css = of_get_option( 'eo_custom_css' );
      if( $additional_css ){
        $theme_options_styles .= $additional_css;
      }
          
      if( $theme_options_styles ){
        echo '<style>' 
        . $theme_options_styles . '
        </style>';
      }
    
      $is_bs_test = isset($_REQUEST['bstest']);
	  

} // end get_wpbs_theme_options function

add_action('wp_footer', 'eo_front_js');
function eo_front_js() {
?>
<script type="text/javascript">
jQuery(document).ready(function($) {	
 <?php if( of_get_option( 'use_placeholder' ) == "1" ) { ?>
	// _eo-review: placeholder visibility fix
	$('.carousel-inner > img').each(function(index, element) {
		$(this).prependTo($(this).next(".item"));
	});
//	Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:30, font: "Monaco"})
 <?php } ?>
 
  <?php if( of_get_option( 'use_lightbox' ) == "1" ) { ?>
	 $('a.cboxElement').colorbox();
 <?php } ?>
 
 

	$().next().prepend($(this));

	// check input & selects for default bootstrap3 class .form-control
	$("input,select,textarea").each(function(index, element) {
		if(!$(this).hasClass("form-control") ) {
			$(this).addClass("form-control");
		}
	});
});
</script>
 <?php if( of_get_option( 'eo_custom_footer_js' )  ) { ?>
 <script type="text/javascript" >
 <?php	 echo of_get_option( 'eo_custom_footer_js' ); ?>
 </script>
 <?php } // emd custom_footer_js?>


<?php
}


if( $is_theme_opt_page ) {
	add_action('admin_head', 'eo_admin_js');	
}
function eo_admin_js() {
	
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {	
	/*
	_eo-review: equalize heights?
	var maxHeight = -1;
	$(".panel-group .panel-collapse").each(function(index, element) {
        var thizid = $(this).attr("id");
		$("#" + thizid + " .section").each(function(index, element) {
			maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
			     $(this).css("min-height",maxHeight);

			//alert("Height for #" + $(this).attr("id") + " : " + $(this).height());
   		 });
    });
*/

	
	var bsw_data = {
		action: 'wpbs_theme_check',
	};
		/*		
	var opt_data = {
		action: 'eo_opt_check_js',
	};*/
	
	$(".dependant input:checkbox").change(function(e) {
		 if (this.checked) {
     		   $(this).parent(".dependant").addClass("nowviz");
   		 }
    });



	
	$(".eot select.of-typography-source").change(function(e) {

    });

	
	$("select.of-typography-face.gwf_font").change(function(e) {
		var selectedsrc	= $(this).val();
		 <?php if( of_get_option( 'load_chosen_adm') == "1" ) { ?>
		var parid = $(this).parent().parent().parent().attr("id");
		var thevarselect = $("#" + parid + " select.of-typography-variant").attr("id");
		$("#"+thevarselect).chosen('destroy');
		<?php } 
		else { 
		?>
		var thevarselect = $(this).attr("id").replace('_face', '_variant');
	//	var thevarselect = $("#" + parid + ".of-typography-variant").attr("id");
		<?php } ?>
		$("#"+thevarselect).find("option:gt(0)").remove();
   		$("#"+thevarselect).find("option:first").text("Loading...").attr("id","loading");	
//		alert(selectedsrc);

		var gwf_v_data = {
			action: 'eo_get_gwf_variant',
			font_to_get: selectedsrc
	
		};
		$.post(ajaxurl, gwf_v_data, function(data, textStatus, jqXHR) {
			
			var variants = $.parseJSON(jqXHR.responseText);
		//	console.log(variants);

			   $.each(variants, function (index, value) {
				    $("<option/>").attr("value", value).text(value).appendTo($("#"+thevarselect));
			//		console.log(value);

				});
				$("#"+thevarselect).find("option#loading").remove();
				 <?php if( of_get_option( 'load_chosen_adm') == "1" ) { ?>
				$("#"+thevarselect).chosen({disable_search_threshold: 6});
				<?php } ?>
		//	alert(response);

		});
	});
	

	function eo_google_font_data(gwf_resp_data){
		
	};
	
	var gwf_upd_js_data = {
	//	action: 'eo_get_gwf_variant',
		//key: 

	};
	<?php $GWF_apikey = of_get_option( 'google_wf_apikey' ); ?>
	var gwfajaxurl = 'https://www.googleapis.com/webfonts/v1/webfonts?key=';
	$('#eo_upd_gwf').click( function(){ 
		$(this).prop('disabled', true);
		$(this).html('<span class="glyphicon glyphicon-cloud-download"></span>Checking fonts...');
		
		    $.getJSON('https://www.googleapis.com/webfonts/v1/webfonts?key=<?php echo $GWF_apikey ?>', function(response,data, textStatus, jqXHR) {
		//		alert(response);	
				console.log(response,data, textStatus, jqXHR);
				//eo_google_font_data(response);
			}).done(function(response,data, textStatus, jqXHR){
									var itemz = response.items;
									var a = itemz;
									var ptcnt = 0;
									var totalparts = Math.ceil(itemz.length / 100); 
									while(a.length) {
										ptcnt++;
										$('#eo_upd_gwf').html('<span class="glyphicon glyphicon-cloud-download"></span>Updating fonts...');
									//	console.log(a.splice(0,100));
								//		console.log("Sending part#" + ptcnt);
										var gwf_data = {
											action: 'eo_gwf_check',
											gwf_font_data: a.splice(0,100),
											part: ptcnt,
											totalparts: totalparts
										};
										$.post(ajaxurl, gwf_data,
										function(response,data, textStatus, jqXHR) {
										//	console.log(response,data, textStatus, jqXHR);
										//	$("#section-wpbs_theme").css("background","none");
										//	alert(response);
											    if ( response.indexOf('Success') !== -1 ){
													alert(response);
													location.reload();
													 $("#eo_upd_gwf").prop('disabled', false).html('<span class="glyphicon glyphicon-cloud-download"></span>Download / Update  <b>Google Fonts</b>');
												}
								
										});
									}
									
									
					          var totall = itemz.length; 
							      console.log( totall  );
				

					


						var real_items = [];
					  $.each( itemz, function( key, val ) {
						   $.each(val, function( keyy, vall ) {
							   real_items.push(val.family);
							   console.log( val.family  );
						   });
						//items.push( "<li id='" + key + "'>" + val + "</li>" );
					  });
					 console.log( real_items  );
					
				});

		/*
		$.post(gwfajaxurl, gwf_upd_js_data,
		function(response,data, textStatus, jqXHR) {
			var gwf_resp_data = $(jqXHR.responseText);
			console.log(response,data, textStatus, jqXHR);
	//		gwf_font_data
	//		console.log(response,data, textStatus, jqXHR);
		//	$("#section-wpbs_theme").css("background","none");
			alert(response);
			
	//		 $("#eo_upd_gwf").prop('disabled', false).html('<span class="glyphicon glyphicon-cloud-download"></span>Download / Update  <b>Google Fonts</b>');

		});*/
	});

	$('#check-bootswatch').click( function(){ 
		$(this).prop('disabled', true);
		$(this).html('<span class="glyphicon glyphicon-cloud-download"></span>Downloading themes...');

		$("#section-bsw_theme .option").css("visibility","hidden");
		$('<div class="alert alert-info" id="themes_loading"><img src="<?php echo get_template_directory_uri().'/panel/rsc/img/loading.gif' ?>" alt="loading" />This may take some time please be patient...You will be alerted when its complete<div class="progress progress-striped active"><div class="progress-bar" id="bsw_themes" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%"><span class="sr-only"Loading..</span></div></div><div class="alert alert-success"><ul id="bsw_down_list"><li>Getting themes..</li></ul><div></div>').insertBefore("#section-bsw_theme .option");
		function get_bsw_theme() {
			$.post(ajaxurl, bsw_data, function(data, textStatus, jqXHR) {
			/*  console.log( "success" );
			  console.log( bsw_data );
			  console.log( textStatus );
			  console.log( jqXHR.responseText );*/
				var aresp = $.parseJSON(jqXHR.responseText);
				var perc = aresp.percent;
				$('#bsw_themes').css('width', perc+'%');
			    $('#bsw_themes').html(perc+'%');
			    $('#bsw_themes').data("perc",perc);

			//  console.log( perc );
				if( perc == 100 ) {
					alert(aresp.msg);
					 $("#themes_loading").remove();
					 $("#section-bsw_theme .option").css("visibility","visible");
					 $("#check-bootswatch").prop('disabled', false).html('<span class="glyphicon glyphicon-cloud-download"></span>Download / Check theme updates');
				}
				else {
				function emul_load () {
					//fake a more realistic loading feeling
					(function(){
					var numLow = 600;
					var numHigh = 800;
					var adjustedHigh = (parseFloat(numHigh) - parseFloat(numLow)) + 1;
					var loademulsec = Math.floor(Math.random()*adjustedHigh) + parseFloat(numLow);
					var currw = $('#bsw_themes').width();
					var currv = parseInt($('#bsw_themes').text().replace("%",""));
					var p11 = parseInt(aresp.p1);
					//var loademulsec = Math.ceil(Math.random() * 200) + 4;
					var nextperc = 	$('#bsw_themes').css('width');
					if (  currv < perc + p11) {
						$('#bsw_themes').css('width', (currv+1) + '%');
						$('#bsw_themes').html((currv + 1) + '%');
						setTimeout(emul_load, loademulsec);
					}
					})();
				}
					emul_load();
					get_bsw_theme();
				//	emul_load();
					$("ul#bsw_down_list").append("<li><span class='glyphicon glyphicon-check'></span> Theme " + aresp.indexval + " of "+ aresp.total +" - <b> " + aresp.name + " </b>downloaded successfully</li>");
				}
//			  console.log( jqXHR.responseText );
			}).done(function() {
			  })
			  .fail(function() {
			  })
			  .always(function() {
			});
		};
		get_bsw_theme();
	});
});
</script>

<?php
}


add_action('wp_ajax_wpbs_theme_check', 'eo_get_bsw_theme');
add_action('wp_ajax_eo_gwf_check', 'eo_google_font_check');
add_action('wp_ajax_eo_js_opt_check', 'eo_opt_check_js');
function eo_opt_check_js($opt,$dept) {
	of_get_option( $opt );
	return ($opt == $dept) ? true : false;
}

function eo_google_font_check() {
	delete_transient( 'eo_comb_faces_trans');

	$GWF_apikey = of_get_option( 'google_wf_apikey' );
	$all_font_opt = get_option('eo_all_fonts_arr');
		
	$has_error = array_key_exists('error',$_POST["gwf_font_data"]);
	if($has_error) {
		$err_reason = $_POST["gwf_font_data"]["error"]["errors"][0]["reason"];
		//var_dump($err_reason);
		die("Error - reason :" . $err_reason );
	}
	else {
		if( isset($_POST["gwf_font_data"]) && is_array($_POST["gwf_font_data"]) && isset($_POST["part"]) && isset($_POST["totalparts"]) ) {

			$pt = $_POST["part"];
			$lastpt = $_POST["totalparts"];
			$beforelast = get_transient('eo_google_fnt_upd_part'.$lastpt-1);
			if( $_POST["part"] != $_POST["totalparts"] ) {
			//	die($_POST["part"] ."and". $_POST["totalparts"] );
				set_transient('eo_google_fnt_upd_trans_pt'.$pt, $_POST["gwf_font_data"], 60 * 4);
			}
			else {
				sleep(2);
			//	die("last partt" );
				$merged_parts = array();
				for ($i = 1; $i <= $pt; $i++) {
					if($i == $pt) {
						$eo_google_fnt_upd_trans_fin = array_merge($merged_parts,$_POST["gwf_font_data"]);
						set_transient('eo_google_fnt_upd_trans', $eo_google_fnt_upd_trans_fin);
					}
					else {
						$another_pt = get_transient('eo_google_fnt_upd_trans_pt'.$i);
						$merged_parts = array_merge($merged_parts,$another_pt);
				//		set_transient('joined_parts', $merged_parts, 60 * 4);
					}
				}
			
			
			//	$eo_google_fnt_upd_trans = get_transient('eo_google_fnt_upd_trans');
			//	$eo_google_fnt_upd_trans_fin = array_merge($eo_google_fnt_upd_trans,$_POST["gwf_font_data"]);

			/*	
				for ($i = 1; $i <= $pt+1; $i++) {
						$another_pt = get_transient('eo_google_fnt_upd_part'.$pt);
						array_merge($eo_google_fnt_updt,$another_pt);
				}*/
				$GWF_families = array();
				foreach ($eo_google_fnt_upd_trans_fin as $gfw_family ) {
			//		var_dump($gfw_family["family"]);
			//		die($gfw_family["family"]);
					$GWF_families[eo_sanitize_id($gfw_family["family"])] = array(
						"name" => $gfw_family["family"],
						"variants" => $gfw_family["variants"],
						"lastMod" => $gfw_family["lastModified"],
						"subsets" => $gfw_family["subsets"]
						);
				}
				$tfc = count($GWF_families);
				$google_font_src_arr = array(
				"font_src_slug" => "gwf_font",
				"font_src_name" => "Google Fonts",
				"font_faces" => $GWF_families
				);
				$all_font_opt["gwf_font"] = $google_font_src_arr;
			//	var_dump($google_font_src_arr);
					
				update_option( 'eo_googlefonts_arr', $google_font_src_arr );
				update_option( 'eo_all_fonts_arr', $all_font_opt );
				die('Success.Fonts updated. Total #'.$tfc.' fonts recieved, the page will be refreshed.');
			}
				/*
				foreach ($json['items'] as $gf_item)
				{
					
					$family = $gf_item['family'];
					$family_slug = strtolower($gf_item['family']);
					$variants = $gf_item['variants'];
					$subsets = $gf_item['subsets'];
					$files = $gf_item['files'];
					$lastModified = $gf_item['lastModified'];
				//	var_dump($json);
				}*/
		}

		//echo $result;
	}
	
}

add_action("wp_ajax_eo_get_gwf_variant", "eo_get_gwf_variant");

function eo_get_gwf_variant($ftg = NULL) {
	// _eo-todo: add nonce check
		// We should have Google fonts one way or another
//	var_dump($ftg);	
	$eo_fnts_prep = get_option ( 'eo_all_fonts_arr' );
	$def_gf_opt = get_option ( 'eo_def_gf_array' );
	
	if ( ! empty($eo_fnts_prep) && is_array($eo_fnts_prep) ) {
		//it's ok.
	}
	else if ( ! empty($def_gf_opt) && is_array($def_gf_opt) ) {
		$eo_fnts_prep = $def_gf_opt;
	}
	else {
		  die("No Google Fonts found ! #eo_err_code: 71");	
	}
	
	if ( isset($_POST["font_to_get"]) )	 {
		$font_to_get = strtolower(str_replace("+","",$_POST["font_to_get"]) );
	}
	else if ( isset($ftg) )	{
		$font_to_get = strtolower(str_replace("+","",$ftg) );	
	}
	else {
	//	die("["regular"]");
	}
	$face_trans = get_transient( 'eo_gwf_variants');
	if($face_trans) {
	//	delete_transient( 'eo_comb_faces_trans');
		
		$gwf_face_variants = $face_trans;
	}
	else {
		$gwf_faces = $eo_fnts_prep["gwf_font"]["font_faces"];
		$gwf_face_variants = array();
		foreach ( $gwf_faces as $fslug =>$gwf_face ) {
			$gwf_face_variants[$fslug] = $gwf_face["variants"];
		}
	///	$face_variants = $eo_fnts_prep["gwf_font"]["font_faces"][$font_to_get];
		// save the restructured array for later use for a short time - 120 mins
		set_transient( 'eo_gwf_variants', $gwf_face_variants, 60 * 1200 );
	}
	$fvar_ret = $gwf_face_variants[$font_to_get];
	// Return for php or die for ajax.
	if ( isset($_POST["font_to_get"]) )	 {
		die( json_encode($fvar_ret));
	}
	else if ( isset($ftg) )	{
		return $fvar_ret;
	}
}

add_action("wp_ajax_eo_del_opt", "eo_del_opt");

function eo_del_opt() {
		global $wpdb, $theme_opt_slug;
		
		if ( isset($_GET["del_what"]) ) {
			$delwg = $_GET["del_what"];
			if($delwg == "eo_transients") {
				if ( !wp_verify_nonce( $_REQUEST['nonce'], "eo_del_trans_nonce")) {
				  exit("Cheating ??");
				}
			}
			
		}
		else {
		  if ( !wp_verify_nonce( $_REQUEST['nonce'], "eo_del_opt_nonce")) {
			  exit("Cheating ??");
		   }   
		}
	
		$optionsframework_settings = get_option('optionsframework' );
		// _eo-review : Need a more unique prefix_ $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'cpt_%'" );
		($theme_opt_slug) ? $the_opt_id = $theme_opt_slug : $the_opt_id = get_option( $optionsframework_settings['id'] );
		$del_wht = $_REQUEST["del_what"];
		$acc_del_opts = array($the_opt_id,"eo_transients","eo_const","eo_custom_fields_opt","eo_all_fonts_arr","eo_opts","eo_gen_opt_cl","eo_def_gf_array","eo_googlefonts_arr");
		if($del_wht == "start_over") {
		//	$what_to_del = $del_wht;
			$last_op = end($acc_del_opts);
			foreach ( $acc_del_opts as $del_opt) {
				 $chck_opt_ex = get_option( $del_opt );
				 if($chck_opt_ex) {
					 delete_option($del_opt);
					 if( $last_op == $del_opt )	{ 
						$result = "All options & settings -should be- deleted";
					}
					else {
						$result = "Whoops could not delete all options";	
					}
				 }
			}

		}
		else if ( in_array($del_wht,$acc_del_opts) ) {
			if($del_wht == "eo_transients") {
				if ( is_multisite() ) {
					$all_sites = $wpdb->get_results( "SELECT * FROM $wpdb->blogs" );
					if ( $all_sites ) {
						foreach ($all_sites as $site) {
							$wpdb->set_blog_id( $site->blog_id );
							$wpdb->query( "DELETE FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE ('_transient_eo_%')" );
						}
					}
				}
				else {
					$wpdb->query( "DELETE FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE ('_transient_eo_%')" );
					$wpdb->query( "DELETE FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE ('_transient_timeout_eo_%')" );
				//	die("Transients deleted");
				}
			}
			$what_to_del = $del_wht;
			delete_option($del_wht);
		}
		else {
			exit("Cheating ?? #Trying to delete something else ?!!");
		}
	
	   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		  $result = json_encode($result);
		  echo $result;
	   }
	   else {
		  header("Location: ".$_SERVER["HTTP_REFERER"]);
	   }
	
	   die($result);

}


function get_bsw_theme () {
	
}

function eo_get_bsw_theme() {
	die("disabled");
}

/**
 * Add "has-submenu" CSS class to navigation menu items that have children in a
 * submenu.
 */
function nav_menu_item_parent_classing( $classes, $item )
{
    global $wpdb;
    
$has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );
    
    if ( $has_children > 0 )
    {
        array_push( $classes, "dropdown" );
    }
    
    return $classes;
}
 
add_filter( "nav_menu_css_class", "nav_menu_item_parent_classing", 10, 2 );


// _eo custom wp page menu since default doesnt support ul class for bootstrap
function eo_wp_page_menu( $args = array() ) {
	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;
//	var_dump($args);
	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item active"';
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new eo_Walker_Page();
	
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );
	//var_dump($menu);

	if ( $menu )
		$menu = '<ul class="' . esc_attr($args['ul_class']) . '">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['menu_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	
	
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}

function eo_main_nav_fallback() {
	eo_wp_page_menu( array(
		'show_home' => true,
		'menu_class' => 'top-nav clearfix navfback',      // adding custom nav class
		'ul_class' => 'nav navbar-nav ',      // adding custom nav class
	//	'include'     => 9999,
	//	'show_home' => true,
		'exclude'     => '',
		'echo'        => true,
		'link_before' => '',                            // before each link
		'link_after' => ''                             // after each link
	) );
}

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );
function toolbar_link_to_mypage( $wp_admin_bar ) {
	$the_th_slug = eo_get_cons("eo_theme","slug");
	($the_th_slug) ? $theme_slug = $the_th_slug : $theme_slug = 'options-framework';	
	$args = array(
		'id'    => 'bsul_aml',
		'title' => 'Bootstrap UL options',
		$url = admin_url( 'themes.php?page='.$theme_slug ),
		'href'  => $url,
		'meta'  => array( 'class' => 'bsul-theme-opt' )
	);
	$wp_admin_bar->add_node( $args );
}
//get_template_part('custom-functions');     // custom functions

/* TODO LIST

_eo-todo: fontawesome menus
_eo-todo: adjustable layout - main-sidebar colum widths, multiple sidebar
_eo-todo: code-cleanup
_eo-todo: Sort Google fonts by -last modified/updated-
_eo-todo: Pinned posts
_eo-todo: Options Import / Export ?
_eo-todo: Backgrounds -Subtle Patterns - ?
_eo-todo: Reorganize options
_eo-todo: Dismissable help / alerts
_eo-todo: Stackable / dismissable options
_eo-todo: Validation & sanity & dependancy checks for options
_eo-todo: Fix crash on adding new groups?
_eo-todo: Dismiss blocks in admin. ?
_eo-todo: Extended font support for Cufon, FontSquirrel etc. ?
_eo-todo: make left side menu drag & drop sortable ?
_eo-todo: Debug options for the end user ?
_eo-todo: Better docs ?
_eo-todo: Look for / build a child theme repository like Bootswatch ?
_eo-todo: Check font selects for no-js

DONE LIST
_eo-done: chosen disabled - font variant select conflict
_eo-done: [Shortcodes] - Not allowed in themes.
_eo-done: Update Google Font function for php-free js-only since WP doesnt allow
*/
?>