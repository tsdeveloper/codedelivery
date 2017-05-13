<?php

namespace BrindaBrasil\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BrindaBrasil\Repositories\ClientRepository;
use BrindaBrasil\Models\Client;
use BrindaBrasil\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace BrindaBrasil\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
