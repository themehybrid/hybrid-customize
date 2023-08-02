<?php
/**
 * Color palette customize control.
 *
 * Allows developers to have a selectable color palette/scheme for their users.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize\Controls;

/**
 * Theme Layout customize control class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Palette extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $type = 'hybrid-palette';

    /**
     * The default customizer section this control is attached to.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $section = 'colors';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function to_json() {
        parent::to_json();

        // Make sure the colors have a hash.
        array_walk( $this->choices, static function( &$value, $choice ) {

            $value['colors'] = array_map( 'maybe_hash_hex_color', $value['colors'] );
        } );

        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();
        $this->json['value']   = $this->value();
        $this->json['id']      = $this->id;
    }

    /**
     * Underscore JS template to handle the control's output.
     *
     * @since  1.0.0
     * @return void
     *
     * @access protected
     */
    protected function content_template() { ?>

        <# if ( ! data.choices ) {
            return;
        } #>

        <# if ( data.label ) { #>
            <span class="customize-control-title">{{ data.label }}</span>
        <# } #>

        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <# _.each( data.choices, function( palette, choice ) { #>
            <label class="palette">
                <input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

                <span class="palette__label">{{ palette.label }}</span>

                <div class="palette__block">

                    <# _.each( palette.colors, function( color ) { #>
                        <span class="palette__color" style="background-color: {{ color }}">&nbsp;</span>
                    <# } ) #>

                </div>
            </label>
        <# } ) #>
        <?php
    }

}
