<?php

namespace BrindaBrasil\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BrindaBrasil\Repositories\CategoryRepository;

use Illuminate\Database\Eloquent\Model;
use BrindaBrasil\Validators\CategoryValidator;
use \BrindaBrasil\Models\Category;
/**
 * Class CategoryRepositoryEloquent
 * @package namespace BrindaBrasil\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    
 
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
