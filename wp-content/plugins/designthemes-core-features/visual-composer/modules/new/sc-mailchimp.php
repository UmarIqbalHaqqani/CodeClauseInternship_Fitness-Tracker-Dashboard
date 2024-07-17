<?php

if (! class_exists ( 'DTMCSubscribe' ) ) {
    
    class DTMCSubscribe extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_mc_subscribe', array( $this, 'dt_sc_mc_subscribe' ) );

            add_action( 'wp_ajax_dt_mailchimp_subscribe', array( $this, 'dt_mailchimp_subscribe' ) );
            add_action( 'wp_ajax_nopriv_dt_mailchimp_subscribe', array( $this, 'dt_mailchimp_subscribe' ) );
        }

        function dt_mailchimp_subscribe() {

            $out = '';

            $apiKey = $_REQUEST['apikey'];
            $listId = $_REQUEST['listid'];
            
            if($apiKey != '' && $listId != '') {

                $data = array();

                if($_REQUEST['fname'] == ''):
                    $data = array('email' => sanitize_email($_REQUEST['email']));
                else:
                    $data = array('email' => sanitize_email($_REQUEST['email']), 'merge_fields' => array ( 'FNAME' => $_REQUEST['fname'] ));
                endif;

                if(dt_theme_mailchimp_check_member_already_registered($data, $apiKey, $listId)) {
                    $out = '<span class="error-msg"><b>'.esc_html__('Error:', 'designthemes-core').'</b> '.esc_html__('You have already subscribed with us !', 'designthemes-core').'</span>';
                } else {
                    $out = dt_theme_mailchimp_register_member($data, $apiKey, $listId);
                }

            } else {
                $out = '<span class="error-msg"><b>'.esc_html__('Error:', 'designthemes-core').'</b> '.esc_html__('Please make sure valid mailchimp details are provided.', 'designthemes-core').'</span>';
            }

            echo maruthi_wp_kses($out);

	die();            
        }       

        function dt_generate_css( $attrs ) {

            $css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            if( !empty( $attrs['height'] ) ) {
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' form .email-field-wrap, div#'.esc_attr( $attrs['el_id'] ).' form .btn-wrap { height:'.$attrs['height'].'px;}'."\n";
            }

            # Default State
                
                # Field                
                    $field_css = '';
                
                    # Field Text Color
                    if( $attrs['input-color'] == 'custom' &&  !empty( $attrs['input-custom-color'] ) ) {
                        $field_css .= 'color:'.$attrs['input-custom-color'].';';
                    } else {
                        $field_css .= 'color:'.$this->dt_current_skin( $attrs['input-color'] ).';';
                    }

                    # Fields BG Color
                    /*if( $attrs['input-shape'] == 'filled' ) {

                        if( $attrs['input-bg-color'] == 'custom' &&  !empty( $attrs['input-custom-bg-color'] ) ) {
                            $field_css .= 'background-color:'.$attrs['input-custom-bg-color'].';';
                        } else {
                            $field_css .= 'background-color:'.$this->dt_current_skin( $attrs['input-bg-color'] ).';';
                        }
                    }*/

                    # Field Border Color
                    if( $attrs['input-shape'] == 'filled' || $attrs['input-shape'] == 'bordered' ) {

                        $field_css .= 'border-style:solid; border-width:1px;';

                        if( $attrs['input-border-color'] == 'custom' &&  !empty( $attrs['input-custom-border-color'] ) ) {
                            $field_css .= 'border-color:'.$attrs['input-custom-border-color'].';';
                        } else {
                            $field_css .= 'border-color:'.$this->dt_current_skin( $attrs['input-border-color'] ).';';
                        }                            
                    }

                    if( !empty( $field_css ) ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' > form > div.email-field-wrap {'.$field_css.'}'."\n";
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' > form > div.btn-wrap.text-only {'.$field_css.'}'."\n";
                        
                    }                                    
                # Field
                
                # Field Icon
                    $field_icon_css = '';
                    if( $attrs['use_icon'] == 'yes' ) {

                        # Field Icon Color
                        if( $attrs['icon-color'] == 'custom' &&  !empty( $attrs['icon-custom-color'] ) ) {
                            $field_icon_css .= 'color:'.$attrs['icon-custom-color'].';';
                        } else {
                            $field_icon_css .= 'color:'.$this->dt_current_skin( $attrs['icon-color'] ).';';
                        }

                        # Field Icon BG Color
                        if( $attrs['icon-bg-color'] == 'custom' &&  !empty( $attrs['icon-custom-bg-color'] ) ) {
                            $field_icon_css .= 'background-color:'.$attrs['icon-custom-bg-color'].';';
                        } else {
                            $field_icon_css .= 'background-color:'.$this->dt_current_skin( $attrs['icon-bg-color'] ).';';
                        }

                        # Field Icon Border Color
                        $field_icon_css .= 'border-style:solid; border-width:1px;';
                        if( $attrs['icon-border-color'] == 'custom' &&  !empty( $attrs['icon-custom-border-color'] ) ) {
                            $field_icon_css .= 'border-color:'.$attrs['icon-custom-border-color'].';';
                        } else {
                            $field_icon_css .= 'border-color:'.$this->dt_current_skin( $attrs['icon-border-color'] ).';';
                        }

                        if( !empty( $field_icon_css ) ) {
                            $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' > form > div.email-field-wrap i {'.$field_icon_css.'}'."\n";
                        }
                    } 
                # Field Icon  

                # Button
                
                    # Icon
                        $i_color = '';
                        if( $attrs['btn_style'] == 'icon-only' || $attrs['btn_style'] == 'text-icon' ) {

                            if( $attrs['btn-color'] == 'custom' &&  !empty( $attrs['btn-custom-color'] ) ) {
                                $i_color .= 'color:'.$attrs['btn-custom-color'].';';
                            } else {
                                $i_color .= 'color:'.$this->dt_current_skin( $attrs['btn-color'] ).';';
                            }

                            if( !empty( $i_color ) ) {
                                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' .btn-wrap i {'.$i_color.'}'."\n";
                            }
                        }

                    # Button Item
                        $item_css = '';

                        # Button Text Color
                            if( $attrs['btn-color'] == 'custom' &&  !empty( $attrs['btn-custom-color'] ) ) {
                                $item_css .= 'color:'.$attrs['btn-custom-color'].';';
                            } else {
                                $item_css .= 'color:'.$this->dt_current_skin( $attrs['btn-color'] ).';';
                            }

                        # Button Background Color
                            if( $attrs['btn_shape'] == 'filled' ) {

                                if( $attrs['btn-bg-color'] == 'custom' &&  !empty( $attrs['btn-custom-bg-color'] ) ) {
                                    $item_css .= 'background-color:'.$attrs['btn-custom-bg-color'].';';
                                } else {
                                    $item_css .= 'background-color:'.$this->dt_current_skin( $attrs['btn-bg-color'] ).';';
                                }
                            }

                        # Button Border Color
                            if( $attrs['btn_shape'] == 'filled' || $attrs['btn_shape'] == 'bordered' ) {

                                $item_css .= 'border-style:solid; border-width:1px;';

                                if( $attrs['btn-border-color'] == 'custom' &&  !empty( $attrs['btn-custom-border-color'] ) ) {
                                    $item_css .= 'border-color:'.$attrs['btn-custom-border-color'].';';
                                } else {
                                    $item_css .= 'border-color:'.$this->dt_current_skin( $attrs['btn-border-color'] ).';';
                                }                            
                            }

                    if( !empty( $item_css ) ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' .btn-wrap > div {'.$item_css.'}'."\n";
                    }

            # Hover Color
                
                # Field
                    $field_h_css = '';

                    # Field Text Color
                        if( $attrs['input-hover-color'] == 'custom' &&  !empty( $attrs['input-hover-custom-color'] ) ) {
                            $field_h_css .= 'color:'.$attrs['input-hover-custom-color'].';';
                        } else {
                            $field_h_css .= 'color:'.$this->dt_current_skin( $attrs['input-hover-color'] ).';';
                        }

                    # Fields BG Color
                      /*  if( $attrs['input-shape'] == 'filled' ) {
                            if( $attrs['input-hover-bg-color'] == 'custom' &&  !empty( $attrs['input-hover-custom-bg-color'] ) ) {
                                $field_h_css .= 'background-color:'.$attrs['input-hover-custom-bg-color'].';';
                            } else {
                                $field_h_css .= 'background-color:'.$this->dt_current_skin( $attrs['input-hover-bg-color'] ).';';

                            }
                        }*/

                    # Field Border Color
                        if( $attrs['input-shape'] == 'filled' || $attrs['input-shape'] == 'bordered' ) {

                            $field_h_css .= 'border-style:solid; border-width:1px;';
                            if( $attrs['input-hover-border-color'] == 'custom' &&  !empty( $attrs['input-hover-custom-border-color'] ) ) {
                                $field_h_css .= 'border-color:'.$attrs['input-hover-custom-border-color'].';';
                            } else {
                                $field_h_css .= 'border-color:'.$this->dt_current_skin( $attrs['input-hover-border-color'] ).';';
                            }
                        }                                                

                    if( !empty( $field_h_css ) ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' > form > div:not(.dt-privacy-wrapper):hover {'.$field_h_css.'}'."\n";
                    }
                # Field

                # Field Icon
                    $field_icon_h_css = '';
                    if( $attrs['use_icon'] == 'yes' ) {                        

                        # Field Icon Color
                            if( $attrs['icon-hover-color'] == 'custom' &&  !empty( $attrs['icon-hover-custom-color'] ) ) {
                                $field_icon_h_css .= 'color:'.$attrs['icon-hover-custom-color'].';';
                            } else {
                                $field_icon_h_css .= 'color:'.$this->dt_current_skin( $attrs['icon-hover-color'] ).';';
                            }

                        # Field Icon BG Color
                            if( $attrs['icon-hover-bg-color'] == 'custom' &&  !empty( $attrs['icon-hover-custom-bg-color'] ) ) {
                                $field_icon_h_css .= 'background-color:'.$attrs['icon-hover-custom-bg-color'].';';
                            } else {
                                $field_icon_h_css .= 'background-color:'.$this->dt_current_skin( $attrs['icon-hover-bg-color'] ).';';
                            }

                        # Field Icon Border Color
                            $field_icon_h_css .= 'border-style:solid; border-width:1px;';
                            if( $attrs['icon-hover-border-color'] == 'custom' &&  !empty( $attrs['icon-hover-custom-border-color'] ) ) {
                                $field_icon_h_css .= 'border-color:'.$attrs['icon-hover-custom-border-color'].';';
                            } else {
                                $field_icon_h_css .= 'border-color:'.$this->dt_current_skin( $attrs['icon-hover-border-color'] ).';';
                            }


                        if( !empty( $field_icon_h_css ) ) {
                            $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' > form > div.email-field-wrap i:hover {'.$field_icon_h_css.'}'."\n";
                        }
                    }
                # Field Icon

                # Button
                
                    # Icon
                        $i_h_color = '';
                        if( $attrs['btn_style'] == 'icon-only' || $attrs['btn_style'] == 'text-icon' ) {

                            if( $attrs['btn-hover-color'] == 'custom' &&  !empty( $attrs['btn-hover-custom-color'] ) ) {
                                $i_h_color .= 'color:'.$attrs['btn-hover-custom-color'].';';
                            } else {
                                $i_h_color .= 'color:'.$this->dt_current_skin( $attrs['btn-hover-color'] ).';';
                            }

                            if( !empty( $i_color ) ) {
                                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' .btn-wrap:hover i {'.$i_h_color.'}'."\n";
                            }
                        }

                    # Button Item
                        $item_h_css = '';

                        # Button Text Color
                            if( $attrs['btn-hover-color'] == 'custom' &&  !empty( $attrs['btn-hover-custom-color'] ) ) {
                                $item_h_css .= 'color:'.$attrs['btn-hover-custom-color'].';';
                            } else {
                                $item_h_css .= 'color:'.$this->dt_current_skin( $attrs['btn-hover-color'] ).';';
                            }

                        # Button Background Color
                            if( $attrs['btn_shape'] == 'filled' ) {

                                if( $attrs['btn-hover-bg-color'] == 'custom' &&  !empty( $attrs['btn-hover-custom-bg-color'] ) ) {
                                    $item_h_css .= 'background-color:'.$attrs['btn-hover-custom-bg-color'].';';
                                } else {
                                    $item_h_css .= 'background-color:'.$this->dt_current_skin( $attrs['btn-hover-bg-color'] ).';';
                                }
                            }

                        # Button Border Color
                            if( $attrs['btn_shape'] == 'filled' || $attrs['btn_shape'] == 'bordered' ) {

                                $item_h_css .= 'border-style:solid; border-width:1px;';

                                if( $attrs['btn-hover-border-color'] == 'custom' &&  !empty( $attrs['btn-hover-custom-border-color'] ) ) {
                                    $item_h_css .= 'border-color:'.$attrs['btn-hover-custom-border-color'].';';
                                } else {
                                    $item_h_css .= 'border-color:'.$this->dt_current_skin( $attrs['btn-hover-border-color'] ).';';
                                }                            
                            }                            

                    if( !empty( $item_h_css ) ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' .btn-wrap:hover > div {'.$item_h_css.'}'."\n";
                    }                                                    

            return $css;
        }

        function dt_sc_mc_subscribe( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id'    => '',
                'listid'   => '',
                'radius'   => '',
                'height'   => '',
                'display'  => '',
                'gap'      => '',
                'el_class' => '',

                # INPUT
                    'input_label' => '',
                    'placeholder' => '',
                    'input-shape' => '',
                    'input-color' => '',
                    'input-custom-color' => '',

                    'input-bg-color' => '',
                    'input-custom-bg-color' => '',

                    'input-border-color' => '',
                    'input-custom-border-color' => '',

                    'input-hover-color' => '',
                    'input-hover-custom-color' => '',

                    'input-hover-bg-color' => '',
                    'input-hover-custom-bg-color' => '',

                    'input-hover-border-color' => '',
                    'input-hover-custom-border-color' => '',

                    'use_icon' => '',
                    'icon_alignment' => '',
                    'icon_type' => '',
                    'icon_type_entypo' => '',
                    'icon_type_fontawesome' => '',
                    'icon_type_icon_moon_line' => '',
                    'icon_type_icon_moon_solid' => '',
                    'icon_type_icon_moon_ultimate' => '',
                    'icon_type_linecons' => '',
                    'icon_type_material_design_iconic_font' => '',
                    'icon_type_material' => '',
                    'icon_type_monosocial' => '',
                    'icon_type_openiconic' => '',
                    'icon_type_pe_icon_7_stroke' => '',
                    'icon_type_stroke' => '',
                    'icon_type_typicons' => '',

                    'icon-color' => '',
                    'icon-custom-color' => '',

                    'icon-bg-color' => '',
                    'icon-custom-bg-color' => '',

                    'icon-border-color' => '',
                    'icon-custom-border-color' => '',

                    'icon-hover-color' => '',
                    'icon-hover-custom-color' => '',

                    'icon-hover-bg-color' => '',
                    'icon-hover-custom-bg-color' => '',

                    'icon-hover-border-color' => '',
                    'icon-hover-custom-border-color' => '',

                # Submit Button
                    'btn_shape' => '',
                    'btn_style' => '',
                    'btn_label' => '',
                    'btn_layout' => '',
                    'btn_icon_type' => '',
                    'btn_icon_type_entypo' => '',
                    'btn_icon_type_fontawesome' => '',
                    'btn_icon_type_icon_moon_line' => '',
                    'btn_icon_type_icon_moon_solid' => '',
                    'btn_icon_type_icon_moon_ultimate' => '',
                    'btn_icon_type_linecons' => '',
                    'btn_icon_type_material_design_iconic_font' => '',
                    'btn_icon_type_material' => '',
                    'btn_icon_type_monosocial' => '',
                    'btn_icon_type_openiconic' => '',
                    'btn_icon_type_pe_icon_7_stroke' => '',
                    'btn_icon_type_stroke' => '',
                    'btn_icon_type_typicons' => '',

                    'btn-color' => '',
                    'btn-custom-color' => '',

                    'btn-bg-color' => '',
                    'btn-custom-bg-color' => '',

                    'btn-border-color' => '',
                    'btn-custom-border-color' => '',

                    'btn-hover-color' => '',
                    'btn-hover-custom-color' => '',

                    'btn-hover-bg-color' => '',
                    'btn-hover-custom-bg-color' => '',

                    'btn-hover-border-color' => '',
                    'btn-hover-custom-border-color' => '',

                'css' => '',
				'privacy' => '',
                'align' => '',                
            ), $attrs ) );

            $out = '';
            $api_key = cs_get_option( 'mailchimp-key' );

            if( !empty( $api_key ) ) {

                $el_id = 'dt-'.$el_id;
                $css_classes = array(
                    $radius,
                    $display,
                    $gap, 
                    'dt-mc-subscribe',
                    'align-'.$align,
                    $el_class,
                    vc_shortcode_custom_css_class( $css ),
                );
                $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_mc_subscribe', $attrs ) );

                # Custom CSS
                $custom_css = '';
                $custom_css .= $this->dt_generate_css( $attrs );                 

                # Email
                    $field  = '';
                    $field .= '<div class="email-field-wrap">';
                    $field .= ' <div>';
                        $field .= !empty( $input_label ) ? '<label>'.esc_html( $input_label ).'</label>' : '';

                        if( $use_icon == 'yes' ) {
                            vc_icon_element_fonts_enqueue( $icon_type );
                            $field .= '<i class="'.${'icon_type_'.$icon_type}.' '.$icon_alignment.'"> </i>';
                        }

                        $field .= '<input type="email" name="dt_mc_emailid" required="required" ';
                        $field .= !empty( $placeholder ) ? 'placeholder="'.esc_attr( $placeholder ).'" />' : '/>';
                    $field .= ' </div>';
                    $field .= '</div>';

                # Button
                    $button = '';
                    $button .= '<div class="btn-wrap '.$btn_layout.' '.$btn_style.'">';
                    $button .= ' <div>';

                        if( $btn_style == 'text-icon' || $btn_style == 'icon-only' ) {

                            vc_icon_element_fonts_enqueue( $btn_icon_type );
                            
                            $button .= '<i class="'.${'btn_icon_type_'.$btn_icon_type}.'"> </i>';
                            if( $btn_style == 'icon-only' ) {
                                $button .= "<input type='submit' name='mc_submit' value=''>";
                            }
                        }

                        if( $btn_style == 'text-only' || $btn_style == 'text-icon' ) {
                            $button .= "<input type='submit' name='mc_submit' value='{$btn_label}'>";
                        }
                    $button .= ' </div>';
                    $button .= '</div>';


                $out .= '<div id="'.esc_attr(  $el_id ).'" class="'.esc_attr( $css_class ).'">';
                $out .= '   <form name="dt-subscribe" method="post">';
                $out .= "       <input type='hidden' name='dt_mc_listid' value='$listid' />";
                $out .= "       <input type='hidden' name='dt_mc_apikey' value='".$api_key."'/>";
                $out .=         $field;
                $out .=         $button;
                $out .= apply_filters('dt_sc_mailchimp_form_elements', $privacy, $attrs );
                $out .= '   </form>';
                $out .= '   <div class="dt-subscribe-msg"> </div>';
                $out .= '</div>';

                if( !empty( $custom_css ) ) {
                    $this->dt_print_css( $custom_css ); 
                }
            } else {
                $out .= '<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-warning">';
                $out .= '    <div class="vc_message_box-icon"> <i class="fa fa-exclamation-triangle"></i> </div> ';
                $out .= '    <p> <b>Oops!</b> <br/> '. __( 'It looks like you forgot to set your Mailchimp API key.', 'designthemes-core') .'</p>';
                $out .= '</div>';
            }

            return $out;
        }
    }
}

new DTMCSubscribe();