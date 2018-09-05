<?php
/**
 * Customize service provider.
 *
 * This is the service provider for the customization API integration. It binds
 * an instance of the frameworks `Customize` class to the container.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Customize;

use Hybrid\Tools\ServiceProvider;

/**
 * Customize provider.
 *
 * @since  1.0.0
 * @access public
 */
class CustomizeServiceProvider extends ServiceProvider {

	/**
	 * Registration callback that adds a single instance of the customize
	 * object to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->app->singleton( Customize::class );
	}

	/**
	 * Boots the customize component by firing its hooks in the `boot()` method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		$this->app->resolve( Customize::class )->boot();
	}
}
