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

			<?php if (have_posts()) : ?>
        
                <h2 class="pagetitle">Search Results</h2>
        
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                </div>
        
        
                <?php while (have_posts()) : the_post(); ?>
        
                    <div <?php post_class() ?>>
                        <h3 id="post-<?php the_ID(); ?>">
                        	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <small><?php the_time('l, F jS, Y') ?></small>
                        
                        <div class="entry">
							 <?php $permalink = '<a class="readMore" href="'.get_permalink().'"> Read More...</a>';  ?>
                            <?php $truncateContent = truncate::doTruncate(strip_tags(get_the_content(), ''), 300, '.', $permalink); ?>    
                            <p><?php echo $truncateContent; ?></p>
                    	</div>
        
                        <p class="postmetadata">
							<?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    </div>
        
                <?php endwhile; ?>
        
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                </div>
        
            <?php else : ?>
        
                <h2 class="center">No posts found. Try a different search?</h2>
                <?php get_search_form(); ?>
                
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
        
            <?php endif; ?>

        </div><!-- /mainContent -->
        <?php get_sidebar(); ?>
        <br clear="all" /> <!-- important keeps content area same size as sidebar -->
    </div>
    <div class="im-mainContent-bottom"></div>
</div><!-- /wrapper -->

<?php get_footer(); ?>
