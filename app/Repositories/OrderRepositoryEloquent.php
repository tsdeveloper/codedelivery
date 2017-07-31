<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\OrderPresenter;
use function count;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Models\Order;
use function throwException;


/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    protected $skipPresenter = true;

    public function getByAndIdDeliveryman($id, $IdDeliveryman)
    {
        $result = $this->with(['items','deliveryman','cupom','items.product'])->findWhere([
            'id' => $id,
            'user_deliveryman_id' => $IdDeliveryman
        ]);

        if($result instanceof Collection){
            $result =$result->first();
        }else{
            if(isset($result['data']) && count($result['data']) ==1){
                $result = [
                  'data' => $result['data'][0]
                ];
            }else{
                throw new ModelNotFoundException("Order não existe!");
            }
        }



        return $result;
    }

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
        return Order::class;
    }

    public function presenter()
    {
        return OrderPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
