<?php

namespace Tests\Unit;

use Mockery;
use Tests\Setup;
use Illuminate\Support\Collection;
use App\Services\ProductService;
use App\Builders\ResourceBuilder;
use App\Models\Product;

class ProductUnitTest extends Setup
{
    /**
     * @var mockProductModel
     */
    private $mockProductModel;

    /**
     * @var mockResourceBuild
     */
    private $mockResourceBuild;

    /**
     * @var defaultProduct
     */
    private $defaultProduct;


    public function setUp(): void
    {
        parent::setUp();
        $this->mockProductModel = Mockery::mock(Product::class);
        $this->mockResourceBuild = Mockery::mock(ResourceBuilder::class);
        $this->defaultProduct = factory(Product::class)->create();
    }

    /**
     * Test to get a product collection
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $this->mockProductModel->allows([
            "get" => collect([$this->defaultProduct]),
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertEquals(collect([$this->defaultProduct]), $business->getAll());
        $this->assertInstanceOf(Collection::class, $business->getAll());
    }

    /**
     * Test to get a product
     *
     * @return void
     */
    public function testGetProduct()
    {
        $this->mockProductModel->allows([
            "find" => $this->defaultProduct,
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultProduct, $business->getById(1));
        $this->assertInstanceOf(Product::class, $business->getById(1));
    }

    /**
     * Test to create product
     *
     * @return void
     */
    public function testCreateProduct()
    {
        $this->mockResourceBuild->allows([
            "buildCreate" => $this->defaultProduct,
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultProduct, $business->store([]));
        $this->assertInstanceOf(Product::class, $business->store([]));
    }

    /**
     * Test to update a product
     *
     * @return void
     */
    public function testUpdateProduct()
    {
        $this->mockProductModel->allows([
            "find" => $this->defaultProduct,
        ]);
        $this->mockResourceBuild->allows([
            "buildUpdate" => $this->defaultProduct,
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertInstanceOf(Product::class, $business->update(1, []));
    }

    /**
     * Test return from update a product
     *
     * @return void
     */
    public function testReturnUpdateProduct()
    {
        $this->mockProductModel->allows([
            "find" => $this->defaultProduct,
        ]);
        $this->mockResourceBuild->allows([
            "buildUpdate" => $this->defaultProduct,
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultProduct, $business->update(1, []));
    }

    /**
     * Test to delete a product
     *
     * @return void
     */
    public function testDeleteProduct()
    {
        $this->mockProductModel->allows([
            "destroy" => true,
            "find" => $this->defaultProduct
        ]);

        $business = new ProductService($this->mockProductModel, $this->mockResourceBuild);
        $this->assertTrue($business->delete(1));
    }

}
