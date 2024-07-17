<?php
/**
 * Plugin Name: Fitness Tracker
 * Description: A plugin to track users' fitness activities.
 * Version: 1.0
 * Author: Umar Iqbal Haqqani
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Create database table on plugin activation
function fitness_tracker_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fitness_activities';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        activity_type VARCHAR(255) NOT NULL,
        duration INT NOT NULL,
        distance FLOAT NOT NULL,
        calories INT NOT NULL,
        date DATE NOT NULL,
        FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'fitness_tracker_install');

// Handle AJAX request for adding activity
function handle_add_activity() {
    if (!is_user_logged_in()) {
        wp_send_json_error('You must be logged in to add an activity.');
    }
    
    $user_id = get_current_user_id();
    $activity_type = sanitize_text_field($_POST['activityType']);
    $duration = intval($_POST['duration']);
    $distance = floatval($_POST['distance']);
    $calories = intval($_POST['calories']);
    $date = sanitize_text_field($_POST['date']);
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'fitness_activities';
    
    $wpdb->insert(
        $table_name,
        [
            'user_id' => $user_id,
            'activity_type' => $activity_type,
            'duration' => $duration,
            'distance' => $distance,
            'calories' => $calories,
            'date' => $date
        ]
    );
    
    wp_send_json_success('Activity added successfully.');
}
add_action('wp_ajax_add_activity', 'handle_add_activity');

// Enqueue scripts and styles
function fitness_tracker_enqueue_scripts() {
    wp_enqueue_script('fitness-tracker-script', plugin_dir_url(__FILE__) . 'fitness-tracker.js', ['jquery'], null, true);
    wp_localize_script('fitness-tracker-script', 'fitnessTracker', ['ajax_url' => admin_url('admin-ajax.php')]);
}
add_action('wp_enqueue_scripts', 'fitness_tracker_enqueue_scripts');

// Shortcode to display user activities
function display_user_activities() {
    if (!is_user_logged_in()) {
        return 'You must be logged in to view your activities.';
    }

    $user_id = get_current_user_id();
    global $wpdb;
    $table_name = $wpdb->prefix . 'fitness_activities';

    // Retrieve activities from database
    $activities = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name WHERE user_id = %d ORDER BY date DESC",
        $user_id
    ));

    // Check if debug query parameter is present or user is administrator
    $show_debug = current_user_can('administrator') || isset($_GET['debug']);

    ob_start();

    // Output activities to display on the front-end
    if ($activities) {
        echo '<table>';
        echo '<tr><th>Date</th><th>Activity Type</th><th>Duration</th><th>Distance</th><th>Calories</th></tr>';
        foreach ($activities as $activity) {
            echo '<tr>';
            echo '<td>' . esc_html($activity->date) . '</td>';
            echo '<td>' . esc_html($activity->activity_type) . '</td>';
            echo '<td>' . esc_html($activity->duration) . '</td>';
            echo '<td>' . esc_html($activity->distance) . '</td>';
            echo '<td>' . esc_html($activity->calories) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No activities found.</p>';
    }

    // Output debugging information if allowed
    if ($show_debug) {
        echo '<div style="border: 1px solid #ccc; padding: 10px; margin-top: 20px;">';
        echo '<h3>Debugging Information</h3>';
        echo '<pre>';
        echo 'SQL Query: ' . $wpdb->last_query . "\n\n";
        echo 'SQL Results: ';
        print_r($activities);
        echo '</pre>';
        echo '</div>';
    }

    return ob_get_clean();
}
add_shortcode('user_activities', 'display_user_activities');
