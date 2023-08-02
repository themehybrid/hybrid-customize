<?php
/**
 * Radio image customize control.
 *
 * The radio image customize control allows developers to create a list of image
 * radio inputs.
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
 * Radio image customize control.
 *
 * @since  1.0.0
 *
 * @access public
 */
class RadioImage extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $type = 'hybrid-radio-image';

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

        // We need to make sure we have the correct image URL.
        array_walk( $this->choices, static function( &$args, $key ) {

            // Replaces `%s` or `%1$s` with the template directory
            // URI and `%2$s` with the stylesheet directory URI.
            $args['url'] = esc_url(
                sprintf(
                    $args['url'],
                    get_template_directory_uri(),
                    get_stylesheet_directory_uri()
                )
            );
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

        <# _.each( data.choices, function( args, choice ) { #>
            <label class="radio-image">
                <input type="radio" class="radio-image__radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

                <span class="radio-image__label screen-reader-text">{{ args.label }}</span>

                <img class="radio-image__image" src="{{ args.url }}" alt="{{ args.label }}" />
            </label>
        <# } ) #>
        <?php
    }

}
