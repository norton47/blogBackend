<?php

namespace App\Http\Composers;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
use Api\App\Contracts\Entities\LikeRepository as LikeInterface;
use Illuminate\Contracts\View\View;
use Api\App\Storage\Condition;

/**
 * NewLikes Composer
 *
 * @package App\Http\Composers
 */
class NewCommentsComposer
{
    /**
     * @var array
     */
    private $data = null;

    /**
     * @var CommentInterface
     */
    private $commentRepository;

    /**
     * @var LikeInterface
     */
    private $likeRepository;

    /**
     * NewCommentsComposer constructor.
     * @param CommentInterface $commentRepository
     * @param LikeInterface $likeRepository
     */
    public function __construct(
        CommentInterface $commentRepository,
        LikeInterface $likeRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->likeRepository = $likeRepository;
    }

    /**
     * @return array
     */
    public function getNewComments()
    {
        if ($this->data !== null) {
            return $this->data;
        }

        $comments = $this->commentRepository->countNewComments();
        $likes = $this->likeRepository->countNewLikes();

        $data = [
            'comments' => $comments,
            'likes' => $likes,
            'allNews' => $comments + $likes
        ];

        return $data;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('likeComments', $this->getNewComments());
    }

}