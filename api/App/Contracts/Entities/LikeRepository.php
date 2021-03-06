<?php

namespace Api\App\Contracts\Entities;

use Api\App\Contracts\Storage\Condition as ConditionInterface;
use Api\App\Contracts\Query\FindInterface;

/**
 * Comment Repository
 * @package Api\App\Contracts\Entities
 */
interface LikeRepository extends FindInterface
{
    public function countNewLikes(ConditionInterface $condition = null);
}