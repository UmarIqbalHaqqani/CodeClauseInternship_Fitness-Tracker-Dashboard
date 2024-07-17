<?php
if (! class_exists ( 'DTSimplerSidebar' ) ) {
    
    class DTSimplerSidebar extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_simpler_sidebar', array( $this, 'dt_sc_simpler_sidebar' ) );
        }

        function dt_sc_simpler_sidebar( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'simpler_id' => '',
                'direction' => '',
            ), $attrs ) );

            if( empty( $simpler_id ) )
                return;

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script( 'jquery.simpler-sidebar',  plugins_url('designthemes-core-features').'/shortcodes/js/jquery.simpler-sidebar.min.js', array('jquery','jquery-ui-core'), null, false );

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="dt-simpler-slider">';
            echo '<span></span> <span></span> <span></span>';
            echo '</div>';?>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        var simpler_slider = jQuery("div#<?php echo $simpler_id; ?>");
                        if( simpler_slider.length ) {
                            simpler_slider.simplerSidebar({
                                align:<?php echo '"'.$direction.'"'; ?>,
                                attr:<?php echo '"'.$simpler_id.'"'; ?>,
                                selectors: {
                                    trigger: <?php echo "'#".$el_id."'"; ?>,
                                },
                                events: {
                                    on : {
                                        animation : {
                                            open: function() {
                                                simpler_slider.addClass("dt-sc-simpler-content-open");
                                                simpler_slider.removeClass("dt-sc-simpler-content-close");
                                            },
                                            close: function() {
                                                simpler_slider.addClass("dt-sc-simpler-content-close");
                                                simpler_slider.removeClass("dt-sc-simpler-content-open");
                                            }
                                        }

                                    }
                                }
                            });
                        }
                    });
                </script>
            <?php
            $output = ob_get_clean();
            return $output;
        }        
    }
}

new DTSimplerSidebar();