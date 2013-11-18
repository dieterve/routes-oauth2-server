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
	 * Create the OAuth2 Server Object
	 */
	public function setup(Application $app)
	{
		// create storage which contains our users and tokens
		$storage = new Pdo($app['database']);

		// create array of supported grant types
		$grantTypes = array(
			'authorization_code' => new AuthorizationCode($storage)
		);

		// instantiate the oauth server
		$server = new OAuth2Server($storage, array('enforce_state' => true, 'allow_implicit' => true), $grantTypes);

		// add the server to the silex "container" so we can use it in our controllers
		$app['oauth_server'] = $server;

		/**
		 * add HttpFoundationBridge Response to the container, which returns a silex-compatible response object
		 * @see (https://github.com/bshaffer/oauth2-server-httpfoundation-bridge)
		 */
		$app['oauth_response'] = new BridgeResponse();
	}

	/**
	 * Connect the controller classes to the routes
	 */
	public function connect(Application $app)
	{
		// create the oauth2 server object
		$this->setup($app);

		// creates a new controller based on the default route
		$routing = $app['controllers_factory'];

		$routing->get(
			'/authorize',
			array(new \HikingRoutes\Authentication\Controllers\Authorize(), 'authorize')
		)->bind('authentication_authorize');
		$routing->post(
			'/authorize',
			array(new \HikingRoutes\Authentication\Controllers\Authorize(), 'authorizePost')
		);
		$routing->post(
			'/token',
			array(new \HikingRoutes\Authentication\Controllers\Token(), 'token')
		)->bind('authentication_token');

		return $routing;
	}
}
