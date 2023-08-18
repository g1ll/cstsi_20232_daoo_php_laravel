<?php
namespace Daoo\Aula03\controller;

class App{
	public static function init() :void {

		include_once "src/config/routes.php";
		Route::routes($routes);
;	}
}