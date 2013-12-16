<?php
/**
* Sidebar actions
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_custom {

    //Access any method or var of the class with classname::$instance -> var or method():
    static $instance;
    
    function __construct () {
        
        self::$instance =& $this;
        
        add_action('__custom_at_begining', array( $this , 'tc_custom_start_logic' ));
        add_action('__custom_at_end',      array( $this , 'tc_custom_end_logic' ));
    }


    /**
    * Returns custom code to generate custom code and or displays
    * 
    * @param Name of the widgetized area
    * @package Customizr
    * @since Customizr 1.0 
    */
    function tc_custom_start_logic() {
      
      ob_start();
?>
<div class="" > <!-- custom div -->
    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- facebook -->
    <div id="fb-root">
    </div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s);
            js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=279705068712379";
            fjs.parentNode.insertBefore(js, fjs);
        } (document, 'script', 'facebook-jssdk'));
    </script>
</div>

<?php
        $html = ob_get_contents();
        
        ob_end_clean();
        
        echo apply_filters( 'tc_custom_start_logic', $html );
        
    }//end of function
    
    
    /**
    * Not used yet
    * 
    * @param Name of the widgetized area
    * @package Customizr
    * @since Customizr 1.0 
    */
    function tc_custom_end_logic() {
    }
    
 }//end of class
