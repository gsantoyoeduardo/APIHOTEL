<?php

namespace App\Providers;

use App\Application\Interface\IAlmacenApplication;
use App\Infrastructure\Repositories\CabeceraGlobalRepositoryEloquent;
use App\Infrastructure\Repositories\UsuarioRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Interface\ICabeceraGlobalRepositoryEloquent;
use App\Domain\Interface\ICabeceraGlobalDomain;
use App\Domain\Main\CabeceraGlobalDomain;
use App\Application\Interface\ICabeceraGlobalApplication;
use App\Application\Interface\IDireccionApplication;
use App\Application\Interface\IGlobalesApplication;
use App\Application\Interface\ILoteApplication;
use App\Application\Interface\ISucursalApplication;
use App\Application\Interface\IUsuarioApplication;
use App\Application\Services\AlmacenServices;
use App\Application\Services\CabeceraGlobalServices;
use App\Application\Services\DireccionServices;
use App\Application\Services\GlobalesServices;
use App\Application\Services\LoteServices;
use App\Application\Services\SucursalServices;
use App\Application\Services\UsuarioServices;
use App\Domain\Interface\IAlmacenDomain;
use App\Domain\Interface\IDireccionDomain;
use App\Domain\Interface\IGlobalesDomain;
use App\Domain\Interface\ILoteDomain;
use App\Domain\Interface\ISucursalDomain;
use App\Domain\Interface\IUsuarioDomain;
use App\Domain\Main\AlmacenDomain;
use App\Domain\Main\DireccionDomain;
use App\Domain\Main\GlobalesDomain;
use App\Domain\Main\LoteDomain;
use App\Domain\Main\SucursalDomain;
use App\Domain\Main\UsuarioDomain;
use App\Infrastructure\Interface\IAlmacenRepositoryEloquent;
use App\Infrastructure\Interface\IDireccionRepositoryEloquent;
use App\Infrastructure\Interface\IGlobalesRepositoryEloquent;
use App\Infrastructure\Interface\ILoteRepositoryEloquent;
use App\Infrastructure\Interface\ISucursalRepositoryEloquent;
use App\Infrastructure\Interface\IUsuarioRepositoryEloquent;
use App\Infrastructure\Repositories\AlmacenRepositoryEloquent;
use App\Infrastructure\Repositories\DireccionRepositoryEloquent;
use App\Infrastructure\Repositories\GlobalesRepositoryEloquent;
use App\Infrastructure\Repositories\LoteRepositoryEloquent;
use App\Infrastructure\Repositories\SucursalRepositoryEloquent;

class CustomService extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        // CAPA DE INFRAESTRUCTURE

        $this->app->singleton(ICabeceraGlobalRepositoryEloquent::class, CabeceraGlobalRepositoryEloquent::class); // CabeceraGlobal
        $this->app->singleton(IAlmacenRepositoryEloquent::class, AlmacenRepositoryEloquent::class); // Almacen
        $this->app->singleton(IDireccionRepositoryEloquent::class, DireccionRepositoryEloquent::class); // Direccion
        $this->app->singleton(IGlobalesRepositoryEloquent::class, GlobalesRepositoryEloquent::class); // Globales
        $this->app->singleton(ILoteRepositoryEloquent::class, LoteRepositoryEloquent::class); // Lote
        $this->app->singleton(ISucursalRepositoryEloquent::class, SucursalRepositoryEloquent::class); // Sucursal
        $this->app->singleton(IUsuarioRepositoryEloquent::class, UsuarioRepositoryEloquent::class); // Usuario

        // CAPA DE DOMAIN

        $this->app->singleton(ICabeceraGlobalDomain::class, CabeceraGlobalDomain::class); // CabeceraGlobal
        $this->app->singleton(IAlmacenDomain::class, AlmacenDomain::class); // Almacen
        $this->app->singleton(IDireccionDomain::class, DireccionDomain::class); // Direccion
        $this->app->singleton(IGlobalesDomain::class, GlobalesDomain::class); // Globales
        $this->app->singleton(ILoteDomain::class, LoteDomain::class); // Lote
        $this->app->singleton(ISucursalDomain::class, SucursalDomain::class); // Sucursal
        $this->app->singleton(IUsuarioDomain::class, UsuarioDomain::class); // Usuario

        // CAPA DE APPLICATION

        $this->app->singleton(ICabeceraGlobalApplication::class, CabeceraGlobalServices::class); // CabeceraGlobal
        $this->app->singleton(IAlmacenApplication::class, AlmacenServices::class); // Almacen
        $this->app->singleton(IDireccionApplication::class, DireccionServices::class); // Direccion
        $this->app->singleton(IGlobalesApplication::class, GlobalesServices::class); // Globales
        $this->app->singleton(ILoteApplication::class, LoteServices::class); // Lote
        $this->app->singleton(ISucursalApplication::class, SucursalServices::class); // Sucursal
        $this->app->singleton(IUsuarioApplication::class, UsuarioServices::class); // Usuario
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
