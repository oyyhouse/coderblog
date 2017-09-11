<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/6
 * Time: 10:12
 */
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {
        // 基于类的view composer
        view()->composer('widgets.navigation', 'App\Http\ViewComposers\Navigation');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }
}