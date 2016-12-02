<?php

namespace App\Http\Composers;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
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

    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @return array
     */
    public function getNewComments()
    {
        if ($this->data !== null) {
            return $this->data;
        }

        return $this->commentRepository->countNewComments();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categoryControl', $this->getData());
    }

}