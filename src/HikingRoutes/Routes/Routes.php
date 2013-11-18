<?php

namespace HikingRoutes\Routes;

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
			array(new \HikingRoutes\Routes\Controllers\Index(), 'index')
		)->bind('routes_index');

		return $routing;
	}
}
