<?php

namespace AgendaWeb\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgendaWeb\Repositories\EstandeRepository;
use AgendaWeb\Models\Estande;
use AgendaWeb\Validators\EstandeValidator;

/**
 * Class EstandeRepositoryEloquent
 * @package namespace AgendaWeb\Repositories;
 */
class EstandeRepositoryEloquent extends BaseRepository implements EstandeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estande::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
