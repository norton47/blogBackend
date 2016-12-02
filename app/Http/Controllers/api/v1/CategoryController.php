<?php

namespace App\Http\Controllers\api\v1;

use Api\App\Contracts\Entities\CategoryRepository as CategoryInterface;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Api\App\Storage\Condition;

class CategoryController extends Controller
{
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryInterface $categoryRepository
     */
    public function __construct(
        CategoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $condition = new Condition();
        $categories = $this->categoryRepository->findAll($condition);

        return Response::json([
            'data' => $categories
        ], 200);

    }
}
