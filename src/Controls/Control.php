<?php
/**
 * Base customize control.
 *
 * This is a base customize control class for our other controls to extend.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize\Controls;

use WP_Customize_Control;

/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
abstract class Control extends WP_Customize_Control {

	/**
	 * This is the PHP callback for rendering the control content. JS-based
	 * controls require this method to be empty. Because most of our classes
	 * utilize JS templates, we're defining this in the base class to not
	 * worry about it in our sub-classes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return bool
	 */
	protected function render_content() {}
}
