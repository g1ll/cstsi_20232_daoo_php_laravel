<?php
namespace Daoo\Aula03\controller;

use Dotenv\Dotenv;

class App{
	public static function init() :void {

		$path=__DIR__."/../../";
		$dotenv = Dotenv::createImmutable($path);
		$dotenv->load();
		error_log("DIR:\n".__DIR__."\n");
		include_once(__DIR__."/../config/routes.php");

		// include_once "config/routes.php";
		Route::routes($routes);
;	}
}