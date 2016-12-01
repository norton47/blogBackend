<?php

namespace App\Services;

use Api\App\Contracts\Entities\CategoryRepository as CategoryInterface;
use DB;

class CreateCategoryService
{
    private $categoryRepository;

    /**
     * CommentController constructor.
     * @param CategoryInterface $categoryRepository
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data)
    {
        DB::beginTransaction();

        if ($this->categoryRepository->save($data)) {
            DB::commit();
            return true;
        }

        DB::rollBack();
        return false;
    }
}