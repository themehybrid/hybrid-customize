/**
 * Select multiple customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\SelectMultiple`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

wp.customize.controlConstructor['hybrid-select-multiple'] = wp.customize.Control.extend( {
	ready: function() {

		let control = this;
		let select  = document.querySelector( control.selector + ' select' );
		let options = select.options;

		select.onchange = function() {

			let values = [];

			for ( var i = 0; i < options.length; i++ ) {

				if ( options[ i ].selected ) {
					values.push( options[ i ].value );
				}
			}

			control.setting.set( values ? values : '' );
		}
	}
} );
