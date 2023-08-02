<?php
/**
 * Multiple select customizer control.
 *
 * This class allows developers to create a `<select>` form field with the
 * `multiple` attribute within the WordPress theme customizer.
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
 * Multiple select customize control class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class SelectMultiple extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $type = 'hybrid-select-multiple';

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

        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();
        $this->json['value']   = (array) $this->value();
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

        <label>

            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <select multiple="multiple" {{{ data.link }}}>

                <# _.each( data.choices, function( label, choice ) { #>

                    <option value="{{ choice }}" <# if ( -1 !== data.value.indexOf( choice ) ) { #> selected="selected" <# } #>>{{ label }}</option>

                <# } ) #>

            </select>
        </label>
        <?php
    }

}
