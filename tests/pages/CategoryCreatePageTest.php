<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Category;

class CategoryCreatePageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->call('GET', '/category/create');

        $this->assertEquals(200, $response->status());

        $this->visit('/category/create')
            ->type('TestCategory', 'name')
            ->type('TestDescription', 'description')
            ->press('Сохранить')
            ->seePageIs('/category');

        $this->seeInDatabase(Category::getTableName(), [
            'name' => 'TestCategory',
            'description' => 'TestDescription'
        ]);
    }
}
