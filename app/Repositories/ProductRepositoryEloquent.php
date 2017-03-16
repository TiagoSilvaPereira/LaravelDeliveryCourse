<?php

namespace KingDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use KingDelivery\Repositories\ProductRepository;
use KingDelivery\Models\Product;
use KingDelivery\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace KingDelivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    public function lists($column = NULL, $key = NULL) {
        return $this->model->pluck('id', 'name', 'price');
    }
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
