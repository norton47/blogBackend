<?php

namespace App\Http\Controllers;

use Api\App\Contracts\Entities\PostRepository as PostInterface;
use Api\App\Storage\Condition;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $postRepository;

    /**
     * CategoryController constructor.
     * @param PostInterface $postRepository
     */
    public function __construct(
        PostInterface $postRepository
    )
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($category = null)
    {
        $condition = new Condition();

        if ($category) {
            $condition->addCondition('categoryId', 'category', $category->id);
        }

        $posts = $this->postRepository->findAll($condition);

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
        return view('post.index');
    }
}