<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\materiaiRepository;
use App\Entities\Materiai;
use App\Validators\MateriaiValidator;

/**
 * Class MateriaiRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MateriaiRepositoryEloquent extends BaseRepository implements MateriaiRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Materiai::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MateriaiValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
