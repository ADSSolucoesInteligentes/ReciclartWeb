<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\users_infoRepository;
use App\Entities\UsersInfo;
use App\Validators\UsersInfoValidator;

/**
 * Class UsersInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UsersInfoRepositoryEloquent extends BaseRepository implements UsersInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UsersInfo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UsersInfoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
