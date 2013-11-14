<?php
/**
 * The main template file. Includes the loop.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */
?>

<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header  ?>

<?php tc__f('rec' , __FILE__ , __FUNCTION__ ); ?>

<div id="main-wrapper" class="container">
    <div class="span9">
        <div class="row unit-block">
            <div class="span9 unit-bg">
    
<!-- SECTION 1 -->
    <?php 
        do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! 
    ?>
<!-- END SECTION 1 -->
    
    
    <div class="container" role="main">
       
<!-- SECTION Custom -->
            <?php do_action( '__custom_at_begining'); ##my custom hook?>
<!-- END SECTION Custom -->
        
        <div class="row">
            
            
            
<!-- SECTION 2 -->
            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
<!-- END SECTION 2 -->
                    
            
            
<!-- SECTION 3 -->                    
                <div class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                <!-- ACTUAL HTML RENDERS --->
                <?php /*
                <div class="span12 article-container">
                    
                    <article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-uncategorized row-fluid">
                        
                        <section class="tc-content span12">
                            
                            <header class="entry-header">
                                <h2 class="entry-title format-icon">
                                    <a href="http://localhost:10080/own/?p=1" title="Permalink to Hello world!" rel="bookmark">Hello world!</a>
                                    <span class="comments-link">
                                    <span  class="fs1 icon-bubble"></span>
                                    <span class="inner">1</span></span>
                                </h2>
                                
                                <div class="entry-meta">

                                </div><!-- .entry-meta -->

                            </header><!-- .entry-header -->
                            
                            
                            <section class="entry-summary">
                                <p>Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!</p>
                            </section><!-- .entry-summary -->
                            
                        </section>
                        
                        <hr class="featurette-divider">
                    </article>
                </div>
                 */
                ?>
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>
                        
                        
                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>
                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                        <?php endif; ?>
                        
                        <?php if ( have_posts() && !is_404() ) : ?>
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                <?php the_post(); ?>
                                <article <?php tc__f('__article_selectors') ?>>
                                    <?php
                                        do_action( '__loop' );
                                    ?>
                                </article>
                        <?php endwhile; ?>
                        <?php endif; ##end if have posts ?>
                        
                        
                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>
<!-- END SECTION 3 -->
                    
                    
                </div><!--.article-container -->
                
                
                
                
<!-- SECTION 4 -->
            <?php do_action( '__after_article_container'); ##hook of left sidebar?>
<!-- END SECTION 4 -->
        
        </div><!--.row -->
        
<!-- SECTION Custom -->
        <?php do_action( '__custom_at_end'); ##my custom hook?>
<!-- END SECTION Custom -->
        
    </div><!-- .container role: main -->

    
<!-- SECTION 5 -->
    <?php do_action( '__after_main_container' ); ?>
<!-- END SECTION 5 -->



            </div>
        </div>
    </div>
</div><!--#main-wrapper"-->


<!-- SECTION 6 -->
<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
<!-- END SECTION 6 -->






