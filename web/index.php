<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// providers
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../src',
));

$app['http_client'] = new \Guzzle\Http\Client();

$app->before(function($request) {
	$request->getSession()->start();
});

$app->match('/', function() use ($app)
{
	// there is no index, perhaps later show documentation or perform a redirect
	return $app->json(array('message' => 'Nothing here.'));
});

$app->mount('/authentication', new HikingRoutes\Authentication\Authentication());
$app->mount('/myroutes', new MyRoutes\Routes\Routes());

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

// create an http foundation request implementing OAuth2\RequestInterface
$request = OAuth2\HttpFoundationBridge\Request::createFromGlobals();
$app->run($request);
