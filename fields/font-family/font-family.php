<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'AVA_Field_Font_Family' ) ) {
    /**
     * Font Family field
     *
     * @category   Wordpress
     * @package    ava-fields
     * @author     Viktor Sedzialo <viktor.sedzialo@gmail.com>
     * @version    Release: 1.0.0
     * @since      Class available since Release 1.0.0
     */
	class AVA_Field_Font_Family extends \AVAFields\Core\Abstracts\Field {

		public $type = 'font-family';

		public function __construct( $container_id, $section_id, $id, $params ) {
			parent::__construct( $container_id, $section_id, $id, $params );

			$this->add_handler( $this->field_dir . 'assets/handler.js' );
		}

		public function build() {

			$this->html = '<select name="' . $this->id . '" id="' . $this->id . '"' . $this->get_attrs() . '>';

			if ( empty($this->params['validate']) || !$this->params['validate']['required'] ) {
				$this->html .= '<option value=""></option>';
			}

			$this->params['options'] = \AVAFields\Core\Data::standart_fonts();

			foreach ( $this->params['options'] as $value => $text ) {
				$selected = $this->get_value( $this->id ) == $value ? ' selected' : '';

				$this->html .= '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . wp_kses_post( $text ) . '</option>';
			}
			$this->html .= '</select>';

			//$this->html .= '<div class="font-family-preview"></div>';
		}
	}
}

