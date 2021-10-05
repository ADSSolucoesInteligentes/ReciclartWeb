<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UsersInfo;

/**
 * Class UsersInfoTransformer.
 *
 * @package namespace App\Transformers;
 */
class UsersInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the UsersInfo entity.
     *
     * @param \App\Entities\UsersInfo $model
     *
     * @return array
     */
    public function transform(UsersInfo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
