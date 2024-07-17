<?php
if (! class_exists ( 'DTBackendMenuWalker' ) ) {

    class DTBackendMenuWalker {

        function __construct() {

           add_filter( 'wp_edit_nav_menu_walker', array( $this, 'dt_edit_nav_menu' ) , 20, 2 );

           // add custom menu fields to menu
           add_filter( 'wp_setup_nav_menu_item', array( $this, 'dt_add_custom_nav_fields' ) );

           // save menu custom fields
           add_action( 'wp_update_nav_menu_item', array( $this, 'dt_update_menu_item' ), 10, 3 );

           add_filter( 'wp_nav_menu_objects', array( $this, 'dt_mega_menu_class_to_parent_items') );
        }

        function dt_edit_nav_menu($walker, $menu_id) {

            return 'DTBackendMenuWalkerEdit';
        }

        function dt_add_custom_nav_fields( $menu_item ) {

            $menu_item->icon = get_post_meta( $menu_item->ID, '_dt-menu-icon', true );
			$menu_item->hover_text = get_post_meta( $menu_item->ID, '_dt-menu-hover-text', true );
            $menu_item->image = get_post_meta( $menu_item->ID, '_dt-menu-image', true );
            $menu_item->icon_position = get_post_meta( $menu_item->ID, '_dt-menu-image-position', true );
            $menu_item->mega_width = get_post_meta( $menu_item->ID, '_dt-mega-menu-width', true );
            $menu_item->mega_position = get_post_meta( $menu_item->ID, '_dt-mega-menu-position', true );
            $menu_item->sub_menu_animation = get_post_meta( $menu_item->ID, '_dt-sub_menu_animation', true );

            return $menu_item;
        }

        function dt_update_menu_item( $menu_id, $menu_item_db_id, $args  ) {

            if ( is_array( $_REQUEST['dt-menu-icon']) ) {
                $image_value = $_REQUEST['dt-menu-icon'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-menu-icon', $image_value );
            }

            if ( is_array( $_REQUEST['dt-menu-htext']) ) {
                $hover_text = $_REQUEST['dt-menu-htext'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-menu-hover-text', $hover_text );
            }

            if ( is_array( $_REQUEST['dt-menu-image']) ) {
                $image_value = $_REQUEST['dt-menu-image'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-menu-image', $image_value );
            }

            if ( is_array( $_REQUEST['dt-menu-image-position']) ) {
                $image_value = $_REQUEST['dt-menu-image-position'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-menu-image-position', $image_value );
            }

            if ( is_array( $_REQUEST['dt-mega-menu-width']) ) {
                $image_value = $_REQUEST['dt-mega-menu-width'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-mega-menu-width', $image_value );
            }

            if ( is_array( $_REQUEST['dt-mega-menu-position']) ) {
                $image_value = $_REQUEST['dt-mega-menu-position'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-mega-menu-position', $image_value );
            }

            if ( is_array( $_REQUEST['dt-sub-menu-animation']) ) {
                $animation = $_REQUEST['dt-sub-menu-animation'][$menu_item_db_id];
                update_post_meta( $menu_item_db_id, '_dt-sub_menu_animation', $animation );
            }
        }

        function dt_mega_menu_class_to_parent_items( $items ) {

            $itemsMega = array();
            $itemsMegaCustomWidth = array();

            foreach ( $items as $item ) {

                // find all parents with mega menu siblings
                if ( $item->object == 'dt_mega_menus' ) {
                    $itemsMega[] = $item->menu_item_parent;
                }

                // find all parents with mega menu siblings with custom width
                if ( $item->mega_width ) {
                    $itemsMegaCustomWidth[] = $item->menu_item_parent;
                }
            }

            // if li has child mega menu add class
            foreach ( $items as $item ) {
                in_array( $item->ID, $itemsMega ) && $item->classes[] = 'has-mega-menu';
            }

            // if custom width is presented add class to parent to make relative position 
            foreach ( $items as $item ) {
                in_array( $item->ID, $itemsMegaCustomWidth ) && $item->classes[] = 'mega-menu-custom-width';
            }
            
            return $items;  
        }
    }

    new DTBackendMenuWalker();
}

class DTBackendMenuWalkerEdit extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {}

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = false;
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = get_the_title( $original_object->ID );
        } elseif ( 'post_type_archive' == $item->type ) {
            $original_object = get_post_type_object( $item->object );
            if ( $original_object ) {
                $original_title = $original_object->labels->archives;
            }
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( __( '%s (Invalid)' ), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( __('%s (Pending)'), $item->title );
        }

        $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

        $submenu_text = '';
        if ( 0 == $depth )
            $submenu_text = 'style="display: none;"';?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
            <div class="menu-item-bar">
                <div class="menu-item-handle">
                    <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item' ); ?></span></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-up-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-up" aria-label="<?php esc_attr_e( 'Move up' ); ?>">&#8593;</a>
                            |
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-down-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-down" aria-label="<?php esc_attr_e( 'Move down' ); ?>">&#8595;</a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo $item_id; ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>" aria-label="<?php esc_attr_e( 'Edit menu item' ); ?>"><?php _e( 'Edit' ); ?></a>
                    </span>
                </div>
            </div>

            <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
                <?php if ( 'custom' == $item->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                            <?php _e( 'URL' ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-wide">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                        <?php _e( 'Navigation Label' ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>
                <p class="field-title-attribute field-attr-title description description-wide">
                    <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                        <?php _e( 'Title Attribute' ); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                        <?php _e( 'Open link in a new tab' ); ?>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e( 'CSS Classes (optional)' ); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                    </label>
                </p>
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                        <?php _e( 'Link Relationship (XFN)' ); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                        <?php _e( 'Description' ); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-menu-icon",true); ?>
                <p class="field-dt-menui-con description description-wide">
                    <label for="edit-menu-item-dt-menu-icon-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Menu Icon' ,'designthemes-core');?><br/>
                    <input id="edit-menu-item-dt-menu-icon-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-menu-icon" type="text" name="dt-menu-icon[<?php echo esc_attr($item_id);?>]" value="<?php echo esc_attr($value);?>">
                    <span class="description"><?php esc_html_e('Please use font awesome icon ',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-menu-hover-text",true); ?>
                <p class="field-dt-menu-htext description description-wide">
                    <label for="edit-menu-item-dt-menu-htext-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Menu Hover Text' ,'designthemes-core');?><br/>
                    <input id="edit-menu-item-dt-menu-htext-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-menu-htext" type="text" name="dt-menu-htext[<?php echo esc_attr($item_id);?>]" value="<?php echo esc_attr($value);?>">
                    <span class="description"><?php esc_html_e('Please enter menu hover text ',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-menu-image",true); ?>
                <p class="field-dt-menu-image description description-wide">
                    <label for="edit-menu-item-dt-menu-image-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Menu Image' ,'designthemes-core');?><br/>
                    <input id="edit-menu-item-dt-menu-image-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-menu-image" type="text" name="dt-menu-image[<?php echo esc_attr($item_id);?>]" value="<?php echo esc_attr($value);?>">
                    <span class="description"><?php esc_html_e('Please use image url',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-menu-image-position",true);?>
                <p class="field-dt-menu-image-position description description-wide">
                    <label for="edit-menu-item-dt-menu-image-position-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Menu Icon / Image Position' ,'designthemes-core');?><br/>
                    <select id="edit-menu-item-dt-menu-image-position-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-menu-image-position" name="dt-menu-image-position[<?php echo esc_attr($item_id);?>]">
                        <option value="left" <?php selected( $value, 'left' ); ?>>Left</option>
                        <option value="top-left" <?php selected( $value, 'top-left' ); ?>>Top - Left</option>
                        <option value="right" <?php selected( $value, 'right' ); ?>>Right</option>
                        <option value="top-right" <?php selected( $value, 'top-right' ); ?>>Top - Right</option>
                        <option value="top-center" <?php selected( $value, 'top-center' ); ?>>Top - Center</option>
                    </select>
                    <span class="description"><?php esc_html_e('Please select image position',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-mega-menu-width",true); ?>
                <p class="field-dt-mega-menu-width description description-wide">
                    <label for="edit-menu-item-dt-mega-menu-width-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Mega Menu max-width' ,'designthemes-core');?><br/>
                    <input id="edit-menu-item-dt-mega-menu-width-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-mega-menu-width" type="number" name="dt-mega-menu-width[<?php echo esc_attr($item_id);?>]" value="<?php echo esc_attr($value);?>">
                    <span class="description"><?php esc_html_e('Please set Mega Menu Width',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $value = get_post_meta( $item->ID, "_dt-mega-menu-position",true);?>
                <p class="field-dt-mega-menu-position description description-wide">
                    <label for="edit-menu-item-dt-mega-menu-position-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Mega Menu Position' ,'designthemes-core');?><br/>
                    <select id="edit-menu-item-dt-mega-menu-position-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-mega-menu-position" name="dt-mega-menu-position[<?php echo esc_attr($item_id);?>]">
                        <option value="left" <?php selected( $value, 'left' ); ?>>Left</option>
                        <option value="right" <?php selected( $value, 'right' ); ?>>Right</option>
                        <option value="center" <?php selected( $value, 'center' ); ?>>Top - Center</option>
                    </select>
                    <span class="description"><?php esc_html_e('Please select Mega Menu Position',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <?php $animation = get_post_meta( $item->ID, '_dt-sub_menu_animation', true ); ?>
                <p class="field-dt-sub-menu-animation description description-wide">
                    <label for="edit-menu-item-dt-sub-menu-animation-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e( 'Sub Menu Animation' ,'designthemes-core');?><br/>
                    <select id="edit-menu-item-dt-sub-menu-animation-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-dt-sub-menu-animation" name="dt-sub-menu-animation[<?php echo esc_attr($item_id);?>]"><?php
                        $animations = array( '' => esc_html__('None','designthemes-core'),   
                            "animate bigEntrance"        =>  esc_attr__("bigEntrance",'designthemes-core'),
                            "animate bounce"             =>  esc_attr__("bounce",'designthemes-core'),
                            "animate bounceIn"           =>  esc_attr__("bounceIn",'designthemes-core'),
                            "animate bounceInDown"       =>  esc_attr__("bounceInDown",'designthemes-core'),
                            "animate bounceInLeft"       =>  esc_attr__("bounceInLeft",'designthemes-core'),
                            "animate bounceInRight"      =>  esc_attr__("bounceInRight",'designthemes-core'),
                            "animate bounceInUp"         =>  esc_attr__("bounceInUp",'designthemes-core'),
                            "animate bounceOut"          =>  esc_attr__("bounceOut",'designthemes-core'),
                            "animate bounceOutDown"      =>  esc_attr__("bounceOutDown",'designthemes-core'),
                            "animate bounceOutLeft"      =>  esc_attr__("bounceOutLeft",'designthemes-core'),
                            "animate bounceOutRight"     =>  esc_attr__("bounceOutRight",'designthemes-core'),
                            "animate bounceOutUp"        =>  esc_attr__("bounceOutUp",'designthemes-core'),
                            "animate expandOpen"         =>  esc_attr__("expandOpen",'designthemes-core'),
                            "animate expandUp"           =>  esc_attr__("expandUp",'designthemes-core'),
                            "animate fadeIn"             =>  esc_attr__("fadeIn",'designthemes-core'),
                            "animate fadeInDown"         =>  esc_attr__("fadeInDown",'designthemes-core'),
                            "animate fadeInDownBig"      =>  esc_attr__("fadeInDownBig",'designthemes-core'),
                            "animate fadeInLeft"         =>  esc_attr__("fadeInLeft",'designthemes-core'),
                            "animate fadeInLeftBig"      =>  esc_attr__("fadeInLeftBig",'designthemes-core'),
                            "animate fadeInRight"        =>  esc_attr__("fadeInRight",'designthemes-core'),
                            "animate fadeInRightBig"     =>  esc_attr__("fadeInRightBig",'designthemes-core'),
                            "animate fadeInUp"           =>  esc_attr__("fadeInUp",'designthemes-core'),
                            "animate fadeInUpBig"        =>  esc_attr__("fadeInUpBig",'designthemes-core'),
                            "animate fadeOut"            =>  esc_attr__("fadeOut",'designthemes-core'),
                            "animate fadeOutDownBig"     =>  esc_attr__("fadeOutDownBig",'designthemes-core'),
                            "animate fadeOutLeft"        =>  esc_attr__("fadeOutLeft",'designthemes-core'),
                            "animate fadeOutLeftBig"     =>  esc_attr__("fadeOutLeftBig",'designthemes-core'),
                            "animate fadeOutRight"       =>  esc_attr__("fadeOutRight",'designthemes-core'),
                            "animate fadeOutUp"          =>  esc_attr__("fadeOutUp",'designthemes-core'),
                            "animate fadeOutUpBig"       =>  esc_attr__("fadeOutUpBig",'designthemes-core'),
                            "animate flash"              =>  esc_attr__("flash",'designthemes-core'),
                            "animate flip"               =>  esc_attr__("flip",'designthemes-core'),
                            "animate flipInX"            =>  esc_attr__("flipInX",'designthemes-core'),
                            "animate flipInY"            =>  esc_attr__("flipInY",'designthemes-core'),
                            "animate flipOutX"           =>  esc_attr__("flipOutX",'designthemes-core'),
                            "animate flipOutY"           =>  esc_attr__("flipOutY",'designthemes-core'),
                            "animate floating"           =>  esc_attr__("floating",'designthemes-core'),
                            "animate hatch"              =>  esc_attr__("hatch",'designthemes-core'),
                            "animate hinge"              =>  esc_attr__("hinge",'designthemes-core'),
                            "animate lightSpeedIn"       =>  esc_attr__("lightSpeedIn",'designthemes-core'),
                            "animate lightSpeedOut"      =>  esc_attr__("lightSpeedOut",'designthemes-core'),
                            "animate pullDown"           =>  esc_attr__("pullDown",'designthemes-core'),
                            "animate pullUp"             =>  esc_attr__("pullUp",'designthemes-core'),
                            "animate pulse"              =>  esc_attr__("pulse",'designthemes-core'),
                            "animate rollIn"             =>  esc_attr__("rollIn",'designthemes-core'),
                            "animate rollOut"            =>  esc_attr__("rollOut",'designthemes-core'),
                            "animate rotateIn"           =>  esc_attr__("rotateIn",'designthemes-core'),
                            "animate rotateInDownLeft"   =>  esc_attr__("rotateInDownLeft",'designthemes-core'),
                            "animate rotateInDownRight"  =>  esc_attr__("rotateInDownRight",'designthemes-core'),
                            "animate rotateInUpLeft"     =>  esc_attr__("rotateInUpLeft",'designthemes-core'),
                            "animate rotateInUpRight"    =>  esc_attr__("rotateInUpRight",'designthemes-core'),
                            "animate rotateOut"          =>  esc_attr__("rotateOut",'designthemes-core'),
                            "animate rotateOutDownRight" =>  esc_attr__("rotateOutDownRight",'designthemes-core'),
                            "animate rotateOutUpLeft"    =>  esc_attr__("rotateOutUpLeft",'designthemes-core'),
                            "animate rotateOutUpRight"   =>  esc_attr__("rotateOutUpRight",'designthemes-core'),
                            "animate shake"              =>  esc_attr__("shake",'designthemes-core'),
                            "animate slideDown"          =>  esc_attr__("slideDown",'designthemes-core'),
                            "animate slideExpandUp"      =>  esc_attr__("slideExpandUp",'designthemes-core'),
                            "animate slideLeft"          =>  esc_attr__("slideLeft",'designthemes-core'),
                            "animate slideRight"         =>  esc_attr__("slideRight",'designthemes-core'),
                            "animate slideUp"            =>  esc_attr__("slideUp",'designthemes-core'),
                            "animate stretchLeft"        =>  esc_attr__("stretchLeft",'designthemes-core'),
                            "animate stretchRight"       =>  esc_attr__("stretchRight",'designthemes-core'),
                            "animate swing"              =>  esc_attr__("swing",'designthemes-core'),
                            "animate tada"               =>  esc_attr__("tada",'designthemes-core'),
                            "animate tossing"            =>  esc_attr__("tossing",'designthemes-core'),
                            "animate wobble"             =>  esc_attr__("wobble",'designthemes-core'),
                            "animate fadeOutDown"        =>  esc_attr__("fadeOutDown",'designthemes-core'),
                            "animate fadeOutRightBig"    =>  esc_attr__("fadeOutRightBig",'designthemes-core'),
                            "animate rotateOutDownLeft"  =>  esc_attr__("rotateOutDownLeft",'designthemes-core')
                        );

                        foreach( $animations as $key => $value ) { ?>
                            <option value="<?php echo $key; ?>" <?php selected( $animation, $key, true ); ?>><?php echo $value; ?></option><?php
                        }?>
                    </select>
                    <span class="description"><?php esc_html_e('Please select sub menu animation',  'designthemes-core'); ?></span>
                    </label>
                </p>

                <fieldset class="field-move hide-if-no-js description description-wide">
                    <span class="field-move-visual-label" aria-hidden="true"><?php _e( 'Move' ); ?></span>
                    <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e( 'Up one' ); ?></button>
                    <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e( 'Down one' ); ?></button>
                    <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                    <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                    <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e( 'To the top' ); ?></button>
                </fieldset>

                <div class="menu-item-actions description-wide submitbox">
                    <?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original: %s'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            admin_url( 'nav-menus.php' )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php _e( 'Remove' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                        ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
        $output .= ob_get_clean();
    }    
}