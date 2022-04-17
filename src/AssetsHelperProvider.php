<?php

namespace EmanaDigital;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AssetsHelperProvider extends ServiceProvider
{
	protected $assetsHelper;

	public function __construct($app)
	{
		ServiceProvider::__construct($app);
		$this->assetsHelper = new AssetsHelper();
	}

	public function boot(): void
	{
		Blade::directive('assetsHelperScriptTags', function ($entryname) {
			return $this->assetsHelper->scriptTags($entryname);
		});
		Blade::directive('assetsHelperLinkTags', function ($entryname) {
			return $this->assetsHelper->linkTags($entryname);
		});
	}
}
