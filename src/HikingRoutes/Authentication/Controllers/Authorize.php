<?php

namespace HikingRoutes\Authentication\Controllers;

use Silex\Application;

class Authorize
{
	/**
	 * The user is directed here by the client in order to authorize the client app
	 * to access his/her data
	 */
	public function authorize(Application $app)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		// validate the authorize request. if it is invalid, redirect back to the client with the errors in tow
		if (!$server->validateAuthorizeRequest($app['request'], $response)) {
			return $server->getResponse();
		}

		// display the "do you want to authorize?" form
		return $app['twig']->render(
			'HikingRoutes/Authentication/views/authorize.twig',
			array('client_id' => $app['request']->query->get('client_id'), 'errorMessage' => false)
		);
	}

	/**
	 * Handle the posted login form.
	 */
	public function authorizePost(Application $app)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		// filled in credentials
		$username = $app['request']->request->get('username');
		$password = $app['request']->request->get('password');

		// validate
		$error = '';
		if(empty($username) || empty($password))
		{
			$error = 'Provide both username and password.';
		}

		// use user credentials functionality of the vendor. This allows us to enable another level
		// of grant type in the future. @see OAuth2\GrantType\UserCredentials
		elseif(!$server->getStorage('user_credentials')->checkUserCredentials($username, $password))
		{
			$error = 'Invalid username and password.';
		}

		// display form again with error message
		if(!empty($error))
		{
			return $app['twig']->render(
				'HikingRoutes/Authentication/views/authorize.twig',
				array('client_id' => $app['request']->query->get('client_id'), 'errorMessage' => $error)
			);
		}

		// no errors, authentication successful
		else
		{
			// call the oauth server and return the response
			return $server->handleAuthorizeRequest($app['request'], $response, true);
		}
	}
}
