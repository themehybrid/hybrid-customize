<?php
/**
 * Select group customize control.
 *
 * This class allows developers to create a `<select>` control with `<optgroup>`
 * elements mixed in. They can also utilize regular `<option>` choices.
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
class SelectGroup extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $type = 'hybrid-select-group';

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

        $choices = $group = [];

        foreach ( $this->choices as $choice => $maybe_group ) {

            if ( is_array( $maybe_group ) ) {
                $group[ $choice ] = $maybe_group;
            } else {
                $choices[ $choice ] = $maybe_group;
            }
        }

        $this->json['choices'] = $choices;
        $this->json['group']   = $group;
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

        <# if ( ! data.choices && ! data.group ) {
            return;
        } #>

        <label>

            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <select {{{ data.link }}}>

                <# _.each( data.choices, function( label, choice ) { #>

                    <option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                <# } ) #>

                <# _.each( data.group, function( group ) { #>

                    <optgroup label="{{ group.label }}">

                        <# _.each( group.choices, function( label, choice ) { #>

                            <option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                        <# } ) #>

                    </optgroup>
                <# } ) #>
            </select>
        </label>
        <?php
    }

}
