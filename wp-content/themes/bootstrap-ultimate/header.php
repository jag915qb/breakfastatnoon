<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $eo_options;

?><!DOCTYPE html> 
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
               <?php if( ! empty ($eo_options["favicon_url"]) ) { ?>
       			<link rel="shortcut icon" href="<?php echo $eo_options["favicon_url"]; ?>">
				<?php } ?>
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="library/js/respond.min.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php if($eo_options["use_placeholder"] == "1") { ?>
		<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/rsc/js/holder.js'></script>
        <?php } ?>
		<!-- wordpress head functions -->
       <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- theme options from options panel -->
		<?php  inline_css_fe(); ?>
		<?php  if ( is_singular() ) eo_inline_css_per_post(); ?>

		<!-- typeahead plugin - if top nav search bar enabled -->
		<?php require_once('inc/typeahead.php'); ?>

		<?php if ( isset($eo_options['eo_typo_body']) && $eo_options['eo_typo_body']["source"] == "gwf_font") { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $eo_options['eo_typo_body']["face"] ?>:<?php echo $eo_options['eo_typo_body']["variant"] ?>' rel='stylesheet' type='text/css'>
        <?php } ?>
        <?php if ( isset($eo_options['eo_typo_heading']) && $eo_options['eo_typo_heading']["source"] == "gwf_font") { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $eo_options['eo_typo_heading']["face"] ?>:<?php echo $eo_options['eo_typo_heading']["variant"] ?>' rel='stylesheet' type='text/css'>
        <?php } ?>
		<?php if ( $eo_options['override_css']  == "1" ) { ?>
        <link rel='stylesheet' id='override-css'  href='<?php echo get_template_directory_uri()?>/rsc/css/override.css' type='text/css' media='all' />
        <?php } ?>
	</head>
	
	<body <?php ( of_get_option('nav_position')  == "fixed" ) ? body_class('fixednav') : body_class(); ?>>
	<div id="wrap" class="<?php if ( of_get_option('sticky_footer')  == "1" ) echo "stickyf" ?>">			
		<header role="banner">
			<div id="inner-header" class="clearfix">			
				<div class="navbar navbar-<?php echo of_get_option('nav_pref') ?><?php if ( of_get_option('nav_position')  == "fixed" ) echo " navbar-fixed-top" ?>">
					<div class="container" id="navbarcont">
						<div class="nav-container col-md-9">
							<nav role="navigation">
								<div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <?php
									$blogn = get_option('blogname');
									if ( of_get_option('trim_site_title')  == "1" ){
									$blogname = (strlen($blogn) > 18) ? substr($blogn,0,16).'..' : $blogn;
									}
									else {
										$blogname = $blogn;
									}
									 ?>
                                    
                                    <a class="navbar-brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                                        <?php if(of_get_option('branding_logo','')!='') { ?>
                                            <img src="<?php echo of_get_option('branding_logo'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
                                            <?php }
                                            if(of_get_option('site_name','1')) echo $blogname; ?></a>
 										<?php // var_dump(bloginfo('name')); ?>
								</div><!-- end .navbar-header -->
                                    
                                    <div class="navbar-collapse collapse">
                                        <?php if( $eo_options['custom_nav_markup'] ) {
											eo_main_nav(); // Adjust using Menus in Wordpress Admin 
										} else {
											wp_nav_menu();
										}?>
                                    </div>
                               
								
							</nav>							
						</div> <!-- end .nav-container -->
                        	<?php if(of_get_option('search_bar', '1')) {?>
                            <div class="searchwrap col-md-3">
                                <form class="navbar-form navbar-right form-inline" role="search" method="get" id="searchformtop" action="<?php echo home_url( '/' ); ?>">
                                    <div class="input-group">
                                        <input name="s" id="s" type="text" class="search-query form-control pull-right" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                                        <div class="input-group-btn">
                                           <button class="btn btn-info">
                                           <span class="glyphicon glyphicon-search"></span>
                                           </button>
                                       </div>
                                    </div>
                                </form>
                            </div>
							<?php } ?>
					</div> <!-- end #navcont -->
				</div> <!-- end .navbar -->
			
			</div> <!-- end #inner-header -->
		
		</header> <!-- end header -->
        <?php
        $sldr = of_get_option('show_slider');
		$sldr_p = of_get_option('slider_p');
		if($sldr && $sldr_p == "full" && is_home() ) eo_get_template_part( 'inc/carousel' ); ?>
		<div class="container" id="maincnot">
			<?php if($sldr && $sldr_p == "contain" && is_home() ) eo_get_template_part( 'inc/carousel' ); ?>