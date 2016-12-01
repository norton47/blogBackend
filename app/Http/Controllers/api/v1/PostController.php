<?php

namespace App\Http\Controllers\api\v1;

use Api\App\Contracts\Entities\PostRepository as PostInterface;
use Illuminate\Support\Facades\Response;
use App\Services\DeleteCommentService;
use App\Http\Controllers\Controller;
use Api\App\Storage\Condition;

class PostController extends Controller
{
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostInterface $postRepository
     */
    public function __construct(
        PostInterface $postRepository
    )
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $condition = new Condition();

        return $posts = $this->postRepository->findAll($condition);
    }

    /**
     * @param $comment
     * @return mixed
     */
    public function show($comment)
    {
        return $comment;
    }
}
