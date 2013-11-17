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
			$templateVariables['logged_in'] = true;
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
}
