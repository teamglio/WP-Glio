<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
?>
            </div><!-- /container -->   
                <footer class="sticky">
                    <div class="container">
                        <div class="row">
                            <?php
                                if ( is_active_sidebar( 'hp-one' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("hp-one");
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-4t"></div>
                                    <?php
                                };
                            ?>
                            <?php
                                if ( is_active_sidebar( 'hp-two' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("hp-two");
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
                                if ( is_active_sidebar( 'hp-three' ) ) {
                                    ?>
                                    <div class="col-md-4 col-sm-4 footer-widget-area">
                                        <div class="footer-center">
                                        <?php
                                        if (function_exists('dynamic_sidebar')) {
                                            dynamic_sidebar("hp-three");
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
            <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/classie.js"></script>
            <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/borderMenu.js"></script>
    </body>
</html>