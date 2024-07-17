<?php
    class DTHeaderMenuWalker extends Walker_Nav_Menu {
	    
	  private $currentParent;

        public function start_lvl( &$output, $depth = 0, $args = array() ) {

            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }

            $indent = str_repeat( $t, $depth );
            $parent = $this->currentParent;

            // Default class.
		    $classes = array('sub-menu', 'is-hidden', $parent->sub_menu_animation );
            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $output .= "{$n}{$indent}<ul $class_names>{$n}";
            $output .= '<li class="go-back"><a href="javascript:void(0);"></a></li>';
            $output .= '<li class="see-all"></li>';
        }        

       public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		 
		    $this->currentParent = $item;

            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $classes[] = 'dt-menu-item-' . $item->ID;

            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

            // mega sub menu postion class
            $mega_sub_class = '';
            if ( $item->mega_position && $item->mega_width ) {
                $mega_sub_class = 'mega-position-'.$item->mega_position;
            }

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) .' ' . $mega_sub_class . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            // get custom params for mega sub menu 
            $mega_sub_style = '';
            if ($item->object == 'dt_mega_menus' && $depth == 1) {
                if ($item->mega_width) {
                    $mega_sub_style = ' style="width: '.$item->mega_width.'px;"';
                }
            }

            $output .= $indent . '<li' . $id . $class_names . $mega_sub_style .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            // add class for icon positions
            $atts['class']   = ! empty( $item->icon_position ) ? 'item-has-icon icon-position-'.$item->icon_position : '';

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            // This filter is documented in wp-includes/post-template.php
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            if ($item->object == 'dt_mega_menus' && $depth == 1) {

                $item_output = do_shortcode( get_post_field( 'post_content', $item->object_id ) );

                $sc_custom_css = get_post_meta($item->object_id, '_wpb_shortcodes_custom_css', true);
                if( !empty( $sc_custom_css ) ) {
                    wp_enqueue_style( 'maruthi-custom-inline' );
                    wp_add_inline_style( 'maruthi-custom-inline', wp_strip_all_tags( $sc_custom_css ) );
                }

                $custom_css = get_post_meta($item->object_id, '_wpb_post_custom_css', true);
                if( !empty( $custom_css ) ) {
                    wp_enqueue_style( 'maruthi-custom-inline' );
                    wp_add_inline_style( 'maruthi-custom-inline', wp_strip_all_tags( $custom_css ) );
                }                
            } else {

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';

                // add icon if set
                if ( !empty($item->icon) ) {
                    $item_output .= '<i class="menu-item-icon '.$item->icon.'"></i>';
                }

                // add image if set
                if ( !empty($item->image) ) {
					$item_output .= '<i class="menu-item-icon menu-item-image">' . '<img src="'.$item->image.'" />' . '</i>';
                }

                // add hover text
				$link_before = $args->link_before;
                if ( !empty($item->hover_text) && $depth == 0 ) {
					$link_before = '<span data-hover="'.$item->hover_text.'">';
				}

                $item_output .= $link_before . $title . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;                
            }

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }