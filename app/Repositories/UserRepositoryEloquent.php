<?php

namespace AgendaWeb\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgendaWeb\Repositories\UserRepository;
use AgendaWeb\Models\User;
use AgendaWeb\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace AgendaWeb\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
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
