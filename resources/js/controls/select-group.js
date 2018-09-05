/**
 * Select group customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\SelectGroup`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
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
