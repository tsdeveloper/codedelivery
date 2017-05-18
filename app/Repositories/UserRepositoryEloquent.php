<?php

namespace BrindaBrasil\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BrindaBrasil\Repositories\UserRepository;
use BrindaBrasil\Models\User;
use BrindaBrasil\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace BrindaBrasil\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
     public function lists() {
        return $this->model->lists('name','id');
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
