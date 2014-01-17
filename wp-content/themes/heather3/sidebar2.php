
<?php if (!art_sidebar(2)): ?>

<div class="Block">
  <div class="Block-body">
<div class="BlockHeader">
Bookmarks
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>

<div class="BlockContent">
  <div class="BlockContent-body">
<ul>
      <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
      </ul>
  </div>
  <div class="BlockContent-tl"></div>
  <div class="BlockContent-tr"><div></div></div>
  <div class="BlockContent-bl"><div></div></div>
  <div class="BlockContent-br"><div></div></div>
  <div class="BlockContent-tc"><div></div></div>
  <div class="BlockContent-bc"><div></div></div>
  <div class="BlockContent-cl"><div></div></div>
  <div class="BlockContent-cr"><div></div></div>
  <div class="BlockContent-cc"></div>
</div>

  </div>
</div>

<div class="Block">
  <div class="Block-body">
<div class="BlockHeader">
Archive
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>

<div class="BlockContent">
  <div class="BlockContent-body">
     <?php if ( is_404() || is_category() || is_day() || is_month() ||
            is_year() || is_search() || is_paged() ) {
      ?>
      <?php /* If this is a 404 page */ if (is_404()) { ?>
      <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

      <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
      <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
      for the day <?php the_time('l, F jS, Y'); ?>.</p>

      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
      for <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
      for the year <?php the_time('Y'); ?>.</p>

      <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
      <p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
      for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

      <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

      <?php } ?>

      <?php }?>
      
      <ul>
      <?php wp_get_archives('type=monthly&title_li='); ?>
      </ul>
    
  </div>
  <div class="BlockContent-tl"></div>
  <div class="BlockContent-tr"><div></div></div>
  <div class="BlockContent-bl"><div></div></div>
  <div class="BlockContent-br"><div></div></div>
  <div class="BlockContent-tc"><div></div></div>
  <div class="BlockContent-bc"><div></div></div>
  <div class="BlockContent-cl"><div></div></div>
  <div class="BlockContent-cr"><div></div></div>
  <div class="BlockContent-cc"></div>
</div>

  </div>
</div>


<div style="margin-left: 9px;">

<!-- Adsense Goes Here -->
<!-- Add the following lines (minus comment brackets) to style: -->
<!-- google_color_border = "e1e9e9"; -->
<!-- google_color_bg = "e1e9e9"; -->


<!-- Adsense Goes Here -->

</div>


<?php endif ?>