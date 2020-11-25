<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    TenantRepositoryInterface,
    CategoryRepositoryInterface,
    ClientRepositoryInterface,
    OrderRepositoryInterface,
    ProductRepositoryInterface,
    TableRepositoryInterface
};
use App\Repositories\{
    TenantRepository,
    CategoryRepository,
    ClientRepository,
    OrderRepository,
    ProductRepository,
    TableRepository
};

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
        // Map to Bind Repositories and Interfaces
        $toBind = [
            // Tenant
            TenantRepositoryInterface::class   => TenantRepository::class,
            // Category
            CategoryRepositoryInterface::class => CategoryRepository::class,
            // Table
            TableRepositoryInterface::class    => TableRepository::class,
            // Product
            ProductRepositoryInterface::class  => ProductRepository::class,
            // Client
            ClientRepositoryInterface::class   => ClientRepository::class,
            // Order
            OrderRepositoryInterface::class   => OrderRepository::class,

        ];

        foreach($toBind as $interface => $repository){
            $this->app->bind( $interface, $repository );
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
