<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\MaterialRepository::class, \App\Repositories\MaterialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MaterialsRequestRepository::class, \App\Repositories\MaterialsRequestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UsersInfoRepository::class, \App\Repositories\UsersInfoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PessoaRepository::class, \App\Repositories\PessoaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UsuarioRepository::class, \App\Repositories\UsuarioRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PedidoRepository::class, \App\Repositories\PedidoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MateriaiRepository::class, \App\Repositories\MateriaiRepositoryEloquent::class);
        //:end-bindings:
    }
}
