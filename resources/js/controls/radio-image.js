/**
 * Radio image customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\RadioImage`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

wp.customize.controlConstructor['hybrid-radio-image'] = wp.customize.Control.extend( {
	ready: function() {

		let control = this;
		let inputs  = document.querySelectorAll(
			control.selector + ' input[type="radio"]'
		);

		for ( var i = 0; i < inputs.length; i++ ) {

			inputs[ i ].onchange = function() {

				control.setting.set( this.value );
			}
		}
	}
} );
