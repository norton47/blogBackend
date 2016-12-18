<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\CategoryRepository;
use App\Services\CreateCategoryService;

/**
 * ./vendor/bin/phpunit
 * TODO надо доработать
 */
class CreateCategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function createFakers()
    {
        $f = Faker\Factory::create();

        $model = new \App\Models\Category();
        $repo = new CategoryRepository($model);
        $servise = new CreateCategoryService($repo);

        $data = [
            'name' => $f->name,
            'description' => $f->sentence(50),
        ];

        $servise->save($data);

        return compact('data', 'model');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $result = $this->createFakers();

        $this->seeInDatabase($result['model']->getTableName(), [
            'name' => $result['data']['name'],
            'description' => $result['data']['description']
        ]);
    }

}
