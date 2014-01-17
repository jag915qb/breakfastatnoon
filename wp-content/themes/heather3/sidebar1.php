
<?php if (!art_sidebar(1)): ?>

<div class="Block">
  <div class="Block-body">
<div class="BlockHeader">
Categories
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>

<div class="BlockContent">
  <div class="BlockContent-body">
<ul>
  <?php wp_list_categories('show_count=0&title_li='); ?>
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
Search
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>

<div class="BlockContent">
  <div class="BlockContent-body">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" style="width: 95%;" />

<button class="Button" type="submit" name="search">
  <span class="btn">
    <span class="t">Search</span>
    <span class="r"><span></span></span>
    <span class="l"></span>
  </span>
</button>

</form>

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