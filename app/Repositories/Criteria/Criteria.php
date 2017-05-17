<?php 
namespace BrindaBrasil\Repositories\Criteria;

use BrindaBrasil\Repositories\Contracts\RepositoryInterface as Repository;
use BrindaBrasil\Repositories\Contracts\RepositoryInterface;

abstract class Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}