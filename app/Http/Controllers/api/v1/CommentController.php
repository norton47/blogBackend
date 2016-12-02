<?php

namespace App\Http\Controllers\api\v1;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
use Illuminate\Support\Facades\Response;
use App\Services\DeleteCommentService;
use App\Services\CreateCommentService;
use App\Http\Controllers\Controller;
use Api\App\Storage\Condition;

class CommentController extends Controller
{
    private $commentRepository;

    private $deleteCommentService;

    private $createCommentService;

    /**
     * CommentController constructor.
     * @param CommentInterface $commentRepository
     * @param DeleteCommentService $deleteCommentService
     * @param CreateCommentService $createCommentService
     */
    public function __construct(
        CommentInterface $commentRepository,
        DeleteCommentService $deleteCommentService,
        CreateCommentService $createCommentService
    )
    {
        $this->commentRepository = $commentRepository;
        $this->createCommentService = $createCommentService;
        $this->deleteCommentService = $deleteCommentService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $condition = new Condition();
        $condition->pagination();
        $comments = $this->commentRepository->findAll($condition);

        return Response::json([
            'data' => $comments
        ], 200);
    }

    /**
     * @param $comment
     * @return mixed
     */
    public function show($comment)
    {
        return Response::json([
            'data' => $comment
        ], 200);
    }

    /**
     * @param $comment
     */
    public function destroy($comment)
    {
        $this->deleteCommentService->delete($comment);
    }


}
