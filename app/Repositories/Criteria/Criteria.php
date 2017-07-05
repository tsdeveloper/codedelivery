<?php 
namespace CodeDelivery\Repositories\Criteria;

use CodeDelivery\Repositories\Contracts\RepositoryInterface as Repository;
use CodeDelivery\Repositories\Contracts\RepositoryInterface;

abstract class Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}