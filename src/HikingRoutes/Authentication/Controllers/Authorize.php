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
		return "Authorize me.";
	}
}
