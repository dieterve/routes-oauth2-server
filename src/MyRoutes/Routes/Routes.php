<?php

namespace MyRoutes\Routes;

use Silex\Application;
use Silex\ControllerProviderInterface;

class Routes implements ControllerProviderInterface
{
	/**
	 * Connect the controller classes to the routes
	 */
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$routing = $app['controllers_factory'];

		$routing->get(
			'/',
			array(new \MyRoutes\Routes\Controllers\Index(), 'index')
		)->bind('myroutes_index');
		$routing->get(
			'/authorize',
			array(new \MyRoutes\Routes\Controllers\Authorize(), 'authorize')
		)->bind('myroutes_authorize');

		return $routing;
	}
}
