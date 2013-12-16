<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<script language="JavaScript" type="text/javascript">
/* <![CDATA[ */
	function clearText(thefield){
	if (thefield.defaultValue==thefield.value)
	thefield.value = ""
	}
/* ]]> */
</script>

<?php wp_head(); ?>

<!--  get options array -->
<?php if (get_option("dcolorOptions")) { 
	$dcolorOptions = get_option("dcolorOptions");
	$color = $dcolorOptions['color'];
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/styles/'.$color.'.css" type="text/css" media="screen" />';
}
?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />


</head>
   
<body <?php body_class(); ?>>

<div class="im-header-wrapper" align="center">
	<div class="im-header-frame">
    	<div class="im-header">
        	<div class="header-lower-swirl"></div>
            <div class="nav-bar">
           		<div class="nav">
                	<div class="homeLink">
                    	<a href="<?php bloginfo('url'); ?>">
                        	<img class="homeLogo" src="<?php bloginfo('template_url'); ?>/images/house.png" width="20" height="20" alt="home logo" />Home
                        </a>
                    </div>
                	<?php wp_list_pages('title_li=' . __(' ') . ''); ?>
                </div>
            </div>
			<div class="blog-title"><a href="<?php bloginfo('url'); ?>"><h1><?php bloginfo('name'); ?></h1></a></div>
            <div class="blog-desc tahoma"><?php bloginfo('description'); ?></div>
            
             
  			<div class="searchBox">
            <form method="get" action="<?php bloginfo('wpurl'); ?>">
                    <div class="searchField">
                    <input type="text" name="s" size="26" class="searchInput transparent" id="s" 
                    onblur="this.value=(this.value=='') ? 'search' : this.value;" 
                    onfocus="clearText(this);" value="search" />
                    </div>
    
                    <div class="searchBTN">
                        <input type="image" name="submit" src="<?php bloginfo('template_url'); ?>/images/btn-search.png" 
                        onmouseover="this.src='<?php bloginfo('template_url'); ?>/images/btn-search-ov.png'" 
                        onmouseout="this.src='<?php bloginfo('template_url'); ?>/images/btn-search.png'" />
                    </div>
                </form>
    		</div>

            
        </div><!-- /header -->
    </div><!-- /frame -->
</div><!-- /wrapper -->