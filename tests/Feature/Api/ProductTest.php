<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error get all tenants.
     *
     * @return void
     */
    public function testErrorGetAllProducts()
    {
        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(422);
    }

    /**
     * Get All Products.
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Product Not Found (404)
     *
     * @return void
     */
    public function testNotFoundProduct()
    {
        $tenant = factory(Tenant::class)->create();
        $product = 'fake_value';

        $response = $this->getJson("/api/v1/products/{$product}?token_company={$tenant->uuid}");
        $response->assertStatus(404);
    }

    /**
     * Get Product by Identify
     *
     * @return void
     */
    public function testGetProductByIdentify()
    {
        $product = factory(Product::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");
        $response->assertStatus(200);
    }
}
