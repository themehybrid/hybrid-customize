<?php
/**
 * Customize class.
 *
 * Registers JS-based panel, section, and/or control types if booted. Otherwise,
 * theme authors must manually register these.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;
use Hybrid\Customize\Controls\CheckboxMultiple;
use Hybrid\Customize\Controls\Palette;
use Hybrid\Customize\Controls\RadioImage;
use Hybrid\Customize\Controls\SelectGroup;
use Hybrid\Customize\Controls\SelectMultiple;

/**
 * Customize class.
 *
 * @since  1.0.0
 * @access public
 */
class Customize implements Bootable {

	/**
	 * Adds our customizer-related actions to the appropriate hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', [ $this, 'registerControls' ], 0 );
	}

	/**
	 * Registers our JS-based custom control types with WordPress.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

		$controls = [
			CheckboxMultiple::class,
			Palette::class,
			RadioImage::class,
			SelectGroup::class,
			SelectMultiple::class
		];

		array_map( function( $control ) use ( $manager ) {

			$manager->register_control_type( $control );

		}, $controls );
	}
}
