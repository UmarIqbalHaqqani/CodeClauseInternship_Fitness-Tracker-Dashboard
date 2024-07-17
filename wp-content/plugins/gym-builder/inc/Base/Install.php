<?php
/**
 * @package GymBuilder
 */
namespace GymBuilder\Inc\Base;
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

use GymBuilder\Inc\Controllers\Helpers\Functions;
use GymBuilder\Inc\Controllers\Models\GymBuilderDatabase;
use GymBuilder\Inc\Traits\Constants;

class Install {
	use Constants;
	public static function activate() {

		if ( ! get_option( 'gym_builder_version' ) ) {
			self::create_options();
		}
		self::update_gym_builder_version();
		GymBuilderDatabase::create_member_db_table();

		flush_rewrite_rules();
	}

	private static function create_options() {

		$options = [
			'gym_builder_permalinks_settings' => [
				'class_base'            => 'gym_builder_class',
				'class_category_base'   => 'gym_builder_class_category',
				'trainer_base'          => 'gym_builder_trainer',
				'trainer_category_base' => 'gym_builder_trainer_category',
			],
			'gym_builder_class_settings'      => [
				'class_time_format'         => '12',
				'class_archive_style'       => 'layout-1',
				'class_posts_per_page'      => '9',
				'class_grid_columns'        => '3',
				'class_page_layout'         => 'full-width',
				'class_single_page_layout'  => 'full-width',
				'class_orderBy'             => 'none',
				'class_order'               => 'ASC',
				'class_thumbnail_width'     => '570',
				'class_thumbnail_height'    => '400',
				'class_thumbnail_hard_crop' => 'on',
				'slider_autoplay'           => 'on',
				'slider_loop'               => 'on',
				'centered_slider'           => 'on',
				'slides_per_view'           => '3',
			],
			'gym_builder_trainer_settings'    => [
				'trainer_posts_per_page'      => '9',
				'trainer_grid_columns'        => '3',
				'trainer_page_layout'         => 'full-width',
				'trainer_single_page_layout'  => 'full-width',
				'trainer_orderBy'             => 'none',
				'trainer_order'               => 'ASC',
				'trainer_thumbnail_width'     => '570',
				'trainer_thumbnail_height'    => '400',
				'trainer_thumbnail_hard_crop' => 'on',
			],
			'gym_builder_style_settings'      => [
				'gym_builder_primary_color'   => '#005dd0',
				'gym_builder_secondary_color' => '#0a4b78',
			],

		];

		foreach ( $options as $option_name => $defaults ) {
			if ( false === get_option( $option_name ) ) {
				add_option( $option_name, $defaults );
			}
		}

		$pages = Functions::insert_custom_pages();

		if ( is_array($pages) && ! empty( $pages ) ) {
			$pSettings = get_option( 'gym_builder_page_settings' ) ?:[];
			foreach ( $pages as $pSlug => $pId ) {
				$pSettings[ $pSlug ] = $pId;
			}
			update_option( 'gym_builder_page_settings', $pSettings );
		}

	}

	private static function update_gym_builder_version() {
		$plugin_version = self::$plugin_version;
		update_option( 'gym_builder_version',$plugin_version );
	}

	public static function deactivate() {
		flush_rewrite_rules();
	}

	public static function plugin_activation_time(  ) {
		if (! get_option( 'gb_plugin_activation_time' )){
			update_option('gb_plugin_activation_time',strtotime( 'now' ));
		}
	}
}