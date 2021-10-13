<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\pedidoRepository;
use App\Entities\Pedido;
use App\Validators\PedidoValidator;

/**
 * Class PedidoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PedidoRepositoryEloquent extends BaseRepository implements PedidoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pedido::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PedidoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
