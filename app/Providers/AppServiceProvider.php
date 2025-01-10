<?php

namespace App\Providers;


use App\Domain\Repositories\UsuarioRepositoryInterface;
use App\Infrastructure\Repositories\UsuarioRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

// use App\Domain\Repositories\UsuarioRepositoryInterface;
// use App\Infrastructure\Repositories\UsuarioRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * aqui se registras las instacias de los servicios
     */
    public function register(): void
    {
        // $this->app->bind(UsuarioRepositoryInterface::class, UsuarioRepositoryEloquent::class);
        // $this->app->singleton(UsuarioRepositoryInterface::class, UsuarioRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
