<?php

namespace Extra\Youtube\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class YoutubeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'youtube');

        $this->registerRoutes();

        view()->composer('unopim::layouts.menu', function ($view) {
            $menu = $view->menu ?? [];
            $menu[] = [
                'title' => 'Youtube',
                'url'   => route('youtube.index'),
                'icon'  => 'fa fa-youtube-play',
            ];
            $view->with('menu', $menu);
        });
    }

    protected function registerRoutes(): void
    {
        Route::middleware(['web', 'auth'])
            ->prefix('admin/youtube')
            ->name('youtube.')
            ->group(__DIR__ . '/routes/web.php');
    }
}
