<?php

namespace HikingRoutes\Authentication\Controllers;

use Silex\Application;

class Token
{
	/**
	 * This is called by the client (consumer) to exchange its authorization code
	 * with an access token.
	 *
	 * @see \HikingRoutes\Authentication\Authorize (for fetching a authorization code)
	 */
	public function token(Application $app)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		return $server->handleTokenRequest($app['request'], $response);
	}
}
