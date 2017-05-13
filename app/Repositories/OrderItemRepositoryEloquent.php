<?php

namespace BrindaBrasil\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BrindaBrasil\Repositories\OrderItemRepository;
use BrindaBrasil\Models\OrderItem;
use BrindaBrasil\Validators\OrderItemValidator;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace BrindaBrasil\Repositories;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
