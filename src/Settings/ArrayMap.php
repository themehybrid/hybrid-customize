<?php
/**
 * Array map customize setting.
 *
 * Customizer setting class for handling an array or comma-separated list of
 * values. This takes the given `sanitize_callback` and runs it over each element
 * in the array via the `array_map()` function.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize\Settings;

use WP_Customize_Setting as Setting;

/**
 * Handles an array of values by running the `sanitize_callback` through `array_map()`.
 *
 * @since  1.0.0
 *
 * @access public
 */
class ArrayMap extends Setting {

    /**
     * The sanitize callback function to run over each element of the array.
     *
     * @since  1.0.0
     * @var    string
     *
     * @access public
     */
    public $sanitize_callback = 'sanitize_text_field';

    /**
     * Sanitize the array values.  This method overwrites the parent
     * `sanitize()` method and runs `array_map()` over the multiple values.
     * Expected input is either an array or comma-separated list of values.
     *
     * @since  1.0.0
     * @param  array|string $values
     * @return array
     *
     * @access public
     */
    public function sanitize( $values ) {

        $multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

        return ! empty( $multi_values ) ? array_map( [ $this, 'map' ], $multi_values ) : [];
    }

    /**
     * Callback function for `array_map()`.  Uses the defined `sanitize_callback`
     * to filter each element of the array.
     *
     * @since  1.0.0
     * @param  mixed $value
     * @return mixed
     *
     * @access public
     */
    public function map( $value ) {

        return apply_filters( "customize_sanitize_{$this->id}", $value, $this );
    }

}
