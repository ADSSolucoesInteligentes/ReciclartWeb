<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\materials_requestRepository;
use App\Entities\MaterialsRequest;
use App\Validators\MaterialsRequestValidator;

/**
 * Class MaterialsRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MaterialsRequestRepositoryEloquent extends BaseRepository implements MaterialsRequestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MaterialsRequest::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MaterialsRequestValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
