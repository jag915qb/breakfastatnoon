<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>
<ul>
	
    <li class="socialNetworking">
       <h2 class="widgettitle">Social Networking</h2><br />

		<?php if (get_option("dcolorOptions")) { 
            $dcolorOptions = get_option("dcolorOptions"); ?>
            
            <?php if ($dcolorOptions['feed'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['feed']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/feed.png" width="48" height="48" alt="Rss Feed" />
            	</a>
			<?php } ?>
            
             <?php if ($dcolorOptions['facebook'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['facebook']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/facebook.png" width="48" height="48" alt="Face Book" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['twitter'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['twitter']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/twitter.png" width="48" height="48" alt="Twitter" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['buzz'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['buzz']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/buzz.png" width="48" height="48" alt="Google Buzz" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['linkedin'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['linkedin']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/linkedin.png" width="48" height="48" alt="Linked In" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['friendfeed'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['friendfeed']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/friendfeed.png" width="48" height="48" alt="Friend Feed" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['myspace'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['myspace']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/myspace.png" width="48" height="48" alt="My Space" />
            	</a>
			<?php } ?>
            
            <?php if ($dcolorOptions['you'] != ''){ ?>
				<a rel="no follow" href="<?php echo $dcolorOptions['you']; ?>">
            		<img src="<?php bloginfo('template_url') ?>/images/youtube.png" width="48" height="48" alt="You Tube" />
            	</a>
			<?php } ?>
            
           
            
        <?php } else { ?>
        	<a rel="no follow" href="<?php bloginfo('rss2_url') ?>">
            	<img src="<?php bloginfo('template_url') ?>/images/feed.png" width="48" height="48" alt="Rss Feed" />
            </a>
        
        <?php } ?>
	</li>

	
       
   
<?php  if (function_exists('dynamic_sidebar') and dynamic_sidebar(5)) { } else { ?>
            
<?php } ?>
</ul>