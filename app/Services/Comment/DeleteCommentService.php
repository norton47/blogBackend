<?php

namespace App\Services;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;

class DeleteCommentService
{
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentInterface $commentRepository
     */
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param $comment
     */
    public function delete($comment)
    {
        $comment->delete();
    }
}