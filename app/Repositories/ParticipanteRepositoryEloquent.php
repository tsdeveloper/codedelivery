<?php

namespace AgendaWeb\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgendaWeb\Repositories\ParticipanteRepository;
use AgendaWeb\Models\Participante;
use AgendaWeb\Validators\ParticipanteValidator;

/**
 * Class ParticipanteRepositoryEloquent
 * @package namespace AgendaWeb\Repositories;
 */
class ParticipanteRepositoryEloquent extends BaseRepository implements ParticipanteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Participante::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
