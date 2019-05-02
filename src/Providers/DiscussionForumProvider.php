<?php

namespace CASTEP\DiscussionForum\Providers;

use Illuminate\Support\ServiceProvider;

class DiscussionForumProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        // publish the module's configuration file
        $this->publishes([
            __DIR__."/../../config/castep-discussionforum.php" => config_path('castep-discussionforum.php')
        ], 'discussionforum');

        // load the module's middleware
        $this->app['router']->middleware('discussion-forum-enabled', 'CASTEP\\DiscussionForum\\Middleware\\DiscussionForumEnabled');

        // load the module's routes
        $this->loadRoutesFrom(__DIR__."/../../routes/web.php");

        // load the module's database migrations
        $this->loadMigrationsFrom(__DIR__."/../../database/migrations");
    }
}
