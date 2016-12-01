<?php

namespace App\Http\Controllers;

use Api\App\Contracts\Entities\CategoryRepository as CategoryInterface;
use Api\App\Contracts\Entities\PostRepository as PostInterface;
use App\Http\Requests\CategoryRequest;
use App\Services\CreateCategoryService;
use Api\App\Storage\Condition;
use Session;

/**
 * Category Controller
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    protected $categoryRepository;

    protected $postRepository;

    protected $createCategoryService;

    /**
     * CategoryController constructor.
     * @param CreateCategoryService $createCategoryService
     * @param CategoryInterface $categoryRepository
     * @param PostInterface $postRepository
     */
    public function __construct(
        CreateCategoryService $createCategoryService,
        CategoryInterface $categoryRepository,
        PostInterface $postRepository
    )
    {
        $this->createCategoryService = $createCategoryService;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $condition = new Condition();
        $categories = $this->categoryRepository->findAll($condition);

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($category)
    {
        return redirect(route('category.index'));
    }

    public function create()
    {
        return view('category.create');
    }

    /**
     * @param CategoryRequest $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $data)
    {
        if ($this->createCategoryService->save($data->all())) {
            Session::flash('success', trans('app.create_success'));
        } else {
            Session::flash('danger', trans('app.create_error'));

        }
        return redirect(route('category.index'));
    }

    public function edit($category)
    {
        return view('category.index');
    }

    public function update($category)
    {
        return view('category.index');
    }
}