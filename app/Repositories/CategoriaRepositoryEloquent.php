<?php

namespace AgendaWeb\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgendaWeb\Repositories\CategoriaRepository;
use AgendaWeb\Models\Categoria;
use AgendaWeb\Validators\CategoriaValidator;

/**
 * Class CategoriaRepositoryEloquent
 * @package namespace AgendaWeb\Repositories;
 */
class CategoriaRepositoryEloquent extends BaseRepository implements CategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
