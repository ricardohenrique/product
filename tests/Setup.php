<?php
namespace Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Mockery;

class Setup extends TestCase
{
    use DatabaseTransactions;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @after
     */
    public function tearDown(): void
    {
        Mockery::close();
        DB::rollBack();
        DB::disconnect();
    }
}
