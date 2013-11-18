<?php

namespace HikingRoutes\Users;

use Silex\Application;
use Silex\ControllerProviderInterface;

class Users implements ControllerProviderInterface
{
	/**
	 * Connect the controller classes to the routes
	 */
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$routing = $app['controllers_factory'];

		// note: this requires "me" to be excluded from valid usernames
		$routing->get(
			'/me',
			array(new \HikingRoutes\Users\Controllers\User(), 'me')
		)->bind('user_me');
		$routing->get(
			'/{username}',
			array(new \HikingRoutes\Users\Controllers\User(), 'user')
		)->bind('user_user');

		return $routing;
	}
}
