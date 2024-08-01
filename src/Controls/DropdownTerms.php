<?php
/**
 * Term dropdown customize control.
 *
 * A dropdown taxonomy terms `<select>` customizer control class.  This control
 * is built on top of the core `wp_dropdown_categories()` function (works for
 * any taxonomy).  By passing in a custom `$args` parameter, which is passed to
 * `wp_dropdown_categories()`, you can alter the output of the dropdown select.
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
 * Dropdown terms customize control class.
 */
class DropdownTerms extends Control {

    /**
     * The type of customize control being rendered.
     *
     * @var string
     */
    public $type = 'hybrid-dropdown-terms';

    /**
     * Custom arguments to pass into `wp_dropdown_categories()`.
     *
     * @var array
     */
    public $args = [];

    /**
     * Displays the control content.
     *
     * @return void
     */
    protected function render_content() {

        // Allow devs to pass in custom arguments.
        $args = wp_parse_args( $this->args, [
            'hierarchical'      => true,
            'option_none_value' => '0',
            'show_option_none'  => ' ',
        ] );

        // Overwrite specific arguments.
        $args['name']     = '_customize-dropdown-terms-' . $this->id;
        $args['selected'] = $this->value();
        $args['echo']     = false; ?>

        <label>

            <?php if ( ! empty( $this->label ) ) { ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php } ?>

            <?php if ( ! empty( $this->description ) ) { ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php } ?>

            <?php echo str_replace( '<select', '<select ' . $this->get_link(), wp_dropdown_categories( $args ) ); ?>

        </label>
        <?php
    }

}
