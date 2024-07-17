<?php
class CSFramework_Option_dt_date_time_picker extends CSFramework_Options {

	public function __construct( $field, $value = '', $unique = '' ) {
		parent::__construct( $field, $value, $unique );
	}

	public function output() {

		echo esc_attr($this->element_before() );

		$now = new DateTime();
		$now->add( new DateInterval('P7D') );

		$value_defaults = array(
			'date' => $now->format('Y-m-d'),
			'hour' => '',
			'minutes' => '',
			'duration'	=> '60'
		);

		$this->value  = wp_parse_args( $this->element_value(), $value_defaults );

		echo '<fieldset>';

			# Date
			echo cs_add_element( array(
				'pseudo' => true,
				'type'	 => 'text',
				'name'   => $this->element_name( '[date]' ),
				'class'  => 'dt-event-date-picker',
				'value'  => $this->value['date'],
				'attributes' => array( 'readonly' => 'true' )
			) );

			# Hour
			echo cs_add_element( array(
				'pseudo'          => true,
				'type'            => 'select',
				'name'            => $this->element_name( '[hour]' ),
				'options'         => array( "00"=>"00", "01"=>"01", "02"=>"02", "03"=>"03", "04"=>"04", "05"=>"05", "06"=>"06", "07"=>"07", "08"=>"08", "09"=>"09", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", ),
				'value'           => $this->value['hour']
			) );

			# Minutes
			echo cs_add_element( array(
				'pseudo'          => true,
				'type'            => 'select',
				'name'            => $this->element_name( '[minutes]' ),
				'options'         => array( "00"=>"00", "05"=>"05", "10"=>"10", "15"=>"15", "20"=>"20", "25"=>"25", "30"=>"30", "35"=>"35", "40"=>"40", "45"=>"45", "50"=>"50", "55"=>"55" ),
				'value'           => $this->value['minutes']
			) );			
		echo '</fieldset>';


		$hours = floor( $this->value['duration'] / 60 );
		$minutes = $this->value['duration'] - floor( $this->value['duration'] / 60 ) * 60;

		echo '<div class="dt-duration-container">';
		echo '	<p> <strong> '.__('Duration','maruthi').' </strong> </p>';
		echo '	<div class="dt-duration" data-value="'.$this->value['duration'].'" data-units-hour="'.__('hour', 'maruthi').'" data-units-hours="'.__('hours', 'maruthi').'" data-units-minutes="'.__('minutes', 'maruthi').'">';
		echo '		<input type="hidden" name="'.$this->element_name( '[duration]' ).'" value="'.$this->value['duration'].'">';
		echo '		<div class="slider"></div>';
		echo '		<div class="slider-value">';

					echo '<strong>';
					if( $hours > 0 ) {
						printf( _n( '%s hour', '%s hours', $hours, 'maruthi' ), $hours );
					}
					echo '</strong>';

					echo '<em>';
					if( $minutes > 0 ) {
						printf( esc_html__( '%d minutes', 'maruthi' ), $minutes );
					}
					echo '</em>';
		echo '		</div>';
		echo '	</div>';
		echo '</div>';

		echo esc_attr($this->element_after() );
	}
}