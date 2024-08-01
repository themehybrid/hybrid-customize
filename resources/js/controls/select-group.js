/**
 * Select group customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\SelectGroup`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

wp.customize.controlConstructor['hybrid-select-group'] = wp.customize.Control.extend( {
	ready: function() {

		let control = this;
		let select  = document.querySelector( control.selector + ' select' );

		select.onchange = function() {
			control.setting.set( this.value );
		}
	}
} );
