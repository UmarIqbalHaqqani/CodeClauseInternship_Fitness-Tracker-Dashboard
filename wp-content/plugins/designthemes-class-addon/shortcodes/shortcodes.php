<?php
class DTClassShortcodesDefinition {
	
	function __construct() {
		
		add_shortcode ( "dt_sc_classes_with_filter", array (
			$this,
			"dt_sc_classes_with_filter"
		) );

		add_shortcode ( "dt_sc_class_item", array(
			$this,
			"dt_sc_class_item"
		) );
		
		add_shortcode ( "dt_sc_class_nav", array (
			$this,
			"dt_sc_class_nav"
		) );
		
		add_shortcode ( "dt_sc_class_title", array (
			$this,
			"dt_sc_class_title"
		) );

		add_shortcode ( "dt_sc_class_info", array (
			$this,
			"dt_sc_class_info"
		) );

		add_shortcode("dt_sc_working_hours", array(
			$this,
			"dt_sc_working_hours"
		) );

		add_shortcode("dt_sc_work_hour", array(
			$this,
			"dt_sc_work_hour"
		) );

		add_shortcode ( "dt_sc_workout", array (
			$this,
			"dt_sc_workout"
		) );

		add_shortcode ( "dt_sc_bmi_calculator", array (
			$this,
			"dt_sc_bmi_calculator"
		) );
		
		add_shortcode("dt_sc_class_step", array(
			$this,
			"dt_sc_class_step"
		) );
		
		add_shortcode("dt_sc_subscription_info", array(
			$this,
			"dt_sc_subscription_info"
		) );

		add_shortcode ( "dt_sc_package_item", array(
			$this,
			"dt_sc_package_item"
		) );

		add_shortcode ( "dt_sc_trainers", array(
			$this,
			"dt_sc_trainers"
		) );
	}

	/* Class List */
	function dt_sc_class_item($attrs, $content = null) {
		extract(shortcode_atts(array(
			'class_id' => '',
			'style' => 'style-1',
			'button_text' => esc_html__('Read More', 'designthemes-class'),
			'excerpt_length' => '20'
		), $attrs));

		$out = "";

		#Performing query...
		$args = array('post_type' => 'dt_class', 'p' => $class_id );

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			while($the_query->have_posts()): $the_query->the_post();
				$PID = $class_id;

				#Meta...
				$class_settings = get_post_meta($PID, '_custom_settings', true);
				$class_settings = is_array ( $class_settings ) ? $class_settings : array ();

				$title = '<h3><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>';
				$btn   = '<a class="view" href="'.get_permalink().'" title="'.get_the_title().'"><span data-hover="'.esc_attr($button_text).'">'.esc_html($button_text).'</span>'.'</a>';

				$out .= '<div class="dt-sc-class-item '.$style.'">';
					$out .= '<div class="image">';
							if(has_post_thumbnail()):
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								$out .= get_the_post_thumbnail($PID, 'full', $attr);
							else:
								$out .= '<img src="http'.maruthi_ssl().'://place-hold.it/500x351&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'"/>';
							endif;

							if( $style != 'style-4' ):
								$out .= '<div class="dt-sc-class-overlay">';
									$out .= $title.$btn;
								$out .= '</div>';
							endif;
					$out .= '</div>';

					if( $style == 'style-4' ):
						$out .= '<div class="details">';
							$out .= $title;
							$out .= maruthi_excerpt($excerpt_length);

							if( array_key_exists('class-time', $class_settings) ):
								$out .= '<div class="dt-sc-class-time">';
									$out .= $class_settings["class-time"];
								$out .= '</div>';
							endif;

							if( array_key_exists('class-trainers', $class_settings) ):
								$out .= '<div class="dt-sc-class-trainer">';
									$out .= get_the_title( $class_settings["class-trainers"][0] );
								$out .= '</div>';
							endif;

							$out .= $btn;
						$out .= '</div>';
					endif;
				$out .= '</div>';
			endwhile;
			wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "designthemes-class").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "designthemes-class").'</p>';
		endif;

		return $out;
	}

	/**
	 * class list : filterable class list
	 * @return string
	 */
	function dt_sc_classes_with_filter($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'posts_column' => 'one-third-column', // one-third-column
			'filter' => '',
			'meta_fields' => '',
			'style' => 'style-1',
			'button_text' => esc_html__('Read More', 'designthemes-class'),
			'excerpt_length' => '20'
		), $attrs));

		$out = "";
		$post_layout = $posts_column;
		$div_class = "";

		#Post layout check...
		switch($post_layout) {
			case "one-half-column":
				$div_class = "dt-sc-fitness-class dt-sc-one-half column"; break;
			
			case "one-third-column":
				$div_class = "dt-sc-fitness-class dt-sc-one-third column"; break;

			case "one-fourth-column":
				$div_class = "dt-sc-fitness-class dt-sc-one-fourth column"; break;
		}

		if(empty($categories)) {
			$cats = get_categories('taxonomy=class_entries&hide_empty=1');
			$cats = get_terms( array('class_entries'), array('fields' => 'ids'));		
		} else {
			$cats = explode(',', $categories);
		}

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		#Performing query...
		$args = array('post_type' => 'dt_class', 'paged' => $paged , 'posts_per_page' => $limit,
			'tax_query' => array( 
				array(
					'taxonomy' => 'class_entries', 
					'field' => 'id', 
					'terms' => $cats
				)));

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			if($filter != "no"):
				$out .= '<div class="dt-sc-fitness-class-sorting">';
					$out .= '<a href="#" class="active-sort" data-filter="*"><span>'.esc_html__("All", "designthemes-class").'</span></a>';
					foreach($cats as $term) {
						$myterm = get_term_by('id', $term, 'class_entries');
						$out .= '<a href="#" data-filter=".'.esc_attr(strtolower($myterm->slug)).'">';
							$out .= '<span>'.esc_html($myterm->name).'</span>';
						$out .= '</a>';
					}
                $out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-fitness-class-container">';
				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();
					$terms = wp_get_post_terms($PID, 'class_entries', array("fields" => "slugs"));

					#Meta...
					$class_settings = get_post_meta($PID, '_custom_settings', true);
					$class_settings = is_array ( $class_settings ) ? $class_settings : array ();

					$out .= '<div class="'.esc_attr($div_class)." ".esc_attr(strtolower(implode(" ", $terms))).'">';

						$title = '<h3><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>';
						$btn   = '<a class="view" href="'.get_permalink().'" title="'.get_the_title().'"><span data-hover="'.esc_attr($button_text).'">'.esc_html($button_text).'</span></a>';
		
						$out .= '<div class="dt-sc-class-item '.$style.'">';
							$out .= '<div class="image">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($PID, 'full', $attr);
									else:
										$out .= '<img src="http'.maruthi_ssl().'://place-hold.it/500x351&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'"/>';
									endif;

									if( $style != 'style-4' ):
										$out .= '<div class="dt-sc-class-overlay">';
											$out .= $title.$btn;
										$out .= '</div>';
									endif;
							$out .= '</div>';

							if( $style == 'style-4' ):
								$out .= '<div class="details">';
									$out .= $title;
									$out .= maruthi_excerpt($excerpt_length);

									if( array_key_exists('class_opt_flds', $class_settings) && $meta_fields == 'yes' ):
										$out .= '<div class="dt-sc-class-meta">';
											$out .= '<ul>';
												for($i = 1; $i <= (sizeof($class_settings['class_opt_flds']) / 2); $i++):
									
													$title = $class_settings['class_opt_flds']['class_opt_flds_title_'.$i];
													$value = $class_settings['class_opt_flds']['class_opt_flds_value_'.$i];
									
													if( !empty($value) ):
														$out .= '<li>';
															$out .= '<h6>'.esc_html($title).'</h6>';
															$out .= '<p>'.esc_html($value).'</p>';
														$out .= '</li>';
													endif;
												endfor;
											$out .= '</ul>';
										$out .= '</div>';
									endif;

									if( array_key_exists('class-time', $class_settings) ):
										$out .= '<div class="dt-sc-class-time">';
											$out .= $class_settings["class-time"];
										$out .= '</div>';
									endif;

									if( array_key_exists('class-trainers', $class_settings) ):
										$out .= '<div class="dt-sc-class-trainer">';
											$trainer_id = $class_settings["class-trainers"][0];
											$trainer_settings = get_post_meta($trainer_id, '_custom_settings', true);
											$trainer_settings = is_array ( $trainer_settings ) ? $trainer_settings : array ();

											if( array_key_exists('profile_url', $trainer_settings) ):
												$out .= '<a href="'.esc_url( $trainer_settings['profile_url'] ).'" title="'.get_the_title( $trainer_id ).'">';
											endif;

											$out .= get_the_title( $trainer_id );

											if( array_key_exists('profile_url', $trainer_settings) ):
												$out .= '</a>';
											endif;
										$out .= '</div>';
									endif;

									$out .= $btn;
								$out .= '</div>';
							endif;
						$out .= '</div>';
					
					$out .= '</div>';
				endwhile;
			$out .= '</div>';
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "designthemes-class").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "designthemes-class").'</p>';
		endif;

		return $out;
	}

	/**
	 * classs nav
	 * @return string
	 */
	function dt_sc_class_nav($attrs, $content = null) {
		extract( shortcode_atts( array(
			'navigations' => '',
			'el_class' => ''
		), $attrs ) );

		$out = '';
		$values = (array) vc_param_group_parse_atts( $navigations );
		
		if(!empty($values)) :
			$out .= '<ul class="dt-sc-vertical-nav '.$el_class.'">';
				foreach( $values as $value ) {
					$out .= '<li><a href="'.$value['link'].'">';
					if(!empty($value['icon'])):
						$out .= '<span class="'.$value['icon'].'"></span>';
					endif;
					$out .= $value['name'].'</a></li>';
				}
			$out .= '</ul>';
		endif;

		return $out;
	}

	/**
	 * classs title
	 * @return string
	 */
	function dt_sc_class_title($attrs, $content = null) {
		extract( shortcode_atts( array(
			'class' => ''
		), $attrs ) );

		global $post;
		$class = !empty( $class ) ? ' class="'.$class.'"' : '';

		$out = '<h2'.$class.'>'.get_the_title($post->ID).'</h2>';

		return $out;
	}

	/**
	 * class info
	 * @return string
	 */
	function dt_sc_class_info($attrs, $content = null) {
		extract(shortcode_atts(array(
			'meta' => ''
		), $attrs));

		global $post;
		$out = "";

		$out = '<div class="dt-sc-fitness-class-short-details-wrapper">';
			if(has_post_thumbnail()):
				$attr = array('title' => get_the_title(), 'alt' => get_the_title());
				$out .= get_the_post_thumbnail($post->ID, 'full', $attr);
			else:
				$out .= '<img src="http'.maruthi_ssl().'://place-hold.it/900x445&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			endif;

			if($meta != 'no'):
				$out .= '<div class="dt-sc-fitness-class-short-details">';
					$class_settings = get_post_meta($post->ID, '_custom_settings', true);
					$class_settings = is_array ( $class_settings ) ? $class_settings : array ();

					if(array_key_exists('subtitle', $class_settings))
						$out .= '<h2>'.esc_html($class_settings['subtitle']).'</h2>';
					$out .= '<ul>';
						if(array_key_exists('levels', $class_settings))
							$out .= '<li> <span> '.esc_html__('Workout Levels', 'designthemes-class').' </span> : '.esc_html($class_settings['levels']).' </li>';
						if(array_key_exists('timing', $class_settings))
							$out .= '<li> <span> '.esc_html__('Workout Timing', 'designthemes-class').' </span> : '.esc_html($class_settings['timing']).' </li>';
						if(array_key_exists('duration', $class_settings))
							$out .= '<li> <span> '.esc_html__('Goal Duration', 'designthemes-class').' </span> : '.esc_html($class_settings['duration']).' </li>';

						if( array_key_exists('class_opt_flds', $class_settings) ):
							for($i = 1; $i <= (sizeof($class_settings['class_opt_flds']) / 2); $i++):

								$title = $class_settings['class_opt_flds']['class_opt_flds_title_'.$i];
								$value = $class_settings['class_opt_flds']['class_opt_flds_value_'.$i];

								if( !empty($value) ):
									$out .= '<li> <span> '.esc_html($title).' </span> : '.maruthi_wp_kses($value).' </li>';
								endif;
							endfor;
						endif;
					$out .= '</ul>';
				$out .= '</div>';
			endif;
		$out .= '</div>';

		return $out;
	}

	/**
	 * working hours
	 * @return string
	 */
	function dt_sc_working_hours( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'text' => '', 'class' => ''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$text = !empty( $text ) ? "<p>{$text}</p>" : "";
		return "<div class='dt-working-hours $class'><ul>{$content}</ul>{$text}</div>";
	}

	/**
	 * work hour
	 * @return string
	 */
	function dt_sc_work_hour( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'day' => '','time'=>''), $attrs ) );
		return "<li>{$day} :<span>{$time}</span></li>";
	}

	/**
	 * workout
	 * @return string
	 */
	function dt_sc_workout($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'image' => '',
			'link' => '',
			'add_icon' => '',
			'iconclass' => '',
			'class' => ''
		), $attrs ) );

		if( empty( $image ) )
			$class .= ' no-workout-thumb';

		$out = '<div class="dt-sc-workouts '.esc_attr($class).'">';

			if(!empty($image)):
				$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
				$image = $image['thumbnail'];

				$out .= '<div class="dt-sc-workouts-thumb">';
					$out .= $image;
				$out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-workouts-details">';
				$out .= '<h6>'.esc_html($subtitle).'</h6>';
				$out .= '<h4>'.esc_html($title).'</h4>';
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

				$link = ( '||' === $link ) ? '' : $link;
				$link = vc_build_link( $link );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = !empty($link['target']) ? $link['target'] : '_self';

				$icon = "";
				if( $add_icon == 'true' && !empty( $iconclass ) ) {
					$icon = '<span class="'.esc_attr($iconclass).'"> </span>';
				}

				$out .= '<a class="dt-sc-button small filled" title="'.esc_attr($a_title).'" href="'.esc_url($a_href).'">'.esc_html($a_title).($icon).'</a>';
			$out .= '</div>';

		$out .= '</div>';

		return $out;
	}

	/**
	 * bmi calculator
	 * @return string
	 */
	function dt_sc_bmi_calculator($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'under_weight' => '',
			'over_weight' => '',
			'class' => ''
		), $attrs ) );

		$out = '<div class="dt-sc-bmi-calc aligncenter '.$class.'">';

			$out .= '<div class="dt-sc-one-half column first">';
				if( !empty( $subtitle ) )
					$out .= '<h5>'.esc_html($subtitle).'</h5>';
					
				if( !empty( $title ) )
					$out .= '<h2>'.$title.'</h2>';

				$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';

				$out .= '<form name="frmbmicalc" class="dt-sc-bmi-form">';

					$out .= '<div class="dt-sc-one-third column first">';
						$out .= '<input type="text" name="height" placeholder="'.esc_attr('Height / cm', 'designthemes-class').'" required="required">';
					$out .= '</div>';
	
					$out .= '<div class="dt-sc-one-third column">';
						$out .= '<input type="text" name="weight" placeholder="'.esc_attr('Weight / kg', 'designthemes-class').'" required="required">';
					$out .= '</div>';
	
					$out .= '<div class="dt-sc-one-third column">';	
						$out .= '<input type="text" name="age" placeholder="'.esc_attr('Age', 'designthemes-class').'">';
					$out .= '</div>';
	
					$out .= '<div class="dt-sc-one-half column first">';
						$out .= '<select name="sex">
									<option value="">'.esc_html('Gender', 'designthemes-class').'</option>
									<option value="male">'.esc_html('Male', 'designthemes-class').'</option>
									<option value="female">'.esc_html('Female', 'designthemes-class').'</option>
								</select>';
					$out .= '</div>';
	
					$out .= '<div class="dt-sc-one-half column">';
						$out .= '<select id="cactivity" name="cactivity">';
							$out .= '<option value="">'.esc_html('Select an activity factor:', 'designthemes-class').'</option>';
							$out .= '<option value="1.2">'.esc_html('Sedentary - little or no exercise', 'designthemes-class').'</option>';
							$out .= '<option value="1.375">'.esc_html('Lightly Active - exercise/sports 1-3 times/week', 'designthemes-class').'</option>';
							$out .= '<option value="1.55">'.esc_html('Moderatetely Active - exercise/sports 3-5 times/week', 'designthemes-class').'</option>';
							$out .= '<option value="1.725">'.esc_html('Very Active - hard exercise/sports 6-7 times/week', 'designthemes-class').'</option>';
							$out .= '<option value="1.9">'.esc_html('Extra Active - very hard exercise/sports or physical job', 'designthemes-class').'</option>';
						$out .= '</select>';
						$out .= '<input type="hidden" name="hiduwid" value="'.esc_attr($under_weight).'">';
						$out .= '<input type="hidden" name="hidowid" value="'.esc_attr($over_weight).'">';
					$out .= '</div>';
					
					$out .= '<div class="aligncenter"><input class="dt-sc-button filed small" type="submit" value="'.esc_attr('Calculate', 'designthemes-class').'"></div>';

				$out .= '</form>';
			$out .= '</div>';
			
			$out .= '<div class="dt-sc-one-half column">';
				$out .= '<div class="dt-sc-bmi-notify aligncenter"><h5>'.esc_html__('Your BMI is', 'designthemes-class').'</h5><h2>0.0</h2></div>';
			$out .= '</div>';

		$out .= '</div>';

		return $out;
	}

	/**
	 * class step
	 * @return string
	 */
	function dt_sc_class_step($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'step_text' => esc_html__('Step', 'designthemes-class'),
			'step_value' => '',
			'title' => ''
		), $attrs ) );

		$out = '<div class="dt-sc-class-step">';
			$out .= '<div class="dt-sc-step">';
				$out .= '<h5>'.$step_text.'</h5>';
				$out .= '<span>'.$step_value.'</span>';
			$out .= '</div>';

			$out .= '<div class="dt-sc-step-content">';
				$out .= '<h3>'.$title.'</h3>';
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * subscription info
	 * @return string
	 */
	function dt_sc_subscription_info($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'duration' => '',
			'currency_symbol' => '$',
			'price' => ''
		), $attrs ) );

		$out = '<div class="dt-sc-subscription-info">';
			$out .= '<div class="dt-sc-subs-content">';
				$out .= '<h5>'.$title.'</h5>';
				$out .= '<p>'.$subtitle.'</p>';
			$out .= '</div>';

			$out .= '<div class="dt-sc-subs-info">';
				$out .= '<h5>'.$duration.'</h5>';
				$out .= '<h3 class="subs-price"><span>'.$currency_symbol.'</span>'.$price.'</h3>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * package item
	 * @return string
	 */
	function dt_sc_package_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'style' => 'type1',
			'logourl' => '',
			'imageurl' => '',
			'price' => '',
			'link' => ''
		), $attrs ) );

		$out = '<div class="dt-sc-package-item '.$style.'">';

			$out .= '<div class="dt-sc-package-thumb">';
				if( !empty($imageurl) ):
					$image = wpb_getImageBySize( array( 'attach_id' => $imageurl, 'thumb_size' => 'full' ));
					$image = $image['thumbnail'];
					$out .= $image;
				else:
					$out .= '<img src="http'.maruthi_ssl().'://place-hold.it/600x350&text='.$title.'" alt="'.$title.'" title="'.$title.'"/>';
				endif;

				$out .= '<div class="package-content">';
					if( !empty($logourl) ):
						$image = wpb_getImageBySize( array( 'attach_id' => $logourl, 'thumb_size' => 'full' ));
						$image = $image['thumbnail'];
						$out .= '<div class="package-logo">'.$image.'</div>';
					endif;

					$link = ( '||' === $link ) ? '' : $link;
					$link = vc_build_link( $link );
					$a_href = !empty($link['url']) ?  $link['url']: 'javascript:void(0);';
					$a_title = $link['title'];
					$a_target = !empty($link['target']) ? $link['target'] : '_self';

					$out .= '<div class="package-bottom">';
						$out .= '<h3 class="package-title"><a href="'.$a_href.'" target="'.$a_target.'" title="'.$a_title.'">'.$title.'</a></h3>';

						if( $style = 'type2' ) $out .= '<div class="package-overlay">';

							$out .= '<div class="package-price">'.$price.'</div>';
	
							$out .= '<div class="package-details">'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</div>';

						if( $style = 'type2' ) $out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';

			$out .= '</div>';

		$out .= '</div>';

		return $out;
	}

	/**
	 * trainers
	 * @return string
	 */
	function dt_sc_trainers($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'trainer_ids' => '',
			'excerpt_length' => '',
			'show_time' => '',
			'class' => ''
		), $attrs ) );

		$out = $class_id = '';

		if( empty( $trainer_ids ) ):
			global $post;

			if( 'dt_class' != $post->post_type ):
				return '<div class="dt-sc-error-box">'.esc_html__('Please enter valid trainer ID (or) use inside class post.', 'designthemes-class').'</div>';
			else:
				$class_id = $post->ID;
			endif;
		else:
			$trainer_ids = explode(',', $trainer_ids);	
		endif;

		$class_settings = get_post_meta($class_id, '_custom_settings', true);
		$class_settings = is_array ( $class_settings ) ? $class_settings : array ();

		if( array_key_exists('class-trainers', $class_settings) ):
			$trainer_ids = $class_settings["class-trainers"];
		endif;

		#Performing query...
		$args = array('post_type' => 'dt_trainer', 'posts_per_page' => -1, 'post__in' => $trainer_ids);

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):
			$out = '<div class="dt-sc-trainers-container '.$class.'">';

				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();

					$trainer_settings = get_post_meta($PID, '_custom_settings', true);
					$trainer_settings = is_array ( $trainer_settings ) ? $trainer_settings : array ();

					$out .= '<div class="dt-sc-trainer-item dt-sc-one-column column first">';

						if( has_post_thumbnail() ):
							$out .= '<div class="dt-sc-trainer-thumb">';
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								$out .= get_the_post_thumbnail($PID, 'full', $attr);
							$out .= '</div>';
						endif;

						$out.= '<div class="dt-sc-trainer-title">';
							$out .= '<h3>'.get_the_title().'</h3>';

							if( array_key_exists('role', $trainer_settings) ):
								$out .= ', <span>'.$trainer_settings['role'].'</span>';
							endif;
						$out .= '</div>';

						if( array_key_exists('social_links', $trainer_settings) ):
							$out .= do_shortcode( $trainer_settings['social_links'] );
						endif;

						if( $excerpt_length > 0 ):
							$out .= '<div class="dt-sc-trainer-details">'.maruthi_excerpt($excerpt_length).'</div>';
						endif;

						if( $show_time == 'yes' && array_key_exists('trainer-time-schedule', $trainer_settings) ):
							$schedule = $trainer_settings['trainer-time-schedule'];

							if( !empty( $schedule ) ):
								$out .= '<div class="dt-sc-trainer-timings">';
									$out .= '<h6>'.esc_html__('Available Time:', 'designthemes-class').'<h6>';
									$out .= '<ul>';
										foreach( $schedule as $s ):
											$date = array_key_exists('trainer-time-schedule-date', $s) ? $s['trainer-time-schedule-date'] : '';
											$time = array_key_exists('trainer-time-schedule-date', $s) ? $s['trainer-time-schedule-time'] : '';
		
											$out .= '<li>';
												$out .= '<h6 class="schedule-date">'.$date.'</h6>';
												$out .= '<h6 class="schedule-time"> / '.$time.'</h6>';
											$out .= '</li>';
										endforeach;
									$out .= '</ul>';
								$out .= '</div>';
							endif;
						endif;
					$out .= '</div>';
				endwhile;

			$out .= '</div>';
			wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "designthemes-class").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "designthemes-class").'</p>';
		endif;

		return $out;
	}
}?>