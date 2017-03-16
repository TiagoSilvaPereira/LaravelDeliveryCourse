<?php

namespace KingDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use KingDelivery\Repositories\UserRepository;
use KingDelivery\Models\User;
use KingDelivery\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace KingDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    public function getDeliveryMen($column = NULL, $key = NULL) {
        return $this->model->where('role', 'deliveryman')->pluck('name', 'id');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
