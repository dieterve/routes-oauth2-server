<?php

namespace HikingRoutes\Routes\Controllers;

use Silex\Application;

class Index
{
	/**
	 * Returns a listing of all the routes for the end-user.
	 */
	public function index(Application $app)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		if (!$server->verifyResourceRequest($app['request'], $response)) {
			return $server->getResponse();
		} else {

			$token = $server->getAccessTokenData($app['request'], $response);
			$username = $token['user_id'];

			// exists in cache?
			$memcached = $app['memcached'];
			$routes = $memcached->get('routes_' . $username);
			if($routes === false)
			{
				// fetch routes for this user from the database
				$statement = $app['database']->prepare('SELECT * FROM routes WHERE username = :username ORDER BY added_on DESC');
				$statement->execute(array('username' => $username));

				$routes = array();
				while($route = $statement->fetch(\PDO::FETCH_ASSOC))
				{
					$routes[] = $route;
				}

				$memcached->set('routes_' . $username, $routes);
			}

			$data = array(
				'routes' => $routes,
				'meta' => array(
					'totalResults' => count($routes)
				)
			);
			return $app->json($data);
		}
	}
}
