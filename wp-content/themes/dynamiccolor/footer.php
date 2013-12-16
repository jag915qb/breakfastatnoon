<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>
<div class="im-footer-wrapper" align="center">
	<div class="im-footer-top"></div>
	<div class="im-footer-frame">
    	<div class="im-footer">
        	<div class="im-lowerWidgets">
            	<div class="lowerWidget">
                	<div class="widgetFrame">
                		<?php include "widgetLeft.php"; ?>
                    </div>
                </div>
                <div class="lowerWidget">
                	<div class="widgetFrame">
                		<?php include "widgetCenterLeft.php"; ?>
                    </div>
                </div>
                <div class="lowerWidget">
                	<div class="widgetFrame">
                		<?php include "widgetCenterRight.php"; ?>
                    </div>
                </div>
                <div class="lowerWidget">
                	<div class="widgetFrame">
                		<?php include "widgetRight.php"; ?>
                    </div>
                </div>
            </div>
        </div><!-- /footer -->
        <div class="im-lower-footer">
        	<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
            <!-- If you'd like this theme having a link somewhere on your blog is the best way support it; Links are my only promotion or advertising. -->
            <p>
                <a href="http://wordpress.gordonfrench.com/dynamiccolor">DynamicColor</a>, by <a href="http://gordonfrench.com">Gordon French</a> | 
                <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
                and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
                <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
            </p>
            <p>
            	<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a>. 
            	
            </p>
        </div>
    </div><!-- /frame -->
</div><!-- /wrapper -->

<?php wp_footer(); ?>
       
</body>
</html>