<?php
/**
 * Customize service provider.
 *
 * This is the service provider for the customization API integration. It binds
 * an instance of the frameworks `Customize` class to the container.
 *
 * @package   HybridCustomize
 * @link      https://github.com/themehybrid/hybrid-customize
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize;

use Hybrid\Core\ServiceProvider;

/**
 * Customize provider.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Registration callback that adds a single instance of the customize
     * object to the container.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function register() {
        $this->app->singleton( Component::class );
    }

    /**
     * Boots the customize component by firing its hooks in the `boot()` method.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot() {
        $this->app->resolve( Component::class )->boot();
    }

}
