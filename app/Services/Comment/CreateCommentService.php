<?php

namespace App\Services;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;

class CreateCommentService
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
     * @param array $data
     * @return bool
     */
    public function save(array $data)
    {
        DB::beginTransaction();

        if ($this->commentRepository->save($data)) {
            DB::commit();
            return true;
        }

        DB::rollBack();
        return false;
    }
}