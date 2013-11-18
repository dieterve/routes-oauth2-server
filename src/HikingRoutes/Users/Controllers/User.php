<?php

namespace HikingRoutes\Users\Controllers;

use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class User
{
	/**
	 * Returns the detailed info of a user
	 */
	public function user(Application $app, $username)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		if (!$server->verifyResourceRequest($app['request'], $response)) {
			return $server->getResponse();
		} else {

			// exists in cache?
			$memcached = $app['memcached'];
			$userInfo = $memcached->get('userinfo_' . $username);
			if($userInfo === false)
			{
				// fetch user info from the database
				$statement = $app['database']->prepare('SELECT username, first_name, last_name FROM oauth_users WHERE username = :username');
				$statement->execute(array('username' => $username));

				$userInfo = $statement->fetch(\PDO::FETCH_ASSOC);

				$memcached->set('userinfo_' . $username, $userInfo);
			}

			if(empty($userInfo))
			{
				throw new NotFoundHttpException('User could not be found');
			}

			$data = array(
				'user' => $userInfo
			);
			return $app->json($data);
		}
	}

	/**
	 * Returns the detailed info of a user
	 */
	public function me(Application $app)
	{
		$server = $app['oauth_server'];
		$response = $app['oauth_response'];

		if (!$server->verifyResourceRequest($app['request'], $response)) {
			return $server->getResponse();
		} else {
			$token = $server->getAccessTokenData($app['request'], $response);
			$username = $token['user_id'];

			return $this->user($app, $username);
		}
	}
}
