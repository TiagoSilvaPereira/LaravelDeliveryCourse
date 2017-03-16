<?php

namespace KingDelivery\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'KingDelivery\Repositories\CategoryRepository',
            'KingDelivery\Repositories\CategoryRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\ClientRepository',
            'KingDelivery\Repositories\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\OrderRepository',
            'KingDelivery\Repositories\OrderRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\OrderItemRepository',
            'KingDelivery\Repositories\OrderItemRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\ProductRepository',
            'KingDelivery\Repositories\ProductRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\UserRepository',
            'KingDelivery\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\CupomRepository',
            'KingDelivery\Repositories\CupomRepositoryEloquent'
        );

        $this->app->bind(
            'KingDelivery\Repositories\OrderRepository',
            'KingDelivery\Repositories\OrderRepositoryEloquent'
        );
    }
}
