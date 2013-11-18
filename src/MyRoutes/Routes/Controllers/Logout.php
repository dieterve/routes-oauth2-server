<?php

namespace MyRoutes\Routes\Controllers;

use Silex\Application;

class Logout
{
	public function logout(Application $app)
	{
		$app['session']->remove('access_token');
		$app['session']->remove('username');

		// remove user data from cache
		$memcached = $app['memcached'];
		$memcached->delete('myroutes_routes');
		$memcached->delete('myroutes_userinfo');

		// @later might also want to call the HikingRoutes API and invalidate the access token.

		return $app->redirect($app['url_generator']->generate('myroutes_index'));
	}
}
