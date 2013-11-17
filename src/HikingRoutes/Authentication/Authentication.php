<?php

namespace HikingRoutes\Authentication;

use Silex\Application;
use Silex\ControllerProviderInterface;
use OAuth2\HttpFoundationBridge\Response as BridgeResponse;
use OAuth2\Server as OAuth2Server;
use OAuth2\Storage\Pdo;
use OAuth2\GrantType\AuthorizationCode;
use OAuth2\GrantType\UserCredentials;

class Authentication implements ControllerProviderInterface
{
	/**
	 * Connect the controller classes to the routes
	 */
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$routing = $app['controllers_factory'];

		$routing->get(
			'/authorize',
			array(new \HikingRoutes\Authentication\Controllers\Authorize(), 'authorize')
		);

		return $routing;
	}
}
