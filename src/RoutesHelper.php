<?php

namespace EmanaDigital;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Arr;

class RoutesHelper
{
	static public function getRoutesAndTitle()
	{
		$routesConfigPath = App::resourcePath('assets/routes.json');
		$routesConfig = Arr::dot(json_decode(file_get_contents($routesConfigPath), true));

		return $routesConfig;
	}

	static public function path($routeName)
	{
		$routesConfig = RoutesHelper::getRoutesAndTitle();

		return $routesConfig["routes.$routeName.path"];
	}

	static public function title($routeName)
	{
		$routesConfig = RoutesHelper::getRoutesAndTitle();
		$routeTitle = $routesConfig["routes.$routeName.title"];
		$titleSeparator = $routesConfig["title.separator"];
		$baseTitle = $routesConfig["title.base"];

		if (isset($routeTitle)) {
			return $routeTitle . ' ' . $titleSeparator . ' ' . $baseTitle;
		}
		return $baseTitle;
	}
}
