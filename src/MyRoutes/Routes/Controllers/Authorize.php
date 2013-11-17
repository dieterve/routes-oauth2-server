<?php

namespace MyRoutes\Routes\Controllers;

use Silex\Application;

class Authorize
{
	/**
	 * After authorizing on the OAuth server, the end-user will be redirected here.
	 * The redirect uri includes an authorization code which we will exchange for an
	 * access token.
	 */
	public function authorize(Application $app)
	{
		$request = $app['request'];
		$session = $app['session'];
		$urlGenerator = $app['url_generator'];
		$httpClient = $app['http_client'];

		$authenticationCode = $request->get('code');
		$state = $request->get('state');

		// valid
		if ($state != $session->getId())
		{
			throw new \Exception('Your session is not longer valid or is expired, try again.');
		}

		if (!$authenticationCode)
		{
			throw new \Exception('Authentication failed.');
		}

		// build request to OAuth server
		$query = array(
			'grant_type'    => 'authorization_code',
			'code'          => $authenticationCode,
			'client_id'     => $app['hikingroutes']['clientId'],
			'client_secret' => $app['hikingroutes']['clientSecret'],
			'redirect_uri' => $urlGenerator->generate('myroutes_authorize', null, true)
		);
		$endpoint = $urlGenerator->generate('authentication_token', null, true);

		// make the token request via http
		$response = $httpClient->post($endpoint, null, $query)->send();
		$json = json_decode((string) $response->getBody(), true);

		if(!array_key_exists('access_token', $json))
		{
			throw new \Exception('No access token in authorization code exchange.');
		}

		else
		{
			$session->set('access_token', $json['access_token']);
			return $app->redirect($urlGenerator->generate('myroutes_index'));
		}
	}
}
