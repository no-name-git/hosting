<?php


/**
 * вот тут я пишу бизнес логику с данными
 * тут я могу:
 * удалить данные
 * обновить данные
 * создать данные
 *
 * а вот получать и отдавать данные в репозитории

 */


namespace App\Services;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\TagRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
      private CategoryRepository $categoryRepository,
      private TagRepository $tagRepository,
      private ColorRepository $colorRepository
    ){}


    public function create():array
    {
        return [
            'categoryForProduct' => $this->categoryRepository->getForProduct(),
            'tagForProduct' => $this->tagRepository->getForProduct(),
            'colorForProduct' => $this->colorRepository->getForProduct(),
        ];
    }
}
