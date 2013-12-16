<div class="sliderclass">
   <?php  global $virtue; 
         if(isset($virtue['mobile_slider_size'])) {$slideheight = $virtue['mobile_slider_size'];} else { $slideheight = 300; }
        if(isset($virtue['mobile_slider_size_width'])) {$slidewidth = $virtue['mobile_slider_size_width'];} else { $slidewidth = 480; }
        if(isset($virtue['mobile_slider_captions'])) { $captions = $virtue['mobile_slider_captions']; } else {$captions = '';}
        if(isset($virtue['home_mobile_slider'])) {$slides = $virtue['home_mobile_slider']; } else {$slides = '';}
                ?>
<div id="imageslider" class="container">
                   <div class="flexslider loading" style="max-width:<?php echo $slidewidth;?>px; margin-left: auto; margin-right:auto;">
                       <ul class="slides">
                        <?php foreach ($slides as $slide) : 
                          $image = aq_resize($slide['url'], $slidewidth, $slideheight, true);
                          if(empty($image)) {$image = $slide['url'];} ?>
                            <li> 
                            <?php if($slide['link'] != '') echo '<a href="'.$slide['link'].'">'; ?>
                              <img src="<?php echo $image; ?>" alt="<?php echo $slide['description']?>" title="<?php echo $slide['title'] ?>" />
                                  <?php if ($captions == '1') { ?> 
                                    <div class="flex-caption">
                                    <?php if ($slide['title'] != '') echo '<div class="captiontitle headerfont">'.$slide['title'].'</div>'; ?>
                                    <?php if ($slide['description'] != '') echo '<div><div class="captiontext headerfont"><p>'.$slide['description'].'</p></div></div>';?>
                                    </div> 
                              <?php } ?>
                        <?php if($slide['link'] != '') echo '</a>'; ?>
                      </li>
                  <?php endforeach; ?>
                       </ul>
              </div> <!--Flex Slides-->
              </div><!--Container-->
              </div><!--feat-->
               <?php  global $virtue; 
          $transtype = $virtue['mobile_trans_type']; if ($transtype == '') $transtype = 'slide';
          $transtime = $virtue['mobile_slider_transtime']; if ($transtime == '') $transtime = '300'; 
          $autoplay = $virtue['mobile_slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
          $pausetime = $virtue['mobile_slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
      ?>
      <script type="text/javascript">
            jQuery(window).load(function () {
                jQuery('.flexslider').flexslider({
                    animation: "<?php echo $transtype ?>",
                    animationSpeed: <?php echo $transtime ?>,
                    slideshow: <?php echo $autoplay ?>,
                    slideshowSpeed: <?php echo $pausetime ?>,
                    smoothHeight: true,

                    before: function(slider) {
                      slider.removeClass('loading');
                    }  
                  });
                });
      </script>