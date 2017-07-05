<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\RolesRepository;
use CodeDelivery\Models\Roles;

/**
 * Class RolesRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class RolesRepositoryEloquent extends BaseRepository implements RolesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Roles::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
