<?php

		require_once __DIR__."/../vendor/autoload.php";
		require_once __DIR__."/../src/Place.php";

		session_start();

		if (empty($_SESSION['list_of_places'])) {
					$_SESSION['list_of_places'] = array ();
		}

		$app = new Silex\Application();

		$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

		$app->get('/', function() use ($app) {
				return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));
		});

		$app->post("/places", function() use ($app) {
				$place = new Place($_POST['city']);
				$place->save();
				return $app['twig']->render('create_place.html.twig', array('newplace' => $task));
		});

		return $app;

?>