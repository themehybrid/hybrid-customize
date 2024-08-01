<?php
/**
 * Customize class.
 *
 * Registers JS-based panel, section, and/or control types if booted. Otherwise,
 * theme authors must manually register these.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize;

use Hybrid\Contracts\Bootable;
use Hybrid\Customize\Controls\CheckboxMultiple;
use Hybrid\Customize\Controls\Palette;
use Hybrid\Customize\Controls\RadioImage;
use Hybrid\Customize\Controls\SelectGroup;
use Hybrid\Customize\Controls\SelectMultiple;
use WP_Customize_Manager;

/**
 * Customize class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Component implements Bootable {

    /**
     * Adds our customizer-related actions to the appropriate hooks.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', [ $this, 'registerControls' ], 0 );
    }

    /**
     * Registers our JS-based custom control types with WordPress.
     *
     * @since  1.0.0
     * @param  object $manager
     * @return void
     *
     * @access public
     */
    public function registerControls( WP_Customize_Manager $manager ) {

        $controls = [
            CheckboxMultiple::class,
            Palette::class,
            RadioImage::class,
            SelectGroup::class,
            SelectMultiple::class,
        ];

        array_map( static function( $control ) use ( $manager ) {
            $manager->register_control_type( $control );
        }, $controls );
    }

}
