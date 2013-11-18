<?php

namespace MyRoutes\Routes\Controllers;

use Silex\Application;

class Index
{
	public function index(Application $app)
	{
		$templateVariables = array('session_id' => $app['session']->getId());

		if($app['session']->has('access_token'))
		{
			$accessToken = $app['session']->get('access_token');
			$templateVariables['logged_in'] = true;

//			$templateVariables['userInfo'] = $this->getUserInfo($app, $accessToken);
			$templateVariables['routes'] = $this->getRoutes($app, $accessToken);
		}

		else
		{
			// not logged in, ask to connect
			$templateVariables['logged_in'] = false;
		}

		// display the "do you want to authorize?" form
		return $app['twig']->render(
			'MyRoutes/Routes/views/index.twig',
			$templateVariables
		);
	}

	/**
	 * Fetch routes for the current user.
	 */
	protected function getRoutes($app, $accessToken)
	{
		$endpoint = $app['url_generator']->generate('routes_index', array('access_token' => $accessToken), true);

		$response = $app['http_client']->get($endpoint, null)->send();
		$json = json_decode((string) $response->getBody(), true);

		if(array_key_exists('routes', $json))
		{
			return $json['routes'];
		}

		return array();
	}

	/**
	 * Fetch the current user his personal info.
	 */
	protected function getUserInfo($app, $accessToken)
	{
		$endpoint = $app['url_generator']->generate('user_user', array('access_token' => $accessToken), true);

		$response = $app['http_client']->get($endpoint, null)->send();
		$json = json_decode((string) $response->getBody(), true);

		return $json;
	}
}
