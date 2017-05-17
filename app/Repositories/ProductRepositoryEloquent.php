<?php

namespace BrindaBrasil\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BrindaBrasil\Repositories\ProductRepository;
use BrindaBrasil\Models\Product;
use BrindaBrasil\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace BrindaBrasil\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
  

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
