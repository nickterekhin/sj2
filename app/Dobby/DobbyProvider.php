<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 07.09.2015
 * Time: 22:41
 */

namespace App\Dobby;


use App\Dobby\ModelProviders\Impl\UsersModelImpl;
use Illuminate\Support\ServiceProvider;

class DobbyProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->registerUserProvider();

        $this->app->bind('dobby',function($app){
             return new Dobby($app['dobby.user'],$app['request'],$app['cookie']);
        });
        $this->app->alias('dobby','App\Dobby\Dobby');

    }

    protected function registerUserProvider()
    {
        $this->app->singleton('dobby.user',function($app){

            return new UsersModelImpl();
        });
    }
}