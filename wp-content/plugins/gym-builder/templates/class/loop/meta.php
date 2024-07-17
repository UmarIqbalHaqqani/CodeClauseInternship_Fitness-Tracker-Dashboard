<?php
/**
 * @package Gym Builder/templates/class/loop
 * @var array $args
 * @var int   $class_id
 * @var string $trainer_post_type
 * @version 1.0.0
 */
use \GymBuilder\Inc\Controllers\Models\GymBuilderClass;

$weeknames=GymBuilderClass::get_the_weekname();
$schedules=GymBuilderClass::get_the_schedule($class_id,'');

?>
<ul class="class-meta">
    <?php 
        foreach($schedules as $schedule_info){

            if ( !empty( $schedule_info['week'] ) && !empty( $schedule_info['start_time'] ) ){

                $start_time =  $schedule_info['start_time'];

                $end_time = !empty( $schedule_info['end_time'] ) ? $schedule_info['end_time'] : false;

                $type = !empty( $schedule_info['trainer'] ) ? get_post_type( $schedule_info['trainer'] ) : '';

                if ( $type == $trainer_post_type ) {
                    $trainer_name= get_the_title( $schedule_info['trainer'] );
                }

                $class_schedule_time = GymBuilderClass::get_schedule_time($start_time,$end_time);

                $full_time     = $class_schedule_time['start_time']."-".$class_schedule_time['end_time'];

                ?>
                <li>
                    <?php if(!empty($trainer_name)):?>
                        <span class="trainer">
                            <span class="trainer-title"><?php esc_html_e('Trainer : ','gym-builder'); ?></span>
                            <span class="trainer-name"><?php echo esc_html($trainer_name);?></span>
                        </span>
                    <?php endif; ?>
                    <span class="schedule">
                        <span class="schedule-title"><?php esc_html_e('Schedule : ','gym-builder'); ?></span>
                        <span class="day"><?php echo esc_html( $weeknames[$schedule_info['week']] );?>:</span>
                        <span class="time"><?php echo esc_html( $full_time );?></span>
                    </span>
				</li>
            <?php }

        }
    ?>
</ul>