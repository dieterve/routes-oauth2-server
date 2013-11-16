<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->error(function(\Exception $e, $code) use ($app)
{
	/*
	 * Display a clean JSON response when debug is disabled.
	 * When debug is enabled when let Silex display a stacktrace (aka we do nothing).
	 */
	if(!$app['debug'])
	{
		switch($code)
		{
			case 404:
				$data = array(
					'message' => 'The requested resource could not be found. Make sure you are using the right HTTP method.',
					'code' => $code
				);

				break;
			default:
				$data = array(
					'message' => $e->getMessage(),
					'code' => $code
				);
		}


		return $app->json($data);
	}
});


$app->run();