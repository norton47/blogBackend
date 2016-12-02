<?php

namespace App\Http\Controllers;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
use Api\App\Storage\Condition;

/**
 * Comment Controller
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    protected $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentInterface $commentRepository
     */
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $condition = new Condition();
        $comment = $this->commentRepository->findAll($condition);

        dd($comment);

        return view('post.index');
    }


}