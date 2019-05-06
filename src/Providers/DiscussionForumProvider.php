<?php

namespace CASTEP\DiscussionForum\Providers;

use Illuminate\Support\ServiceProvider;

class DiscussionForumProvider extends ServiceProvider
{
    public $module_name;
    public $module_version;

    public function __construct()
    {
        $this->module_name = "Discussion Forum";
        $this->module_version = "1.0.0";
    }

    public function register()
    {

    }

    public function boot()
    {
        // publish the module's configuration file
        $this->publishes([
            __DIR__."/../../config/castep-discussionforum.php" => config_path('castep-discussionforum.php')
        ], 'discussionforum');

        // load the module's routes
        $this->loadRoutesFrom(__DIR__."/../../routes/web.php");

        // load the module's database migrations
        $this->loadMigrationsFrom(__DIR__."/../../database/migrations");

        // load the module into the master config array
        $enabled_modules = config('modules.enabled');
        $this_module = [
            'name' => $this->module_name,
            'version' => $this->module_version,
            'class' => self::class
        ];
        $module_config = array_merge($enabled_modules, $this_module);
        config([
            'modules.enabled' => $module_config
        ]);
    }
}
