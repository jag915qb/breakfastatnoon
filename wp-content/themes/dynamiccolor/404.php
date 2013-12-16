<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */

get_header();
?>

<div class="im-content-wrapper" align="center">
	<div class="im-mainContent-top"></div>
	<div class="im-content-frame">
    	<div class="im-mainContent">
            <h2 class="center">Error 404 - Not Found</h2>
            
            <?php $args = array(
                'smallest'  => 8, 
                'largest'   => 22,
                'unit'      => 'pt', 
                'number'    => 45,  
                'format'    => 'flat',
                'separator' => ', ',
                'orderby'   => 'name', 
                'order'     => 'ASC',
                'link'      => 'view', 
                'taxonomy'  => 'post_tag', 
                'echo'      => true ); ?>
            
            <?php wp_tag_cloud( $args ); ?>
            
    	</div><!-- /mainContent -->
        <?php get_sidebar(); ?>
        <br clear="all" /> <!-- important keeps content area same size as sidebar -->
    </div>
    <div class="im-mainContent-bottom"></div>
</div><!-- /wrapper -->

<?php get_footer(); ?>