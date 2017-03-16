<?php

namespace KingDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use KingDelivery\Repositories\OrderRepository;
use KingDelivery\Models\Order;
use KingDelivery\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace KingDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
