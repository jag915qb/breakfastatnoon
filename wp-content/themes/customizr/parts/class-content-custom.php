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
<div class="my personal custom stuff" >
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Today's Deal | Dealstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    
    <link href="http://wbpreview.com/previews/WB0G1X0T6/assets/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="http://wbpreview.com/previews/WB0G1X0T6/assets/app/css/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="well unit-bg">
                    <a href="list.html">
                        <img src="http://wbpreview.com/previews/WB0G1X0T6/assets/app/img/logo.png" alt="logo" width="100%"></a>
                </div>
                <div class="well unit-bg">
                    <ul class="nav nav-list">
                        <li class="active"><a href="list.html"><i class="icon-asterisk"></i>&nbsp;Today's Deal</a></li>
                        <li><a href="list.html"><i class="icon-headphones"></i>&nbsp;Products</a></li>
                        <li><a href="list.html"><i class="icon-briefcase"></i>&nbsp;Escapes</a></li>
                        <li><a href="list.html"><i class="icon-tag"></i>&nbsp;Past Deals</a></li>
                        <li><a href="#"><i class="icon-comment"></i>&nbsp;Discussion</a></li>
                        <li class="divider"></li>
                        <li><a href="contact.html"><i class="icon-question-sign"></i>&nbsp;Help</a></li>
                    </ul>
                </div>
                <div class="well unit-bg">
                    <p>
                        <i class="icon-envelope"></i>&nbsp;Get Deal Alerts</p>
                    <div class="input-append">
                        <input class="span2" id="inputEmail" type="text" placeholder="Enter your email">
                        <button class="btn" type="button">
                            OK</button>
                    </div>
                </div>
                <div class="well unit-bg">
                    <p>
                        <i class="icon-heart"></i>&nbsp;Follow Us</p>
                    <ul class="unstyled social">
                        <li>
                            <div class="fb-like-box" data-href="http://www.facebook.com/pages/Twitter/278029242253904"
                                data-width="292" data-show-faces="false" data-stream="false" data-header="false">
                            </div>
                        </li>
                        <li>
                            <ul class="unstyled socialicons">
                                <li class="Facebook"><a href="#" title="Facebook">Facebook</a></li>
                                <li class="Twitter"><a href="#" title="Twitter">Twitter</a></li>
                                <li class="Pinterest"><a href="#" title="Pinterest">Pinterest</a></li>
                                <li class="RSS"><a href="#" title="RSS">RSS</a></li>
                                <li class="Email"><a href="#" title="Email">Email</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/jquery/js/jquery-1.8.1.min.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-transition.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-alert.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-modal.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-tab.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-popover.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-button.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/fancybox/jquery.fancybox.pack.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/backstretch/js/jquery.backstretch.min.js"></script>
    <script src="http://wbpreview.com/previews/WB0G1X0T6/assets/app/js/script.js"></script>
    
    
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
    
    <div id="backstretch" 
         style="left: 0px; top: 0px; position: fixed; overflow: hidden; z-index: -999999; margin: 0px; padding: 0px; height: 288px; width: 1276px;">
        <img src="http://localhost:10080/own/wp-content/themes/customizr/inc/img/route66.jpg" 
             style="position: absolute; margin: 0px; padding: 0px; border: none; z-index: -999999; max-width: none; width: 1276px; height: 900.5873684210527px; left: 0px; top: -306.29368421052635px;">
    </div>
    
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
