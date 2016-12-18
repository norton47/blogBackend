<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCategories()
    {
        $this->get('/api/v1/category')
            ->seeJsonStructure([
                'data' =>
                    ['*' =>
                        [
                            'id', 'name', 'description', 'deleted_at', 'created_at', 'updated_at'
                        ]
                    ]
            ]);
    }
}
