<?php

namespace Tests\Unit;

use Mockery;
use Tests\Setup;
use Illuminate\Support\Collection;
use App\Services\CategoryService;
use App\Builders\ResourceBuilder;
use App\Models\Category;

class CategoryUnitTest extends Setup
{
    /**
     * @var mockCategoryModel
     */
    private $mockCategoryModel;

    /**
     * @var mockResourceBuild
     */
    private $mockResourceBuild;

    /**
     * @var defaultCategory
     */
    private $defaultCategory;


    public function setUp(): void
    {
        parent::setUp();
        $this->mockCategoryModel = Mockery::mock(Category::class);
        $this->mockResourceBuild = Mockery::mock(ResourceBuilder::class);
        $this->defaultCategory = factory(Category::class)->create();
    }

    /**
     * Test to get a category collection
     *
     * @return void
     */
    public function testGetAllCategories()
    {
        $this->mockCategoryModel->allows([
            "get" => collect([$this->defaultCategory]),
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertEquals(collect([$this->defaultCategory]), $business->getAll());
        $this->assertInstanceOf(Collection::class, $business->getAll());
    }

    /**
     * Test to get a category
     *
     * @return void
     */
    public function testGetCategory()
    {
        $this->mockCategoryModel->allows([
            "find" => $this->defaultCategory,
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultCategory, $business->getById(1));
        $this->assertInstanceOf(Category::class, $business->getById(1));
    }

    /**
     * Test to create category
     *
     * @return void
     */
    public function testCreateCategory()
    {
        $this->mockResourceBuild->allows([
            "buildCreate" => $this->defaultCategory,
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultCategory, $business->store([]));
        $this->assertInstanceOf(Category::class, $business->store([]));
    }

    /**
     * Test to update a category
     *
     * @return void
     */
    public function testUpdateCategory()
    {
        $this->mockCategoryModel->allows([
            "find" => $this->defaultCategory,
        ]);
        $this->mockResourceBuild->allows([
            "buildUpdate" => $this->defaultCategory,
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertInstanceOf(Category::class, $business->update(1, []));
    }

    /**
     * Test return from update a category
     *
     * @return void
     */
    public function testReturnUpdateCategory()
    {
        $this->mockCategoryModel->allows([
            "find" => $this->defaultCategory,
        ]);
        $this->mockResourceBuild->allows([
            "buildUpdate" => $this->defaultCategory,
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertEquals($this->defaultCategory, $business->update(1, []));
    }

    /**
     * Test to delete a category
     *
     * @return void
     */
    public function testDeleteCategory()
    {
        $this->mockCategoryModel->allows([
            "destroy" => true,
            "find" => $this->defaultCategory
        ]);

        $business = new CategoryService($this->mockCategoryModel, $this->mockResourceBuild);
        $this->assertTrue($business->delete(1));
    }

}
