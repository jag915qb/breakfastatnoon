<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>
<ul>
<?php  if (function_exists('dynamic_sidebar') and dynamic_sidebar(2)) { } else { ?>
            <?php wp_list_bookmarks(); ?>   
<?php } ?>
</ul>