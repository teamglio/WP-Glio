<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
?>
            </div><!-- /container -->   
                <footer class="bottom">
                    <div class="container">
                        <div class="row">
                            <?php
                                if ( is_active_sidebar( 'footer-one' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("footer-one");
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-4"></div>
                                    <?php
                                };
                            ?>
                            <?php
                                if ( is_active_sidebar( 'footer-two' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("footer-two");
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-4"></div>
                                    <?php
                                };
                            ?>
                            <?php
                                if ( is_active_sidebar( 'footer-three' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("footer-three");
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-4"></div>
                                    <?php
                                };
                            ?>
                        </div>
                    </div>
                </footer>
                <?php wp_footer(); ?>
            <!-- More Scripts -->
            <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/typebutter.jquery.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/typebutter.glioregular.jquery.js"></script>
            <script type="text/javascript">
                jQuery('body').typeButter({
                    'default-spacing' : '0em'
                });
            </script>
            <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/classie.js"></script>
            <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/borderMenu.js"></script>
    </body>
</html>