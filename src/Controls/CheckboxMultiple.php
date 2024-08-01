<?php
/**
 * Multiple checkbox customize control.
 *
 * The multiple checkbox customize control allows theme authors to add theme
 * options that have multiple choices.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize\Controls;

/**
 * Multiple checkbox customize control class.
 */
class CheckboxMultiple extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @var string
     */
    public $type = 'hybrid-checkbox-multiple';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @return void
     */
    public function to_json() {
        parent::to_json();

        $this->json['value']   = ! is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value();
        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();
        $this->json['id']      = $this->id;
    }

    /**
     * Underscore JS template to handle the control's output.
     *
     * @return void
     */
    protected function content_template() {
        ?>

        <# if ( ! data.choices ) {
            return;
        } #>

        <# if ( data.label ) { #>
            <span class="customize-control-title">{{ data.label }}</span>
        <# } #>

        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <ul>
            <# _.each( data.choices, function( label, choice ) { #>
                <li>
                    <label>
                        <input type="checkbox" value="{{ choice }}" <# if ( -1 !== data.value.indexOf( choice ) ) { #> checked="checked" <# } #> />
                        {{ label }}
                    </label>
                </li>
            <# } ) #>
        </ul>
        <?php
    }

}
